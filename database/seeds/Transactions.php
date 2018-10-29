<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Transactions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->insert([
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-9-29 05:52:50',
                'updated_at'=>'2018-9-29 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-9-30 05:52:50',
                'updated_at'=>'2018-9-30 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-1 05:52:50',
                'updated_at'=>'2018-10-1 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-2 05:52:50',
                'updated_at'=>'2018-10-2 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-2 05:52:50',
                'updated_at'=>'2018-10-2 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-3 05:52:50',
                'updated_at'=>'2018-10-3 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-3 05:52:50',
                'updated_at'=>'2018-10-3 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-4 05:52:50',
                'updated_at'=>'2018-10-4 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-4 05:52:50',
                'updated_at'=>'2018-10-4 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-5 05:52:50',
                'updated_at'=>'2018-10-5 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-5 05:52:50',
                'updated_at'=>'2018-10-5 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-5 05:52:50',
                'updated_at'=>'2018-10-5 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-6 05:52:50',
                'updated_at'=>'2018-10-6 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-7 05:52:50',
                'updated_at'=>'2018-10-7 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-8 05:52:50',
                'updated_at'=>'2018-10-8 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-8 05:52:50',
                'updated_at'=>'2018-10-8 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-10 05:52:50',
                'updated_at'=>'2018-10-10 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-11 05:52:50',
                'updated_at'=>'2018-10-11 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-11 05:52:50',
                'updated_at'=>'2018-10-11 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-11 05:52:50',
                'updated_at'=>'2018-10-11 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-12 05:52:50',
                'updated_at'=>'2018-10-12 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-12 05:52:50',
                'updated_at'=>'2018-10-12 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-13 05:52:50',
                'updated_at'=>'2018-10-13 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-14 05:52:50',
                'updated_at'=>'2018-10-14 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-14 05:52:50',
                'updated_at'=>'2018-10-14 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-15 05:52:50',
                'updated_at'=>'2018-10-15 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-16 05:52:50',
                'updated_at'=>'2018-10-16 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-16 05:52:50',
                'updated_at'=>'2018-10-16 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-16 05:52:50',
                'updated_at'=>'2018-10-16 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-17 05:52:50',
                'updated_at'=>'2018-10-17 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-17 05:52:50',
                'updated_at'=>'2018-10-17 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-17 05:52:50',
                'updated_at'=>'2018-10-17 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-18 05:52:50',
                'updated_at'=>'2018-10-18 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-18 05:52:50',
                'updated_at'=>'2018-10-18 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-18 05:52:50',
                'updated_at'=>'2018-10-18 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-19 05:52:50',
                'updated_at'=>'2018-10-19 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-19 05:52:50',
                'updated_at'=>'2018-10-19 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-20 05:52:50',
                'updated_at'=>'2018-10-20 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-20 05:52:50',
                'updated_at'=>'2018-10-20 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-20 05:52:50',
                'updated_at'=>'2018-10-20 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-20 05:52:50',
                'updated_at'=>'2018-10-20 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-21 05:52:50',
                'updated_at'=>'2018-10-21 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-21 05:52:50',
                'updated_at'=>'2018-10-21 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-21 05:52:50',
                'updated_at'=>'2018-10-21 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-21 05:52:50',
                'updated_at'=>'2018-10-21 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-22 05:52:50',
                'updated_at'=>'2018-10-22 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-22 05:52:50',
                'updated_at'=>'2018-10-22 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-23 05:52:50',
                'updated_at'=>'2018-10-23 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment to Something 1',
                'price'=>12000,
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-10-24 05:52:50',
                'updated_at'=>'2018-10-24 05:52:50'
            ],
            [
                'account'=>'Cash on Hand',
                'account_code'=>'1001',
                'description'=>'Payment From Something 2',
                'price'=>13000,
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-25 05:52:50',
                'updated_at'=>'2018-10-25 05:52:50'
            ],

        ]);
    }
}
