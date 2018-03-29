<?php

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function update(Request $request)
    {
        $data = $this->validateInput($request);

        auth()->user()->update($data);

        flash()->success('Your account successfuly updated.');

        return response(['path' => route('account')]);
    }

    private function validateInput(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'username' => [
                'required',
                'min:4',
                'max:20',
                'alpha_dash',
                Rule::unique('users', 'username')->ignore(auth()->id())
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id())
            ]
        ];

        if ($request->filled('password')) {
            $rules = array_merge($rules, [
                'password' => 'required|min:6|confirmed'
            ]);
        }

        return $request->validate($rules);
    }
}
