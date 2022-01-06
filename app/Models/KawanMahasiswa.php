<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KawanMahasiswa extends Model
{
    use HasFactory;
		protected $table = 'kawan_mahasiswa';
		protected $primaryKey = 'username';
}
