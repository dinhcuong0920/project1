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
        $this->call(users::class);
        $this->call(category::class);
        $this->call(products::class);
        $this->call(orders::class);
        $this->call(order_product::class);
    }
}
