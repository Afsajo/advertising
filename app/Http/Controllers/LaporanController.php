<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user-access:admin|member'])->only('invoice');
        $this->middleware(['auth', 'user-access:admin'])->only(['member','pembelian']);
    }

    public function invoice($id)
    {
        $user = Auth()->user();

        if ($user->level == "member"){
                 $pemesanan = Pemesanan::where('user_id',Auth()->user()->id)
                 ->where('id',$id)
                 ->with('pemesanandetails')
                 ->first();
        }else{
                $pemesanan = Pemesanan::where('id',$id)
                    ->with('pemesanandetails')
                    ->first();
        }
        $title = 'Invoice Pesanan #'.$id;
        //  return view('laporan.invoice',compact('title','pemesanan'));
        $pdf = PDF::loadView('laporan.invoice', compact('title','pemesanan'));
        return $pdf->download($title.'.pdf');

    }
    public function member()
    {
        $user = User::where('level', '!=', 'admin')->get();
        $title = "Laporan Member";
        //  return view('laporan.member',compact('title','user'));
        $pdf = PDF::loadView('laporan.member', compact('title','user'));
        return $pdf->download($title.'.pdf');
    }
    public function pembelian()
    {
        $pembelian = Pemesanan::where('bukti', '!=', NULL)
                        ->with('pemesanandetails')
                        ->get();
        $title = "Laporan Pembelian";
        // return $pembelian;
        // return view('laporan.pembelian',compact('title','pembelian'));
        $pdf = PDF::loadView('laporan.pembelian', compact('title','pembelian'));
        return $pdf->download($title.'.pdf');
    }

}
