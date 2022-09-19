@extends('layouts.layermap', ['contentFullWidth' => true, 'contentInverseMode' => true])

@section('title', 'Google Map')

@push('css')
	{{-- <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" /> --}}
	{{-- <link href="/assets/plugins/superbox/superbox.min.css" rel="stylesheet" /> --}}
	<link href="/assets/plugins/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Map</a></li>
		<li class="breadcrumb-item active">Google Map</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header text-white"> &nbsp;</h1>
	<div class="page-header">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="form-plugins-7" style="width: 80%">
		</div>
		<!-- end panel -->
	</div>
	<!-- end page-header -->
	<div class="map-content">
		<div class="btn-group map-btn pull-right">
			<button type="button" class="btn btn-inverse" id="map-theme-text">Default Theme</button>
			<button type="button" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></button>
			<div class="dropdown-menu dropdown-menu-right" id="map-theme-selection">
				<a href="javascript:;" data-map-theme="default" class="dropdown-item">Default</a>
				<a href="javascript:;" data-map-theme="flat" class="dropdown-item">Flat</a>
				<a href="javascript:;" data-map-theme="turquoise-water" class="dropdown-item">Turquoise Water</a>
				<a href="javascript:;" data-map-theme="icy-blue" class="dropdown-item">Icy Blue</a>
				<a href="javascript:;" data-map-theme="cobalt" class="dropdown-item">Cobalt</a>
				<a href="javascript:;" data-map-theme="old-dry-mud" class="dropdown-item">Old Dry Mud</a>
				<a href="javascript:;" data-map-theme="dark-red" class="dropdown-item">Dark Red</a>
			</div>
		</div>
	</div>
	<div class="map-content" id="content-menu" style="top: 250px;" hidden>
		<div class="map-btn pull-left">
			<div class="col-xl-12">
				<div class="panel panel-inverse" style="background: transparent;">

					<div class="panel-heading-btn">
						<button class="btn btn-sm btn-icon btn-circle btn-danger pull-right" id="content-menu-hidden"><i class="fa fa-times"></i></button>
					</div>
					
					<div class="panel-body">
						<a href="#modal-penghuni" class="btn btn-lg btn-warning" data-toggle="modal">
							<span class="d-flex align-items-center text-left">
								<i class="fab fa fa-id-badge fa-3x mr-3 text-black"></i>
								<span>
									<span class="d-block mb-n1"><b>Data Penghuni</b></span>
									<span class="f-s-12 f-w-600 text-white-transparent-7 menu-idbangunan">-information-</span>
								</span>
							</span>
						</a>
						<a href="#modal-bangunan" class="btn btn-lg btn-purple" data-toggle="modal">
							<span class="d-flex align-items-center text-left">
								<i class="fab fa fa-home fa-3x mr-3 text-black"></i>
								<span>
									<span class="d-block mb-n1"><b>Data Bangunan</b></span>
									<span class="f-s-12 f-w-600 text-white-transparent-7 menu-idbangunan">-information-</span>
								</span>
							</span>
						</a>
					</div>

					<div id="gallery" class="gallery">
						<div class="image gallery-group-1" style="width: 100%">
							<div class="image-inner" id="isi-gambar"></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<input type="hidden" class="menu-idbangunan" id="data-modalbangunan">
	<div class="map">
		<div id="google-map-default" class="height-full width-full"></div>

			<div class="map-float-table d-none d-xl-block p-15" style="left: 200px; top:25px; max-height: 11%; width: 60%; ">
				<h6 class="m-t-0 text-white"><i class="fa fa-th-list text-white m-r-5"></i>Teritory <small class="text-white" id="info-box">...</small>
					 {{-- | <i class="fa fa-home text-white m-r-5"></i> Tampil Bangunan   --}}
					{{-- <div class="switcher switcher-danger" style="right: 5px;">
						<input type="checkbox" name="switch_bangunan" id="switch_bangunan" value="1">
						<label for="switch_bangunan" style="height: 20px;"></label>
					</div> --}}
				</h6>
				
				<table class="table table-transparent">
						<thead>
							<tr>
								{{-- nothing --}}
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select class="form-control text-white bg-success" id="selectKecamatan" data-size="10" data-live-search="true" data-style="btn-success">
										<option value="" selected>Select a Kecamatan</option>
										<option value="ALL">ALL</option>
										<option value="balikpapan barat">Balikpapan Barat</option>
										<option value="balikpapan kota">Balikpapan Kota</option>
										<option value="balikpapan selatan">Balikpapan Selatan</option>
										<option value="balikpapan tengah">Balikpapan Tengah</option>
										<option value="balikpapan timur">Balikpapan Timur</option>
										<option value="balikpapan utara">Balikpapan Utara</option>
									</select>
								</td>
								<td>
									<select class="form-control text-white bg-success" id="selectKelurahan" data-size="10" data-live-search="true" data-style="btn-success">
										<option value="" selected>Select a Kelurahan</option>
									</select>
								</td>
								<td>
									<select class="form-control text-white bg-success" id="selectRT" data-size="10" data-live-search="true" data-style="btn-success">
										<option value="" selected>Select a RT</option>
									</select>
								</td>
								<td><button type="button" id="btnShowMAP" class="btn btn-primary">Tampilkan</button></td>
							</tr>
						</tbody>
				</table>
			</div>
		
		  <button id="btn_modal_bangunan" class="btn_modal" data-toggle="modal" data-target="#modal-bangunan"></button>

		<div id="info-content-show" hidden>
			<div id="div-infowilayah" class="map-float-table d-none d-xl-block p-15">
				<h4 class="m-t-0 text-white"><i class="fa fa-map-marker-alt text-danger m-r-5"></i> -- <b id="info-wilayah">Map Info Location</b> --</h4>
				{{-- <a href="#modal-penghuni" class="btn btn-sm btn-success" data-toggle="modal">Demo Penghuni</a> --}}

				<!-- begin scrollbar -->
				<div data-scrollbar="true" class="height-md">
					
					<table class="table table-transparent">
						<tbody id="content-wilayah">
							
						</tbody>
					</table>
				</div>
				<!-- end scrollbar -->
			</div>
		</div>

	</div>

	<div class="modal fade" id="modal-penghuni">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-dark">Detail Penghuni | <small class="menu-idbangunan"></small></h4>
						<button type="button" class="btn btn-danger btn-icon btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					</div>
					<div class="modal-body">
						<div class="col-md-8 form-group">
							<label for="selectKK"> No KK : </label>
							<select class="form-control" id="selectKK">	</select>
						</div>
						<!-- begin col-6 -->
						<div class="col-xl-12">
						<!-- begin #accordion -->
							<div id="accordion" class="accordion">
								<!-- begin card -->
								<div class="card">
									<div class="card-header pointer-cursor d-flex align-items-center" data-toggle="collapse" data-target="#collapseOne">
										<i class="fa fa-info-circle fa-fw text-blue mr-2 f-s-8"></i> SOSIAL
									</div>
									<div id="collapseOne" class="collapse" data-parent="#accordion">
										<div class="card-body">
												<div class="table-responsive table-sales" style="margin-top:0px;">
													<table class="table">
														<tbody>
															<tr>
																<td>
																	<i class="fa fa-list-alt"></i>
																</td>
																<td>Jenis fasilitas kesehatan yang paling sering digunakan rumah tangga
																	<ul>
																		<li><span id="sosial_item0"></span></li>
																	</ul>
																</td>
																<td class="text-right">
																	
																</td>
															</tr>
															<tr>
																<td>
																	<i class="fa fa-list-alt"></i>
																</td>
																<td>Lokasi/letak fasilitas kesehatan yang sering digunakan rumah tangga
																	<ul>
																		<li>
																			<span id="sosial_item1"></span>
																		</li>
																	</ul>
																</td>
																<td class="text-right">
																	
																</td>
															</tr>
															<tr>
																<td>
																	<i class="fa fa-list-alt"></i>
																</td>
																<td>Lokasi SD/ sederajat dan SMP / sederajat
																	<ul>
																		<li><span id="sosial_item2"></span></li>
																		<li><span id="sosial_item3"></span></li>
																		<li><span id="sosial_item4"></span></li>
																	</ul>
																</td>
																<td class="text-right">
																</td>
															</tr>

														</tbody>
													</table>
												</div>
										</div>
									</div>
								</div>
								<!-- end card -->
								<!-- begin card -->
								<div class="card">
									<div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseTwo">
										<i class="fa fa-balance-scale fa-fw text-indigo mr-2 f-s-8"></i> EKONOMI
									</div>
									<div id="collapseTwo" class="collapse" data-parent="#accordion">
										<div class="card-body">
												<div class="table-responsive table-sales" style="margin-top:0px;">
													<table class="table">
															<tbody>
																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Mata pencarian utama rumah tangga
																		<ul>
																			<li><span id="ekonomi_item0"></span></li>
																		</ul>
																	</td>
																	<td class="text-right">
																		
																	</td>
																</tr>
																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Total penghasilan keluarga
																		<ul>
																			<li>
																				<span id="ekonomi_item1"></span>
																			</li>
																		</ul>
																	</td>
																	<td class="text-right">
																		
																	</td>
																</tr>
																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Total pengeluaran keluarga
																		<ul>
																			<li>
																				<span id="ekonomi_item2"></span>
																			</li>
																		</ul>
																	</td>
																	<td class="text-right">
																		
																	</td>
																</tr>
																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Jumlah Televisi
																		<ul>
																			<li><span id="ekonomi_item3"></span></li>
																		</ul>
																	</td>
																	<td class="text-right">
																	</td>
																</tr>

																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Jumlah Kulkas
																		<ul>
																			<li><span id="ekonomi_item4"></span></li>
																		</ul>
																	</td>
																	<td class="text-right">
																	</td>
																</tr>

																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Jumlah Motor
																		<ul>
																			<li><span id="ekonomi_item5"></span></li>
																		</ul>
																	</td>
																	<td class="text-right">
																	</td>
																</tr>
																<tr>
																	<td>
																		<i class="fa fa-list-alt"></i>
																	</td>
																	<td>Jumlah Mobil
																		<ul>
																			<li><span id="ekonomi_item6"></span></li>
																		</ul>
																	</td>
																	<td class="text-right">
																	</td>
																</tr>

															</tbody>
													</table>
												</div>
										</div>
									</div>
								</div>
								<!-- end card -->
								<!-- begin card -->
								<div class="card">
									<div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseThree">
										<i class="fa fa-building fa-fw text-teal mr-2 f-s-8"></i> ANGGOTA
									</div>
									<div id="collapseThree" class="collapse" data-parent="#accordion">
										<div class="card-body">
												<div id="accordion-penghuni" role="tablist">
												</div>
										</div>
									</div>
								</div>
								<!-- end card -->
							</div>
						<!-- end #accordion -->
						</div>
				<!-- end col-6 -->
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
						{{-- <a href="javascript:;" class="btn btn-success">Action</a> --}}
					</div>
				</div>
			</div>
		</div>

	<div class="modal fade" id="modal-bangunan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-dark">Detail Bangunan | <small class="menu-idbangunan"></small></h4>
					<button type="button" class="btn btn-danger btn-icon btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				</div>
				<div class="modal-body">
					<!-- begin col-6 -->
					<div class="col-xl-12">
					<!-- begin #accordion -->
						<div id="accordion2" class="accordion">
							<!-- begin card -->
							<div class="card">
								<div class="card-header pointer-cursor d-flex align-items-center" data-toggle="collapse" data-target="#collapseOne">
									<i class="fa fa-info-circle fa-fw text-blue mr-2 f-s-8"></i> DETAIL
								</div>
								<div id="collapseOne" class="collapse show" data-parent="#accordion2">
									<div class="card-body">
											<div class="table-responsive table-sales" style="margin-top:0px;">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Kecamatan</td>
															<td class="text-right">
																<span id="detail1"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Kelurahan</td>
															<td class="text-right">
																<span id="detail2"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Jalan</td>
															<td class="text-right">
																<span id="detail3"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>RT</td>
															<td class="text-right">
																<span id="detail4"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Nama Area Perumahan</td>
															<td class="text-right">
																<span id="detail5"></span>
															</td>
														</tr>

														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Nama / No Gang </td>
															<td class="text-right">
																<span id="detail6"></span>
															</td>
														</tr>

														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>No Bangunan</td>
															<td class="text-right">
																<span id="detail7"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Nama Jenis Bangunan</td>
															<td class="text-right">
																<span id="detail8"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Ket Jenis Bangunan</td>
															<td class="text-right">
																<span id="detail9"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Jumlah KK</td>
															<td class="text-right">
																<span id="detail10"></span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									</div>
								</div>
							</div>
							<!-- end card -->
							<!-- begin card -->
							<div class="card">
								<div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseTwo">
									<i class="fa fa-balance-scale fa-fw text-indigo mr-2 f-s-8"></i> PENGUASAAN
								</div>
								<div id="collapseTwo" class="collapse" data-parent="#accordion2">
									<div class="card-body">
											<div class="table-responsive table-sales" style="margin-top:0px;">
												<table class="table">
													<tbody>
													
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>No Sertivikasi Lahan</td>
															<td class="text-right">
																<span id="penguasaan_item0"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Status Bangunan</td>
															<td class="text-right">
																<span id="penguasaan_item1"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Status Lahan</td>
															<td class="text-right">
																<span id="penguasaan_item2"></span>
															</td>
														</tr>

														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Legalitas Bangunan </td>
															<td class="text-right">
																<span id="penguasaan_item3"></span>
															</td>
														</tr>

														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Legalitas Lahan</td>
															<td class="text-right">
																<span id="penguasaan_item4"></span>
															</td>
														</tr>

													</tbody>
												</table>
											</div>
									</div>
								</div>
							</div>
							<!-- end card -->
							<!-- begin card -->
							<div class="card">
								<div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseThree">
									<i class="fa fa-building fa-fw text-teal mr-2 f-s-8"></i> UTILITY
								</div>
								<div id="collapseThree" class="collapse" data-parent="#accordion2">
									<div class="card-body">
											<div class="table-responsive table-sales" style="margin-top:0px;">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Sumber Penerangan</td>
															<td class="text-right">
																<span id="utility_item0"></span>
															</td>
														</tr>
														<tr style="display: none;">
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Daya Listrik</td>
															<td class="text-right">
																<span id="utility_item1"></span> Watt
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Sumber Air</td>
															<td class="text-right">
																<span id="utility_item2"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Drainase</td>
															<td class="text-right">
																<span id="utility_item3"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Jenis Kloset</td>
															<td class="text-right">
																<span id="utility_item4"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td class="text-Left" colspan="2">
																<span id="utility_item5"></span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									</div>
								</div>
							</div>
							<!-- end card -->
							<!-- begin card -->
							<div class="card">
								<div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseFour">
									<i class="fa fa-flag fa-fw text-info mr-2 f-s-8"></i> KETERATURAN
								</div>
								<div id="collapseFour" class="collapse" data-parent="#accordion2">
									<div class="card-body">
											<div class="table-responsive table-sales" style="margin-top:0px;">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Bangunan Hunian Memiliki akses langsung ke jalan</td>
															<td class="text-right">
																<span id="keteraturan_item0"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Posisi muka bangunan menghadap langsung ke jalan</td>
															<td class="text-right">
																<span id="keteraturan_item1"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Posisi bangunan langsung menghadap sungai</td>
															<td class="text-right">
																<span id="keteraturan_item2"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Bangunan hunian berada di atas lahan sempadan sungai</td>
															<td class="text-right">
																<span id="keteraturan_item3"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Bangunan hunian berada di daerah buangan limbah pabrik</td>
															<td class="text-right">
																<span id="keteraturan_item4"></span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									</div>
								</div>
							</div>
							<!-- end card -->
							<!-- begin card -->
							<div class="card">
								<div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseFive">
									<i class="fa fa-thumbs-up fa-fw text-warning mr-2 f-s-8"></i> KELAYAKAN
								</div>
								<div id="collapseFive" class="collapse" data-parent="#accordion2">
									<div class="card-body">
											<div class="table-responsive table-sales" style="margin-top:0px;">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Luas Lantai Bangunan Hunian</td>
															<td class="text-right">
																<span id="kelayakan_item0"></span> m2
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Panjang</td>
															<td class="text-right">
																<span id="kelayakan_item1"></span> m
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Lebar</td>
															<td class="text-right">
																<span id="kelayakan_item2"></span> m
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Jumlah Lantai</td>
															<td class="text-right">
																<span id="kelayakan_item3"></span>
															</td>
														</tr>
														<tr style="display: none;">
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Jumlah Penghuni Bangunan</td>
															<td class="text-right">
																<span id="kelayakan_item4"></span>
															</td>
														</tr>
														<tr style="display: none;">
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Luas Lantai Bangunan Hunian/Jiwa</td>
															<td class="text-right">
																<span id="kelayakan_item5"></span> m2/jiwa
															</td>
														</tr>
														<tr style="display: none;">
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Kondisi Atap</td>
															<td class="text-right">
																<span id="kelayakan_item6"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Kondisi Dinding Terluas</td>
															<td class="text-right">
																<span id="kelayakan_item7"></span>
															</td>
														</tr>
														<tr>
															<td>
																<i class="fa fa-list-alt"></i>
															</td>
															<td>Jenis Lantai Terluas</td>
															<td class="text-right">
																<span id="kelayakan_item8"></span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									</div>
								</div>
							</div>
							<!-- end card -->
						</div>
					<!-- end #accordion -->
					</div>
			<!-- end col-6 -->
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					{{-- <a href="javascript:;" class="btn btn-success">Action</a> --}}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> --}}
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ-1y-BBvUB-BDzkYwOqBjXVKziiNg5yI"></script>
	<script src="https://cdn.rawgit.com/googlemaps/js-map-label/gh-pages/src/maplabel.js"></script>
	{{-- <script src="/assets/plugins/superbox/jquery.superbox.min.js"></script> --}}
	<script src="/assets/plugins/isotope-layout/dist/isotope.pkgd.min.js"></script>
	<script src="/assets/plugins/lightbox2/dist/js/lightbox.min.js"></script>
	<script src="/assets/js/demo/gallery.demo.js"></script>
	<script src="/assets/js/map-spasial.js?n=12123231"></script>
	{{-- <script src="/assets/js/demo/gallery-v2.demo.js"></script> --}}
	
	

	{{-- form plugins --}}
	{{-- <script src="/assets/plugins/select2/dist/js/select2.min.js"></script> --}}
]
@endpush