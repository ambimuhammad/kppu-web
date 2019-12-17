<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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

        if(($this->get('nama_client') == '') && ($this->get('id') != ''))
        {
            $validate['nama_client'] = ['required'];
        } else {
            $validate['nama_client'] = ['required'];
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'nama_client.required' => 'Nama Klien Harus Diisi',
        ];
    }
}
