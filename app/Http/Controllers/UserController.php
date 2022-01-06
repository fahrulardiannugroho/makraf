<?php

namespace App\Http\Controllers;

use App\Models\KawanMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function index()
	{
		$profilSaya  = DB::table('kawan_mahasiswa')->get();

		return view('students.profile-saya.index', [
			'profilSaya' => $profilSaya
		]);
	}
}
