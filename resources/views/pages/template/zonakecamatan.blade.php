@extends('layouts.default')

@section('title', 'Zona Kecamatan')

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
<h1 class="page-header">Zona Kecamatan <small></small></h1>
<!-- end page-header -->
<div class="row">
	<!-- begin col-6 -->

	<!--  -->
	<div class="col-xl-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Tabel Zona Kecamatan</h4>
				<div class="panel-heading-btn">
					<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success reloadalltabel"
						data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
						data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
				</div>
			</div>
			<!-- end panel-heading -->
			<!-- begin panel-body -->
			<div class="panel-body">
				<button type="button" class="btn btn-success m-r-5 m-b-5" id="btn_create"><i class="fa fa-file"></i>
					Create</button>
				<table id="tabel_zonakecamatan"
					class="table table-striped table-bordered table-hover table-td-valign-middle" width="100%">
					<thead>
						<tr>
							<th width="1%" data-orderable="false">Id Kecamatan</th>
							<th class="text-nowrap">Nama KecamataN</th>
							<th class="text-nowrap">Luas M2</th>
							<th class="text-nowrap">Alamat</th>
							<th class="text-nowrap">Telepon</th>
							<th class="text-nowrap">Foto Kantor</th>
							<th class="text-nowrap">Nama PejabaT</th>
							<th class="text-nowrap" data-orderable="false"></th>

						</tr>
					</thead>
				</table>
			</div>
			<!-- end panel-body -->
		</div>
		<!-- end panel -->
	</div>
	<!--  -->

</div>
<!-- #modal-dialog -->
<div class="modal fade in" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Zona Kecamatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body" id="isi">
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">ID Kecamatan</label>
					<div class="col-md-9">
						<input type="text" class="form-control m-b-5" placeholder="Id Kecamatan">
					</div>
				</div>
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">Nama Kecamatan</label>
					<div class="col-md-9">
						<input type="text" class="form-control m-b-5" placeholder="Nama Kecamatan">
					</div>
				</div>
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">Luas M2</label>
					<div class="col-md-9">
						<input type="text" class="form-control m-b-5" placeholder="Luas M2">
					</div>
				</div>
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">Alamat</label>
					<div class="col-md-9">
						<input type="text" class="form-control m-b-5" placeholder="Alamat">
					</div>
				</div>
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">Telepon</label>
					<div class="col-md-9">
						<input type="text" class="form-control m-b-5" placeholder="Telepon">
					</div>
				</div>
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">Foto Kantor</label>
					<div class="col-md-9">
						<input type="file" class="form-control m-b-5" placeholder="Foto Kantor">
					</div>
				</div>
				<div class="form-group row m-b-15">
					<label class="col-form-label col-md-3">Nama Pejabat</label>
					<div class="col-md-9">
						<input type="text" class="form-control m-b-5" placeholder="Nama Pejabat">
					</div>
				</div>
			</div>
			<button type="button" id="btn_simpan_zonakecamatan" class="btn btn-success">Submit</button>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script src="/assets/js/demo/referensi.js?n=111111111111111111111111111111"></script>
<script>
	$(document).ready(function () {
		var table = $('#tabel_zonakecamatan').DataTable({
			responsive: true,
			ajax: "public/api_referensi/api.php?case=zonakecamatan",
			// "iDisplayLength": 5,
			columns: [{
					data: "id_kecamatan"
				},
				{
					data: "nama_kecamatan"
				},
				{
					data: "luas_m2"
				},
				{
					data: "alamat"
				},
				{
					data: "telepon"
				},
				{
					data: "foto_kantor"
				},
				{
					data: "nama_pejabat"
				},
				{
					data: null
				},
			],
			columnDefs: [{
				"targets": -1,
				// "data": "id",
				"render": function (data, type, row) {
					return ' <button onclick="edit(\'' + row["id_kecamatan"] +
						'\')" class="btn btn-warning " type="button" ><i class="fa fa-edit"></i></button> <button onclick="pdf(\'' +
						row["id"] +
						'\')" class="btn btn-danger " type="button" ><i class="fa fa-trash-alt"></i></button>  ';
				},
			}, ],
		});
		$(".reloadalltabel").click(function () {
			table.ajax.reload();
		})
	})

	function edit(id) {
		swal(id);
	}

	$("#btn_create").click(function () {
		$("#modal-dialog").modal('show');
	});
</script>
@endpush