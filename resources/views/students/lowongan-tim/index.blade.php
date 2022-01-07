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
        <div class="mb-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<h2 class="font-semibold text-xl mb-3">Lowongan Saya</h2>

										<hr class="mb-3">		

										<a href="{{ url("/lowongan-tim/create") }}" class="btn btn-sm btn-dark mb-3"><i class="bi bi-plus"></i> Buat Lowongan Tim</a>

										<table class="table table-borderless table-striped">
												<thead>
														<th>Pembuat</th>
														<th>Judul Lowongan</th>
														<th>Skema PKM</th>
														<th>Aksi</th>
												</thead>
												<tbody>
												@foreach($lowonganTim as $index => $lt)
														<tr>
															<td> {{ $lt->nama_mahasiswa }} </td>
															<td> {{ $lt->judul_lowongan }} </td>
															<td> {{ $lt->skema }} </td>
															
															<td>
																<div class="col-4"><a class="btn btn-sm btn-outline-primary" href="{{ url("/lowongan-tim/detail", $lt->id_lowongan) }}" title="Detail">Detail</a></div>
															</td>
														</tr>
												@endforeach
												</tbody>
											</table>
                </div>
            </div>
        </div>

				<div class="mb-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<h2 class="font-semibold text-xl mb-3">Lowongan Aktif</h2>

										<hr class="mb-3">		

										<table class="table table-borderless table-striped">
												<thead>
														<th>Pembuat</th>
														<th>Judul Lowongan</th>
														<th>Skema PKM</th>
														<th>Aksi</th>
												</thead>
												<tbody>
												@foreach($lowonganTimAktif as $index => $lta)
														<tr>
															<td> {{ $lta->nama_mahasiswa }} </td>
															<td> {{ $lta->judul_lowongan }} </td>
															<td> {{ $lta->skema }} </td>
															
															<td>
																<div class="col-4"><a class="btn btn-sm btn-outline-primary" href="{{ url("/lowongan-tim/detail", $lta->id_lowongan) }}" title="Detail">Detail</a></div>
															</td>
														</tr>
												@endforeach
												</tbody>
											</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
