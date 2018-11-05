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
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'Nippon Paint Kiosk in Allhome Antipolo',
                'price'=>'2750000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-4-29 05:52:50',
                'updated_at'=>'2018-4-29 05:52:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'LED panel San Miguel Corp.',
                'price'=>'3659000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-5-29 05:30:50',
                'updated_at'=>'2018-5-29 05:30:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 10-25-2018',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-5-31 17:00:50',
                'updated_at'=>'2018-5-31 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 10-25-2018',
                'price'=>'2816000.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-6-29 17:01:50',
                'updated_at'=>'2018-6-29 17:01:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'Delivery and Ingerssion of LED panel in One San Miguel Ortigas',
                'price'=>'325000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-6-03 05:53:50',
                'updated_at'=>'2018-6-03 05:53:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'Nippon Paint sponsored Signages in various Locations',
                'price'=>'563000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-7-10 05:52:50',
                'updated_at'=>'2018-7-10 05:52:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'Bilboard Printing and installation for Continental Philippines',
                'price'=>'125000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-7-14 05:30:50',
                'updated_at'=>'2018-7-14 05:30:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 11-10-2018',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-8-15 17:00:50',
                'updated_at'=>'2018-8-15 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 11-10-2018',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-8-15 17:01:50',
                'updated_at'=>'2018-8-15 17:01:50'
            ],
            [
                'account'=>'Transportation',
                'account_code'=>'TRANS',
                'description'=>'Mobilization of Bilboard for Continental Philippines',
                'price'=>'3000.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-9-20 05:53:50',
                'updated_at'=>'2018-9-20 05:53:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 11-25-2018',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-9-30 17:00:50',
                'updated_at'=>'2018-9-30 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 11-25-2018',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-9-30 17:01:50',
                'updated_at'=>'2018-9-30 17:01:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'Zalora Philippines Office Fit-out',
                'price'=>'1250000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2018-9-10 05:53:50',
                'updated_at'=>'2018-9-10 05:53:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 12-10-2018',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-15 17:00:50',
                'updated_at'=>'2018-10-15 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 12-10-2018',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-15 17:01:50',
                'updated_at'=>'2018-10-15 17:01:50'
            ],
            [
                'account'=>'13th Month Pay',
                'account_code'=>'13MONP',
                'description'=>'13th Month pay for all empoyees',
                'price'=>'118272.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-10-15 17:00:50',
                'updated_at'=>'2018-10-15 17:00:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 12-25-2018',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-12-31 17:00:50',
                'updated_at'=>'2018-12-31 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 12-25-2018',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2018-12-31 17:01:50',
                'updated_at'=>'2018-12-31 17:01:50'
            ],
            [
                'account'=>'Materials',
                'account_code'=>'INV-MAT',
                'description'=>'Payment for the order of various construcion materials',
                'price'=>'272561.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-01-03 17:00:50',
                'updated_at'=>'2019-01-03 17:00:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'Package Deal of Golden Arches Philippines (Interior Fit-Out, Murals, and Signages)',
                'price'=>'2360000',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2019-12-15 17:00:50',
                'updated_at'=>'2019-12-15 17:00:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 01-10-2019',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-01-15 17:00:50',
                'updated_at'=>'2019-01-15 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 01-10-2019',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-01-15 17:01:50',
                'updated_at'=>'2019-01-15 17:01:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 01-25-2019',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-01-31 17:00:50',
                'updated_at'=>'2019-01-31 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 01-25-2019',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-01-31 17:01:50',
                'updated_at'=>'2019-01-31 17:01:50'
            ],
            [
                'account'=>'Sales',
                'account_code'=>'SALE',
                'description'=>'PLDT Stainless Steal Signage Fabrication and Installation',
                'price'=>'950000.00',
                'entry'=>'credit',
                'status'=>'approved',
                'created_at'=>'2019-02-10 17:00:50',
                'updated_at'=>'2019-02-10 17:00:50'
            ],
            [
                'account'=>'Materials',
                'account_code'=>'INV-MAT',
                'description'=>'Purchase of Various metals and wood',
                'price'=>'128654',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-02-14 17:01:50',
                'updated_at'=>'2019-02-14 17:01:50'
            ],
            [
                'account'=>'Regular Employees Salary',
                'account_code'=>'RES',
                'description'=>'Salary of Various Regular Employees for the cutoff 02-10-2019',
                'price'=>'90112.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-02-15 17:00:50',
                'updated_at'=>'2019-02-15 17:00:50'
            ],
            [
                'account'=>'Provisional Employees Salary',
                'account_code'=>'PES',
                'description'=>'Salary of Various Provisional Employees for the cutoff 02-10-2019',
                'price'=>'28160.00',
                'entry'=>'debit',
                'status'=>'approved',
                'created_at'=>'2019-02-15 17:01:50',
                'updated_at'=>'2019-02-15 17:01:50'
            ],
        ]);
    }
}
