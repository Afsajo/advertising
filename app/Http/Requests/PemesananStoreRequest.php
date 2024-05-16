<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemesananStoreRequest extends FormRequest
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
             'bank_id' => 'required|numeric',
             'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

     public function messages(): array
     {
        return [
            'bank_id.numeric' => 'Data Bank Tidak Terdaftar.',
        ];
     }
}
