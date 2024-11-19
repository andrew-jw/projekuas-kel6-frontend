<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Products extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'size',
        'color',
        'weight',
        'type',
        'stock',
    ];

    protected $table = 'products';

}
