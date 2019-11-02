<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Mẹ & Bé']);
        Category::create(['name' => 'Kiểu hàn quốc']);
        Category::create(['name' => 'Đồ dự tiệc']);

        //Sách trong nước
        Category::create([
            'name'      => 'Giày dép',
            'parent_id' => 1,
        ]);
        Category::create([
            'name'      => 'Mẹ & Bé',
            'parent_id' => 1,
        ]);
        Category::create([
            'name'      => 'Đầm',
            'parent_id' => 1,
        ]);

        //Sách nước ngoài
        Category::create([
            'name'      => 'Giày cao',
            'parent_id' => 2,
        ]);
        Category::create([
            'name'      => 'Áo dài',
            'parent_id' => 2,
        ]);

        //Sách học ngoại ngữ
        Category::create([
            'name'      => 'Quần Short',
            'parent_id' => 3,
        ]);
    }
}
