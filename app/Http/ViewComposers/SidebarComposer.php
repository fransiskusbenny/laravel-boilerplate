<?php

namespace App\Http\ViewComposers;

use App\Models\Setting\Menu;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = Menu::has('parent', 0)
            ->with(['childs' => function ($q) {
                $q->orderBy('order');
            }])->orderBy('order')->get();

        $view->with('menus', $menus);
    }
}