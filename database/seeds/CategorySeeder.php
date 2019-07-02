<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            'name'=>'Cappuccino'
        ]);
        Category::insert([
            'name'=>'Frappuccino',
            'parent'=>1
        ]);
        Category::insert([
            'name'=>'Espresso'
        ]);
        Category::insert([
            'name'=>'Mocha'
        ]);
        Category::insert([
            'name'=>'Americano'
        ]);
        Category::insert([
            'name'=>'Latte'
        ]);
        Category::insert([
            'name'=>'Macchiato'
        ]);
        Category::insert([
            'name'=>'Luwak'
        ]);
        Category::insert([
            'name'=>'Flat White'
        ]);
        Category::insert([
            'name'=>'Milk Coffee'
        ]);
        Category::insert([
            'name'=>'Black Coffee'
        ]);
    }
}
