<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Leandro Sierra',
            'username' => 'leandrosiegar',
            'email' => 'leandrosiegar@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        factory(User::class, 10)->create();
    }
}
