/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.4.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/
$('#selectKelurahan').change(function() {
    var opKecamatan = $("#selectKecamatan").val();
  
    var opKelurahan = $("#selectKelurahan").val();
    var rtarray = [];
    function sortNumber(a, b) {
    return a - b;
  }
  if(opKecamatan!='ALL' && opKelurahan !='ALL'){
    $.getJSON('/teritory/'+opKecamatan+'/'+opKelurahan, function(x,y) {
        if(x.data[0]['values'] != null){
             $.each(x.data, function(i, v) {
          rtarray.push(parseInt(v['values']));
          // console.log(v['values']);
        })
        // console.log(rtarray.sort(sortNumber));
        $("#selectRT").html('');
        $("#selectRT").append('<option></option><option> ALL</option>');
            $.each(rtarray.sort(sortNumber),function(i,v){
              console.log(v);
              $("#selectRT").append('<option value='+v+'> RT '+v+'</option>')
            })
        }else{
          $("#selectRT").html('');
        $("#selectRT").append('<option> ALL</option>');
          console.log('null');
        }
     })
  }
  // var numArray = [140000, 104, 99];
  // numArray.sort(sortNumber);
  
  // console.log(numArray);
  
     
    })
  // toggle kecamatan
  $('#selectKecamatan').change(function() {
    $("#selectKelurahan").html('');
    $("#selectRT").html('');
  
  var opKecamatan = $('#selectKecamatan').val();
    /* Act on the event */
    $("#selectRT").append('<option></option><option>ALL</option>');
  
    $("#selectKelurahan").append('<option></option><option>ALL</option>');
    if(opKecamatan=='balikpapan timur'){
      $("#selectKelurahan").append(
        '<option>Lamaru</option><option>Manggar</option><option>Manggar Baru</option><option>Teritip</option>'
      );
    console.log('timur');
  
    }else if(opKecamatan=='balikpapan utara'){
      $("#selectKelurahan").append(
        '<option>Batu Ampar</option><option>Graha Indah</option><option>Gunung Samarinda</option><option>Gunung Samarinda Baru</option><option>Karang Joang</option><option>Muara Rapak</option>'
      );
    console.log('utara');
  
    }else if(opKecamatan=='balikpapan tengah'){
      $("#selectKelurahan").append(
        '<option>Gunung Sari Ilir</option><option>Gunung Sari Ulu</option><option>Karang Jati</option><option>Karang Rejo</option><option>Mekar Sari</option><option>Sumber Rejo</option>'
      );
    console.log('tengah');
  
    }else if(opKecamatan=='balikpapan selatan'){
      $("#selectKelurahan").append(
        '<option>Damai Bahagia</option><option>Damai Baru</option><option>Gunung Bahagia</option><option>Sepinggan</option><option>Sepinggan Baru</option><option>Sepinggan Raya</option><option>Sungai Nangka</option>'
      );
    console.log('selatan');
  
    }else if(opKecamatan=='balikpapan kota'){
      $("#selectKelurahan").append(
        '<option>Damai</option><option>Klandasan Ilir</option><option>Klandasan Ulu</option><option>Prapatan</option><option>Telaga Sari</option>'
      );
    console.log('kota');
  
    }else if(opKecamatan=='balikpapan barat'){
      $("#selectKelurahan").append(
        '<option>Baru Ilir</option><option>Baru Tengah</option><option>Baru Ulu</option><option>Kariangau</option><option>Marga sari</option><option>Margo Mulyo</option>'
      );
    }
  });

