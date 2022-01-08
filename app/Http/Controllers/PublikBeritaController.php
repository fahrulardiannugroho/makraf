<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublikBeritaController extends Controller
{
	public function index()
	{
		$postinganberita = DB::table('postingan_berita')
					->get();

		return view('publik.info-berita.index', [
			'postinganberita' => $postinganberita,
		]);
	}

	public function show($id)
	{
		$postinganBerita = DB::table('postingan_berita')
					->where('postingan_berita.id_berita', '=', $id)
					->get()->first();

		return view('publik.info-berita.detail', [
		'postinganBerita' => $postinganBerita
		]);
	}
}
