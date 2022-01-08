<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipPkmPkp extends Model
{
    use HasFactory;
		protected $table = 'arsip_pkm_pkp2';
		protected $primaryKey = 'id_pkp';
}
