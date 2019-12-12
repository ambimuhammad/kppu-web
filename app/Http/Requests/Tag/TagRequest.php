<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'nama_tag' => ['required', 'string', 'max:255', 'unique:tags,nama_tag,' . $this->get('id')]
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'nama_tag.required' => 'Nama Tag Harus Diisi',
            'nama_tag.string' => 'Nama Tag Harus Berupa String, Tidak Boleh Angka',
            'nama_tag.unique' => 'Nama Tag Sudah Ada, Gunakan Nama Lain',
            'nama_tag.max' => 'Nama Tag Maksimal 255',
        ];
    }
}
