@extends('layouts.default')

@section('title', 'Edit Aksi')

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
					<h4 class="panel-title">Edit Laporan - {{$laporan->judul}}</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
                <a href="{{ route('warga.dashboard-warga.index') }}" class="btn btn-warning">Kembali</a>
                    <br/><br/>
                <form method="post" class="margin-bottom-0" action="{{ route('warga.dashboard-warga.update', ['id' => $laporan->id]) }}">
                    {{-- {{ csrf_field() }} --}}
					@method('put')
					@csrf
                            <label class="control-label">judul <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('judul') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{$laporan->judul}}">
                                </div>
                            </div>

                            <label class="control-label">isi laporan <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('laporan') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" class="form-control" id="laporan" name="laporan" value="{{$laporan->laporan}}">
                                </div>
                            </div>

                            <div class="register-buttons">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Edit</button>
                            </div>

                            <hr />
                           
                        </form>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>

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