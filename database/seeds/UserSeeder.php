<?php

use App\Http\Controllers\SessionController;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
                                    [
                                        'name' => 'admin',
                                        'email' => 'admin@gmail.com',
                                        'password' => Hash::make(123456),
                                        'role' => \App\User::USER_ROLE_ADMIN,
                                    ],
                    ]);
    }
}
