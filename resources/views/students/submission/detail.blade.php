<x-app-layout>

		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

								<ul class="list-group">
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Nama Mahasiswa</div>
											<div class="col"> <b>{{ $submission->nama_mahasiswa }}</b> </div>
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
														<span class="badge bg-primary">
															{{ $submission->status }}
														</span>
													@elseif($submission->status_review == 2)
														<span class="badge bg-warning">
															{{ $submission->status }}
														</span>
													@else 
														<span class="badge bg-success">
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

									<li class="list-group-item">
										<div class="row">
											<div class="col-3">File Karya</div>
											<div class="col">
												 <p>{{ $submission->karya }}</p>
												 <a target="_blank" href="{{url('/files/'.$submission->karya)}}" class="btn btn-sm btn-outline-dark">Download</a> 
											</div>
										</div>
									</li>

									@if (Auth::user()->hasRole('reviewer'))
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Ubah Status</div>
											<div class="col"> 
												<div class="row">
													<div class="col-3">
															<form method="POST" action="/submission-mahasiswa/detail/sedang-direview/{{$submission->id}}">
																	{{ method_field('POST') }}
																	{{ csrf_field() }}

																	<button onclick="return confirm('Ubah menjadi sedang direview?')" type="submit" class="btn btn-sm btn-outline-warning" title="Sedang Direview">Sedang Direview</button>
															</form>
													</div>
													<div class="col-3">
															<form method="POST" action="/submission-mahasiswa/detail/telah-direview/{{$submission->id}}">
																	{{ method_field('POST') }}
																	{{ csrf_field() }}

																	<button onclick="return confirm('Ubah menjadi telah direview?')" type="submit" class="btn btn-sm btn-outline-success" title="Telah Direview">Telah Direview</button>
															</form>
													</div>
												</div>	
											</div>
										</div>
									</li>
									@endif
									
								</ul>

								<h2 class="font-semibold mt-5 text-xl">Hasil Review</h2>
								@if($submission->saran_reviewer != null)
								<p class="mb-5">{{ $submission->saran_reviewer }}</p>
								@else
								<p class="mb-5">Belum ada review</p>
								@endif
								
								@if (Auth::user()->hasRole('student'))
								<a href="{{ url("/submission") }}" class="btn btn-sm btn-dark mt-3 mb-3">< Kembali</a>
								@elseif (Auth::user()->hasRole('reviewer'))
								<a href="{{ url("/submission-mahasiswa") }}" class="btn btn-sm btn-outline-dark mt-3 mb-3">< Kembali</a>
								<a href="{{ url('/submission-mahasiswa/detail/tambah-saran/'.$submission->id) }}" class="btn btn-sm btn-dark mt-3 mb-3">Kirim Hasil Review</a>
								@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
