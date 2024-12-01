<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'seo_meta_tag_title', 
        'seo_meta_tag', 
        'status'
    ];

    public function cms()
    {
        return $this->hasOne(Cms::class, 'page_id');
    }
}
