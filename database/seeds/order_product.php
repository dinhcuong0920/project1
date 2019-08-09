<?php

use Illuminate\Database\Seeder;

class order_product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->delete();
        DB::table('order_product')->insert([
            ['order_id'=>1,'product_id'=>'1'],
            ['order_id'=>1,'product_id'=>'2'],
            ['order_id'=>2,'product_id'=>'4'],
            ['order_id'=>2,'product_id'=>'5'],
            ['order_id'=>2,'product_id'=>'2'],
            ['order_id'=>3,'product_id'=>'4'],
            ['order_id'=>3,'product_id'=>'3'],
            ['order_id'=>4,'product_id'=>'5'],
            ['order_id'=>4,'product_id'=>'1'],
            ['order_id'=>4,'product_id'=>'4'],
        ]);
    }
}
