<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'merk',
        'bahan',
        'ukuran',
        'stok',
        'harga',
        'satuan',
        'keterangan',
        'gambar',
    ];

    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url(asset('storage/product/'.$value)),
        );
    }

    protected function hargaRp(): Attribute
    {
    return Attribute::make(
        get: fn ($value) => number_format($this->harga,0,",","."),
    );
    }

}
