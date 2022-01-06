<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Pembimbing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
								<table class="table table-borderless table-striped">
									<thead>
											<th>Foto</th>
											<th>Nama Lengkap</th>
											<th>Departemen</th>
											<th>Aksi</th>
									</thead>
									<tbody>
									@foreach($listPembimbing as $index => $lp)
											<tr>
												<td>[Foto]</td>
												<td> {{ $lp->nama_dosen }} </td>
												<td> {{ $lp->departemen }} </td>
												<td>
													<div class="col-4"><a class="btn btn-sm btn-outline-primary" href="{{ url("/list-pembimbing/detail", $lp->id) }}" title="Detail">Detail</a></div>
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
