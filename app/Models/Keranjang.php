<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function users(): HasOne
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
    public function products(): HasOne
    {
        return $this->hasOne(Product::class,'id', 'product_id');
    }
}
