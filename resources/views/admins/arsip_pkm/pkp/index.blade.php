<x-app-layout>

		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Arsip PKP2 PKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<a href="{{ url("/arsip-pkm-pkp/create") }}" class="btn btn-sm btn-dark mb-3"><i class="bi bi-plus"></i> Tambah Baru</a>

										<table class="table table-borderless table-striped">
												<thead>
														<th>#</th>
														<th>Nama Universitas</th>
														<th>Judul PKP</th>
														<th>Skema</th>
														<th>Nama Ketua</th>
														<th>Aksi</th>
												</thead>
												<tbody>
												@foreach($arsipPkmPkp as $index => $pkp)
														<tr>
															<td> {{ $index + 1 }} </td>
															<td width="10%"> {{ $pkp->nama_universitas }} </td>
															<td width="40%"> {{ $pkp->judul_pkm }} </td>
															<td width="25%"> {{ $pkp->skema }} </td>
															<td width="10%"> {{ $pkp->nama_ketua }} </td>
															<td width="15%">
																<div class="row">
																	<div class="col-2">
																		<a class="btn btn-sm btn-outline-primary" title="Visit" href="//{{ $pkp->link_karya }}" target="_blank" rel="nofollow" title="Detail"><i class="bi bi-eye-fill"></i></a>
																	</div>
																	<div class="col-2">
																		<a class="btn btn-sm btn-outline-warning" title="Update" href="{{ url("/arsip-pkm-pkp/edit", $pkp->id_pkp) }}" title="Detail"><i class="bi bi-pen-fill"></i></a>
																	</div>
																	<div class="col-2">
																		<form method="POST" action="/arsip-pkm-pkp/delete/{{$pkp->id_pkp}}">
																				{{ method_field('DELETE') }}
																				{{ csrf_field() }}
	
																				<button onclick="return confirm('Hapus Arsip?')" type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
																		</form>
																	</div>
																</div>
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
