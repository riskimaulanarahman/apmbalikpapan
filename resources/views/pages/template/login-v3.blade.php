@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'Login Page')

@section('content')
	<!-- begin login -->
	<div class="login login-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-11.jpg)"></div>
			<div class="news-caption">
				<h4 class="caption-title"><b>Color</b> Admin App</h4>
				<p>
					Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
			</div>
		</div>
		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin login-header -->
			<div class="login-header">
				<div class="brand">
					<span class="logo"></span> <b>Color</b> Admin
					<small>responsive bootstrap 4 admin template</small>
				</div>
				<div class="icon">
					<i class="fa fa-sign-in-alt"></i>
				</div>
			</div>
			<!-- end login-header -->
			<!-- begin login-content -->
			<div class="login-content">
				<form method="POST" class="margin-bottom-0" action="{{ route('login') }}">
				{{ csrf_field() }}

					<div class="form-group m-b-15">
						<!-- <input type="text" class="form-control form-control-lg" placeholder="Email Address" required /> -->
						<input id="login" type="text"
                                    class="form-control form-control-lg {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="login" value="{{ old('username') ?: old('email') }}"  placeholder="Email Address | username" required autofocus>
						@if ($errors->has('username') || $errors->has('email'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
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
					<div class="checkbox checkbox-css m-b-30">
						<input type="checkbox" id="remember_me_checkbox" value="" name="remember" {{ old('remember') ? 'checked' : '' }} />
						<label for="remember_me_checkbox">
						Remember Me
						</label>
					</div>
					<div class="login-buttons">
						<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
					</div>
					<div class="m-t-20 m-b-40 p-b-40 text-inverse">
						Not a member yet? Click <a href="register_v3.html">here</a> to register.
					</div>
					<hr />
					<p class="text-center text-grey-darker mb-0">
						&copy; Color Admin All Right Reserved 2019
					</p>
				</form>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end right-container -->
	</div>
	<!-- end login -->
@endsection
