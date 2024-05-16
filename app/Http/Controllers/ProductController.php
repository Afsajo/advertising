<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user-access:admin']);
    }

    public function index()
    {
        $products = Product::latest()->paginate(5);
        // return $products;
        $title = 'Data Produk';
        return view('admin.product.index',compact('title','products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           $title = 'Tambah Data Produk Baru';
           return view('admin.product.create',compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $validatedData = $request->validated();
        $image = $request->file('gambar');
        $image->storeAs('public/product', $image->hashName());
        $validatedData['gambar'] = $image->hashName();
        Product::create($validatedData);
        return redirect()->route('product.create')
              ->with('success', 'Tambah Produk Baru Berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
          $title = 'Ubah Data Produk';
          return view('admin.product.edit',compact('title','product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
         $validatedData = $request->validated();

         if ($request->hasFile('gambar')) {
            // Jika ada file gambar baru, simpan gambar baru dan update field gambar
            $image = $request->file('gambar');
            $imageName = $image->hashName();
            $image->storeAs('public/product', $imageName);

            // Hapus gambar lama jika sudah ada
            Storage::delete('public/product/' .basename($product->gambar));

            // Update field gambar dengan nama gambar baru
            $validatedData['gambar'] = $imageName;
         }else{
            // Hapus field gambar dari data yang akan di-update
            $validatedData = Arr::except($validatedData, ['gambar']);
         }
         // Lakukan update kecuali field gambar
         $product->update($validatedData);

        return redirect()->route('product.index')
                ->with('success', 'Perubahan Data Produk Berhasil Disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         $product->delete();
         Storage::delete('public/product/' .basename($product->gambar));
         return redirect()->route('product.index')
         ->with('success', 'Hapus Data Produk Berhasil.');
    }
}
