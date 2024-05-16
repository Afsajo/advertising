<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_telp',
        'bank_id',
        'bank_bank',
        'bank_rekening',
        'bank_pemilik',
        'bukti',
    ];

    public function pemesanandetails(): HasMany
    {
        return $this->hasMany(Pemesanandetail::class);
    }

    public function getGrandTotalAttribute()
    {
        $grandTotal = $this->pemesanandetails->sum(function($detail) {
            return $detail->harga * $detail->jumlah;
        });
        return 'Rp ' . number_format($grandTotal, 0, ",", ".");
    }
    public function getProductCountAttribute()
    {
        return $this->pemesanandetails->count();
    }

    public function getSumJumlahAttribute()
    {
        return $this->pemesanandetails->sum('jumlah');
    }

    protected function bukti(): Attribute
    {
        return Attribute::make(
            // get: fn (string $value) => url(asset('storage/bukti/'.$value)),
             get: fn (?string $value) => $value ? url(asset('storage/bukti/'.$value)) : null,
        );
    }
}
