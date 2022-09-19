@extends('layouts.default')

@section('title', 'Tambah User')

@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')

	<!-- begin row -->
	<div class="row">
		<!-- begin col-10 -->
		<div class="col-xl-12">
			<!-- begin panel -->
			<div class="panel panel-primary">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Tambah - User</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
                <form method="POST" class="margin-bottom-0" action="{{ route('admin.sa-user-store') }}">
                        {{ csrf_field() }}

                            <label class="control-label">role <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('role') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    {{-- <input type="text" id="role" name="role" class="form-control" placeholder="role" value="{{ old('role') }}" /> --}}
                                    <select class="form-control" name="role" id="role" required>
                                        <option value="">Pilih Role</option>
                                        <option value="reviewer">Reviewer</option>
                                        <option value="warga">Warga</option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <label class="control-label">Name <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}"  />
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <label class="control-label">nik <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('nik') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" id="nik" name="nik" class="form-control" placeholder="nik" value="{{ old('nik') }}" />
                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <label class="control-label">password <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" />
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <label class="control-label">email <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <label class="control-label">no telepon <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('notelp') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="number" id="notelp" name="notelp" class="form-control" placeholder="notelp" value="{{ old('notelp') }}"  />
                                    @if ($errors->has('notelp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('notelp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>
                           
                            <div class="register-buttons">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Daftar</button>
                            </div>

                            <hr />

                </form>
                <a href="{{ route('admin.sa-user-index') }}" class="btn btn-danger">Kembali</a>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
@endsection

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/js/demo/table-manage-responsive.demo.js"></script>
    
@endpush