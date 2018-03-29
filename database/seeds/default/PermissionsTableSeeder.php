<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage-menu', 'manage-roles', 'manage-permission'
        ];

        foreach ($permissions as $permission) {
            Permission::forceCreate([
                'name' => $permission,
            ]);
        }
    }
}
