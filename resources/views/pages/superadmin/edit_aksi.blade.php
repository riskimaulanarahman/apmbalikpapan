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
					<h4 class="panel-title">Update Aksi - {{$aksi->users->name}}</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
                <a href="{{ route('admin.laporan') }}" class="btn btn-warning">Kembali</a>
                    <br/><br/>
                <form method="post" class="margin-bottom-0" action="{{ route('admin.laporanupdateaksi', ['id' => $aksi->id]) }}">
                    {{ csrf_field() }}
                            <label class="control-label">judul <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('judul') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" class="form-control" value="{{$aksi->judul}}" readonly>
                                </div>
                            </div>

                            <label class="control-label">isi laporan <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('laporan') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" class="form-control" value="{{$aksi->laporan}}" readonly>
                                </div>
                            </div>
                            
                            <label class="control-label">aksi <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('aksi') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <select class="form-control" name="aksi" id="aksi" required>
                                        <option value="">- Pilih -</option>
                                        <option value="menunggu" @if($aksi->aksi == 'menunggu') selected @endif >Menunggu</option>
                                        <option value="proses" @if($aksi->aksi == 'proses') selected @endif >Proses</option>
                                        <option value="ditolak" @if($aksi->aksi == 'ditolak') selected @endif >Ditolak</option>
                                        <option value="selesai" @if($aksi->aksi == 'selesai') selected @endif >Selesai</option>
                                    </select>
                                    @if ($errors->has('aksi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('aksi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <label class="control-label">keterangan <span class="text-danger">*</span></label>
                            <div class="row row-space-10 {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                <div class="col-md-12 m-b-15">
                                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Full keterangan" value="{{ $aksi->keterangan }}" required autofocus />
                                    @if ($errors->has('keterangan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    @endif
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

        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Data Keterangan Laporan</h4>
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

                        <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="1%">#</th>
                                    <th class="text-nowrap">keterangan</th>
                                    <th class="text-nowrap">tanggal & waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($proses as $p)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $p->keterangan }}</td>
                                <td>{{ $p->created_at }}</td>
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