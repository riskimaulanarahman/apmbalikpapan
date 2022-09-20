@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'Login Page')

@section('content')
	<!-- begin login -->
	<div class="login login-with-news-feed">
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin login-header -->
			<div class="login-header">
				<span><img style="max-width:50px; " src="{{URL::asset('assets/img/logo/logo_bpn.png')}}" alt=""></span> 
				<div class="brand">
					<b>APM Balikapapn</b>
				</div>
				<div class="icon">
					<i class="fa fa-sign-in-alt"></i>
				</div>
			</div>
			<!-- end login-header -->
			<!-- begin login-content -->
			<div class="login-content">
				<form method="POST" class="margin-bottom-0" action="{{ route('login') }}">
				<!-- <form method="POST" class="margin-bottom-0" action="{{ route('login') }}"> -->
				{{ csrf_field() }}

					<div class="form-group m-b-15">
						<!-- <input type="text" class="form-control form-control-lg" placeholder="Email Address" required /> -->
						<input id="login" type="text"
                                    class="form-control form-control-lg {{ $errors->has('nik') || $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="login" value="{{ old('nik') ?: old('email') }}"  placeholder="NIK / Email " required autofocus>
						@if ($errors->has('nik') || $errors->has('email'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('nik') ?: $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-b-15">
						<input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
					<!-- <div class="checkbox checkbox-css m-b-30">
						<input type="checkbox" id="remember_me_checkbox" value="" name="remember" {{ old('remember') ? 'checked' : '' }} />
						<label for="remember_me_checkbox">
						Remember Me
						</label>
					</div> -->
					<div class="login-buttons">
						<button type="submit" class="btn btn-primary btn-block btn-lg"> <i class="fa fa-sign-in-alt"></i> Masuk</button>
					</div>
					<div class="m-t-20">
						Belum Punya Akun? Klik <a href="/register">disini</a> untuk mendaftar.
					</div>
					<hr />
					<p class="text-center text-grey-darker mb-0">
						&copy; Institut Teknologi Kalimantan 2022 Ver 1.0
					</p>
				</form>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end right-container -->
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-4.jpg)"></div>
		</div>
		<!-- end news-feed -->
		
	</div>
	<!-- end login -->
@endsection
