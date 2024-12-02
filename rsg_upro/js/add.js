jQuery(document).ready(function($) { 

	$(document).on('click', '.load_kennisbank', function(e){
		e.preventDefault();
		let _this = $(this);

		let data = {
			'action': 'load_kennisbank',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_kennisbank').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();               
					}
				} else {                              
					_this.remove();                   
				}
			}
		});
	});


	function filter_kennisbank() {
		var filter = $("#filter_kennisbank");
		var url = filter.attr("action");
		var query = filter.serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: query,
			type: filter.attr("method"),
			success: function (data) {
				$("#get_kennisbank").html(data);
			},
		});
		return false;
	}

	$('#filter_kennisbank input').change(function(e){
		e.preventDefault();
		filter_kennisbank();
	});

});