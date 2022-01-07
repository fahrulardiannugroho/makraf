<x-app-layout>

		@if (!(Auth::user()->name == $lowonganTim->username))
		<div class="alert alert-primary" role="alert">
			Hubungi melalui email jika berminat bergabung dalam tim
		</div>	
		@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lowongan Tim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

								<h2 class="font-semibold text-xl mb-3">{{ $lowonganTim->judul_lowongan }}</h2>

								<ul class="list-group">
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Pembuat Lowongan</div>
											<div class="col"> <p>{{ $lowonganTim->nama_mahasiswa }}</p> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Email</div>
											<div class="col"> <p>{{ $lowonganTim->email }}</p> </div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-3">Skema PKM</div>
											<div class="col"> <p>{{ $lowonganTim->skema }}</p> </div>
										</div>
									</li>
								</ul>

								<h2 class="font-semibold text-xl mt-5">Kriteria Calon Anggota</h2>

								<div class="col"> <p>{{ $lowonganTim->kriteria_calon }}</p> </div>

								<a href="{{ url("/lowongan-tim") }}" class="btn btn-sm btn-dark mt-5 mb-3">< Kembali</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
