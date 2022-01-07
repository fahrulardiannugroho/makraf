<x-app-layout>

		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

										<h2 class="font-semibold text-xl">{{ $postinganKegiatan->judul_postingan_kegiatan }}</h2>
										<small>Penulis: {{ $postinganKegiatan->penulis }} </small>

										<img src="{{url('/images/'.$postinganKegiatan->gambar_postingan_kegiatan)}}" alt="Image" class="mt-5 mb-5"/>

										<p> {{ $postinganKegiatan->isi_postingan_kegiatan }} </p>

										<a href="/kegiatan" class="btn btn-sm btn-dark mt-5" > < Kembali </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
