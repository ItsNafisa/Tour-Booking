<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'name'=>'required|unique:users',
           'email'=>'required|email|unique:users',
           'password'=>'required|min:6',
           'image'=>'file',
           'city'=>'required',
           'country'=>'required',
           'phone'=>'required|min:9|numeric',
        ];
    }
}
