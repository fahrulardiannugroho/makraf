<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kawan Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
								<table class="table table-striped table-borderless">
									<thead>
											<th>Foto Profil</th>
											<th>Nama Lengkap</th>
											<th>Semester</th>
											<th>Aksi</th>
									</thead>
									<tbody>
									@foreach($kawanMahasiswa as $index => $km)
											<tr>
												<td>
													@if ($km->avatar == null)
													<img src="{{url('/images/avatar.jpg')}}" width="50" alt="Image"/>
													@else
													<img src="{{url('/images/'.$km->avatar)}}" width="50" alt="Image"/>
													@endif
												</td>
												<td> {{ $km->nama_mahasiswa }} </td>
												<td> {{ $km->semester }} </td>
												<td>
													<div class="col-4"><a class="btn btn-sm btn-outline-primary" href="{{ url("/kawan-mahasiswa/detail", $km->username) }}" title="Detail">Detail</a></div>
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
