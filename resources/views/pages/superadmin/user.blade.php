@extends('layouts.default')

@section('title', 'Master User')

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
					<h4 class="panel-title">Data User</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin alert -->
				@if (session('status'))
					<div class="alert alert-info">
						{{ session('status') }}
					</div>
				@endif
				<!-- end alert -->
				<!-- begin panel-body -->
				<div class="panel-body">
                <a href="{{ route('admin.sa-user-tambah') }}" class="btn btn-primary">Input User Baru</a>
                    <br/><br/>
					<table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th width="1%">#</th>
								<th class="text-nowrap">name</th>
								<th class="text-nowrap">nik</th>
								<th class="text-nowrap">email</th>
								<th class="text-nowrap">password</th>
								<th class="text-nowrap">role</th>
								{{-- <th class="text-nowrap">kecamatan</th>
								<th class="text-nowrap">kelurahan</th> --}}
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($user as $p)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->pass_txt }}</td>
                                <td>{{ $p->role }}</td>
								{{-- @if($p->kecamatan !== null) <td>{{ $p->kecamatan->nama_kecamatan }}</td> @else <td></td> @endif
								@if($p->kelurahan !== null) <td>{{ $p->kelurahan->nama_kelurahan }}</td> @else <td></td> @endif --}}
                                <td>
									{{-- @if($p->isActive == 0) <button class="btn btn-danger">Tidak Aktif</button> @else <button class="btn btn-success">Aktif</button> @endif --}}
									@if(($p->isValid == 0) && ($p->role !== 'admin')) 
										<button class="btn btn-danger">Belum Verifikasi</button> 
									@else
										<button class="btn btn-success">Verifikasi</button> 
									@endif
								</td>
                                <td>
                                    <a href="{{ route('admin.sa-user-edit', ['id' => $p->id_users]) }}" class="btn btn-warning">Edit</a> 
									{{-- 1411 --}}
									@if($p->role !== 'admin')
                                    <a href="{{ route('admin.sa-user-deleted', ['id' => $p->id_users ]) }}" onclick="return confirm('Apakah Anda Yakin Hapus data ini ?');" class="btn btn-danger">Hapus</a>
									@endif
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
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