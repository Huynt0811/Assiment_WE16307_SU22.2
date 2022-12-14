<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|min:6|max:32|email',
            'password' => 'required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Bắt buộc nhập Email !',
            'email.min' => 'Email tối thiểu 6 ký tự!',
            'email.max' => 'Email tối đa 32 ký tự!',
            'email.email' => 'Email phải đúng định dạng có @',
            'password.required' => 'Bắt buộc nhập Password!',
            'password.min' => 'Password tối thiểu 8 ký tự!'
        ];
    }
}