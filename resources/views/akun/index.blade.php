<x-app-layout>
		@if ($message = Session::get('success'))
		<div class="alert alert-primary" role="alert">
			{{ $message }}
		</div>
		@endif
		
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Akun') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 bg-white border-b border-gray-200">
									<h2 class="font-semibold text-xl mb-3">Informasi Akun</h2>

									<hr class="mb-3">

									<p>Username: <b>{{ Auth::user()->name }}</b></p>
									<p>Email: <b>{{ Auth::user()->email }}</b></p>
                </div>
            </div>

						<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

								<h2 class="font-semibold text-xl mb-3">Ubah Password</h2>

								<hr class="mb-3">

								<form method="POST" action="{{ route('account-update') }}">
										{{ method_field('PUT') }}	
										@csrf

										<!-- Current Password -->
										<div class="mb-3">
												<x-label for="current_password">Current Password</x-label>
												<x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" />
										
												@error('current_password')
													<div class="text-danger mt-2 text-sm">{{ $message }}</div>
												@enderror
										</div>

										<!-- Password -->
										<div class="mb-3">
												<x-label for="password">Password</x-label>
												<x-input id="password" class="block mt-1 w-full" type="password" name="password" />
										
												@error('password')
													<div class="text-danger mt-2 text-sm">{{ $message }}</div>
												@enderror
										</div>

										<!-- Password Confirmation -->
										<div class="mb-3">
												<x-label for="password_confirmation">Konfirmasi Password</x-label>
												<x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
										
												@error('password_confirmation')
													<div class="text-danger mt-2 text-sm">{{ $message }}</div>
												@enderror
										</div>

										<x-button class="mt-3">
												{{ __('Perbarui') }}
										</x-button>
								</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
