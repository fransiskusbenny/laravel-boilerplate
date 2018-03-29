<?php

try {
    Breadcrumbs::register('dashboard', function ($breadcrumbs) {
        $breadcrumbs->push('Dashboard', route('dashboard'));
    });

    //User
    Breadcrumbs::register('users.index', function ($breadcrumbs) {
        $breadcrumbs->parent('dashboard');
        $breadcrumbs->push('Manage User', route('users.index'));
    });

    Breadcrumbs::register('users.create', function ($breadcrumbs) {
        $breadcrumbs->parent('users.index');
        $breadcrumbs->push('Add New User', route('users.create'));
    });

    Breadcrumbs::register('users.edit', function ($breadcrumbs, $user) {
        $breadcrumbs->parent('users.index');
        $breadcrumbs->push("Edit {$user->name}", route('users.edit', $user->id));
    });

    //Account
    Breadcrumbs::register('account', function ($breadcrumbs) {
        $breadcrumbs->parent('dashboard');
        $breadcrumbs->push("Account Information", route('account'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {

}