<?php

namespace App\Http\Controllers;

use App\Models\PostinganBerita;
use App\Models\Postingankegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublikDashboardController extends Controller
{
	public function index()
	{
		$postingankegiatan = DB::table('postingan_kegiatan')
					->orderBy('updated_at', 'DESC')
					->take(3)
					->get();

		$postinganBerita = DB::table('postingan_berita')
					->orderBy('updated_at', 'DESC')
					->take(3)
					->get();
		

		return view('publik.welcome', [
			'postingankegiatan' => $postingankegiatan,
			'postinganBerita' => $postinganBerita,
		]);
	}
}
