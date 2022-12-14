@extends('layouts.default')

@section('title', 'Home Warga')

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
	<div class="col-xl-12">
		<!-- begin panel -->
		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Data Laporan</h4>
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
				@if (session('status'))
                    <div class="alert alert-success fade show">
                        <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                @endif
				{{-- @if(!$namart)
					<div class="alert alert-danger fade show">
						Data Ketua RT belum ada
					</div>
				@else --}}
					{{-- <div class="alert alert-info fade show">
						Nama Ketua RT : {{$namart->name}} <br>
						No Telp : {{$namart->notelp}}

					</div> --}}
					<button type="button" class="btn btn-info m-b-10" data-toggle="modal" data-target="#modal-tambah-laporan">Buat Laporan</button>
					<table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th width="1%">No</th>
								<th width="1%">Detail</th>
								<th class="text-nowrap">Gambar</th>
								<th class="text-nowrap">Map</th>
								<th class="text-nowrap">Judul</th>
								<th class="text-nowrap">Laporan</th>
								<th class="text-nowrap">Tanggal</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Progress</th>
								<th class="text-nowrap" width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							@foreach($laporan as $p)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center"><button class="btn btn-info" onClick="details({{$p->id}});"><i class="fa fa-eye"></i></button></td>
                                <td><a href="../upload/{{$p->gambar}}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('upload/'.$p->gambar) }}" alt="" height="50" width="50"> </a></td>
                                <td>
									<a href="https://maps.google.com/?q={{$p->lat}},{{$p->long}}" target="_blank">
										<button type="button" class="btn btn-lime"> <em class="fas fa-map-marker-alt mr-1"></em> Lokasi</button>
									</a>
								</td>
								<td>{{ $p->judul }}</td>
                                <td>{{ $p->laporan }}</td>
                                <td>{{ $p->created_at }}</td>
								<td>@if($p->status == 'menunggu') <span class="badge bg-warning" style="font-size: 14px;">Menunggu</span> @else <span class="badge bg-success" style="font-size: 14px;">Direspon</span> @endif
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
								</td>
                                <td>
									@if($p->aksi !== 'menunggu')
										<span class="badge {{$warna}}" style="font-size: 14px;">{{ strtoupper($p->aksi) }}</span> 
									@else
										<span class="badge {{$warna}}" style="font-size: 14px;">Tidak Ada</span> 
									@endif
								</td>
								<td>
									@if($p->status !== 'direspon')
										<button onClick="ubahlaporan({{$p->id}});" class="btn btn-warning">Ubah</button>
										{{-- <a href="{{ route('warga.dashboard-warga.show', ['id' => $p->id	]) }}" class="btn btn-warning">Ubah</a> --}}
										<form action="{{ route('warga.dashboard-warga.destroy', ['id' => $p->id]) }}" method="post">
											<input class="btn btn-danger" type="submit" value="Hapus" />
											@method('delete')
											@csrf
										</form>
									@endif
									{{-- <a href="{{ route('warga.dashboard-warga.destroy', ['id' => $p->id	]) }}" class="btn btn-danger">Hapus</a> --}}

								</td>
								
                            </tr>
                            @endforeach
						</tbody>
					</table>
				{{-- @endif --}}
				
			</div>
			<!-- end panel-body -->
		</div>
		<!-- end panel -->
	</div>
	<!-- end col-10 -->
</div>

