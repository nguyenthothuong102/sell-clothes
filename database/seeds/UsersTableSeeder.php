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
        User::create([
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('admin'),
            'first_name' => 'Admin',
            'tel'   => '0964991298',
            'address'   => 'Nam Thành, Yên Thành, Nghệ An',
            'role_id'    => 1,
        ]);

        factory(User::class, 9)->create();
    }
}
