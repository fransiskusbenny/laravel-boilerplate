<?php

use App\Models\Setting\Menu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        foreach ($this->getMenus() as $m) {
            $menu = Menu::create([
                'name' => $m['name'],
                'order' => $m['order'] ?? null,
                'parent_id' => $m['parent_id'] ?? null,
                'icon' => $m['icon'] ?? null,
                'url' => $m['url'] ?? null,
            ]);

            if (isset($m['permission_name'])) {
                $permission = Permission::findOrCreate($m['permission_name']);
                $menu->permission()->associate($permission)->save();
            }
        }
    }

    protected function getMenus ()
    {
        return [
            [
                'id' => 1,
                'name' => 'Settings',
                'order' => 99,
                'icon' => 'pg-settings',
            ],
            [
                'parent_id' => 1,
                'id' => 2,
                'name' => 'Security',
                'order' => 99,
            ],
            [
                'parent_id' => 2,
                'name' => 'Manage User',
                'order' => 1,
                'url' => 'settings/users',
                'permission_name' => 'manage-user',
            ],
            [
                'parent_id' => 2,
                'name' => 'Roles',
                'order' => 2,
                'url' => 'settings/roles',
                'permission_name' => 'manage-role',
            ],
            [
                'parent_id' => 2,
                'name' => 'Permissions',
                'order' => 3,
                'url' => 'settings/permissions',
                'permission_name' => 'manage-permission',
            ],
            [
                'parent_id' => 1,
                'name' => 'Manage Menu',
                'order' => 99,
                'url' => 'settings/menus',
                'permission_name' => 'manage-menu'
            ]
        ];
    }
}