<!-- #modal-dialog -->
<div class="modal modal-message fade" id="modal-tambah-laporan">
	<div class="modal-dialog">
		<form method="post" action="{{ route('warga.dashboard-warga.store') }}"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="headertitle">Buat Laporan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
				</div>
				<div class="modal-body">
					<label class="control-label">judul <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('judul') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="judul" name="judul" class="form-control" required>
							@if ($errors->has('judul'))
								<span class="help-block">
									<strong>{{ $errors->first('judul') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<label class="control-label">isi laporan <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('laporan') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<textarea rows="4" id="laporan" name="laporan" class="form-control" required></textarea>
							@if ($errors->has('laporan'))
								<span class="help-block">
									<strong>{{ $errors->first('laporan') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<label class="control-label">gambar <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('gambar') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="file" name="gambar" id="gambar" accept="image/*" required>
							@if ($errors->has('gambar'))
								<span class="help-block">
									<strong>{{ $errors->first('gambar') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div style="border:2px solid red; padding:10px; border-radius: 10px;">
						<label class="control-label">Cari Titik by Nama Jalan/Lokasi Terdekat <span class="text-danger">*</span></label>
						<div class="row row-space-10">
							<div class="col-md-12 m-b-15">
								<input type="text" id="address" class="form-control">
								<button type="button" id="find-address" class="btn btn-info">Cari Alamat</button>
							</div>
						</div>
						
						<input type="hidden" id="lat" name="lat">
						<input type="hidden" id="long" name="long">
						
						<div style="height: 400px">
							<div id="map" style="height: 100%; width:100%;"></div>
						</div>
					</div>
						
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-warning">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- #modal-dialog -->
<div class="modal modal-message fade" id="modal-ubah-laporan">
	<div class="modal-dialog">

		{{-- <form id="formeditlaporan" enctype="multipart/form-data"> --}}
		<form method="post" id="formeditlaporan" action="{{ route('warga.dashboard-warga.update',['id' => 110]) }}"  enctype="multipart/form-data">
			{{-- {{ csrf_field() }} --}}
			@method('put')
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="headertitle">Ubah Laporan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
				</div>
				<div class="modal-body">
					<label class="control-label">judul <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('judul') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="edit-judul" name="judul" class="form-control" required>
							@if ($errors->has('judul'))
								<span class="help-block">
									<strong>{{ $errors->first('judul') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<label class="control-label">isi laporan <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('laporan') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<textarea rows="4" id="edit-laporan" name="laporan" class="form-control" required></textarea>
							@if ($errors->has('laporan'))
								<span class="help-block">
									<strong>{{ $errors->first('laporan') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<label class="control-label">gambar <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('gambar') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="file" name="gambar" id="edit-gambar" accept="image/*" >
							@if ($errors->has('gambar'))
								<span class="help-block">
									<strong>{{ $errors->first('gambar') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div style="border:2px solid red; padding:10px; border-radius: 10px;">
						<label class="control-label">Cari Titik by Nama Jalan/Lokasi Terdekat <span class="text-danger">*</span></label>
						<div class="row row-space-10">
							<div class="col-md-12 m-b-15">
								<input type="text" id="edit-address" class="form-control">
								<button type="button" id="edit-find-address" class="btn btn-info">Cari Alamat</button>
							</div>
						</div>
						
						<input type="hidden" id="edit-lat" name="lat">
						<input type="hidden" id="edit-long" name="long">
						
						<div style="height: 400px">
							<div id="edit-map" style="height: 100%; width:100%;"></div>
						</div>
					</div>
						
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					<button type="submit" id="btnubahlaporan" class="btn btn-warning">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- #modal-dialog -->
<div class="modal fade" id="modal-cek-detail">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Progress Laporan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
				</div>
				<div class="modal-body">
					<ul id="detaildata">

					</ul>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
				</div>
			</div>
	</div>
</div>

@endsection



@push('scripts')

<script>


	function details(id) {
		$('#modal-cek-detail').modal('show');
		$.getJSON('/api/cek-detail/'+id,function(data){
			$('#detaildata').html('');
			$.each(data,function(x,y){
				$('#detaildata').append('<li> Tgl.<em>'+y.created_at+'</em> | <strong>'+y.keterangan+'</strong></li>');
			})
		})
	}

	function ubahlaporan(id) {
		console.log(id);
		$('#modal-ubah-laporan').modal('show');
		// console.log(window.location.origin+'dashboard-warga/')
		api = window.location.origin
		$.getJSON(api+'/warga/dashboard-warga/'+id,function(data){
			console.log(data);
			$('#edit-judul').val(data.judul);
			$('#edit-laporan').val(data.laporan);
			$('#formeditlaporan').attr('action',api+'/warga/dashboard-warga/'+id);
		})

		// $('#btnubahlaporan').click(function(){

		// 	window.location.href = id
		// 	// window.location.href = "{{URL::to('restaurants/20')}}"
		// })


	}

	var longitude, latitude, map;

	$('#find-address').click(function() {
		var address = $('#address').val();
		var addressClean = address.replace(/\s+/g, '+');

		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({address: addressClean}, function(results, status) {
		if (status == 'OK') {
				console.log(results);
				longitude = results[0].geometry.location.lng();
				latitude = results[0].geometry.location.lat();
				document.getElementById("long").value = longitude;
				document.getElementById("lat").value = latitude;
				// geocoder is asynchronous, do this in the callback function
				longitude = $("input#long").val();
				latitude = $("input#lat").val();

				if (longitude && latitude) {
				longitude = parseFloat(longitude);
				latitude = parseFloat(latitude);

				initMap(longitude, latitude);
				}
			} else 
			alert("alamat tidak ditemukan")
		});

	})

	$('#edit-find-address').click(function() {
		var editaddress = $('#edit-address').val();
		var editressClean = editaddress.replace(/\s+/g, '+');

		var editgeocoder = new google.maps.Geocoder();
		editgeocoder.geocode({address: editressClean}, function(results, status) {
		if (status == 'OK') {
				console.log(results);
				longitude = results[0].geometry.location.lng();
				latitude = results[0].geometry.location.lat();
				document.getElementById("edit-long").value = longitude;
				document.getElementById("edit-lat").value = latitude;
				// geocoder is asynchronous, do this in the callback function
				longitude = $("input#edit-long").val();
				latitude = $("input#edit-lat").val();

				if (longitude && latitude) {
				longitude = parseFloat(longitude);
				latitude = parseFloat(latitude);

				initMap(longitude, latitude);
				}
			} else 
			alert("alamat tidak ditemukan")
		});
	})

	function initMap(longitude,latitude) {
		const myLatlng = { lat: -1.2586, lng: 116.850 };
		const myLatlng2 = { lat: latitude, lng: longitude };
		const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 14,
			center: (longitude == null) ? myLatlng : myLatlng2,
		});

		const editmap = new google.maps.Map(document.getElementById("edit-map"), {
			zoom: 14,
			center: (longitude == null) ? myLatlng : myLatlng2,
		});
		
		// Create the initial InfoWindow.
		let infoWindow = new google.maps.InfoWindow({
			content: "Click the map to get Lat/Lng!",
			position: (longitude == null) ? myLatlng : myLatlng2,
		});

		// infoWindow.open(map);
		var marker = new google.maps.Marker({
			position: (longitude == null) ? myLatlng : myLatlng2,
			map: map,
			draggable: true,
			title: "Where's your garden?"
		});

		var editmarker = new google.maps.Marker({
			position: (longitude == null) ? myLatlng : myLatlng2,
			map: editmap,
			draggable: true,
			title: "Where's your garden?"
		});
		// Configure the click listener.
		map.addListener("click", (mapsMouseEvent) => {

			let location = mapsMouseEvent.latLng.toJSON()
			$('#lat').val(location.lat);
			$('#long').val(location.lng);
			const markerlatlong = new google.maps.LatLng(location.lat, location.lng);

    		marker.setPosition(markerlatlong);
		});
		editmap.addListener("click", (mapsMouseEvent) => {

			let location = mapsMouseEvent.latLng.toJSON()
			$('#edit-lat').val(location.lat);
			$('#edit-long').val(location.lng);
			const markerlatlong = new google.maps.LatLng(location.lat, location.lng);

			editmarker.setPosition(markerlatlong);
		});
	}


	window.initMap = initMap;
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ-1y-BBvUB-BDzkYwOqBjXVKziiNg5yI&callback=initMap"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ-1y-BBvUB-BDzkYwOqBjXVKziiNg5yI&callback=editMap"></script> --}}

<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

@endpush