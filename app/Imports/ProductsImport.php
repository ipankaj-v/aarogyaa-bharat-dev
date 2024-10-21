<?php

namespace App\Imports;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Handle category image upload
        $categoryImagePath = null;
        if (isset($row['c_image']) && file_exists($row['c_image'])) {
            // Store the category image and get the path
            $categoryImagePath = Storage::disk('public')->putFile('categories', new \Illuminate\Http\File($row['c_image']));
        }

        // Create the category
        $category = Category::create([
            'name' => $row['category_name'],
            'image' => $categoryImagePath,
            'slug' => \Str::slug($row['category_name']),
        ]);

        // Handle product image upload
        $productImagePath = null;
        if (isset($row['image']) && file_exists($row['image'])) {
            // Store the product image and get the path
            $productImagePath = Storage::disk('public')->putFile('products', new \Illuminate\Http\File($row['image']));
        }

        // Create the product
        return new Product([
            'category_id' => $category->id,
            'name' => $row['product_name'],
            'title' => $row['title'],
            'image' => $productImagePath,
            'slug' => \Str::slug($row['product_name']),
            'description' => $row['description'],
            'features_specification' => $row['features_specification'],
            'price' => $row['price'],
            'weekly_price' => $row['weekly_price'],
            'monthly_price' => $row['monthly_price'],
            'gst' => $row['gst'],
            'is_popular' => $row['is_popular'],
            'about_item' => $row['about_item'],
            'is_rentable' => $row['is_rentable'],
            'is_new' => $row['is_new'],
        ]);
    }
}
