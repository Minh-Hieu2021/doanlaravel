<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\sanpham;
use App\Models\user;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        sanpham::create(
            [
                'MaSanPham' => 'Sp1',
                'TenSanPham' => 'Laptop',
                'GiaBan' => '20000000đ',
                'SLTK' => '15',
                'Anh' => '1.jpg',
                'MoTa' => 'Đây là laptop',

            ],
        );
    }
}
