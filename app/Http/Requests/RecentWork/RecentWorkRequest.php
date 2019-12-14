<?php

namespace App\Http\Requests\RecentWork;

use Illuminate\Foundation\Http\FormRequest;

class RecentWorkRequest extends FormRequest
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
            'name_recent_work' => ['required']
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'name_recent_work.required' => 'Nama Recent Work Harus Diisi',
        ];
    }
}
