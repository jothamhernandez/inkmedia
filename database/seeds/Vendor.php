<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Vendor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vendors')->insert([
            [
                'vendor_name'=>'Cisco Networks',
                'email'=>'admin@cisco.com',
                'first_name'=>'Cisco',
                'last_name'=>'Networks',
                'contact_no'=>'09164898964'
            ]
        ]);
    }
}
