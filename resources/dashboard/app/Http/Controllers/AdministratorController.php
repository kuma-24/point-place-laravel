<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdministratorProfileUpdateRequest;
use App\Models\Administrator;

class AdministratorController extends Controller
{
    private $accountViewPrefix = 'administrators.accounts';
    private $profileViewPrefix = 'administrators.accounts.profiles';

    public function indexAccount()
    {
        $administrators = Administrator::with('administratorAccount')->get();

        return view("{$this->accountViewPrefix}.index", compact('administrators'));
    }

    public function showAccount($id)
    {
        $administrator = Administrator::with('administratorAccount')->findOrFail($id);
        
        return view("{$this->accountViewPrefix}.show", compact('administrator'));
    }

    public function showProfile()
    {
        $administrator = Administrator::with('administratorAccount')->findOrFail(Auth::user()->id);

        return view("{$this->profileViewPrefix}.show", compact('administrator'));
    }

    public function editProfile()
    {
        $administrator = Administrator::with('administratorAccount')->findOrFail(Auth::user()->id);
        
        return view("{$this->profileViewPrefix}.edit", compact('administrator'));
    }

    public function updateProfile(AdministratorProfileUpdateRequest $request)
    {
        $administrator = Administrator::with('administratorAccount')->findOrFail(Auth::user()->id);
        
        $administrator->email = $request->email;
        $administrator->administratorAccount->first_name = $request->first_name;
        $administrator->administratorAccount->first_name_kana = $request->first_name_kana;
        $administrator->administratorAccount->last_name = $request->last_name;
        $administrator->administratorAccount->last_name_kana = $request->last_name_kana;
        $administrator->administratorAccount->birth_date = $request->birth_date;
        $administrator->push();

        return redirect()->route('show.profile');
    }
}