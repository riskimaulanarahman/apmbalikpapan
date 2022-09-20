@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'Register')

@section('content')
	<!-- begin register -->
	<div class="register register-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-15.jpg)"></div>
			<div class="news-caption">
				<h4 class="caption-title"><b>APM</b> BALIKPAPAN</h4>
				<p>
                    Aplikasi Pengaduan Masyarakat
				</p>
			</div>
		</div>
		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin register-header -->
			<h1 class="register-header">
				Daftar
				<small>Warga silahkan membuat akun untuk login dan menggunakan fitur website ini !</small>
			</h1>
			<!-- end register-header -->
			<!-- begin register-content -->
			<div class="register-content">
				<form method="POST" class="margin-bottom-0" action="{{ route('register') }}">
				{{ csrf_field() }}

					<label class="control-label">nik <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('nik') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="nik" name="nik" class="form-control" placeholder="nik" value="{{ old('nik') }}" required />
							@if ($errors->has('nik'))
								<span class="help-block">
									<strong>{{ $errors->first('nik') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<label class="control-label">Nama <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus />
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<label class="control-label">no.telepon <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('notelp') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="number" id="notelp" name="notelp" class="form-control" placeholder="notelp" value="{{ old('notelp') }}" required />

							@if ($errors->has('notelp'))
								<span class="help-block">
									<strong>{{ $errors->first('notelp') }}</strong>
								</span>
							@endif
						</div>
					</div>
					{{-- <label class="control-label">nomor rt <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('nomor_rt') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<select class="form-control" name="nomor_rt" id="nomor_rt">
								<option value="">- Pilih Nomor RT-</option>
								@foreach($nort as $id => $nama)
									<option value="{{ $id }}" >{{$id}} ({{ trim($nama) }})</option>
								@endforeach

							</select>
							@if ($errors->has('nomor_rt'))
								<span class="help-block">
									<strong>{{ $errors->first('nomor_rt') }}</strong>
								</span>
							@endif
						</div>
					</div> --}}
					<label class="control-label">email <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required />
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<label class="control-label">password <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required />
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<label class="control-label">Confirm Password <span class="text-danger">*</span></label>
					<div class="row row-space-10">
						<div class="col-md-12 m-b-15">
							<input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Re-Password" required />
						</div>
					</div>
					<div class="register-buttons">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Daftar</button>
					</div>
					<div class="m-t-30 m-b-30 p-b-30">
						Sudah Mempunyai Akun ? Klik <a href="{{ route('login') }}">Disini</a> untuk Masuk.
					</div>
					<hr />
					<p class="text-center mb-0">
						&copy; Institut Teknologi Kalimantan 2022 Ver 1.0
					</p>
				</form>
			</div>
			<!-- end register-content -->
		</div>
		<!-- end right-content -->
	</div>
	<!-- end register -->
@endsection
