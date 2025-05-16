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

    public function products()
    {
        // return $this->belongsToMany(Product::class);
            return $this->belongsToMany(Product::class, 'product_locations', 'location_id', 'product_id');

    }


}


