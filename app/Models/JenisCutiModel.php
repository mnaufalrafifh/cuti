<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCutiModel extends Model
{
    use HasFactory;
    protected $table = 'jenis_cutis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_cuti',
        'lama_cuti'
    ];
}
