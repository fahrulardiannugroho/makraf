<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

								<a href="{{ url("/submission") }}" class="btn btn-sm btn-dark mb-3">< Kembali</a>

								<ul class="list-group">
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Nama Mahasiswa</div>
											<div class="col"> <b>{{ Auth::user()->name }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Skema PKM</div>
											<div class="col"> <b>{{ $submission->skema }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Dosen pembimbing</div>
											<div class="col"> <b>{{ $submission->nama_dosen }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Jenis Karya</div>
											<div class="col"> <b>{{ $submission->jenis_karya }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Status Submission</div>
											<div class="col"> 
													@if ($submission->status_review == 1)
														<span class="badge bg-dark">
															{{ $submission->status }}
														</span>
													@elseif($submission->status_review == 2)
														<span class="badge bg-success">
															{{ $submission->status }}
														</span>
													@else 
														<span class="badge bg-warning">
															{{ $submission->status }}
														</span>
																@endif
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Pesan Khusus</div>
											<div class="col"> <p>{{ $submission->pesan_khusus }}</p> </div>
										</div>
									</li>
									
									<h3 class="mt-3"><b>Link File Karya:</b></h3>
									<a target="_blank" href="{{ $submission->karya }}">{{ $submission->karya }}</a>
								</ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
