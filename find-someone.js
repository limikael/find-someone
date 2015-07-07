jQuery(function($) {
	$(document).ready(function() {
		var last=null;

		$('.find-someone-input').on("change keyup paste",function() {
			var val=$(this).val();

			console.log("v: "+val);

			if (val)
				$('.find-someone-result-wrapper').show();

			else
				$('.find-someone-result-wrapper').hide();

			if (val!=last) {
				$('.find-someone-result').html("<div class='find-someone-loading'>Loading...</div>");
				$('.find-someone-result').load(FIND_SOMETHING_RESULT_SCRIPT+"?q="+encodeURIComponent(val));
			}

			last=val;
		});

		$('.find-someone-result').on("click",".find-someone-result-entry",function() {
			window.location = $(this).find("a").attr("href"); 
			return false;
  		});
	});
});