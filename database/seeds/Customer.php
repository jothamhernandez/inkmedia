<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Customer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('customers')->insert([
            [
                'name'=>'Customer One',
                'email'=>'customer1@email.com',
                'first_name'=>'Customer',
                'last_name'=>'One',
                'contact_no'=>'09051523654'
            ]
        ]);
    }
}
