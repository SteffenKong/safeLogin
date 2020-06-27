<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'account' => 'required',
            'password' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'account.required' => '请填写账户',
            'password.required' => '请填写密码'
        ];
    }


    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        exit(
            json_encode([
                'msg' => '004',
                'message' => $validator->getMessageBag()->toArray(),
                'errors' => $validator->getMessageBag()->toArray()
            ])
        );
    }
}
