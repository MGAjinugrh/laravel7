<?php

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
        App\User::create([
            'name' => 'M. Guruh A.',
            'username' => 'mguruha',
            'password' => bcrypt('password'),
            'email' => 'guruh@mail.com',
        ]);
    }
}
