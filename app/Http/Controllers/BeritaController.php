<?php

namespace App\Http\Controllers;

use App\Models\PostinganBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
			$postinganBerita = DB::table('postingan_berita')->get();

			return view('admins.berita.index', [
				'postinganBerita' => $postinganBerita
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('admins.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$postinganBerita = new PostinganBerita();

			$request->validate([
				'gambar_postingan_berita' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			
			$file = $request->file('gambar_postingan_berita');
			$nama_file = time()."_".$file->getClientOriginalName();	

			// folder tempat  file diupload
			$tujuan_upload = 'images';
			$file->move($tujuan_upload,$nama_file);

			$postinganBerita->user_id = auth()->user()->email;
			$postinganBerita->gambar_postingan_berita = $nama_file;
			$postinganBerita->penulis = $request->penulis;
			$postinganBerita->judul_postingan_berita = $request->judul_postingan_berita;
			$postinganBerita->isi_postingan_berita = $request->isi_postingan_berita;
			$postinganBerita->save();
		
			return redirect('/berita')->with('success', 'Berita berhasil dipublikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$postinganBerita = DB::table('postingan_berita')
						->where('postingan_berita.id_berita', '=', $id)
						->get()->first();

			return view('admins.berita.detail', [
			'postinganBerita' => $postinganBerita
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
			$postinganberita = Postinganberita::find($id);
			return view('admins.berita.edit', [
				'postinganberita' => $postinganberita,
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
			$postinganberita = PostinganBerita::where('id_berita', $id)->first();

			$request->validate([
				'gambar_postingan_berita' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			
			$file = $request->file('gambar_postingan_berita');
			$nama_file = time()."_".$file->getClientOriginalName();	
			

			// menghapus gambar lama
			$avatar = $postinganberita->gambar_postingan_berita;
			if ($avatar != 'avatar.jpg' && $avatar != null) {
				unlink(public_path('images/'.$avatar));
			}

			// folder tempat  file diupload
			$tujuan_upload = 'images';
			$file->move($tujuan_upload,$nama_file);
				
			$postinganberita -> gambar_postingan_berita = $nama_file;
			$postinganberita -> judul_postingan_berita = $request->judul_postingan_berita;
			$postinganberita -> isi_postingan_berita = $request->isi_postingan_berita;
			$postinganberita -> penulis = $request->penulis;
			$postinganberita -> update();
			
			return redirect('/berita')->with('success', 'Postingan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$postinganberita = PostinganBerita::where('id_berita', $id)->first();
			$cover = $postinganberita->gambar_postingan_berita;
			unlink(public_path('images/'.$cover));
			

			// hapus data
  		$postinganberita->delete();

      return back()->with('success', 'Postingan berita berhasil dihapus');
    }
}
