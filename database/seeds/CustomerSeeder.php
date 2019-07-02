<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            'name'=>'Naofal',
            'email'=>'naofal@mail.com',
            'password'=>'080898'
        ]);
    }
}
