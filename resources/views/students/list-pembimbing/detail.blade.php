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
								
								<div class="alert alert-primary" role="alert">
									Hubungi dosen melalui email jika ingin meminta bantuan menjadi dosen pembimbing
								</div>

								<a href="{{ url("/list-pembimbing") }}" class="btn btn-sm btn-dark mb-3">< Kembali</a>

								<ul class="list-group">
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Nama Lengkap</div>
											<div class="col"> <b>{{ $listPembimbing->nama_dosen }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Departemen</div>
											<div class="col"> <b>{{ $listPembimbing->departemen }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Mata Kuliah Diampu</div>
											<div class="col"> <b>{{ $listPembimbing->daftar_matkul_diajar }}</b> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Email</div>
											<div class="col"> <b>{{ $listPembimbing->email }}</b> </div>
										</div>
									</li>
								</ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
