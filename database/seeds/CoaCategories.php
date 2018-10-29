<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoaCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coa_categories')->insert([
            [
                'category'=>'Assets',
                'entry_type'=>'debit'
            ],
            [
                'category'=>'Liabilities & Credit Cards',
                'entry_type'=>'credit'
            ],
            [
                'category'=>'Income',
                'entry_type'=>'debit'
            ],
            [
                'category'=>'Expenses',
                'entry_type'=>'credit'
            ],
            [
                'category'=>'Equity',
                'entry_type'=>'debit'
            ],
        ]);
    }
}
