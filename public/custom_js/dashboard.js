$(document).ready(function() {
	getCustomer();

	function getCustomer() {
		$.ajax({
			url: "/company_data",
			type: "get",
			datatype: "html",
			success: function(data) {
				$("#customer").html(data);
			}
		});
	}
});