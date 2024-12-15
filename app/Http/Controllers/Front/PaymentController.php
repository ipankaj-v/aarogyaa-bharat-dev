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

    public function store(Request $request) {
        DB::beginTransaction();

        if (Auth::check() && Auth::user()->hasRole('Customer')) {
        try {
            $deliveryAddressExists = Adress::where('customer_id', Auth::id())
                                    ->where('is_delivery_address', true)
                                    ->exists();
    
            if (!$deliveryAddressExists) {
                return response()->json(['message' => 'Please add delivery address.'], 404);
            }

            $cart = Cart::with('cartProducts')->where('id', $request->cart_id)->first();
    
            if (!$cart) {
                return response()->json(['error' => 'Cart not found'], 404);
            }      
            $total = 0;
            $orderItemsData = []; // Array to hold order items data
            $cartProductsCount = 0;
            foreach ($cart->cartProducts as $product) {
                if ($product->is_visible) {
                    $cartProductsCount++;
                    $total += $product->price * $product->quantity;    
                    $orderItemsData[] = [
                        'product_id' => $product->product_id,
                        'quantity' => $product->quantity,
                        'price' => $product->price,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            if ($cartProductsCount == 0) {
                return response()->json(['error' => 'At least one item should be in cart.'], 404);
            }      
        
            if (!empty($cart->discount_offer_amount)) {
                $total -= $cart->discount_offer_amount;
            }
            $total = max($total, 0);
    
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
    
            // Create order items
            foreach ($orderItemsData as $item) {
                $item['order_id'] = $order->id; 
                OrderItem::create($item);
            }
    
            // Initialize Razorpay API
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $res = $api->order->create([
                'receipt' => (string)$order->id,
                'amount' => intval($total * 100),
                'currency' => 'INR'
            ]);
            
            \Log::info(['payment response' => $res['id']]);
            
            // Check if the order was created successfully
            if (isset($res)) {
                \Log::info(['payment response ------------------------' => $res]);
                $order->update([
                    'payment_response' => json_encode($res),
                    'razorpay_order_id' => $res['id'],
                ]);
            } else {
                throw new \Exception('Failed to create order in Razorpay.');
            }
    
            $cart->cartProducts()->delete();
            $cart->delete(); 
    
            DB::commit(); 
    
            return response()->json([
                'success' => true,
                'amount' => $total,
                'order_id' => $order->razorpay_order_id,
                'customer' => Auth::user()
            ]);
        } catch (\Exception $e) {
            DB::rollBack(); 
    
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ], 500);
        }
           
        } else {
            return response()->json([
                'message' => 'Please login to proceed with payment.'
            ], 401);      
        }
    }    
    
}    
