<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'email' => 'dev@madmediagroup.com.au',
            'name' => 'Mad Dev',
            'password' => bcrypt('asdfgh')
        ]);
        $user->save();
        $user->assignRole('Dev');
    }
}
