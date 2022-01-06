<?php

namespace App\Http\Controllers;

use App\Models\KawanMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$username = Auth::user()->name;
			$profilSaya = DB::table('kawan_mahasiswa')
				->where('kawan_mahasiswa.username', '=', $username)
				->get()->first();

			return view("students.profile-setting.index", [
				"profilSaya" => $profilSaya
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				$profilSaya = new KawanMahasiswa();

				$request->validate([
					'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);
				
				$file = $request->file('avatar');
				$nama_file = time()."_".$file->getClientOriginalName();	
	
				// folder tempat  file diupload
				$tujuan_upload = 'images';
				$file->move($tujuan_upload,$nama_file);

				$profilSaya -> username = $request->username;
				$profilSaya -> nama_mahasiswa = $request->nama_mahasiswa;
				$profilSaya -> fakultas = $request->fakultas;
				$profilSaya -> jurusan = $request->jurusan;
				$profilSaya -> semester = $request->semester;
				$profilSaya -> jenis_kelamin = $request->jenis_kelamin;
				$profilSaya -> nama_mahasiswa = $request->nama_mahasiswa;
				$profilSaya -> email = $request->email;
				$profilSaya -> prestasi = $request->prestasi;
				$profilSaya -> save();

				return back()->with('success', "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $username)
    {
			$profilSaya = KawanMahasiswa::where('username', $username)->first();

			$request->validate([
				'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			
			$file = $request->file('avatar');
			$nama_file = time()."_".$file->getClientOriginalName();	
			

			// menghapus gambar lama
			$avatar = $profilSaya->avatar;
			if ($avatar != 'avatar.jpg' && $avatar != null) {
				unlink(public_path('images/'.$avatar));
			}

			// folder tempat  file diupload
			$tujuan_upload = 'images';
			$file->move($tujuan_upload,$nama_file);
				
			$profilSaya -> avatar = $nama_file;
			$profilSaya -> nama_mahasiswa = $request->nama_mahasiswa;
			$profilSaya -> fakultas = $request->fakultas;
			$profilSaya -> jurusan = $request->jurusan;
			$profilSaya -> semester = $request->semester;
			$profilSaya -> jenis_kelamin = $request->jenis_kelamin;
			$profilSaya -> nama_mahasiswa = $request->nama_mahasiswa;
			$profilSaya -> email = $request->email;
			$profilSaya -> prestasi = $request->prestasi;
			$profilSaya -> update();
			
			return back()->with('success', "Data berhasil diperbarui");
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
