<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemesananStoreRequest;
use App\Models\Bank;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class MemberPemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user-access:member']);
    }
    public function index()
    {
        $pemesanan = Pemesanan::where('user_id',Auth()->user()->id)
                        ->with('pemesanandetails')
                        ->latest()
                        ->get();
        // return $pemesanan;
        $title = "Pemesanan";
        return view('member.pemesanan.index',compact('title','pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bayar($id)
    {
        $pemesanan = Pemesanan::where('user_id',Auth()->user()->id)
                        ->where('id',$id)
                        ->with('pemesanandetails')
                        ->first();
        $bank = Bank::all();
        // return $bank;
        if ($pemesanan->bukti == null){
            $title = "Bayar Pesanan";
        }else{
             $title = "Lihat Pesanan";
        }
        return view('member.pemesanan.bayar',compact('title','pemesanan','bank'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemesananStoreRequest $request, Pemesanan $pemesanan)
    {
        // return [$request->all(), $pemesanan];
        if ($pemesanan->bukti == null){
            $bank = Bank::find($request->bank_id);
            if ($bank){
                $validatedData = $request->validated();
                $image = $request->file('bukti');
                $image->storeAs('public/bukti', $image->hashName());
                $validatedData['bukti'] = $image->hashName();
                $validatedData['bank_bank'] = $bank->bank;
                $validatedData['bank_rekening'] = $bank->rekening;
                $validatedData['bank_pemilik'] = $bank->pemilik;

                // Product::create($validatedData);
                $pemesanan->update($validatedData);
                return redirect()->back()
                    ->with('success', 'Bukti Transfer Sudah Kami Terima.');
            }else{
                return redirect()->back()
                    ->with('error', 'Bank Tidak Terdaftar.');
            }


        }else{
             return redirect()->back()
                ->with('error', 'Tidak Bisa Kirim Bukti Kedua Kalinya.');
        }

    }


}
