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


								<form method="post" enctype="multipart/form-data" action="{{ url('/submission-mahasiswa/detail/tambah-saran', $id) }}">
										{{ method_field('PUT') }}
										{{ csrf_field() }}

										<div class="form-group row mb-3">
											<label for="saran_reviewer" class="col col-form-label">Hasil review</label>
											<div class="col-12 col-md-10">
												<textarea name="saran_reviewer" class="form-control" id="saran_reviewer" style="height: 400px"></textarea>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-md-10">
												<button type="submit" class="btn btn-sm btn-outline-dark">Kirim Hasil Review</button>
												<a href="/submission-mahasiswa/detail/{{ $id }}" class="btn btn-sm" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
