<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name_slider' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            'deskripsi' => ['required'],
            'periode' => ['required']
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'name_slider.required' => 'Judul Harus Diisi',
            'name_slider.mimes.*' => 'Harus Berupa File JPG, JPEG dan PNG',
            'name_slider.max' => 'Tidak boleh lebih dari 2 MB',
            'deskripsi.required' => 'Status Harus Diisi',
            'periode.required' => 'Tanggal dan Waktu Harus Diisi',
        ];
    }
}
