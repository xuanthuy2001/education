<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formPostLogin extends FormRequest
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
            'username' => 'required|max:60',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập :attribute ',
            'username.max' => ':attribute không  vượt quá :max ký tự',
            'password.required' => 'Vui lòng nhập :attribute',
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'Tên',
            'password' => 'Mật khẩu',
        ];
    }
}
