<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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

        if(($this->get('deskripsi') == '') && ($this->get('id') != ''))
        {
            $validate['deskripsi'] = ['required'];
        } else {
            $validate['deskripsi'] = ['required'];
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'deskripsi.required' => 'Deskripsi Harus Diisi',
        ];
    }
}
