<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

        if(($this->get('id') == ''))
        {
            $validate['alamat'] = ['required'];
            $validate['email'] = ['required'];
            $validate['telepon'] = ['required'];
            $validate['fax'] = ['required'];
        } else {
            $validate['alamat'] = ['required'];
            $validate['email'] = ['required'];
            $validate['telepon'] = ['required'];
            $validate['fax'] = ['required'];
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'alamat.required' => 'Alamat Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'telepon.required' => 'Telepon Harus Diisi',
            'fax.required' => 'Fax Harus Diisi',
        ];
    }
}
