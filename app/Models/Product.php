<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'stock',
        'discount_percentage',
        'image',
        'status',
        'packing_image',
        'fruit_image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    // Define the relationship with ProductLocation
    public function productLocations()
    {
        return $this->hasMany(Product_location::class, 'product_id');
    }

    // Get all locations for the product
    public function locations()
    {
        return $this->hasManyThrough(
            Location::class,
            Product_location::class,
            'product_id', // Foreign key on ProductLocation table
            'id', // Foreign key on Location table
            'id', // Local key on Products table
            'location_id' // Local key on ProductLocation table
        );
    }

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
