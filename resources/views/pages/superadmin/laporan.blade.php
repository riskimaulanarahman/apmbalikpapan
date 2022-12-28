@extends('layouts.default')

@section('title', 'Laporan')

@push('css')
<!-- <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" /> -->
<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<style>
	@media (min-width: 992px) {
		.col-md-2 {
			max-width: 14.2%;
		}

	}
</style>
@endpush

@section('content')

<div class="row">
  <!-- begin col-10 -->
  <div class="col-xl-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Data Laporan Warga</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><em class="fa fa-expand"></em></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><em class="fa fa-redo"></em></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><em class="fa fa-minus"></em></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><em class="fa fa-times"></em></a>
				</div>
			</div>
			<!-- end panel-heading -->

			<!-- begin panel-body -->
			<div class="panel-body">
				@if (session('status'))
                    <div class="alert alert-success fade show">
                        <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                @endif
				
					<table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th width="1%">#</th>
								<th class="text-nowrap">nama</th>
								<th class="text-nowrap">judul</th>
								<th class="text-nowrap">laporan</th>
								<th class="text-nowrap">gambar</th>
								<th class="text-nowrap">map</th>
								<th class="text-nowrap">tanggal</th>
								<th class="text-nowrap">status</th>
								<th class="text-nowrap">progress</th>
								<th class="text-nowrap" width="15%">aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							@foreach($laporan as $p)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->laporan }}</td>
                                <td><a href="../upload/{{$p->gambar}}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('upload/'.$p->gambar) }}" alt="" height="50" width="50"> </a></td>
                                <td>
									<a href="https://maps.google.com/?q={{$p->lat}},{{$p->long}}" target="_blank">
										<button type="button" class="btn btn-lime"> <em class="fas fa-map-marker-alt mr-1"></em> Lokasi</button>
									</a>
								</td>
								<td>{{$p->created_at}}</td>
								<td>@if($p->status == 'menunggu') <span class="badge bg-warning" style="font-size: 12px">Menunggu</span> @else <span class="badge bg-success" style="font-size: 12px">Direspon</span> @endif
									@if($p->status == 'menunggu')
										<a href="{{ route('admin.responlaporan', ['id' => $p->id	]) }}" class="btn btn-info m-t-5">Respon</a>
									@endif
								</td>
								<td>
									@php
									if($p->aksi == "selesai") {
										$warna = "bg-success";
									} else if($p->aksi == "ditolak") {
										$warna = "bg-danger";
									} else if($p->aksi == "menunggu") {
										$warna = "bg-inverse";
									} else if($p->aksi == "proses") {
										$warna = "bg-info";
									} else {
										$warna = "bg-inverse";
									}
									@endphp
									@if($p->aksi !== "menunggu")
										<span class="badge {{$warna}}" style="font-size: 12px">{{ strtoupper($p->aksi) }}</span> 
									@else
										<span class="badge {{$warna}}" style="font-size: 12px">Tidak Ada</span> 
									@endif
								</td>
								<td>
									@if($p->status == 'direspon')
										@if($p->aksi !== 'selesai')
										<a href="{{ route('admin.showlaporan', ['id' => $p->id	]) }}"> 
											<button type="button" class="btn btn-warning"> Ubah</button>
										</a>
										@endif
									@endif
									<form action="{{ route('admin.deletelaporan', [$p->id]) }}" method="post">
										<input class="btn btn-danger" type="submit" value="Hapus" />
										@method('delete')
										@csrf
									</form>
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


@endsection



@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/js/demo/table-manage-responsive.demo.js"></script>
@endpush