<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserAccountUpdateRequest extends FormRequest
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
        if (User::with('userAccount')->findOrFail(Auth::user()->id)->userAccount) {
            return [
                'email' => ['required', 'email:filter,dns', Rule::unique('users')->ignore(Auth::user()->id)],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'first_name_kana' => ['required', 'string', 'max:255'],
                'last_name_kana' => ['required', 'string', 'max:255'],
                'birth_date' => ['required', 'date'],
            ];
        }

        return [
            'email' => ['required', 'email:filter,dns', Rule::unique('users')->ignore(Auth::user()->id)],
        ];
    }
}