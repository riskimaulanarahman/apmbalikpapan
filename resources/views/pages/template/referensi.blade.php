@extends('layouts.default')

@section('title', 'Tabel Referensi')

@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<!-- <ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
		<li class="breadcrumb-item active">Managed Tables</li>
	</ol> -->
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Tabel Referensi <small></small></h1>
	<!-- end page-header -->
	<div class="row">
		<!-- begin col-6 -->
	
<!--  -->
<div class="col-xl-12">
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<!-- begin panel-heading -->
		<div class="panel-heading">
			<h4 class="panel-title">Tabel Jalan</h4>
			<div class="panel-heading-btn">
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a> -->
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
			</div>
		</div>
		<!-- end panel-heading -->
		<!-- begin panel-body -->
		<div class="panel-body">
			<table id="tabel_jalan" class="table table-striped table-bordered table-hover table-td-valign-middle" width="100%">
				<thead>
					<tr>
						<th width="1%" data-orderable="false">ID Jalan</th>
						<th class="text-nowrap" >nama jalan utama</th>
						<th class="text-nowrap" >lebar jalan</th>
						<th class="text-nowrap" >panjang jalan km</th>
						<th class="text-nowrap" >kelurahan yang dilalui</th>
						<th class="text-nowrap" >kecamatan yang dilalui</th>
						<th class="text-nowrap" >prosentase aspal</th>
						<th class="text-nowrap" >prosentase krikil</th>
						<th class="text-nowrap" >prosentase rigid</th>
						<th class="text-nowrap" >prosentase tanah</th>
					</tr>
				</thead>
			</table>
		</div>
		<!-- end panel-body -->
	</div>
	<!-- end panel -->
</div>
<!--  -->
<div class="col-xl-6">
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<!-- begin panel-heading -->
		<div class="panel-heading">
			<h4 class="panel-title">Tabel Jenis Atap</h4>
			<div class="panel-heading-btn">
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a> -->
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
			</div>
		</div>
		<!-- end panel-heading -->
		<!-- begin panel-body -->
		<div class="panel-body">
		<button type="button" class="btn btn-success" id="btn_tambah_jenisatap" data-toggle="modal" data-title="Tambah Jenis Atap"><i class="fa fa-folder"></i> New</button>
			<table id="tabel_jenis_atap" class="table table-striped table-bordered table-hover table-td-valign-middle" width="100%">
				<thead>
					<tr>
						<th width="1%" data-orderable="false">ID Jenis Atap</th>
						<th class="text-nowrap" >Jenis Atap Terluas</th>
						
					</tr>
				</thead>
			</table>
		</div>
		<!-- end panel-body -->
	</div>
	<!-- end panel -->
</div>
</div>
<!-- #modal-dialog -->
<div class="modal fade" id="modal-dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"></h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body" id="isi">
								</div>
								<button type="button" id="simpan_jenisatap" class="btn btn-success" >Simpan</button>
							</div>
						</div>
					</div>

@endsection

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/js/demo/referensi.js?n=111111111111111111111111111111"></script>
@endpush