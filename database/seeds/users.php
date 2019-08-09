<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'nguyenvana@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>2,'email'=>'nguyenvanb@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>3,'email'=>'nguyenvanc@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>4,'email'=>'nguyenvand@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>5,'email'=>'nguyenvane@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>6,'email'=>'nguyenvang@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>7,'email'=>'nguyenvanh@gmail.com','password'=>bcrypt('123456'),'full'=>'nguyenvana','address'=>'hanoi','phone'=>'0988744321','level'=>'1'],
            ['id'=>8,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'full'=>'admmin','address'=>'hanoi','phone'=>'0988744321','level'=>'0'],
        ]);
    }
}
