<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAccountStoreRequest;
use App\Http\Requests\UserAccountUpdateRequest;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $accountViewPrefix = 'users.accounts';

    public function createAccount()
    {
        return view("{$this->accountViewPrefix}.create");
    }

    public function storeAccount(UserAccountStoreRequest $request)
    {
        $userAccount = new UserAccount(['user_id' => Auth::user()->id]);
        $userAccount->fill($request->all())->save();

        return redirect()->route('show.account');
    }

    public function showAccount()
    {
        $user = User::with('userAccount')->findOrFail(Auth::user()->id);
        
        return view("{$this->accountViewPrefix}.show", compact('user'));
    }

    public function editAccount()
    {
        $user = User::with('userAccount')->findOrFail(Auth::user()->id);
        
        return view("{$this->accountViewPrefix}.edit", compact('user'));
    }

    public function updateAccount(UserAccountUpdateRequest $request)
    {
        $user = User::with('userAccount')->findOrFail(Auth::user()->id);

        if ($user->userAccount) {
            $user->email = $request->email;
            $user->userAccount->first_name = $request->first_name;
            $user->userAccount->first_name_kana = $request->first_name_kana;
            $user->userAccount->last_name = $request->last_name;
            $user->userAccount->last_name_kana = $request->last_name_kana;
            $user->userAccount->birth_date = $request->birth_date;

        } else {
            $user->email = $request->email;
        }

        $user->push();

        return redirect()->route('show.account');
    }
}
