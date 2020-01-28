newPaintJobFunctions = {
	/**
	 * [Change Color Car description]
	 * @return {[type]} [description]
	 */
	changeColorCar:function(type = 'current', color = 'default')
	{
		var imageUrl = $.job_paint_url  + 'images/' + color + '.png';
		var loadCar = '<img src="'+imageUrl+'" />'
		
		$('.'+type+'-car-container').html(loadCar);

	},
	/**
	 * [Create Paint Job description]
	 * @return {[type]} [description]
	 */
	createPaintJob:function(data = '')
	{
		$('input[name="plate_number"]').removeClass('error');
		 $.ajax({
		    method: 'GET', // Type of response and matches what we said in the route
		    url: $.job_paint_url + $.save_paint_jobs, // This is the url we gave in the route
		    data: data, // a JSON object to send back
		    success: function(response){ // What to do if we succeed
		        if (response.success === 1) {
		        	window.location.replace('/')
		        } else {
		        	$('input[name="plate_number"]').addClass('error');
		        }
		    },
		    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail

		    }
		});


	}

  		

}	