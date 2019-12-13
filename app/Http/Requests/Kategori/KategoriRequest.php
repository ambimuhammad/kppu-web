<?php

namespace App\Http\Requests\Kategori;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
        $validate = [
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategoris,nama_kategori,' . $this->get('id')]
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Nama Kategori Harus Diisi',
            'nama_kategori.string' => 'Nama Kategori Harus Berupa String, Tidak Boleh Angka',
            'nama_kategori.unique' => 'Nama Kategori Sudah Ada, Gunakan Nama Lain',
            'nama_kategori.max' => 'Nama Kategori Maksimal 255',
        ];
    }
}
