<?php

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
            OrderItemsSeeder::class,
            // OrdersSeeder::class,
            RequiredItemsSeeder::class,
            SuppliesSeeder::class,
            LoansSeeder::class,
            LoanApplicationSeeder::class,
            StockSeeder::class,
            RolesSeeder::class,
            CustomersSeeder::class,
            BillsSeeder::class,
            SuppliesSeeder::class,
            SuppliersSeeder::class,
            CustomerCreditSeeder::class,
            RetailItemsSeeder::class,
            AccountSeeder::class,
            SubscriptionSeeder::class,
            SalesSeeder::class,
            SaleTransactionsSeeder::class,
            RevenueSeeder::class,
           // RetailSalarySeeder::class,
            // UserSeeder::class,
            // RetailOwnersSeeder::class,
             RetailSeeder::class,
            ProfitsSeeder::class,
            ExpensesSeeder::class,
        ]);
    }
}
