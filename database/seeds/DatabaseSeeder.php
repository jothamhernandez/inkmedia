<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CoaCategories::class);
        $this->call(CoaTypes::class);
        $this->call(User::class);
        $this->call(Customer::class);
        $this->call(Vendor::class);
    }
}
