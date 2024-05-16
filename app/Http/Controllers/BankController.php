<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankStoreRequest;
use App\Http\Requests\BankUpdateRequest;
use App\Models\Bank;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
     public function __construct()
     {
        $this->middleware(['auth', 'user-access:admin']);
     }

     public function index()
     {
        $banks = Bank::latest()->paginate(5);
        // return $banks;
        $title = 'Data Bank';
        return view('admin.bank.index',compact('title','banks'))->with('i', (request()->input('page', 1) - 1) * 5);
     }

     /**
     * Show the form for creating a new resource.
     */
     public function create()
     {
        $title = 'Tambah Data Bank Baru';
        return view('admin.bank.create',compact('title'));
     }

     /**
     * Store a newly created resource in storage.
     */
     public function store(BankStoreRequest $request)
     {
        Bank::create($request->validated());
        return redirect()->route('bank.create')
            ->with('success', 'Tambah Bank Baru Berhasil.');
     }

     /**
     * Display the specified resource.
     */
     public function show(Bank $bank)
     {
     //
     }

     /**
     * Show the form for editing the specified resource.
     */
     public function edit(Bank $bank)
     {
        $title = 'Ubah Data Bank';
        return view('admin.bank.edit',compact('title','bank'));
     }

     /**
     * Update the specified resource in storage.
     */
     public function update(BankUpdateRequest $request, Bank $bank)
     {

        $bank->update($request->validated());
        return redirect()->route('bank.index')
             ->with('success', 'Perubahan Data Bank Berhasil Disimpan.');
     }

     /**
     * Remove the specified resource from storage.
     */
     public function destroy(Bank $bank)
     {
        $bank->delete();
        return redirect()->route('bank.index')
             ->with('success', 'Hapus Data Bank Berhasil.');
     }
}
