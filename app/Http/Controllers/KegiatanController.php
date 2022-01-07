<?php

namespace App\Http\Controllers;

use App\Models\Postingankegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$postinganKegiatan = DB::table('postingan_kegiatan')->get();

			return view('admins.kegiatan.index', [
				'postinganKegiatan' => $postinganKegiatan
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('admins.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				$postinganKegiatan = new Postingankegiatan();

				$request->validate([
					'gambar_postingan_kegiatan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);
				
				$file = $request->file('gambar_postingan_kegiatan');
				$nama_file = time()."_".$file->getClientOriginalName();	

				// folder tempat  file diupload
				$tujuan_upload = 'images';
				$file->move($tujuan_upload,$nama_file);

				$postinganKegiatan->user_id = auth()->user()->email;
				$postinganKegiatan->gambar_postingan_kegiatan = $nama_file;
				$postinganKegiatan->penulis = $request->penulis;
				$postinganKegiatan->judul_postingan_kegiatan = $request->judul_postingan_kegiatan;
				$postinganKegiatan->isi_postingan_kegiatan = $request->isi_postingan_kegiatan;
				$postinganKegiatan->save();
			
				return redirect('/kegiatan')->with('success', 'Data berhasil terkirim untuk direview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$postinganKegiatan = DB::table('postingan_kegiatan')
						->where('postingan_kegiatan.id_kegiatan', '=', $id)
						->get()->first();

			return view('admins.kegiatan.detail', [
			'postinganKegiatan' => $postinganKegiatan
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
			$postingankegiatan = Postingankegiatan::find($id);
			return view('admins.kegiatan.edit', [
				'postingankegiatan' => $postingankegiatan,
			]);
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
				$postinganKegiatan = Postingankegiatan::where('id_kegiatan', $id)->first();

				$request->validate([
					'gambar_postingan_kegiatan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);
				
				$file = $request->file('gambar_postingan_kegiatan');
				$nama_file = time()."_".$file->getClientOriginalName();	
				

				// menghapus gambar lama
				$avatar = $postinganKegiatan->gambar_postingan_kegiatan;
				if ($avatar != 'avatar.jpg' && $avatar != null) {
					unlink(public_path('images/'.$avatar));
				}

				// folder tempat  file diupload
				$tujuan_upload = 'images';
				$file->move($tujuan_upload,$nama_file);
					
				$postinganKegiatan -> gambar_postingan_kegiatan = $nama_file;
				$postinganKegiatan -> judul_postingan_kegiatan = $request->judul_postingan_kegiatan;
				$postinganKegiatan -> isi_postingan_kegiatan = $request->isi_postingan_kegiatan;
				$postinganKegiatan -> penulis = $request->penulis;
				$postinganKegiatan -> update();
				
				return redirect('/kegiatan')->with('success', 'Data berhasil terkirim untuk direview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$postinganKegiatan = Postingankegiatan::where('id_kegiatan', $id)->first();
			$cover = $postinganKegiatan->gambar_postingan_kegiatan;
			unlink(public_path('images/'.$cover));
			

			// hapus data
  		$postinganKegiatan->delete();

      return back()->with('success', 'Postingan kegiatan berhasil dihapus');
    }
}
