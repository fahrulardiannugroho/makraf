<?php

namespace App\Http\Controllers;

use App\Models\ArsipPkmPkp;
use App\Models\SkemaPkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArsipPkmPkpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$arsipPkmPkp = DB::table('arsip_pkm_pkp2')
									->join('skema_pkm', 'arsip_pkm_pkp2.skema_pkm', '=', 'skema_pkm.id')
									->select('arsip_pkm_pkp2.*', 'skema_pkm.skema')
									->get();
			
			if(Auth::user()->hasRole('student')){
				return view('students.arsip_pkm.pkp.index', [
					'arsipPkmPkp' => $arsipPkmPkp
				]);
			} elseif (Auth::user()->hasRole('admin')) {
				return view('admins.arsip_pkm.pkp.index', [
					'arsipPkmPkp' => $arsipPkmPkp
				]);
			}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$skemaPkm = SkemaPkm::all();

			return view('admins.arsip_pkm.pkp.create', [
				'skemaPkm' => $skemaPkm,
			]);
			return view('admins.arsip_pkm.pkp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$arsipPkpPkp = new ArsipPkmPkp();

			$arsipPkpPkp->user_id = auth()->user()->email;
			$arsipPkpPkp->nama_universitas = $request->nama_universitas;
			$arsipPkpPkp->judul_pkm = $request->judul_pkm;
			$arsipPkpPkp->link_karya = $request->link_karya;
			$arsipPkpPkp->skema_pkm = $request->skema_pkm;
			$arsipPkpPkp->nama_ketua = $request->nama_ketua;
			$arsipPkpPkp->save();
		
			return redirect('/arsip-pkm-pkp')->with('success', 'Arsip baru berhasil disimpan');
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
			$skemaPkm = SkemaPkm::all();
			$arsipPkmPkp = DB::table('arsip_pkm_pkp2')
									->join('skema_pkm', 'arsip_pkm_pkp2.skema_pkm', '=', 'skema_pkm.id')
									->where('arsip_pkm_pkp2.id_pkp', '=', $id)
									->select('arsip_pkm_pkp2.*', 'skema_pkm.skema')
									->get()->first();

			return view('admins.arsip_pkm.pkp.edit', [
				'arsipPkmPkp' => $arsipPkmPkp,
				'skemaPkm' => $skemaPkm,
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
			$arsipPkpPkp = ArsipPkmPkp::where('id_pkp', $id)->first();
				
			$arsipPkpPkp->nama_universitas = $request->nama_universitas;
			$arsipPkpPkp->judul_pkm = $request->judul_pkm;
			$arsipPkpPkp->link_karya = $request->link_karya;
			$arsipPkpPkp->skema_pkm = $request->skema_pkm;
			$arsipPkpPkp->nama_ketua = $request->nama_ketua;
			$arsipPkpPkp -> update();
			
			return redirect('/arsip-pkm-pkp')->with('success', 'Arsip berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$arsipPkmPkp = ArsipPkmPkp::where('id_pkp', $id)->first();
  		$arsipPkmPkp->delete();

      return back()->with('success', 'Arsip berhasil dihapus');
    }
}
