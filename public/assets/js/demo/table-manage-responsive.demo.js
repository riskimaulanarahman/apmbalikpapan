/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.4.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/

var handleDataTableResponsive = function() {
	"use strict";

	if ($('#data-table-responsive').length !== 0) {
		$('#data-table-responsive').DataTable({
			responsive: false
		});
	}

	if ($('#data-table-responsive2').length !== 0) {
		$('#data-table-responsive2').DataTable({
			responsive: true
		});
	}

	if ($('#data-table-responsive3').length !== 0) {
		$('#data-table-responsive3').DataTable({
			responsive: true
		});
	}

	if ($('#data-table-responsive4').length !== 0) {
		$('#data-table-responsive4').DataTable();
	}
};

var TableManageResponsive = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleDataTableResponsive();
		}
	};
}();

$(document).ready(function() {
	TableManageResponsive.init();
});