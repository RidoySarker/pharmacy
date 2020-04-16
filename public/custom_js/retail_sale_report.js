$(document).ready(function() {
	$(document).on("submit", "#form", function(e) {
		e.preventDefault();
		$("#gif").show();
		var data = $(this).serializeArray();

		$.ajax({
			url     : "retailsale_report/store",
			data    : data,
			type    : "post",
			success: function(data) {
				$("#table").fadeIn(1000);
				$("#gif").hide();
				$("#retaildata").html(data);
			}
		});
	});
});