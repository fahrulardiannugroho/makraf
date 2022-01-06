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


								<form method="post" action="{{ url("/submission") }}" enctype="multipart/form-data">
										{{ csrf_field() }}
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
											<label for="list_pembimbing" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
											<div class="col-sm-10">
												<select name="list_pembimbing" style="width: 100%" id="list_pembimbing" required>
													<option></option>
													@foreach ($dosenPembimbing as $dp)
														<option value="{{ $dp->id }}"> {{ $dp->nama_dosen }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="jenis_karya" class="col-sm-2 col-form-label">Jenis Karya</label>
											<div class="col-sm-10">
												<input name="jenis_karya" type="text" class="form-control" id="jenis_karya" placeholder="Ex: Prposal PKM" required>
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="karya" class="col-sm-2 col-form-label">Upload Karya <sup>(pdf)</sup></label>
											<div class="col-sm-10">
												<input name="karya" id="karya" class="form-control" type="file" required>
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="pesan_khusus" class="col-sm-2 col-form-label">Pesan Khusus</label>
											<div class="col-sm-10">
												<input name="pesan_khusus" type="text" class="form-control" id="pesan_khusus" placeholder="Ex: Terima kasih" required>
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
