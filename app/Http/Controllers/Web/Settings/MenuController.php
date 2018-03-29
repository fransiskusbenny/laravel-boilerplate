<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\MenuRequest;
use App\Models\Setting\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index ()
    {
        return view('settings.menus.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return Menu
     */
    public function store (MenuRequest $request)
    {
        $menu = Menu::create($request->all());

        $menu->setParent($request->input('parent'));

        $menu->permission()->associate($request->input('permissions'))->save();

        flash()->success('Menu successfuly added');

        return response([
            'path' => route('menus.index')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Menu
     */
    public function update (MenuRequest $request, Menu $menu)
    {
        tap($menu)->update($request->all())->setParent($request->input('parent'));

        $menu->permission()->associate($request->input('permission'))->save();

        flash()->success('Menu successfuly updated');

        return response([
            'path' => route('menus.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy (Menu $menu)
    {
        $menu->permissions->each->delete();

        $menu->delete();

        flash()->success('Menu successfuly deleted');

        return response([
            'path' => route('menus.index')
        ]);
    }
}
