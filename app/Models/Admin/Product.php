<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'title',
        'image',
        'slug',
        'description',
        'features_specification',
        'price',
        'gst',
        'about_item',
        'weekly_price',      
        'monthly_price',      
        'is_rentable',     
        'is_popular',      
        'is_new',          
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
