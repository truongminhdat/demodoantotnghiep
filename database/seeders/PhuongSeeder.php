<?php

namespace Database\Seeders;

use App\Models\Phuong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phuong::insert([
            [
                'id' => 1,
                'TenPhuong' => 'Phường Hòa Hiệp Nam',
                'quan_id' => '1'
            ],
            [
                'id' => 2,
                'TenPhuong' => 'Phường Hòa Hiệp Bắc',
                'quan_id' => '1'
            ],
            [
                'id' => 3,
                'TenPhuong' => 'Phường Hòa Khánh Nam',
                'quan_id' => '1'
            ],
            [
                'id' => 4,
                'TenPhuong' => 'Phường Hòa Khánh Bắc',
                'quan_id' => '1'
            ],
            [
                'id' => 5,
                'TenPhuong' => 'Phường Hòa Minh',
                'quan_id' => '1'
            ],
            [
                'id' => 6,
                'TenPhuong' => 'Phường Khuê Trung',
                'quan_id' => '2'
            ],
            [
                'id' => 7,
                'TenPhuong' => 'Phường Hòa Thọ Đông',
                'quan_id' => '2'
            ],
            [
                'id' => 8,
                'TenPhuong' => 'Phường Hòa Thọ Tây',
                'quan_id' => '2'
            ],
            [
                'id' => 9,
                'TenPhuong' => 'Phường Hòa An',
                'quan_id' => '2'
            ],
            [
                'id' => 10,
                'TenPhuong' => 'Phường Hòa Phát',
                'quan_id' => '2'
            ],
            [
                'id' => 11,
                'TenPhuong' => 'Phường Hòa Xuân',
                'quan_id' => '2'
            ],
            [
                'id' => 12,
                'TenPhuong' => 'Phường Mỹ An',
                'quan_id' => '3'
            ],
            [
                'id' => 13,
                'TenPhuong' => 'Phường Khuê Mỹ',
                'quan_id' => '3'
            ],
            [
                'id' => 14,
                'TenPhuong' => 'Phường Hòa Hải',
                'quan_id' => '3'
            ],
            [
                'id' => 15,
                'TenPhuong' => 'Phường Hòa Quý',
                'quan_id' => '3'
            ],
            [
                'id' => 16,
                'TenPhuong' => 'Phường Hải Châu 1',
                'quan_id' => '5'
            ],
            [
                'id' => 17,
                'TenPhuong' => 'Phường Hải Châu 2',
                'quan_id' => '5'
            ],
            [
                'id' => 18,
                'TenPhuong' => 'Phường Thanh Bình',
                'quan_id' => '5'
            ],
            [
                'id' => 19,
                'TenPhuong' => 'Phường Thuận Phước',
                'quan_id' => '5'
            ],
            [
                'id' => 20,
                'TenPhuong' => 'Phường Hòa Thuận Tây',
                'quan_id' => '5'
            ],
            [
                'id' => 21,
                'TenPhuong' => 'Hòa Thuận Đông',
                'quan_id' => '5'
            ],
            [
                'id' => 22,
                'TenPhuong' => 'Phường Nam Dương',
                'quan_id' => '5'
            ],
            [
                'id' => 23,
                'TenPhuong' => 'Phường Phước Ninh',
                'quan_id' => '5'
            ],

            [
                'id' => 24,
                'TenPhuong' => 'Phường Bình Thuận',
                'quan_id' => '5'
            ],
            [
                'id' => 25,
                'TenPhuong' => 'Phường Bình Thiên',
                'quan_id' => '5'
            ],
            [
                'id' => 26,
                'TenPhuong' => 'Phường Hòa Cường Nam',
                'quan_id' => '5'
            ],
            [
                'id' => 27,
                'TenPhuong' => 'Phường Hòa Cường Bắc',
                'quan_id' => '5'
            ],
            [
                'id' => 28,
                'TenPhuong' => 'Phường An Khê',
                'quan_id' => '4'
            ],
            [
                'id' =>29,
                'TenPhuong' => 'Phường Hòa Khê',
                'quan_id' => '4'
            ],
            [
                'id' =>30,
                'TenPhuong' => 'Phường Tam Thuận',
                'quan_id' => '4'
            ],
            [
                'id' =>31,
                'TenPhuong' => 'Phường Thanh Khê Tây',
                'quan_id' => '4'
            ],
            [
                'id' =>32,
                'TenPhuong' => 'Phường Thanh Khê Đông',
                'quan_id' => '4'
            ],
            [
                'id' =>33,
                'TenPhuong' => 'Phường Xuân Hà',
                'quan_id' => '4'
            ],
            [
                'id' =>34,
                'TenPhuong' => 'Phường Tân Chính',
                'quan_id' => '4'
            ],
            [
                'id' =>35,
                'TenPhuong' => 'Phường Chính Gián',
                'quan_id' => '4'
            ],
            [
                'id' =>36,
                'TenPhuong' => 'Phường Vĩnh Trung',
                'quan_id' => '4'
            ],
            [
                'id' =>37,
                'TenPhuong' => 'Phường Thạc Gián',
                'quan_id' => '4'
            ],



        ]);
    }
}
