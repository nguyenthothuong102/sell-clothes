<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
        	RolesTableSeeder::class,
            CategoriesTableSeeder::class,
            //CitiesTableSeeder::class,
            //DistrictsTableSeeder::class,
            UsersTableSeeder::class,
            //OrderInfoTableSeeder::class,
            ProductsTableSeeder::class,
            CommentsTableSeeder::class,
            // OrdersTableSeeder::class,
        ]);

    }
}
