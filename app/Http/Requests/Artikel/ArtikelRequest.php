<?php

namespace App\Http\Requests\Artikel;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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
            'judul' => ['required', 'string'],
            'status' => ['required'],
            'published_at' => ['required', 'date_format:Y-m-d H:i:s']
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul Harus Diisi',
            'judul.string' => 'Judul Harus Berupa String, Tidak Boleh Angka',
            'status.required' => 'Status Harus Diisi',
            'published_at.required' => 'Tanggal dan Waktu Harus Diisi',
            'published_at.date_format' => 'Format Tanggal Harus Date Time',
        ];
    }
}
