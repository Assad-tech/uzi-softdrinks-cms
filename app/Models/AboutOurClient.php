<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutOurClient extends Model
{
    use HasFactory;

    protected $table = 'our_clients';

    protected $fillable = [
        'company_logo',
        'company_link',
    ];
}
