<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdministratorProfileUpdateRequest extends FormRequest
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
            'email' => ['required', 'email:filter,dns', Rule::unique('administrators')->ignore(Auth::user()->id)],
            'first_name' => ['required',],
            'first_name_kana' => ['required',],
            'last_name' => ['required',],
            'last_name_kana' => ['required',],
            'birth_date' => ['required',],
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'first_name' => '名前（姓）',
            'first_name_kana' => '名前（姓）カナ',
            'last_name' => '名前（名）',
            'last_name_kana' => '名前（名）カナ',
            'birth_date' => '生年月日',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '「:Attribute」は必須項目です。',
            'email.unique' => '「:Attribute」は無効なアドレスです。',
            'email.email' => '「:Attribute」には有効なアドレスを入力してください。',
            'first_name.required' => '「:Attribute」は必須項目です。',
            'first_name_kana.required' => '「:Attribute」は必須項目です。',
            'last_name.required' => '「:Attribute」は必須項目です。',
            'last_name_kana.required' => '「:Attribute」は必須項目です。',
            'birth_date.required' => '「:Attribute」は必須項目です。',
        ];
    }
}
