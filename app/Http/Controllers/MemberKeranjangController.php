<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeranjangAddRequest;
use App\Http\Requests\KeranjangPemesananRequest;
use App\Models\Product;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\Pemesanandetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberKeranjangController extends Controller
{
     public function __construct()
     {
        $this->middleware(['auth', 'user-access:member']);
     }
    public function add(KeranjangAddRequest $request)
    {
        Keranjang::firstOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => Auth::User()->id
            ]
        );
        return redirect()->back()
            ->with('success', 'Masukkan Keranjang Produk Telah Berhasil.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show()
    {

        $keranjang = Keranjang::whereUserId(Auth::User()->id)
                        ->with('products')
                        ->latest()
                        ->get();
        // return $keranjang;
        $title = 'Keranjang Member';
         return view('member.keranjang.show',compact('title','keranjang'));
    }

    public function destroy(Keranjang $keranjang)
    {
        $keranjang = Keranjang::where('id', $keranjang->id)
                    ->where('product_id',$keranjang->product_id)
                    ->where('user_id',Auth::User()->id)
                    ->first();
        if ($keranjang){
            $keranjang->delete();
        }
        return redirect()->back();
    }

    public function pemesanan(KeranjangPemesananRequest $request)
    {
         DB::beginTransaction();
         try {
            $user = Auth::user();
            $pemesanan = new Pemesanan();
            $pemesanan->user_id = $user->id;
            $pemesanan->user_nama = $user->name;
            $pemesanan->user_alamat = $user->alamat;
            $pemesanan->user_telp = $user->telp;
            // Jika diperlukan, tambahkan field bank di sini
            // $pemesanan->bank_id = null;
            // $pemesanan->bank_bank = null;
            // $pemesanan->bank_rekening = null;
            // $pemesanan->bank_pemilik = null;
            // $pemesanan->bukti = null;
            $pemesanan->save();

            foreach ($request->product_id as $index => $product_id) {
                $product = Product::find($product_id);
                if ($product) {
                    $detail = new Pemesanandetail();
                    $detail->pemesanan_id = $pemesanan->id;
                    $detail->product_id = $product->id;
                    $detail->nama = $product->nama;
                    $detail->harga = $product->harga;
                    $detail->jumlah = $request->jumlah[$index];
                    $detail->save();

                    // Kurangi stok produk
                    $product->stok -= $request->jumlah[$index];
                    $product->save();
                } else {
                    // Rollback dan kembalikan response jika produk tidak ditemukan
                    DB::rollBack();
                    return redirect()->back()
                        ->with('error', 'Produk Tidak Ditemukan.');
                    // return response()->json(['error' => 'Product not found.'], 404);
                }
            }
            DB::commit();
            return redirect()->route('member.pemesanan.bayar', $pemesanan->id )
                ->with('success', 'Pemesanan berhasil dibuat.');
            // return response()->json(['success' => 'Pemesanan berhasil dibuat.']);

         } catch (\Exception $e) {
            DB::rollBack();
              return redirect()->back()
                    ->with('error', 'Terjadi kesalahan saat membuat pemesanan.');
            // return response()->json(['error' => $e.'Terjadi kesalahan saat membuat pemesanan.'], 500);
         }
        // // return $request->all();
        // $pemesanan = new Pemesanan();
        // $pemesanan->user_id = Auth::User()->id;
        // $pemesanan->user_nama = Auth::User()->name;
        // $pemesanan->user_alamat = Auth::User()->alamat;
        // $pemesanan->user_telp = Auth::User()->telp;
        // // $pemesanan->bank_id = null;
        // // $pemesanan->bank_bank = null;
        // // $pemesanan->bank_rekening = null;
        // // $pemesanan->bank_pemilik = null;
        // // $pemesanan->bukti = null;
        // $pemesanan->save();
        //  foreach ($request->product_id as $index => $product) {
        //     $product = Product::find($request->product_id[$index]);
        //     $detail = new Pemesanandetail();
        //     $detail->pemesanan_id = $pemesanan->id;
        //     $detail->product_id = $product->id;
        //     $detail->nama = $product->nama;
        //     $detail->harga = $product->harga;
        //     $detail->jumlah = $request->jumlah[$index];
        //     $detail->save();
        //  }

    }
}