var handleGoogleMapSetting = function() {
	"use strict";
	var map;
	
	var mapOptions = {
		zoom: 12,
		center: new google.maps.LatLng(-1.148889,116.903056),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
	};
	map = new google.maps.Map(document.getElementById('google-map-default'), mapOptions);
	
	$(window).resize(function() {
		google.maps.event.trigger(map, "resize");
	});
	
	var defaultMapStyles = [];
	var flatMapStyles = [{"stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.arterial","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"landscape","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]},{},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]}]; 
	var turquoiseWaterStyles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#7dcdcd"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}];
	var icyBlueStyles = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
	var oldDryMudStyles = [{"featureType":"landscape","stylers":[{"hue":"#FFAD00"},{"saturation":50.2},{"lightness":-34.8},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFAD00"},{"saturation":-19.8},{"lightness":-1.8},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FFAD00"},{"saturation":72.4},{"lightness":-32.6},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFAD00"},{"saturation":74.4},{"lightness":-18},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00FFA6"},{"saturation":-63.2},{"lightness":38},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#FFC300"},{"saturation":54.2},{"lightness":-14.4},{"gamma":1}]}];
	var cobaltStyles  = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#293036"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
	var darkRedStyles   = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#000000"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
    
	$('[data-map-theme]').click(function() {
		var targetTheme = $(this).attr('data-map-theme');
		var targetLi = $(this).closest('li');
		var targetText = $(this).text();
		var inverseContentMode = false;
		$('#map-theme-selection li').not(targetLi).removeClass('active');
		$('#map-theme-text').text(targetText);
		$(targetLi).addClass('active');
		
		switch(targetTheme) {
			case 'flat':
				map.setOptions({styles: flatMapStyles});
			break;
			case 'turquoise-water':
				map.setOptions({styles: turquoiseWaterStyles});
			break;
			case 'icy-COLOR_BLUE':
				map.setOptions({styles: icyBlueStyles});
			break;
			case 'cobalt':
				map.setOptions({styles: cobaltStyles});
				inverseContentMode = true;
			break;
			case 'old-dry-mud':
				map.setOptions({styles: oldDryMudStyles});
			break;
			case 'dark-red':
				map.setOptions({styles: darkRedStyles});
				inverseContentMode = true;
				break;
			default:
				map.setOptions({styles: defaultMapStyles});
				break;
		}

		if (inverseContentMode === true) {
			$('#content').addClass('content-inverse-mode');
		} else {
			$('#content').removeClass('content-inverse-mode');
		}
	});

};

var MapGoogle = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleGoogleMapSetting();
		}
	};
}();

var x = new google.maps.LatLng(-1.148889,116.903056);
// var map;
// var centerOfPoligon = new google.maps.LatLngBounds(null);
// var layer_1 = new google.maps.Data();


