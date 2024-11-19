<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviev extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'product_id',
        'user_id',
        'review',
    ];

    protected $table = 'reviews';
}
