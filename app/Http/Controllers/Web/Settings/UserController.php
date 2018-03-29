<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\User\StoreUserRequest;
use App\Http\Requests\Settings\User\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        return view('settings.users.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('settings.users.create');
    }

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create(
            $request->only('name', 'username', 'email', 'password', 'active')
        );

        $this->setAbilities($request, $user);

        flash()->success('User was successfuly created.');

        return response(['path' => $user->path()], 201);
    }

    public function show(User $user)
    {
        return $user;
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user->load('permissions', 'roles');

        return view('settings.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(
            $request->only('name', 'username', 'email', 'active')
        );

        $this->setAbilities($request, $user);

        flash()->success('User was successfuly updated.');

        return response(['path' => $user->path()]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response(['message' => 'User was successfuly deleted.']);
    }

    /**
     * @param $request
     * @param User $user
     * @return User
     */
    private function setAbilities(Request $request, User $user)
    {
        $user->syncPermissions($request->input('permissions'));

        $user->syncRoles($request->input('roles'));

        return $user;
    }
}
