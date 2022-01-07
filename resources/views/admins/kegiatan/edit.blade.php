<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


								<form method="post" action="{{ url('/kegiatan/edit/'.$postingankegiatan->id_kegiatan) }}" enctype="multipart/form-data">
										{{ method_field('PUT') }}
										{{ csrf_field() }}

										<div class="form-group row mb-3">
											<label for="gambar_postingan_kegiatan" class="col-sm-2 col-form-label">Cover</sup></label>
											<div class="col-sm-10">
												<img src="{{url('/images/'.$postingankegiatan->gambar_postingan_kegiatan)}}" height="100" alt="Image" class="mt-5 mb-5"/>
												<input name="gambar_postingan_kegiatan" id="gambar_postingan_kegiatan" class="form-control" type="file">
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="judul_postingan_kegiatan" class="col-sm-2 col-form-label">Judul Postingan</label>
											<div class="col-sm-10">
												<input name="judul_postingan_kegiatan" placeholder="{{ $postingankegiatan->judul_postingan_kegiatan }}" type="text" class="form-control" id="judul_postingan_kegiatan" required>
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
											<div class="col-sm-10">
												<input name="penulis" type="text" placeholder="{{ $postingankegiatan->penulis }}" class="form-control" id="penulis" required>
											</div>
										</div>
										
										<div class="form-group row mb-3">
												<label for="isi_postingan_kegiatan" class="col-sm-2 col-form-label">Isi Postingan</label>
												<div class="col-12 col-md-10">
													<textarea name="isi_postingan_kegiatan" class="form-control" placeholder="{{ $postingankegiatan->isi_postingan_kegiatan }}" id="isi_postingan_kegiatan" style="height: 400px"></textarea>
												</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-sm btn-outline-dark">Update</button>
												<a href="/kegiatan" class="btn btn-sm" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
