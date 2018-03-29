<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id' => 1,
            'name' => 'Root',
            'username' => 'root',
            'password' => 'root',
            'email' => 'root@email.com',
            'active' => true
        ]);

        $user->assignRole('root');
    }
}
