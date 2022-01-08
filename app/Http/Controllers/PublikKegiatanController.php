<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublikKegiatanController extends Controller
{
	public function index()
	{
		$postingankegiatan = DB::table('postingan_kegiatan')
					->get();

		return view('publik.info-kegiatan.index', [
			'postingankegiatan' => $postingankegiatan,
		]);
	}

	public function show($id)
	{
		$postinganKegiatan = DB::table('postingan_kegiatan')
					->where('postingan_kegiatan.id_kegiatan', '=', $id)
					->get()->first();

		return view('publik.info-kegiatan.detail', [
		'postinganKegiatan' => $postinganKegiatan
		]);
	}
}
