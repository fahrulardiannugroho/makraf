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

								<div class="row">
										<div class="col">

										</div>

										<div class="col-12 col-md-9">
												<h2 class="font-semibold text-xl"> {{ $listPembimbing->nama_dosen }} </h2>
												<p>{{ $listPembimbing->departemen }}</p>
												<p>{{ $listPembimbing->email }}</p>
												
												<h2 class="font-semibold text-xl mt-5">Mata Kuliah Diampu</h2>
												<p>{{ $listPembimbing->daftar_matkul_diajar }}</p>

												<h2 class="font-semibold text-xl mt-5">Rekam Jejak Bimbingan</h2>
												@if ($listPembimbing->rekam_jejak_bimbingan == null)
												<p>-</p>
												@else
												<p>{{ $listPembimbing->rekam_jejak_bimbingan }}</p>
												@endif

												<a href="{{ url("/list-pembimbing") }}" class="btn btn-sm btn-dark mt-5 mb-3">< Kembali</a>
										</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
