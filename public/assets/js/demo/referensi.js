
$(document).ready(function() {
	// $('#tabel_agama').DataTable({
	// 	responsive: true,
	// 	ajax: "/agama",
	// 	"iDisplayLength": 5,
    //     columns: [
    //     { data: "id_agama" },
    //     { data: "nama_agama" },
    // ],
	// });

	// $('#tabel_goldar').DataTable({
	// 	responsive: true,
	// 	ajax: "/goldar",
	// 	"iDisplayLength": 5,
    //     columns: [
    //     { data: "id_gol_darah" },
    //     { data: "keterangan_gol_darah" },
    // ],
	// });

	// $('#tabel_hubkk').DataTable({
	// 	responsive: true,
	// 	ajax: "/hubkk",
	// 	"iDisplayLength": 5,
    //     columns: [
    //     { data: "id_hub_kepala_keluarga" },
    //     { data: "hubungan_kepala_keluarga" },
    // ],
	// });

	// $('#tabel_ijazah_tertinggi').DataTable({
	// 	responsive: true,
	// 	ajax: "/ijazah",
	// 	"iDisplayLength": 5,
    //     columns: [
    //     { data: "id_ijazah_tertinggi" },
    //     { data: "ijazah_tertinggi_yang_dimiliki" },
    // ],
	// });
	var url;
	$("#btn_tambah_jenisatap").click(function () { 
		var judul = $(this).data('title');	
		 url = 'asd/asd';
		$("#modal-dialog").modal()	
		$(".modal-title").text(judul);
		$("#isi").html('');
		$("#isi").append(
		'<div class="col-md-12">'+
		'<input type="text" class="form-control m-b-5" placeholder="Tambah Jenis Atap" id="jenis_atap">'+
		'<br>'+	
		'</div>'
						);
	});
	$("#simpan_jenisatap").click(function () { 
		alert(url);
	});
	$('#tabel_jalan').DataTable({
		responsive: true,
		ajax: "/jalan",
		"iDisplayLength": 5,
        columns: [
        { data: "id_jalan" },
		{ data: "nama_jalan_utama" },
        { data: "lebar_jalan" },
        { data: "panjang_jalan_km" },
        { data: "kelurahan_yang_dilalui" },
        { data: "kecamatan_yang_dilalui" },
        { data: "prosentase_aspal" },
		{ data: "prosentase_krikil" },
        { data: "prosentase_rigid" },
        { data: "prosentase_tanah" },
    ],
	});

	$('#tabel_jenis_atap').DataTable({
		responsive: true,
		ajax: "/jenisatap",
		"iDisplayLength": 5,
        columns: [
        { data: "id_jenis_atap_terluas" },
		{ data: "jenis_atap_terluas" },
    ],
	});
});
