<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostinganBerita extends Model
{
    use HasFactory;
		protected $table = 'postingan_berita';
		protected $primaryKey = 'id_berita';
}
