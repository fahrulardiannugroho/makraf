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

										<a href="{{ url("/submission/create") }}" class="btn btn-sm btn-dark mb-5"><i class="bi bi-plus"></i> Buat Submission</a>

                    <h3>Riwayat Submission</h3>

										<table class="table table-striped">
												<thead>
														<th>#</th>
														<th>Skema PKM</th>
														<th>Jenis Karya</th>
														<th>Status</th>
														<th>Aksi</th>
												</thead>
												<tbody>
												@foreach($submission as $index => $sb)
														<tr>
															<td> {{ $index + 1 }} </td>
															<td> {{ $sb->skema }} </td>
															<td> {{ $sb->jenis_karya }} </td>
															<td>
																@if ($sb->status_review == 1)
																	<span class="badge bg-dark">
																		{{ $sb->status }}
																	</span>
																@elseif($sb->status_review == 2)
																	<span class="badge bg-success">
																		{{ $sb->status }}
																	</span>
																@else 
																	<span class="badge bg-warning">
																		{{ $sb->status }}
																	</span>
																@endif

															</td>
															<td>
																<div class="col-4"><a class="btn btn-sm btn-outline-primary" href="{{ url("/submission/detail", $sb->id) }}" title="Detail">Detail</a></div>
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