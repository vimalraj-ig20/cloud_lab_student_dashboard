<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Vimal',
            'email' => 'vimal@gmail.com',
            'password' => bcrypt('vimal@gmail.com')
        ]);
        $user->assignRole('administrator');

    }
}
