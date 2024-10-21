<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\ProductAttribute;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with('category');
    
            return DataTables::of($products)
                ->addColumn('image', function ($product) {
                    return $product->image
                        ? '<img src="' . asset('storage/' . $product->image) . '" width="50" height="50">'
                        : 'No image';
                })
                ->addColumn('category', function ($product) {
                    return $product->category ? $product->category->name : 'No category';
                })
                ->addColumn('action', function ($product) {
                    return '<a href="' . route('admin.products.edit', $product->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="' . route('admin.products.destroy', $product->id) . '" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    
        return view('admin.product.index');
    }
    
    public function create() {
        $categories = Category::all();
        $attributes = ProductAttribute::all();
        return view('admin.product.create', compact('categories', 'attributes'));
    }

    public function store(StoreProductRequest $request)
    {
    
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
        $validated['slug'] = \Str::slug($request->name);
        $validated['is_rentable'] = $request->has('is_rentable') ? true : false;
        $validated['is_popular'] = $request->has('is_popular') ? true : false;
        $validated['is_new'] = $request->has('is_new') ? true : false;
    
        Product::create($validated);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'features_specification' => 'nullable|string',
            'price' => 'required|numeric',
            'weekly_price' => 'nullable|numeric',
            // 'gst' => 'nullable|numeric',
            // 'is_rentable' => 'nullable|boolean',
            // 'is_popular' => 'nullable|boolean',
            // 'is_new' => 'nullable|boolean',
            // 'about_item' => 'nullable|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product = Product::where('id',$id)->first();
        // dd($product);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->features_specification = $request->features_specification;
        $product->price = $request->price;
        $product->weekly_price = $request->weekly_price;
        $product->gst = $request->gst;
        $product->is_rentable = $request->has('is_rentable');
        $product->is_popular = $request->has('is_popular');
        $product->is_new = $request->has('is_new');
        $product->about_item = $request->about_item;
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }
    
        $product->save();
    
        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $category = Product::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

    public function importProduct()
    {
        return view('admin.product.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Products imported successfully.');
    }

}
