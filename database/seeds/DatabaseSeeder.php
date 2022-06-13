<?php

use App\Customers\Customers;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call([
            EmployeeSeeder::class,
           // ExpensesSeeder::class,
            OrderItemsSeeder::class,
            OrdersSeeder::class,
            //ProfitsSeeder::class,
            RequiredItemsSeeder::class,
           // RetailOwnersSeeder::class,
            RetailSeeder::class,
            SuppliesSeeder::class,
            UserSeeder::class,
            LoansSeeder::class,
            SalesSeeder::class,
            StockSeeder::class,
            RolesSeeder::class,
            CustomersSeeder::class,
            BillsSeeder::class,
            SuppliesSeeder::class,
            SuppliersSeeder::class,
            CustomerCreditSeeder::class,

        ]);
    }

}
