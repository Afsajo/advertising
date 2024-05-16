<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanandetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id',
        'product_id',
        'nama',
        'harga',
        'jumlah',
    ];

    protected function hargaRp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'Rp '.number_format($this->harga,0,",","."),
        );
    }

     protected function subTotal(): Attribute
     {
        return Attribute::make(
            get: fn ($value) => 'Rp '.number_format($this->harga * $this->jumlah,0,",","."),
        );
     }

}
