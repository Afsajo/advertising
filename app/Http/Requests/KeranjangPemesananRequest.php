<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Product;

class KeranjangPemesananRequest extends FormRequest
{ 
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */



    public function rules(): array
    {
        return [
             'product_id.*' => 'required|numeric',
             'jumlah.*' => ['required','numeric','min:1',
                function ($attribute, $value, $fail) {
                    $index = str_replace('jumlah.', '', $attribute);
                    $productId = $this->input('product_id')[$index] ?? null;

                    if ($productId) {
                        $product = Product::find($productId);
                        if ($product && $value > $product->stok) {
                            $fail("Hanya ".$product->stok." Stok Tersedia.");
                        }
                    }
                },
            ],
        ];

    }


     public function messages(): array
     {
        return [
            'jumlah.*.required' => 'Jumlah harus diisi untuk setiap produk.',
            'jumlah.*.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.*.min' => 'Jumlah minimal 1 untuk setiap produk.',
        ];
     }
}
