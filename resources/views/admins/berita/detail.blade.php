<x-app-layout>

		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postingan Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<h2 class="font-semibold text-xl">{{ $postinganBerita->judul_postingan_berita }}</h2>
										<small>Penulis: {{ $postinganBerita->penulis }} </small>

										<img src="{{url('/images/'.$postinganBerita->gambar_postingan_berita)}}" width="500" alt="Image" class="mt-5 mb-5"/>

										<p> {{ $postinganBerita->isi_postingan_berita }} </p>

										<a href="/berita" class="btn btn-sm btn-dark mt-5" > < Kembali </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
