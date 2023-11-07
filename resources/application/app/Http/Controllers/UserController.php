<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserAccountCreateRequest;
use App\Http\Requests\UserAccountEditRequest;
use App\Http\Requests\UserAccountEmailEditRequest;
use App\Models\User;
use App\Models\UserAccount;

class UserController extends Controller
{
    public function createUserAccount()
    {
        return view('users.accounts.create');
    }

    public function storeUserAccount(UserAccountCreateRequest $request)
    {
        $request = $request->all();
        $request['user_id'] = Auth::user()->id;

        $userAccount = new UserAccount;
        $userAccount->fill($request)->save();

        return redirect()->route('account.show');
    }

    public function showUserAccount()
    {
        $userId = Auth::user()->id;
        $accounts = User::with('userAccount')->find($userId)->toArray();

        return view('users.accounts.show', compact('accounts'));
    }

    public function editUserAccountEmail()
    {
        $userId = Auth::user()->id;
        $accounts = User::find($userId)->toArray();

        return view('users.accounts.editEmail', compact('accounts'));
    }

    public function updateUserAccountEmail(UserAccountEmailEditRequest $request)
    {
        $userId = Auth::user()->id;

        $request = $request->all();
        $request['user_id'] = $userId;

        $accounts = User::find($userId);
        $accounts->fill($request)->save();

        return redirect()->route('account.show');
    }

    public function editUserAccount()
    {
        $userId = Auth::user()->id;
        $accounts = User::with('userAccount')->find($userId)->toArray();

        return view('users.accounts.editAccount', compact('accounts'));
    }

    public function updateUserAccount(UserAccountEditRequest $request)
    {
        $userId = Auth::user()->id;

        $request = $request->all();
        $request['user_id'] = $userId;

        $accounts = User::with('userAccount')->find($userId);
        $accounts->userAccount->first_name = $request['first_name'];
        $accounts->userAccount->first_name_kana = $request['first_name_kana'];
        $accounts->userAccount->last_name = $request['last_name'];
        $accounts->userAccount->last_name_kana = $request['last_name_kana'];
        $accounts->userAccount->birth_date = $request['birth_date'];
        $accounts->push();

        return redirect()->route('account.show');
    }
}