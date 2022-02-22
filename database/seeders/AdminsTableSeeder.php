<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\nhanvien;
use App\Models\khachhang;
use App\Models\chitiethoadonnhap;
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

        nhanvien::create(
            [
                'MaNV' => 'NV1',
                'LoaiNV' => 'QuanLi',
                'HoTen' => 'Huỳnh Minh Hiếu',
                'email' => '1@12.com',
                'password' => bcrypt('1'),
                'Anh' => '1.jpg',
            ],
        );
        nhanvien::create(
            [
                'MaNV' => 'NV2',
                'LoaiNV' => 'QuanLi',
                'HoTen' => 'Phạm Đăng Quang',
                'email' => '124@12.com',
                'password' => bcrypt('1'),
                'Anh' => '1.jpg',
            ]
        );
        nhanvien::create(
            [
                'MaNV' => 'NV3',
                'LoaiNV' => 'QuanLi',
                'HoTen' => 'Phạm Anh KHoa',
                'email' => '152@12.com',
                'password' => bcrypt('1'),
                'Anh' => '1.jpg',
            ]
        );
        nhanvien::create(
            [
                'MaNV' => 'NV4',
                'LoaiNV' => 'QuanLi',
                'HoTen' => 'Nguyễn Việt Đức',
                'email' => '111@112.com',
                'password' => bcrypt('1'),
                'Anh' => '1.jpg',
            ]
        );
        khachhang::create(
            [
                'MaKH' => 'KH1',
                'TenKH' => 'Minh Hiếu',
                'DChi' => 'Long an',
                'SDT' => '0373090347',
                'password' => bcrypt('1')
            ]
        );
        khachhang::create(
            [
                'MaKH' => 'KH2',
                'TenKH' => 'Đức',
                'DChi' => 'Long an',
                'SDT' => '1',
                'password' => bcrypt('1')
            ]
        );
    }
}
