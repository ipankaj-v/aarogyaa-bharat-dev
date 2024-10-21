<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'title',
        'description',
        'content_html',
    ];


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
