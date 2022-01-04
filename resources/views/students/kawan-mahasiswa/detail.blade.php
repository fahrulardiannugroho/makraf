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

								<a href="{{ url("/kawan-mahasiswa") }}" class="btn btn-sm btn-dark mb-3">< Kembali</a>

								<ul class="list-group">
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Nama Lengkap</div>
											<div class="col"> <b>{{ $kawanMahasiswa->nama }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Fakultas</div>
											<div class="col"> <b>{{ $kawanMahasiswa->fakultas }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Jurusan</div>
											<div class="col"> <b>{{ $kawanMahasiswa->jurusan }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Semester</div>
											<div class="col"> <b>{{ $kawanMahasiswa->semester }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Jenis Kelamin</div>
											<div class="col"> <b>{{ $kawanMahasiswa->jenis_kelamin }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Prestasi</div>
											<div class="col"> <b>{{ $kawanMahasiswa->prestasi }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Email</div>
											<div class="col"> <b>{{ $kawanMahasiswa->email }}</b> </div>
										</div>
									</li>
								</ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
