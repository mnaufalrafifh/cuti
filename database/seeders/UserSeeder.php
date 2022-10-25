<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678'),
            'id_roles'=>1,
        ]);
        User::create([
            'name'=>'pejabat',
            'email'=>'pejabat@gmail.com',
            'password'=>bcrypt('12345678'),
            'id_roles'=>2,
        ]);
        User::create([
            'name'=>'pegawai',
            'email'=>'pegawai@gmail.com',
            'password'=>bcrypt('12345678'),
            'id_roles'=>3,
        ]);
    }
}
