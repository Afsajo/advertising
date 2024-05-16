<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller
{
     public function __construct()
     {
     $this->middleware(['auth', 'user-access:admin']);
     }
    public function index()
    {
        $pemesanan = Pemesanan::where('bukti','!=',null)
                        ->with('pemesanandetails')
                        ->latest()
                        ->get();
        // return $pemesanan;
        $title = "Lihat Pemesanan Member";
        return view('admin.pemesanan.index',compact('title','pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $pemesanan = Pemesanan::where('bukti','!=',null)
            ->where('id',$id)
            ->with('pemesanandetails')
            ->first();
         // return $bank;
        $title = "Detail Pemesanan Member ".$pemesanan->user_nama;
        return view('admin.pemesanan.detail',compact('title','pemesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