$("#btnShowMAP").click(function(){

	var opKecamatan = $('#selectKecamatan').val();
	var opRt = $('#selectRT').val();
	var opKelurahan = $('#selectKelurahan').val().toLowerCase();
	var opKelurahan2 = $('#selectKelurahan').val();

	var layer_1 = new google.maps.Data();

	layer_1.revertStyle();
	var balikpapanKECall ;
	
	if(opKecamatan == 'ALL' && opKelurahan==''&& opRt=='') {
		var balikpapanKECall = layer_1.loadGeoJson('/balikpapanKECall'); 
	   initialize(balikpapanKECall);
		console.log(layer_1.loadGeoJson('/balikpapanKECall'));
			btnshowkec();
			console.log('1');
	} else if(opKecamatan != 'ALL' && opKelurahan=='' && opRt==''){
		var geo = layer_1.loadGeoJson('/balikpapanKEC/'+opKecamatan);
		initialize(geo);
			btnshowkec();
			console.log('2');

	}else if(opKecamatan != 'ALL' && opKelurahan=='all' && opRt==''){
		var geo = layer_1.loadGeoJson('/balikpapanKELKEC/'+opKecamatan);

		initialize(geo);
			btnshowkel();
			console.log('3');

	}else if(opKecamatan != 'ALL' && opKelurahan!='all' && opRt==''){
	   var geo = layer_1.loadGeoJson('/balikpapanKEL/'+opKelurahan);
		initialize(geo);
			btnshowkel();
			console.log('5');

	}else if(opKecamatan != 'ALL' && opKelurahan!='all' && opRt=='ALL'){
	   var geo = layer_1.loadGeoJson('/balikpapanKELRT/'+opKelurahan2);
		initialize(geo);
			btnshowrt();
			console.log('6');

	}else if(opKecamatan != 'ALL' && opKelurahan!='all' && opRt!='ALL'){
	   var geo = layer_1.loadGeoJson('/balikpapanRT/'+opKelurahan2+'/'+opRt);
		initialize(geo);
			btnshowrt();
			console.log('7');

	}else if(opKecamatan == 'ALL' && opKelurahan=='all' && opRt==''){
	  var geo = layer_1.loadGeoJson('/balikpapanKEL');
		initialize(geo);
			btnshowkel();
			console.log('8');

	}else if(opKecamatan == 'ALL' && opKelurahan=='all' && opRt=='ALL'){
	  var geo = layer_1.loadGeoJson('/balikpapanRT');
		initialize(geo);
			btnshowrt();
			console.log('9');

	}

	function btnshowrt(){

	  var infowindow = new google.maps.InfoWindow();
			infowindow.opened = false;
			layer_1.addListener('mouseover', function(event) {
			  var SD_NAME = event.feature.getProperty('Name');
			  var SD_KELURAHAN = event.feature.getProperty('Kelurahan');
			  var SD_KECAMATAN = event.feature.getProperty('Kecamatan');
			  var coor = event.feature.getGeometry('coordinates');
			  

			  var bounds = new google.maps.LatLngBounds();
				  if (Object.keys(coor.getAt(0).getAt(0)).length == 1)  {
					  for (var i = 0; i < coor.getAt(0).getAt(0).getArray().length; i++) {
						  loc = coor.getAt(0).getAt(0).getAt(i);
						  bounds.extend(loc);
					  }
				  }
				  else {

						  for (var i = 0; i < coor.getAt(0).getArray().length; i++) {
							  loc = coor.getAt(0).getAt(i);
							  bounds.extend(loc);
						  }
				  }

				  infowindow.setContent("<b>RT</b> : "+SD_NAME+"<br><b>KELURAHAN</b> : "+SD_KELURAHAN+"<br><b>KECAMATAN</b> : "+SD_KECAMATAN);
				  infowindow.setPosition(bounds.getCenter());
				  infowindow.open(map);


			});

			layer_1.addListener('mouseout', function(event) {
			  infowindow.close();
			  infowindow.opened = false;
			});

			layer_1.setStyle(function(feature) {
				var SD_NAME = feature.getProperty('Name');
				var sd_kecamatan = feature.getProperty('Kecamatan');
				var sd_kelurahan = feature.getProperty('Kelurahan');
			 	var coor = feature.getGeometry('coordinates');
			 	var color = "black";
				 var locations =[];
				 
				if (sd_kelurahan == "Sepinggan Baru") {
					color = "";
					strokecolor = "#CCFF00";
				} else if (sd_kelurahan == "Sepinggan") {
					color = "";
					strokecolor = "#CCFFCC";
				} else if (sd_kelurahan == "Gunung Bahagia") {
					color = "";
					strokecolor = "#FFFF99";
				} else if (sd_kelurahan == "Damai Bahagia") {
					color = "";
					strokecolor = "#CCCC00";
				} else if (sd_kelurahan == "Damai Baru") {
					color = "";
					strokecolor = "#CCCCCC";
				} else if (sd_kelurahan == "Sumber Rejo") {
					color = "";
					strokecolor = "#FFCC99";
				} else if (sd_kelurahan == "Mekar Sari") {
					color = "";
					strokecolor = "#CC9900";
				} else if (sd_kelurahan == "Karang Rejo") {
					color = "";
					strokecolor = "#CC99CC";
				} else if (sd_kelurahan == "Karang Jati") {
					color = "";
					strokecolor = "#FF9999";
				} else if (sd_kelurahan == "Gunung Sari Ulu") {
					color = "";
					strokecolor = "#CC6600";
				} else if (sd_kelurahan == "Gunung Sari Ilir") {
					color = "";
					strokecolor = "#CC66CC";
				} else if (sd_kelurahan == "Muara Rapak") {
					color = "";
					strokecolor = "#FF6699";
				} else if (sd_kelurahan == "Karang Joang") {
					color = "";
					strokecolor = "#CC3300";
				} else if (sd_kelurahan == "Gunung Samarinda Baru") {
					color = "";
					strokecolor = "#CC33CC";
				} else if (sd_kelurahan == "Gunung Samarinda") {
					color = "";
					strokecolor = "#FF3399";
				} else if (sd_kelurahan == "Graha Indah") {
					color = "";
					strokecolor = "#CC0000";
				} else if (sd_kelurahan == "Batu Ampar") {
					color = "";
					strokecolor = "#CC00CC";
				} else if (sd_kelurahan == "Margo Mulyo") {
					color = "";
					strokecolor = "#FF0099";
				} else if (sd_kelurahan == "Marga Sari") {
					color = "";
					strokecolor = "#660000";
				} else if (sd_kelurahan == "Kariangau") {
					color = "";
					strokecolor = "#6600CC";
				} else if (sd_kelurahan == "Baru Ulu") {
					color = "";
					strokecolor = "#990099";
				} else if (sd_kelurahan == "Baru Tengah") {
					color = "";
					strokecolor = "#663300";
				} else if (sd_kelurahan == "Baru Ilir") {
					color = "";
					strokecolor = "#6633CC";
				} else if (sd_kelurahan == "Teritip") {
					color = "";
					strokecolor = "#993399";
				} else if (sd_kelurahan == "Manggar Baru") {
					color = "";
					strokecolor = "#666600";
				} else if (sd_kelurahan == "Manggar") {
					color = "";
					strokecolor = "#6666CC";
				} else if (sd_kelurahan == "Lamaru") {
					color = "";
					strokecolor = "#996699";
				} else if (sd_kelurahan == "Sepinggan Raya") {
					color = "";
					strokecolor = "#669900";
				} else if (sd_kelurahan == "Sungai Nangka") {
					color = "";
					strokecolor = "#6699CC";
				} else if (sd_kelurahan == "Damai") {
					color = "";
					strokecolor = "#999999";
				} else if (sd_kelurahan == "Klandasan Ilir") {
					color = "";
					strokecolor = "#66CC00";
				} else if (sd_kelurahan == "Klandasan Ulu") {
					color = "";
					strokecolor = "#66CCCC";
				} else if (sd_kelurahan == "Prapatan") {
					color = "";
					strokecolor = "#99CC99";
				} else if (sd_kelurahan == "Telaga Sari") {
					color = "";
					strokecolor = "#66FF00";
				} 

				var bounds = new google.maps.LatLngBounds();
				  if (Object.keys(coor.getAt(0).getAt(0)).length == 1)  {
					  for (var i = 0; i < coor.getAt(0).getAt(0).getArray().length; i++) {
						  loc = coor.getAt(0).getAt(0).getAt(i);
						  bounds.extend(loc);
						  locations.push(loc);
						  // console.log(locations);
					  }
				  }
				  else {

						  for (var i = 0; i < coor.getAt(0).getArray().length; i++) {
							  loc = coor.getAt(0).getAt(i);
							  bounds.extend(loc);
						  }
				  }
				
				center = bounds;
	  			map.fitBounds(bounds);
	
				return {
					fillColor: '#000000',
				  strokeColor: strokecolor,
				  strokeWeight: 1,
				  // label: mapLabel,
				}
				
			 layer_1.revertStyle();

			});

				layer_1.setMap(map);
				map.setZoom(14);

	  		layer_1.addListener('mouseover', function(event) {
				var nort = event.feature.getProperty('Name');
				// console.log(event)
			  });
			  
			layer_1.addListener('mouseout', function(event) {
				var nort = event.feature.getProperty('Name');
			})
			    layer_1.addListener('click', function(event) {
					$("#loading").show();
					$( "#isi" ).html('');
		
					var namaitem = document.getElementById('info-box').textContent =
					event.feature.getProperty('Name');
					var RT = event.feature.getProperty('Name');
					var kecamatan = event.feature.getProperty('Kecamatan');

					var lurah = event.feature.getProperty('Kelurahan');

					$( "#btn_modal" ).trigger( "click" );
				 
				$.getJSON('/bpprt/'+lurah+'/'+RT, function(x,y) {
					if(x.message=='Failed!'){
						$( "#isi" ).append(
							'<li>Kecamatan : '+kecamatan.toUpperCase()+' </li>'+
							'<li>Kelurahan : '+lurah.toUpperCase()+' </li>'+
							'<li>RT : '+RT.toUpperCase()+' </li>'+
							'Data Belum Tersedia');
					}else{
						$( "#isi" ).append( 
							'<li><strong>Kecamatan : </strong>'+kecamatan.toUpperCase()+' </li>'+
							'<li><strong>Kelurahan : </strong>'+lurah.toUpperCase()+' </li>'+
							'<li><strong>RT : </strong>'+RT.toUpperCase()+' </li>'+
							'<li><strong>Jumlah Kepala Keluarga : </strong>'+x.data[0]['jml_kepala_keluarga']+'</li>'+
							'<li><strong>Jumlah Penduduk Laki-Laki : </strong>'+x.data[0]['populasi_pria']+'</li>'+
							'<li><strong>Jumlah Penduduk Perempuan : </strong>'+x.data[0]['populasi_wanita']+'</li>'+
							'<li><strong>Jumlah Penduduk : </strong>'+x.data[0]['jumlah_penduduk']+'</li>'+
							'<strong>Lingkungan</strong>'+
							'<li><strong>Panjang Jalan : </strong>'+x.data[0]['panjang_jalan_meter']+'</li>'+
							'<li><strong>Jalan Kondisi Baik : </strong>'+x.data[0]['panjang_jalan_baik']+'</li>'+
							'<li><strong>Jalan Kondisi Rusak : </strong>'+x.data[0]['panjang_jalan_rusak']+'</li>'+
							'<li><strong>Panjang Drainase : </strong>'+x.data[0]['panjang_drainase']+'</li>'+
							'<li><strong>Bangunan memiliki drainase : </strong>'+x.data[0]['jml_bangunan_dgn_drainase']+'</li>'+
							'<li><strong>Bangunan tidak memiliki drainase : </strong>'+x.data[0]['jml_bangunan_non_drainase']+'</li>'
							);
					}
				  	$("#loading").hide();
			  	});
	  });

	}
	function btnshowkel(){
		layer_1.setStyle(function(feature) {
			 var SD_NAME = feature.getProperty('Name');
			 var coor = feature.getGeometry('coordinates');
			 var color = "black";

				if (SD_NAME == "baru ilir" ||SD_NAME == "marga sari" ||SD_NAME == "baru tengah" ||SD_NAME == "margo mulyo" ||SD_NAME == "baru ulu" ||SD_NAME == "kariangau" ) {

					color = "";
					strokecolor = "orange";

				} else if(SD_NAME == "batu ampar" ||SD_NAME == "graha indah"||SD_NAME == "gunung samarinda"||SD_NAME == "gunung samarinda baru"||SD_NAME == "karang joang"||SD_NAME == "muara rapak") {
					color = "";
					strokecolor = "yellow";

				} else if(SD_NAME == "teritip" ||SD_NAME == "manggar" ||SD_NAME == "lamaru" ||SD_NAME == "manggar baru" ) {
					color = "";
					strokecolor = "red";

				} else if(SD_NAME == "damai bahagia" ||SD_NAME == "damai baru" ||SD_NAME == "sepinggan raya" ||SD_NAME == "sungai nangka" ||SD_NAME == "sepinggan baru" ||SD_NAME == "gunung bahagia" ||SD_NAME == "sepinggan") {
					color = "";
					strokecolor = "white";

				} else if(SD_NAME == "gunung sari ilir" ||SD_NAME == "karang jati" ||SD_NAME == "karang rejo" ||SD_NAME == "mekar sari" ||SD_NAME == "sumber rejo" ||SD_NAME == "gunung sari ulu" ) {
					color = "";
					strokecolor = "blue";

				} else if(SD_NAME == "damai" ||SD_NAME == "klandasan ulu" ||SD_NAME == "prapatan" ||SD_NAME == "telaga sari" ||SD_NAME == "klandasan ilir" ) {
					color = "";
					strokecolor = "green";

				}

				var bounds = new google.maps.LatLngBounds();

				  if (Object.keys(coor.getAt(0).getAt(0)).length == 1)  {
					  for (var i = 0; i < coor.getAt(0).getAt(0).getArray().length; i++) {
						  loc = coor.getAt(0).getAt(0).getAt(i);
						  bounds.extend(loc);
					  }
				  }
				  else {

						  for (var i = 0; i < coor.getAt(0).getArray().length; i++) {
							  loc = coor.getAt(0).getAt(i);
							  bounds.extend(loc);
						  }
				  }
				  
				center = bounds;
	  			map.fitBounds(bounds);

				var mapLabel = new MapLabel({
					text: SD_NAME.toUpperCase(),
					position: bounds.getCenter(),
					map: map,
					fontSize: 10,
					align: 'right',
					strokeWeight: 0,
					fontColor:'#ffffff'
				});

				return {
				  fillColor: '#00000052',
				  strokeColor: strokecolor,
				  strokeWeight: 1,
				  label: mapLabel,
				}
				 
					layer_1.revertStyle();

		});

				map.setZoom(6);
				layer_1.setMap(map);

			   	layer_1.addListener('click', function(event) {
					$("#loading").show();
					$( "#isi" ).html('');
						var namaitem = document.getElementById('info-box').textContent =
						event.feature.getProperty('Name');
						$( "#btn_modal" ).trigger( "click" );
						$.getJSON('/bppkelurahan/'+namaitem, function(x,y) {
						if(x.message=='Failed!'){
							$( "#isi" ).append(
								'<h4>Kelurahan : '+namaitem.toUpperCase()+' </h4>'+
								'Data Belum Tersedia');
						}else{
							$( "#isi" ).append( 
								'<li><strong>Kecamatan : </strong>'+x.data[0]['nama_kecamatan']+'</li>'+
								'<li><strong>Kelurahan : </strong>'+x.data[0]['nama_kelurahan']+'</li>'+
								'<li><strong>Jumlah RT : </strong>'+x.data[0]['jumlah_rt']+'</li>'+
								'<li><strong>Jumlah Kepala Keluarga : </strong>'+x.data[0]['jml_kepala_keluarga']+'</li>'+
								'<li><strong>Jumlah Penduduk Laki-Laki : </strong>'+x.data[0]['populasi_pria']+'</li>'+
								'<li><strong>Jumlah Penduduk Perempuan : </strong>'+x.data[0]['populasi_wanita']+'</li>'+
								'<li><strong>Jumlah Penduduk : </strong>'+x.data[0]['jumlah_penduduk']+'</li>'+
								'<strong>Lingkungan</strong>'+
								'<li><strong>Panjang Jalan : </strong>'+x.data[0]['panjang_jalan_meter']+'</li>'+
								'<li><strong>Jalan Kondisi Baik : </strong>'+x.data[0]['panjang_jalan_baik']+'</li>'+
								'<li><strong>Jalan Kondisi Rusak : </strong>'+x.data[0]['panjang_jalan_rusak']+'</li>'+
								'<li><strong>Panjang Drainase : </strong>'+x.data[0]['panjang_drainase']+'</li>'+
								'<li><strong>Bangunan memiliki drainase : </strong>'+x.data[0]['jml_bangunan_dgn_drainase']+'</li>'+
								'<li><strong>Bangunan tidak memiliki drainase : </strong>'+x.data[0]['jml_bangunan_non_drainase']+'</li>'
								);
						}
							$("#loading").hide();
						});
				});

	};
	
	function btnshowkec(){
		layer_1.setStyle(function(feature) {
			 var SD_NAME = feature.getProperty('Name');
			 var coor = feature.getGeometry('coordinates');
			 var color = "black";

				if (SD_NAME == "balikpapan barat") {

					color = "";
					strokecolor = "orange";
				} else if(SD_NAME == "balikpapan utara") {
					color = "";
					strokecolor = "yellow";
				} else if(SD_NAME == "balikpapan timur") {
					color = "";
					strokecolor = "red";
				} else if(SD_NAME == "balikpapan selatan") {
					color = "";
					strokecolor = "white";
				} else if(SD_NAME == "balikpapan tengah") {
					color = "";
					strokecolor = "blue";
				} else if(SD_NAME == "balikpapan kota") {
					color = "";
					strokecolor = "green";
				}
				 var bounds = new google.maps.LatLngBounds();
				  if (Object.keys(coor.getAt(0).getAt(0)).length == 1)  {
					  for (var i = 0; i < coor.getAt(0).getAt(0).getArray().length; i++) {
						  loc = coor.getAt(0).getAt(0).getAt(i);
						  bounds.extend(loc);
					  }
				  }
				  else {

						  for (var i = 0; i < coor.getAt(0).getArray().length; i++) {
							  loc = coor.getAt(0).getAt(i);
							  bounds.extend(loc);
						  }
				  }
				  
				center = bounds;

				var mapLabel = new MapLabel({
					text: SD_NAME.toUpperCase(),
					position: bounds.getCenter(),
					map: map,
					fontSize: 10,
					align: 'center',
					strokeWeight: 0,
					fontColor:'#ffffff'
				});
				return {
				  fillColor: color,
				  strokeColor: strokecolor,
				  strokeWeight: 1,
				  label: mapLabel,
				}

			 	layer_1.revertStyle();

		});
				layer_1.setMap(map);

				layer_1.addListener('click', function(event) {
				$("#loading").show();
				$( "#isi" ).html('');
				var namaitem = event.feature.getProperty('Name');

				$( "#btn_modal" ).trigger( "click" );
				$.getJSON('/bppkecamatan/'+namaitem, function(x,y) {
				if(x.message=='Failed!'){
					$( "#isi" ).append('Data Belum Tersedia');
				}else{
					$( "#isi" ).append( 

					   '<li><strong>Kecamatan : </strong>'+x.data[0]['nama_kecamatan']+'</li>'+
					   '<li><strong>Jumlah Kelurahan : </strong>'+x.data[0]['jumlah_kelurahan']+'</li>'+
					   '<li><strong>Jumlah RT : </strong>'+x.data[0]['jumlah_rt']+'</li>'+
					   '<li><strong>Jumlah Kepala Keluarga : </strong>'+x.data[0]['jml_kepala_keluarga']+'</li>'+
					   '<li><strong>Jumlah Penduduk Laki-Laki : </strong>'+x.data[0]['populasi_pria']+'</li>'+
					   '<li><strong>Jumlah Penduduk Perempuan : </strong>'+x.data[0]['populasi_wanita']+'</li>'+
					   '<li><strong>Jumlah Penduduk : </strong>'+x.data[0]['jumlah_penduduk']+'</li>'+
					  '<strong>Lingkungan</strong>'+
					   '<li><strong>Panjang Jalan : </strong>'+x.data[0]['panjang_jalan_meter']+'</li>'+
					   '<li><strong>Jalan Kondisi Baik : </strong>'+x.data[0]['panjang_jalan_baik']+'</li>'+
					   '<li><strong>Jalan Kondisi Rusak : </strong>'+x.data[0]['panjang_jalan_rusak']+'</li>'+
					   '<li><strong>Panjang Drainase : </strong>'+x.data[0]['panjang_drainase']+'</li>'+
					   '<li><strong>Bangunan memiliki drainase : </strong>'+x.data[0]['jml_bangunan_dgn_drainase']+'</li>'+
					   '<li><strong>Bangunan tidak memiliki drainase : </strong>'+x.data[0]['jml_bangunan_non_drainase']+'</li>'
					);
			  }
				  $("#loading").hide();
			  });
	  });

	}

// end function btnclick			
});

