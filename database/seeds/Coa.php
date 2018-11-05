<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Coa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coas')->insert([
            ['id' => '1','coa_type' => '1','account_id' => '1001','account_name' => 'Cash on Hand','account_description' => NULL,'created_at' => '2018-11-05 05:59:29','updated_at' => '2018-11-05 05:59:29'],
            ['id' => '2','coa_type' => '3','account_id' => '1002','account_name' => 'Accounts Recievable','account_description' => NULL,'created_at' => '2018-11-05 07:25:15','updated_at' => '2018-11-05 07:25:15'],
            ['id' => '3','coa_type' => '12','account_id' => '2001','account_name' => 'Accounts Payable','account_description' => NULL,'created_at' => '2018-11-05 08:13:38','updated_at' => '2018-11-05 08:13:38'],
            ['id' => '4','coa_type' => '13','account_id' => '2002','account_name' => 'Sales Vat','account_description' => NULL,'created_at' => '2018-11-05 08:13:53','updated_at' => '2018-11-05 08:13:53'],
            ['id' => '5','coa_type' => '19','account_id' => '3001','account_name' => 'Sales','account_description' => NULL,'created_at' => '2018-11-05 08:14:10','updated_at' => '2018-11-05 08:14:10'],
            ['id' => '6','coa_type' => '22','account_id' => '3002','account_name' => 'Uncategorized Income','account_description' => NULL,'created_at' => '2018-11-05 08:14:31','updated_at' => '2018-11-05 08:14:31'],
            ['id' => '7','coa_type' => '23','account_id' => '3003','account_name' => 'Gain on Foreign Exchange','account_description' => NULL,'created_at' => '2018-11-05 08:14:46','updated_at' => '2018-11-05 08:14:46'],
            ['id' => '8','coa_type' => '24','account_id' => '4001','account_name' => 'Accounting Fees','account_description' => NULL,'created_at' => '2018-11-05 08:15:14','updated_at' => '2018-11-05 08:15:14'],
            ['id' => '9','coa_type' => '24','account_id' => '4002','account_name' => 'Advertising & Promotions','account_description' => NULL,'created_at' => '2018-11-05 08:15:27','updated_at' => '2018-11-05 08:15:27'],
            ['id' => '10','coa_type' => '24','account_id' => '4003','account_name' => 'Bank Service Charges','account_description' => NULL,'created_at' => '2018-11-05 08:15:41','updated_at' => '2018-11-05 08:15:41'],
            ['id' => '11','coa_type' => '24','account_id' => '4004','account_name' => 'Computer - Hardware','account_description' => NULL,'created_at' => '2018-11-05 08:15:53','updated_at' => '2018-11-05 08:15:53'],
            ['id' => '12','coa_type' => '24','account_id' => '4005','account_name' => 'Computer - Hosting','account_description' => NULL,'created_at' => '2018-11-05 08:16:03','updated_at' => '2018-11-05 08:16:03'],
            ['id' => '13','coa_type' => '24','account_id' => '4006','account_name' => 'Computer - Internet','account_description' => NULL,'created_at' => '2018-11-05 08:16:12','updated_at' => '2018-11-05 08:16:12'],
            ['id' => '14','coa_type' => '24','account_id' => '4007','account_name' => 'Computer - Software','account_description' => NULL,'created_at' => '2018-11-05 08:16:21','updated_at' => '2018-11-05 08:16:21'],
            ['id' => '15','coa_type' => '24','account_id' => '4008','account_name' => 'Depreciation Expense','account_description' => NULL,'created_at' => '2018-11-05 08:16:43','updated_at' => '2018-11-05 08:16:43'],
            ['id' => '16','coa_type' => '24','account_id' => '4009','account_name' => 'Insurance – Vehicles','account_description' => NULL,'created_at' => '2018-11-05 08:16:51','updated_at' => '2018-11-05 08:16:51'],
            ['id' => '17','coa_type' => '24','account_id' => '4010','account_name' => 'Interest Expense','account_description' => NULL,'created_at' => '2018-11-05 08:17:00','updated_at' => '2018-11-05 08:17:00'],
            ['id' => '18','coa_type' => '24','account_id' => '4011','account_name' => 'Meals and Entertainment','account_description' => NULL,'created_at' => '2018-11-05 08:17:08','updated_at' => '2018-11-05 08:17:08'],
            ['id' => '19','coa_type' => '24','account_id' => '4012','account_name' => 'Office Supplies','account_description' => NULL,'created_at' => '2018-11-05 08:17:18','updated_at' => '2018-11-05 08:17:18'],
            ['id' => '20','coa_type' => '24','account_id' => '4013','account_name' => 'Professional Fees','account_description' => NULL,'created_at' => '2018-11-05 08:17:27','updated_at' => '2018-11-05 08:17:27'],
            ['id' => '21','coa_type' => '24','account_id' => '4014','account_name' => 'Rent Expense','account_description' => NULL,'created_at' => '2018-11-05 08:17:37','updated_at' => '2018-11-05 08:17:37'],
            ['id' => '22','coa_type' => '24','account_id' => '4015','account_name' => 'Repairs & Maintenance','account_description' => NULL,'created_at' => '2018-11-05 08:17:46','updated_at' => '2018-11-05 08:17:46'],
            ['id' => '23','coa_type' => '24','account_id' => '4016','account_name' => 'Telephone – Land Line','account_description' => NULL,'created_at' => '2018-11-05 08:17:54','updated_at' => '2018-11-05 08:17:54'],
            ['id' => '24','coa_type' => '24','account_id' => '4017','account_name' => 'Telephone – Wireless','account_description' => NULL,'created_at' => '2018-11-05 08:18:03','updated_at' => '2018-11-05 08:18:03'],
            ['id' => '25','coa_type' => '24','account_id' => '4018','account_name' => 'Travel Expense','account_description' => NULL,'created_at' => '2018-11-05 08:18:11','updated_at' => '2018-11-05 08:18:11'],
            ['id' => '26','coa_type' => '24','account_id' => '4019','account_name' => 'Utilities','account_description' => NULL,'created_at' => '2018-11-05 08:18:18','updated_at' => '2018-11-05 08:18:18'],
            ['id' => '27','coa_type' => '24','account_id' => '4020','account_name' => 'Vehicle – Fuel','account_description' => NULL,'created_at' => '2018-11-05 08:18:26','updated_at' => '2018-11-05 08:18:26'],
            ['id' => '28','coa_type' => '24','account_id' => '4021','account_name' => 'Vehicle – Repairs & Maintenance','account_description' => NULL,'created_at' => '2018-11-05 08:18:34','updated_at' => '2018-11-05 08:18:34'],
            ['id' => '29','coa_type' => '27','account_id' => '4022','account_name' => 'Payroll – Employee Benefits','account_description' => NULL,'created_at' => '2018-11-05 08:18:54','updated_at' => '2018-11-05 08:18:54'],
            ['id' => '30','coa_type' => '27','account_id' => '4023','account_name' => 'Payroll – Employer\'s Share of Benefits','account_description' => NULL,'created_at' => '2018-11-05 08:19:06','updated_at' => '2018-11-05 08:19:06'],
            ['id' => '31','coa_type' => '27','account_id' => '4024','account_name' => 'Payroll – Salary & Wages','account_description' => NULL,'created_at' => '2018-11-05 08:19:16','updated_at' => '2018-11-05 08:19:16'],
            ['id' => '32','coa_type' => '28','account_id' => '4025','account_name' => 'Uncategorized Expense','account_description' => NULL,'created_at' => '2018-11-05 08:19:43','updated_at' => '2018-11-05 08:19:43'],
            ['id' => '33','coa_type' => '29','account_id' => '4026','account_name' => 'Loss on Foreign Exchange','account_description' => NULL,'created_at' => '2018-11-05 08:19:53','updated_at' => '2018-11-05 08:19:53'],
            ['id' => '34','coa_type' => '30','account_id' => '5001','account_name' => 'Owner Investment / Drawings','account_description' => NULL,'created_at' => '2018-11-05 08:20:13','updated_at' => '2018-11-05 08:20:13'],
            ['id' => '35','coa_type' => '31','account_id' => '5002','account_name' => 'Owner\'s Equity','account_description' => NULL,'created_at' => '2018-11-05 08:20:20','updated_at' => '2018-11-05 08:20:20']
        ]);
    }
}
