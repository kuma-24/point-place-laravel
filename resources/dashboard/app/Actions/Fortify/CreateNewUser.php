<?php

namespace App\Actions\Fortify;

use App\Models\Administrator;
use App\Models\AdministratorAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): Administrator
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'first_name_kana' => ['required', 'string', 'max:50'],
            'last_name_kana' => ['required', 'string', 'max:50'],
            'birth_date' => ['date'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(Administrator::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        $administrator = Administrator::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        
        AdministratorAccount::create([
            'administrator_id' => $administrator['id'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'first_name_kana' => $input['first_name_kana'],
            'last_name_kana' => $input['last_name_kana'],
            'birth_date' => $input['birth_date'],
        ]);

        return $administrator;
    }
}
