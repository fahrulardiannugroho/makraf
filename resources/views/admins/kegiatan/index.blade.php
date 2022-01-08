<x-app-layout>

		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postingan Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<a href="{{ url("/kegiatan/create") }}" class="btn btn-sm btn-dark mb-3"><i class="bi bi-plus"></i> Posting Kegiatan</a>

										<table class="table table-borderless table-striped">
												<thead>
														<th>#</th>
														<th>Cover</th>
														<th>Judul Kegiatan</th>
														<th>Nama Penulis</th>
														<th>Aksi</th>
												</thead>
												<tbody>
												@foreach($postinganKegiatan as $index => $pk)
														<tr>
															<td> {{ $index + 1 }} </td>
															<td> <img src="{{url('/images/'.$pk->gambar_postingan_kegiatan)}}" width="50" alt="Image"/> </td>
															<td width="50%"> {{ $pk->judul_postingan_kegiatan }} </td>
															<td> {{ $pk->penulis }} </td>
															<td>
																<div class="row">
																	<div class="col-2">
																		<a class="btn btn-sm btn-outline-primary" title="Detail" href="{{ url("/kegiatan/detail", $pk->id_kegiatan) }}" title="Detail"><i class="bi bi-eye-fill"></i></a>
																	</div>
																	<div class="col-2">
																		<a class="btn btn-sm btn-outline-warning" title="Update" href="{{ url("/kegiatan/edit", $pk->id_kegiatan) }}" title="Detail"><i class="bi bi-pen-fill"></i></a>
																	</div>
																	<div class="col-2">
																		<form method="POST" action="/kegiatan/delete/{{$pk->id_kegiatan}}">
																				{{ method_field('DELETE') }}
																				{{ csrf_field() }}
	
																				<button onclick="return confirm('Hapus postingan kegiatan?')" type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
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
