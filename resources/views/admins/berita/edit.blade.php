<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postingan Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


								<form method="post" action="{{ url('/berita/edit/'.$postinganberita->id_berita) }}" enctype="multipart/form-data">
										{{ method_field('PUT') }}
										{{ csrf_field() }}

										<div class="form-group row mb-3">
											<label for="gambar_postingan_berita" class="col-sm-2 col-form-label">Cover</sup></label>
											<div class="col-sm-10">
												<img src="{{url('/images/'.$postinganberita->gambar_postingan_berita)}}" width="300" alt="Image" class="mt-5 mb-5"/>
												<input name="gambar_postingan_berita" id="gambar_postingan_berita" class="form-control" type="file" required>
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="judul_postingan_berita" class="col-sm-2 col-form-label">Judul Berita</label>
											<div class="col-sm-10">
												<input name="judul_postingan_berita" placeholder="{{ $postinganberita->judul_postingan_berita }}" type="text" class="form-control" id="judul_postingan_berita" required>
											</div>
										</div>

										<div class="form-group row mb-3">
											<label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
											<div class="col-sm-10">
												<input name="penulis" type="text" placeholder="{{ $postinganberita->penulis }}" class="form-control" id="penulis" required>
											</div>
										</div>
										
										<div class="form-group row mb-3">
												<label for="isi_postingan_berita" class="col-sm-2 col-form-label">Isi Berita</label>
												<div class="col-12 col-md-10">
													<textarea name="isi_postingan_berita" class="form-control" placeholder="{{ $postinganberita->isi_postingan_berita }}" id="isi_postingan_berita" style="height: 400px"></textarea>
												</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-sm btn-outline-dark">Update</button>
												<a href="/berita" class="btn btn-sm" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
