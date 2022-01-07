<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lowongan Tim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


								<form method="post" action="{{ url("/lowongan-tim") }}" enctype="multipart/form-data">
										{{ csrf_field() }}

										<div class="form-group row mb-3">
											<label for="judul_lowongan" class="col-sm-2 col-form-label">Judul Lowongan</label>
											<div class="col-sm-10">
												<input name="judul_lowongan" type="text" class="form-control" id="judul_lowongan" required>
											</div>
										</div>

										<input name="nama_mahasiswa" type="text" value="{{ $kawanMahasiswa->nama_mahasiswa }}" class="form-control" id="nama_mahasiswa" required hidden>

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
											<label for="kriteria_calon" class="col col-form-label">Kriteria Calon</label>
											<div class="col-12 col-md-10">
												<textarea name="kriteria_calon" class="form-control" id="kriteria_calon" style="height: 200px"></textarea>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-sm btn-outline-dark">Submit</button>
												<a href="/submission" class="btn btn-sm" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
