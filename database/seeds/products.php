<?php

use Illuminate\Database\Seeder;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id'=>1,'code'=>'SP01','name'=>'Áo Nữ Sơ Mi Chấm Bi','price'=>500000,'img'=>'Ao_nu_so_mi_cham_bi.jpg','category_id'=>2],
            ['id'=>2,'code'=>'SP02','name'=>'Áo Nữ Phối Viền','price'=>60000,'img'=>'ao-nu-phoi-vien.jpg','category_id'=>2],
            ['id'=>3,'code'=>'SP03','name'=>'Áo Sơ Mi Có Cổ Đúc','price'=>700000,'img'=>'ao-nu-so-mi-co-co-duc.jpg','category_id'=>2],
            ['id'=>4,'code'=>'SP04','name'=>'Áo sơ mi caro xám Xanh','price'=>800000,'img'=>'ao-so-mi-ca-ro-xam-xanh-asm1228-10199.jpg','category_id'=>1],
            ['id'=>5,'code'=>'SP05','name'=>'Áo Sơ Mi Hoạ Tiết Đen','price'=>900000,'img'=>'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg','category_id'=>1],
            ['id'=>6,'code'=>'SP06','name'=>'Áo Sơ Mi Trắng Kem','price'=>100000,'img'=>'ao-so-mi-trang-kem-asm836-8193.jpg','category_id'=>1],
        ]);
    }
}
