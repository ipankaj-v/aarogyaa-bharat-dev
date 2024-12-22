<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RazorpayService;
use Razorpay\Api\Api;
use App\Models\Front\Cart;
use App\Models\Admin\Status;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderAddress;
use App\Models\Front\Adress;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    protected $razorpay;

    public function __construct(RazorpayService $razorpay)
    {
        $this->razorpay = $razorpay;
    }

    public function store(Request $request)
{
    DB::beginTransaction(); // Start a new database transaction

    
        // Ensure the user is logged in and has the 'Customer' role
        if (Auth::check() && Auth::user()->hasRole('Customer')) {
            try {
            // Check if a delivery address exists for the customer
            $deliveryAddressExists = Adress::where('customer_id', Auth::id())
                                            ->where('is_delivery_address', true)
                                            ->exists();

            if (!$deliveryAddressExists) {
                return response()->json(['message' => 'Please add delivery address.'], 404);
            }

            // Retrieve the cart and its products
            $cart = Cart::with('cartProducts')->where('id', $request->cart_id)->first();

            if (!$cart) {
                return response()->json(['error' => 'Cart not found'], 404);
            }

            // Initialize necessary variables
            $gst = 0;
            $total = 0;
            $orderItemsData = [];
            $cartProductsCount = 0;

            // Loop through the cart products and calculate total and GST
            foreach ($cart->cartProducts as $product) {
                if ($product->is_visible) {
                    $cartProductsCount++;
                    $total += $product->price * $product->quantity;
                    \Log::info(['GST Calculation' => ($product->price * $product->quantity * $product->product->gst / 100)]);
                    $gst += ($product->price * $product->quantity * $product->product->gst / 100);
                    $orderItemsData[] = [
                        'product_id' => $product->product_id,
                        'quantity' => $product->quantity,
                        'price' => $product->price,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            // Ensure the cart has at least one visible product
            if ($cartProductsCount == 0) {
                return response()->json(['error' => 'At least one item should be in cart.'], 404);
            }

            // Apply discount to the total if any
            if (!empty($cart->discount_offer_amount)) {
                $total -= $cart->discount_offer_amount;
            }

            // Calculate the final total amount (including GST)
            $total = $gst + $total;
            $total = max($total, 0); // Ensure total is non-negative

            // Create a new order record with a temporary status
            $order = Order::create([
                'cart_id' => $cart->id,
                'offer_id' => $cart->discount_offer_id,
                'customer_id' => Auth::user()->id,
                'amount' => $total,
                'status_id' => 1,
                'payment_response' => null,
                'razorpay_order_id' => null,
            ]);

            // Get the delivery address of the customer
            $address = Adress::where([
                'customer_id' => Auth::user()->id,
                'is_delivery_address' => true,
            ])->first();

            // Create the order address record
            $orderAddress = OrderAddress::create([
                'order_id' => $order->id,
                'house_number' => $address->house_number,
                'society_name' => $address->society_name,
                'locality' => $address->locality,
                'landmark' => $address->landmark,
                'pincode' => $address->pincode,
                'city' => $address->city,
                'state' => $address->state,
            ]);

            // Create order items
            foreach ($orderItemsData as $item) {
                $item['order_id'] = $order->id; // Associate the item with the created order
                OrderItem::create($item);
            }

            \Log::info(['Total' => $total]);

            // Razorpay payment gateway integration
            try {
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                $res = $api->order->create([
                    'receipt' => (string)$order->id,
                    'amount' => intval($total * 100), // Amount in paise (100 paise = 1 INR)
                    'currency' => 'INR',
                ]);

                \Log::info(['Payment Response Order ID' => $res['id']]);

                if (isset($res)) {
                    $order->update([
                        'payment_response' => json_encode($res),
                        'razorpay_order_id' => $res['id'],
                    ]);
                } else {
                    throw new \Exception('Failed to create order in Razorpay.');
                }
            } catch (\Exception $e) {
                \Log::error(['Payment Error' => $e->getMessage()]);
                DB::rollBack(); // Rollback the transaction if payment fails
                return response()->json([
                    'error' => 'An error occurred while processing payment.',
                    'message' => $e->getMessage(),
                ], 500);
            }

            // Clear cart items after successful order
            $cart->cartProducts()->delete();
            $cart->delete();

            // Commit the transaction if everything is successful
            DB::commit();

            // Return success response with order details
            return response()->json([
                'success' => true,
                'amount' => $total,
                'order_id' => $order->razorpay_order_id,
                'customer' => Auth::user(),
            ]);

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction if any exception occurs

            // Return error response
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    } else {
        return response()->json([
            'message' => 'Please login to proceed with payment.',
        ], 401);
    }
}




    // public function store(Request $request) {
    //     DB::beginTransaction();

    //     if (Auth::check() && Auth::user()->hasRole('Customer')) {
    //     try {
    //         $deliveryAddressExists = Adress::where('customer_id', Auth::id())
    //                                 ->where('is_delivery_address', true)
    //                                 ->exists();
    
    //         if (!$deliveryAddressExists) {
    //             return response()->json(['message' => 'Please add delivery address.'], 404);
    //         }

    //         $cart = Cart::with('cartProducts')->where('id', $request->cart_id)->first();
    
    //         if (!$cart) {
    //             return response()->json(['error' => 'Cart not found'], 404);
    //         }      
    //         $gst = 0;
    //         $total = 0;
    //         $orderItemsData = []; // Array to hold order items data
    //         $cartProductsCount = 0;
    //         foreach ($cart->cartProducts as $product) {
    //             if ($product->is_visible) {
    //                 $cartProductsCount++;
    //                 $total += $product->price * $product->quantity;
    //                 \Log::info(['GST Calculation' => ($product->price * $product->quantity * $product->product->gst / 100)]);
    //                 $gst += ($product->price * $product->quantity * $product->product->gst / 100);    
    //                 $orderItemsData[] = [
    //                     'product_id' => $product->product_id,
    //                     'quantity' => $product->quantity,
    //                     'price' => $product->price,
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ];
    //             }
    //         }

    //         if ($cartProductsCount == 0) {
    //             return response()->json(['error' => 'At least one item should be in cart.'], 404);
    //         }      
        
    //         if (!empty($cart->discount_offer_amount)) {
    //             $total -= $cart->discount_offer_amount;
    //         }
    //         $total = $gst + $total;
    //         $total = max($total, 0);
    //         // Create a new order record with a temporary status
    //         $order = Order::create([
    //             'cart_id' => $cart->id,
    //             'offer_id' => $cart->discount_offer_id, 
    //             'customer_id' => Auth::user()->id,
    //             'amount' => $total,
    //             'status_id' => 1,
    //             'payment_response' => null, 
    //             'razorpay_order_id' => null,
    //         ]);
            
    //         //add order address
    //         $address = Adress::where([
    //             'customer_id' => Auth::user()->id,
    //             'is_delivery_address' => true,
    //             ])->first();
                
    //             // dd($gst, $total, $address);
    //         $order = OrderAddress::create([
    //             'house_number' => $address->house_number, 
    //             'society_name' => $address->society_name,
    //             'locality' => $address->locality, 
    //             'landmark' => $address->landmark,
    //             'pincode' => $address->pincode, 
    //             'city' => $address->city, 
    //             'state' => $address->state,  
    //         ]);
    
    //         // Create order items
    //         foreach ($orderItemsData as $item) {
    //             $item['order_id'] = $order->id; 
    //             OrderItem::create($item);
    //         }
    //         \Log::info(['total' => $total]);
    //         try {
    //         // Initialize Razorpay API
    //         $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    //         $res = $api->order->create([
    //             'receipt' => (string)$order->id,
    //             'amount' => intval($total * 100),
    //             'currency' => 'INR'
    //         ]);
            
    //         \Log::info(['payment response order id' => $res['id']]);
            
    //         // Check if the order was created successfully
    //         if (isset($res)) {
    //             \Log::info(['payment response ------------------------' => $res]);
    //             $order->update([
    //                 'payment_response' => json_encode($res),
    //                 'razorpay_order_id' => $res['id'],
    //             ]);
    //         } else {
    //             throw new \Exception('Failed to create order in Razorpay.');
    //         }
    //     }catch(\Exception $e) {
    //         \Log::info(['payment error ------------------------' => $e->getMessage()]);
    //         DB::rollBack(); 
    //     }
    //         $cart->cartProducts()->delete();
    //         $cart->delete(); 
    
    //         DB::commit(); 
    
    //         return response()->json([
    //             'success' => true,
    //             'amount' => $total,
    //             'order_id' => $order->razorpay_order_id,
    //             'customer' => Auth::user()
    //         ]);
    //     } catch (\Exception $e) {
    //         DB::rollBack(); 
    
    //         return response()->json([
    //             'error' => 'An error occurred while processing your request.',
    //             'message' => $e->getMessage(),
    //             'line' => $e->getLine()
    //         ], 500);
    //     }
           
    //     } else {
    //         return response()->json([
    //             'message' => 'Please login to proceed with payment.'
    //         ], 401);      
    //     }
    // }    

    public function paymentSuccess(Request $request) {
        DB::beginTransaction();
        \Log::info(['$request' => $request->all()]);
        try {
        
            //add order address
            $orderAddress = Adress::where([
                'customer_id' => Auth::user()->id,
                'is_delivery_address' => true,
                ])->first();

            // $order = OrderAddress::create([
            //     'house_number' => $address->house_number, 
            //     'society_name' => $address->society_name,
            //     'locality' => $address->locality, 
            //     'landmark' => $address->landmark,
            //     'pincode' => $address->pincode, 
            //     'city' => $address->city, 
            //     'state' => $address->state,  
            // ]);
            $orderSummaryHtml = view('front.common.cart.payment-success')->render();
            DB::commit(); 
            return redirect()->route('cart')->with('orderAddress', $orderAddress);
        } catch (\Exception $e) {
            DB::rollBack(); 
    
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ], 500);
        }
    }    
    
}    
