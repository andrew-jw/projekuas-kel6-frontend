<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TransactionHistory extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'product_id',
        'size',
        'weight',
        'price',
        'quantity',
        'total_price',
        'status',
    ];

    protected $table = 'transactions';
}
