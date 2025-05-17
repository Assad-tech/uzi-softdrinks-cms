<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_location extends Model
{
    use HasFactory;
    protected $table = 'product_locations';
    protected $fillable = [
        'product_id',
        'location_id',
    ];

    // Define the relationship with LocationCoordinate
    public function locationCoordinates()
    {
        return $this->hasMany(LocationCoordinate::class, 'coordinate_id');
    }
    // Define the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Define the relationship with Location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

}
