<?php

namespace App\Http\Controllers;

use App\Models\KawanMahasiswa;
use App\Models\LowonganTim;
use App\Models\SkemaPkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LowonganTimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$lowonganTim = DB::table('lowongan_tim')
									->join('kawan_mahasiswa', 'lowongan_tim.id_mahasiswa', '=', 'kawan_mahasiswa.username')
									->join('skema_pkm', 'lowongan_tim.skema_pkm', '=', 'skema_pkm.id')
									->where('lowongan_tim.id_lowongan', '=', auth()->user()->name)
									->select('lowongan_tim.*', 'kawan_mahasiswa.*', 'skema_pkm.skema')
									->get();
			
			$lowonganTimAktif = DB::table('lowongan_tim')
									->join('kawan_mahasiswa', 'lowongan_tim.id_mahasiswa', '=', 'kawan_mahasiswa.username')
									->join('skema_pkm', 'lowongan_tim.skema_pkm', '=', 'skema_pkm.id')
									->select('lowongan_tim.*', 'kawan_mahasiswa.*', 'skema_pkm.skema')
									->get();

			return view('students.lowongan-tim.index', [
				'lowonganTim' => $lowonganTim,
				'lowonganTimAktif' => $lowonganTimAktif
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$kawanMahasiswa = DB::table('kawan_mahasiswa')
									->where('kawan_mahasiswa.username', '=', auth()->user()->name)
									->get()->first();
			$skemaPkm = SkemaPkm::all();

			return view('students.lowongan-tim.create', [
				'kawanMahasiswa' => $kawanMahasiswa,
				'skemaPkm' => $skemaPkm,
			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				$submission = new LowonganTim();

				$submission->id_lowongan = auth()->user()->name;
				$submission->id_mahasiswa = auth()->user()->name;
				$submission->judul_lowongan = $request->judul_lowongan;
				$submission->skema_pkm = $request->skema_pkm;
				$submission->kriteria_calon = $request->kriteria_calon;
				$submission->save();
			
				return redirect('/lowongan-tim')->with('success', 'Data berhasil terkirim untuk direview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$lowonganTim = DB::table('lowongan_tim')
			->join('kawan_mahasiswa', 'lowongan_tim.id_mahasiswa', '=', 'kawan_mahasiswa.username')
			->join('skema_pkm', 'lowongan_tim.skema_pkm', '=', 'skema_pkm.id')
			->where('lowongan_tim.id_lowongan', '=', $id)
			->select('lowongan_tim.*', 'kawan_mahasiswa.*', 'skema_pkm.skema')
			->get()->first();

			return view('students.lowongan-tim.detail', [
			'lowonganTim' => $lowonganTim
			]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
