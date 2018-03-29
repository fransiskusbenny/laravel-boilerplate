<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserPasswordController extends Controller
{
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'required|min:5|max:255|confirmed',
        ]);

        $user->update([
            'password' => $request->input('password'),
        ]);

        return response(['message' => 'User password successfuly updated.']);
    }
}
