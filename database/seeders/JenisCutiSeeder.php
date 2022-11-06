<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisCutiModel;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisCutiModel::create([
            'nama_cuti'=>'Cuti Tahunan',
            'lama_cuti'=>12,
        ]);
        JenisCutiModel::create([
            'nama_cuti'=>'Cuti Besar',
            'lama_cuti'=>40,
        ]);
        JenisCutiModel::create([
            'nama_cuti'=>'Cuti Sakit',
            'lama_cuti'=>545,
        ]);
        JenisCutiModel::create([
            'nama_cuti'=>'Cuti Melahirkan',
            'lama_cuti'=>91,
        ]);
        JenisCutiModel::create([
            'nama_cuti'=>'Cuti Karena Alasan Penting',
            'lama_cuti'=>30,
        ]);
        JenisCutiModel::create([
            'nama_cuti'=>'Cuti Di Luar Tanggungan Negara',
            'lama_cuti'=>1095,
        ]);
    }
}
