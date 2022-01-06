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
								
								<div class="alert alert-primary" role="alert">
									Hubungi mahasiswa melalui email jika ingin mengajak bergabung dalam tim
								</div>

								<div class="row">
										<div class="col">
												@if ($kawanMahasiswa->avatar == null)
												<img src="{{url('/images/avatar.jpg')}}" alt="Image"/>
												@else
												<img src="{{url('/images/'.$kawanMahasiswa->avatar)}}" alt="Image"/>
												@endif
										</div>

										<div class="col-12 col-md-9">
												<h2 class="font-semibold text-xl"> {{ $kawanMahasiswa->nama_mahasiswa }} </h2>
												<p>{{ $kawanMahasiswa->fakultas }}</p>
												<p>{{ $kawanMahasiswa->jurusan }}</p>
												<p>Semester {{ $kawanMahasiswa->semester }}</p>
												<p>{{ $kawanMahasiswa->jenis_kelamin }}</p>
												<p>{{ $kawanMahasiswa->email }}</p>

												<h2 class="font-semibold text-xl mt-5">Prestasi</h2>
												<p>{{ $kawanMahasiswa->prestasi }}</p>

												<a href="{{ url("/kawan-mahasiswa") }}" class="btn btn-sm btn-dark mt-5 mb-3">< Kembali</a>
										</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
