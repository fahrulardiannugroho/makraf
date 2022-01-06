<?php

namespace App\Http\Controllers;

use App\Models\DosenPembimbing;
use App\Models\SkemaPkm;
use App\Models\StatusReview;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			// $submission = DB::table('submission')->get();
			$submission = DB::table('submission')
									->join('skema_pkm', 'submission.skema_pkm', '=', 'skema_pkm.id')
									->join('status_submission', 'submission.status_review', '=', 'status_submission.id')
									->join('list_pembimbing', 'submission.dosen_pembimbing', '=', 'list_pembimbing.id')
									->where('submission.user_id', '=', auth()->user()->email)
									->select('submission.*', 'skema_pkm.skema', 'status_submission.status', 'list_pembimbing.nama_dosen')
									->get();

			return view('students.submission.index', [
				'submission' => $submission
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
			$dosenPembimbing = DosenPembimbing::all();
			$skemaPkm = SkemaPkm::all();

			return view('students.submission.create', [
				'dosenPembimbing' => $dosenPembimbing,
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
			$submission = new Submission();

			$request->validate([
				'karya' => 'mimes:pdf|max:10240',
			]);
			
			$file = $request->file('karya');
			$nama_file = time()."_".$file->getClientOriginalName();	

			// folder tempat  file diupload
			$tujuan_upload = 'files';
			$file->move($tujuan_upload,$nama_file);

			$submission->user_id = auth()->user()->email;
			$submission->skema_pkm = $request->skema_pkm;
			$submission->dosen_pembimbing = $request->list_pembimbing;
			$submission->jenis_karya = $request->jenis_karya;
			$submission->karya = $nama_file;
			$submission->pesan_khusus = $request->pesan_khusus;
			$submission->status_review = 1;
			$submission->save();
		
			return redirect('/submission')->with('success', 'Data berhasil terkirim untuk direview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

			$submission = DB::table('submission')
									->where('submission.id', '=', $id)
									->join('skema_pkm', 'submission.skema_pkm', '=', 'skema_pkm.id')
									->join('status_submission', 'submission.status_review', '=', 'status_submission.id')
									->join('list_pembimbing', 'submission.dosen_pembimbing', '=', 'list_pembimbing.id')
									->select('submission.*', 'skema_pkm.skema', 'status_submission.status', 'list_pembimbing.nama_dosen')
									->get()->first();

			return view('students.submission.detail', [
			'submission' => $submission
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
