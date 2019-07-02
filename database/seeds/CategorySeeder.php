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
        //1
        Category::insert([
            'name'=>'Cappuccino'
        ]);
        //2
        Category::insert([
            'name'=>'Frappuccino',
            'parent'=>1
        ]);
        //3
        Category::insert([
            'name'=>'Espresso'
        ]);
        //4
        Category::insert([
            'name'=>'Mocha'
        ]);
        //5
        Category::insert([
            'name'=>'Americano'
        ]);
        //6
        Category::insert([
            'name'=>'Latte'
        ]);
        //7
        Category::insert([
            'name'=>'Macchiato'
        ]);
        //8
        Category::insert([
            'name'=>'Luwak'
        ]);
        //9
        Category::insert([
            'name'=>'Flat White'
        ]);
        //10
        Category::insert([
            'name'=>'Milk Coffee'
        ]);
        //11
        Category::insert([
            'name'=>'Black Coffee'
        ]);
    }
}