function initialize(geo) {

    var data = geo;
    var center ;
    var mapProp = {
        center: x,
		zoom: 12,
		disableDefaultUI: true,
        mapTypeId: 'roadmap'
    };
	
	map = new google.maps.Map(document.getElementById("google-map-default"), mapProp);

    map.data.addGeoJson(data);
    map.data.setStyle(function (feature,layer) {

        var color = feature.getProperty('fillColor');
        var name = feature.getProperty('name');
        var coor = feature.getGeometry('coordinates');
        var type = feature.getGeometry('type');
        // console.log(Object.keys(coor.getAt(0).getAt(0)).length);
        var loc ;
        // console.log(coor.getAt(0).length);
        var bounds = new google.maps.LatLngBounds();
        if (Object.keys(coor.getAt(0).getAt(0)).length == 1)  {
            for (var i = 0; i < coor.getAt(0).getAt(0).getArray().length; i++) {
                loc = coor.getAt(0).getAt(0).getAt(i);
                bounds.extend(loc);
            }
        }
        else {

                for (var i = 0; i < coor.getAt(0).getArray().length; i++) {
                    loc = coor.getAt(0).getAt(i);
                    bounds.extend(loc);
                }
        }
        center = bounds;
        var mapLabel = new MapLabel({
            text: name,
            position: bounds.getCenter(),
            map: map,
            fontSize: 15,
            align: 'center'
        });

        var marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: bounds.getCenter(),
            title : name
        });
        centerOfPoligon.extend(bounds.getCenter());
        var infowindow = new google.maps.InfoWindow({
            content: name
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        map.fitBounds(centerOfPoligon);
        map.panToBounds(centerOfPoligon);
        // map.setZoom(map.getZoom()-1);

        return {
                fillColor: color,
                clickable:true,
                label: mapLabel,
                strokeWeight: 2
        };
    });
    
    var defaultMapStyles = [];
	var flatMapStyles = [{"stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.arterial","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"landscape","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]},{},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]}]; 
	var turquoiseWaterStyles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#7dcdcd"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}];
	var icyBlueStyles = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
	var oldDryMudStyles = [{"featureType":"landscape","stylers":[{"hue":"#FFAD00"},{"saturation":50.2},{"lightness":-34.8},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFAD00"},{"saturation":-19.8},{"lightness":-1.8},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FFAD00"},{"saturation":72.4},{"lightness":-32.6},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFAD00"},{"saturation":74.4},{"lightness":-18},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00FFA6"},{"saturation":-63.2},{"lightness":38},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#FFC300"},{"saturation":54.2},{"lightness":-14.4},{"gamma":1}]}];
	var cobaltStyles  = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#293036"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
	var darkRedStyles   = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#000000"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
    
	$('[data-map-theme]').click(function() {
		var targetTheme = $(this).attr('data-map-theme');
		var targetLi = $(this).closest('li');
		var targetText = $(this).text();
		var inverseContentMode = false;
		$('#map-theme-selection li').not(targetLi).removeClass('active');
		$('#map-theme-text').text(targetText);
		$(targetLi).addClass('active');
		
		switch(targetTheme) {
			case 'flat':
				map.setOptions({styles: flatMapStyles});
			break;
			case 'turquoise-water':
				map.setOptions({styles: turquoiseWaterStyles});
			break;
			case 'icy-COLOR_BLUE':
				map.setOptions({styles: icyBlueStyles});
			break;
			case 'cobalt':
				map.setOptions({styles: cobaltStyles});
				inverseContentMode = true;
			break;
			case 'old-dry-mud':
				map.setOptions({styles: oldDryMudStyles});
			break;
			case 'dark-red':
				map.setOptions({styles: darkRedStyles});
				inverseContentMode = true;
				break;
			default:
				map.setOptions({styles: defaultMapStyles});
				break;
		}

		if (inverseContentMode === true) {
			$('#content').addClass('content-inverse-mode');
		} else {
			$('#content').removeClass('content-inverse-mode');
		}
	});
};

$(document).ready(function() {
	MapGoogle.init();
});