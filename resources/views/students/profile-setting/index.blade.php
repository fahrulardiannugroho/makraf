<x-app-layout>
		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
						<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
										<nav>
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
												<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Profil Saya</button>
												
												@if ($profilSaya)
													@if ($profilSaya->username == Auth::user()->name)
													<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-update-profile" type="button" role="tab" aria-controls="nav-update-profile" aria-selected="false">Update Profil</button>
													@endif
												@else
													<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-store-profile" type="button" role="tab" aria-controls="nav-store-profile" aria-selected="false">Lengkapi Profil</button>
												@endif
											</div>
										</nav>
										<div class="tab-content" id="nav-tabContent">
											<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
													<div class="mt-3">
															<div class="row">
																@if ($profilSaya)
																<div class="col">
																		@if ($profilSaya->avatar == null)
																		<img src="{{url('/images/avatar.jpg')}}" alt="Image"/>
																		@else
																		<img src="{{url('/images/'.$profilSaya->avatar)}}" alt="Image"/>
																		@endif
																</div>

																<div class="col-12 col-md-9">
																		<h2 class="font-semibold text-xl"> {{ $profilSaya->nama_mahasiswa }} </h2>
																		<p>{{ $profilSaya->fakultas }}</p>
																		<p>{{ $profilSaya->jurusan }}</p>
																		<p>Semester {{ $profilSaya->semester }}</p>
																		<p>{{ $profilSaya->jenis_kelamin }}</p>
																		<p>{{ $profilSaya->email }}</p>

																		<h2 class="font-semibold text-xl mt-5">Prestasi</h2>
																		<p>{{ $profilSaya->prestasi }}</p>
																</div>
																@else
																		<p>Tidak ada data</p>
																@endif
															</div>
													</div>
											</div>
											<div class="tab-pane fade" id="nav-store-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
													<form method="post" action="{{ url("/user/profile-setting") }}" enctype="multipart/form-data" class="mt-3">
															{{ csrf_field() }}

															<div class="mb-3 row">
																<label for="avatar" class="form-label col">Foto Profil</label>
																<div class="col-12 col-md-9">
																	<input name="avatar" class="form-control" type="file" id="avatar">
																</div>
															</div>

															<input name="username" type="text" value="{{ Auth::user()->name }}" class="form-control" id="username" hidden>

															<div class="form-group row mb-3">
																<label for="nama_mahasiswa" class="col col-form-label">Nama Lengkap</label>
																<div class="col-12 col-md-9">
																	<input name="nama_mahasiswa" type="text" class="form-control" id="nama_mahasiswa" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="fakultas" class="col col-form-label">Fakultas</label>
																<div class="col-12 col-md-9">
																	<input name="fakultas" type="text" class="form-control" id="fakultas" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="jurusan" class="col col-form-label">Jurusan</label>
																<div class="col-12 col-md-9">
																	<input name="jurusan" type="text" class="form-control" id="jurusan" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="semester" class="col col-form-label">Semester</label>
																<div class="col-12 col-md-9">
																	<input name="semester" type="number" min="0" class="form-control" id="semester" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="jenis_kelamin" class="col col-form-label">Jenis Kelamin</label>
																<div class="col-12 col-md-9">
																	<select name="jenis_kelamin" class="form-select" required>
																		<option selected>Pilih Jenis Kelamin</option>
																		<option value="pria">Pria</option>
																		<option value="wanita">Wanita</option>
																	</select>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="email" class="col col-form-label">Email</label>
																<div class="col-12 col-md-9">
																	<input name="email" type="text" value="{{ Auth::user()->email }}" class="form-control" id="email" readonly>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="prestasi" class="col col-form-label">Prestasi</label>
																<div class="col-12 col-md-9">
																	<textarea name="prestasi" class="form-control" placeholder="Tuliskan prestasi kamu disini..." id="prestasi" style="height: 200px"></textarea>
																</div>
															</div>

															<div class="form-group row mb-3">
																<div class="col"></div>
																<div class="col-12 col-md-9">
																	<button type="submit" class="btn btn-sm btn-outline-dark">Simpan</button>
																</div>
															</div>

													</form>
											</div>
											
											@if ($profilSaya)
											<div class="tab-pane fade" id="nav-update-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
													<form method="post" enctype="multipart/form-data" class="mt-3" action="{{ url("/user/profile-setting", $profilSaya->username) }}">
															{{ method_field('PUT') }}	
															{{ csrf_field() }}

															<div class="mb-3 row">
																<label for="avatar" class="form-label col">Foto Profil</label>
																<div class="col-12 col-md-9">
																	<input name="avatar" class="form-control" type="file" id="avatar">
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="nama_mahasiswa" class="col col-form-label">Nama Lengkap</label>
																<div class="col-12 col-md-9">
																	<input name="nama_mahasiswa" placeholder="{{ $profilSaya->nama_mahasiswa }}" type="text" class="form-control" id="nama_mahasiswa" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="fakultas" class="col col-form-label">Fakultas</label>
																<div class="col-12 col-md-9">
																	<input name="fakultas" type="text" placeholder="{{ $profilSaya->fakultas }}" class="form-control" id="fakultas" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="jurusan" class="col col-form-label">Jurusan</label>
																<div class="col-12 col-md-9">
																	<input name="jurusan" type="text" placeholder="{{ $profilSaya->jurusan }}" class="form-control" id="jurusan" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="semester" class="col col-form-label">Semester</label>
																<div class="col-12 col-md-9">
																	<input name="semester" type="number" min="0" placeholder="{{ $profilSaya->semester }}" class="form-control" id="semester" required>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="jenis_kelamin" class="col col-form-label">Jenis Kelamin</label>
																<div class="col-12 col-md-9">
																	<select name="jenis_kelamin" class="form-select" required>
																		<option selected>{{ $profilSaya->jenis_kelamin }}</option>
																		<option value="pria">Pria</option>
																		<option value="wanita">Wanita</option>
																	</select>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="email" class="col col-form-label">Email</label>
																<div class="col-12 col-md-9">
																	<input name="email" type="text" value="{{ Auth::user()->email }}" class="form-control" id="email" readonly>
																</div>
															</div>

															<div class="form-group row mb-3">
																<label for="prestasi" class="col col-form-label">Prestasi</label>
																<div class="col-12 col-md-9">
																	<textarea name="prestasi" class="form-control" placeholder="{{ $profilSaya->prestasi }}" id="prestasi" style="height: 200px"></textarea>
																</div>
															</div>

															<div class="form-group row mb-3">
																<div class="col"></div>
																<div class="col-12 col-md-9">
																	<button type="submit" class="btn btn-sm btn-outline-dark">Perbarui</button>
																</div>
															</div>

													</form>
											</div>
											@endif
										</div>
								</div>
						</div>
        </div>
    </div>
</x-app-layout>
