<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'latitude',
        'longitude',
    ];

    // public function products()
    // {
    //     // return $this->belongsToMany(Product::class);
    //     return $this->belongsToMany(Product::class, 'product_locations', 'location_id', 'product_id');
    // }

    // Define the relationship with ProductLocation
    public function productLocations()
    {
        return $this->hasMany(Product_location::class, 'location_id');
    }
    // Define the relationship with Products through ProductLocation
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            Product_location::class,
            'location_id', // Foreign key on ProductLocation table
            'id', // Foreign key on Product table
            'id', // Local key on Locations table
            'product_id' // Local key on ProductLocation table
        );
    }
}
