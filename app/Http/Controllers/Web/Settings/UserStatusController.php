<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Controller;
use App\User;

class UserStatusController extends Controller
{
    public function activate(User $user)
    {
        $user->active = true;
        $user->save();

        flash()->success('User was successfuly acticated');

        return response(['path' => route('users.index')]);
    }

    public function deactivate(User $user)
    {
        $user->active = false;
        $user->save();

        flash()->success('User was successfuly deactivate');

        return response(['path' => route('users.index')]);
    }
}
