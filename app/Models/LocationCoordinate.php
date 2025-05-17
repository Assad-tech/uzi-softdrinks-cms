<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCoordinate extends Model
{
    use HasFactory;
    protected $fillable = [
        'coordinate_id',
        'place',
        'latitude',
        'longitude',
    ];

    // Define the relationship with ProductLocation
    public function productLocation()
    {
        return $this->belongsTo(Product_location::class, 'coordinate_id');
    }
}
