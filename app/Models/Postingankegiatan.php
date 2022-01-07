<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingankegiatan extends Model
{
    use HasFactory;
		protected $table = 'postingan_kegiatan';
		protected $primaryKey = 'id_kegiatan';
}
