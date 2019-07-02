<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'=>'admin processor',
            'username'=>'adminpro',
            'password'=>123456,
            'role'=>'processor'
        ]);
        Admin::insert([
            'name'=>'inventory manager',
            'username'=>'admininven',
            'password'=>123456,
            'role'=>'inventory'
        ]);
        Admin::insert([
            'name'=>'operation manager',
            'username'=>'adminop',
            'password'=>123456,
            'role'=>'operation'
        ]);
    }
}
