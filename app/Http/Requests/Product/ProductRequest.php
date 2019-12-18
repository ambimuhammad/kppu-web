<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if(($this->get('id') != ''))
        {
            $validate['kategori_id'] = ['required'];
            $validate['deskripsi_produk'] = ['required'];
        } else {
            $validate['kategori_id'] = ['required'];
            $validate['deskripsi_produk'] = ['required'];
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kategori Harus Dipilih',
            'deskripsi_produk.required' => 'Deskripsi Harus Diisi',
        ];
    }
}
