<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Arsip PKM PKP2') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


								<form method="post" action="{{ url("/arsip-pkm-pkp/create") }}" enctype="multipart/form-data">
										{{ csrf_field() }}

										<div class="form-group row mb-3">
											<label for="nama_universitas" class="col-sm-2 col-form-label">Universitas</label>
											<div class="col-sm-10">
												<input name="nama_universitas" type="text" class="form-control" id="nama_universitas" required>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label for="judul_pkm" class="col-sm-2 col-form-label">Judul PKM</label>
											<div class="col-sm-10">
												<input name="judul_pkm" type="text" class="form-control" id="judul_pkm" required>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label for="link_karya" class="col-sm-2 col-form-label">Link Karya</label>
											<div class="col-sm-10">
												<input name="link_karya" type="text" class="form-control" id="link_karya" required>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label for="skema_pkm" class="col-sm-2 col-form-label">Skema PKM</label>
											<div class="col-sm-10">
												<select name="skema_pkm" style="width: 100%" id="id_kategori" required>
													<option></option>
													@foreach ($skemaPkm as $skema)
														<option value="{{ $skema->id }}"> {{ $skema->skema }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label for="nama_ketua" class="col-sm-2 col-form-label">Nama Ketua</label>
											<div class="col-sm-10">
												<input name="nama_ketua" type="text" class="form-control" id="nama_ketua" required>
											</div>
										</div>
										

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-sm btn-outline-dark">Simpan</button>
												<a href="/arsip-pkm-pkp" class="btn btn-sm" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
