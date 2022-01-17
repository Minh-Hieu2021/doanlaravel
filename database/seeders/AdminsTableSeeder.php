<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\nhanvien;
use App\Models\hoadonban;
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
        //Thêm mới
        hoadonnhap::create(
            [
                'MaHD' => 'HD1',
                'NgNhap' => '25/05/2001',
                'TongTien' => '1000000',
            ],
        );

        hoadonnhap::create(
            [
                'MaHD' => 'HD2',
                'NgNhap' => '25/05/2001',
                'TongTien' => '1200000',
            ],
        );

        //Thêm mới
        chitiethoadonnhap::create(
            [
                'MaSanPham' => 'SP1',
                'SL' => '10',
                'DonGia' => '10000000',
            ],
        );
        chitiethoadonnhap::create(
            [
                'MaSanPham' => 'SP2',
                'SL' => '10',
                'DonGia' => '10000000',
            ],
        );
    }
}
