<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'mrp',
        'featured_image',
        'status',
        'slug',
        'tag',
        'rating',
        'discount',
        'price',
        'is_popular',

        'publication',
        'author',
        'released_date',
        'easy_return',

        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema'
    ];

    public const tags = [
        '' => 'None',
        'New' => 'New',
        'Sale' => 'Sale',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
