<?php

use Illuminate\Database\Seeder;

class orders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert([
            ['id'=>1,'name'=>'Nguyễn Văn A','telephone'=>'0948382932','address'=>'Hà Nội'],
            ['id'=>2,'name'=>'Nguyễn Văn B','telephone'=>'0948382932','address'=>'Hải Phòng'],
            ['id'=>3,'name'=>'Nguyễn Văn C','telephone'=>'0948382932','address'=>'Hải Dương'],
            ['id'=>4,'name'=>'Nguyễn Văn D','telephone'=>'0948382932','address'=>'Thái Bình'],
        ]);
    }
}
