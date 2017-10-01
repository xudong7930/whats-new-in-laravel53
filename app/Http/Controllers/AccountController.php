<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('account.edit', [
            'user' => auth()->user()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,'.auth()->id().',NULL,active,1',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            // 'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id(),'id')->where('active', 1)]
            ]);
        auth()->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            ]);
        return back();
    }
}
