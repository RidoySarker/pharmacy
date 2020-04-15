$(document).ready(function() {
	$(document).on("submit", "#form", function(e) {
		e.preventDefault();
		$("#gif").show();
		var data = $(this).serializeArray();

		$.ajax({
			url     : "/store",
			data    : data,
			type    : "post",
			success: function(data) {
				$("#table").fadeIn(2000);
				$("#gif").hide();
				$("#dataList").html(data);
			}
		});
	});
});