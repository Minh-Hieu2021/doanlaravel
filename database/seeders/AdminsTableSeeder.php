<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\nhanvien;
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

        nhanvien::create([
            'MaNV' => 'NV1',
            'LoaiNV' => 'QuanLi',
            'HoTen' => 'HMH',
            'email' => '1@12.com',
            'password' => bcrypt('1'),
            'Anh' => '1.jpg',
        ]);
    }
}
