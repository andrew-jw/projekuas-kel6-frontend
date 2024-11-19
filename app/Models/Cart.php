<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'product_id',
        'quantity',
    ];

    protected $table = 'carts';
}
