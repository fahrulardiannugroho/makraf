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
				@if (Auth::user()->hasRole('student'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<a href="{{ url("/submission/create") }}" class="btn btn-sm btn-dark mb-3"><i class="bi bi-plus"></i> Buat Submission</a>

										<table class="table table-borderless table-striped">
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
																	<span class="badge bg-primary">
																		{{ $sb->status }}
																	</span>
																@elseif($sb->status_review == 2)
																	<span class="badge bg-warning">
																		{{ $sb->status }}
																	</span>
																@else 
																	<span class="badge bg-success">
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
				@elseif (Auth::user()->hasRole('reviewer'))
				<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<table class="table table-borderless table-striped">
												<thead>
														<th>#</th>
														<th>Skema PKM</th>
														<th>Jenis Karya</th>
														<th>Status</th>
														<th>Aksi</th>
												</thead>
												<tbody>
												@foreach($allSubmission as $index => $asb)
														<tr>
															<td> {{ $index + 1 }} </td>
															<td> {{ $asb->skema }} </td>
															<td> {{ $asb->jenis_karya }} </td>
															<td>
																@if ($asb->status_review == 1)
																	<span class="badge bg-primary">
																		{{ $asb->status }}
																	</span>
																@elseif($asb->status_review == 2)
																	<span class="badge bg-warning">
																		{{ $asb->status }}
																	</span>
																@else 
																	<span class="badge bg-success">
																		{{ $asb->status }}
																	</span>
																@endif

															</td>
															<td>
																<div class="col-4"><a class="btn btn-sm btn-outline-primary" href="{{ url("/submission-mahasiswa/detail", $asb->id) }}" title="Detail">Detail</a></div>
															</td>
														</tr>
												@endforeach
												</tbody>
											</table>
                </div>
            </div>
        </div>
				@endif
    </div>
</x-app-layout>
