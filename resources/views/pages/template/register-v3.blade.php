@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'Register Page')

@section('content')
	<!-- begin register -->
	<div class="register register-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-15.jpg)"></div>
			<div class="news-caption">
				<h4 class="caption-title"><b>Color</b> Admin App</h4>
				<p>
					As a Color Admin app administrator, you use the Color Admin console to manage your organization’s account, such as add new users, manage security settings, and turn on the services you want your team to access.
				</p>
			</div>
		</div>
		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin register-header -->
			<h1 class="register-header">
				Sign Up
				<small>Create your Color Admin Account. It’s free and always will be.</small>
			</h1>
			<!-- end register-header -->
			<!-- begin register-content -->
			<div class="register-content">
				<form method="POST" class="margin-bottom-0" action="{{ route('register') }}">
				{{ csrf_field() }}

					<label class="control-label">Name <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required autofocus />
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<label class="control-label">username <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('username') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required />
							@if ($errors->has('username'))
								<span class="help-block">
									<strong>{{ $errors->first('username') }}</strong>
								</span>
							@endif
						</div>
					</div>
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
					<div class="checkbox checkbox-css m-b-30">
						<div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" id="agreement_checkbox" value="">
							<label for="agreement_checkbox">
							By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
							</label>
						</div>
					</div>
					<div class="register-buttons">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Daftar</button>
					</div>
					<div class="m-t-30 m-b-30 p-b-30">
						Already have an account? Click <a href="login_v3.html">here</a> to login.
					</div>
					<hr />
					<p class="text-center mb-0">
						&copy; Color Admin All Right Reserved 2019
					</p>
				</form>
			</div>
			<!-- end register-content -->
		</div>
		<!-- end right-content -->
	</div>
	<!-- end register -->
@endsection
