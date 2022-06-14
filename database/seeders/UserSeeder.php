<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
           [ 'id' => 1,
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345689'),
            'role_id' => 1,
               'diachi' => '45 cao thang',
               'sdt' => '0977333444',
               'gioitinh' => 'bede',
               'Anhdaidien'=>'1.png',
               'Anhbia'=>'2.png',
               'ngaysinh' =>'1/1/2000'
               ]
        ]);
    }
}
