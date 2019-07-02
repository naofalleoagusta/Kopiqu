<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            'name'=>'Luwak Coffee',
            'price'=>1000000,
            'quantity'=>0,
            'description'=>'Luwak white coffee mantap',
            'weight'=>1
        ]);

        Product::insert([
            'name'=>'American Mocha',
            'price'=>40000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'French Mocha',
            'price'=>35000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Flat White',
            'price'=>25000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Milk Coffee',
            'price'=>20000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);

        Product::insert([
            'name'=>'Black Coffee',
            'price'=>20000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Frappuccino',
            'price'=>40000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Brazillian Cappuccino',
            'price'=>50000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Nadine Cappuccino',
            'price'=>30000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Americano Cappuccino',
            'price'=>35000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Caffe Americano',
            'price'=>30000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Americano Latte',
            'price'=>35000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Latte Macchiato',
            'price'=>50000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Japanese Macchiato',
            'price'=>55000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Espresso Macchiato',
            'price'=>45000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Brazillian Espresso',
            'price'=>40000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'American Espresso',
            'price'=>35000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
        Product::insert([
            'name'=>'Cuban Espresso',
            'price'=>40000,
            'quantity'=>50,
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore',
            'weight'=>1
        ]);
    }
}
