homePageFunctions = {
	/**
	 * [Update Paint Job description]
	 * @return {[type]} [description]
	 */
	updatePaintJob:function(data = '')
	{
		 $.ajax({
		    method: 'GET', // Type of response and matches what we said in the route
		    url: $.job_paint_url + $.update_paint_jobs, // This is the url we gave in the route
		    data: data, // a JSON object to send back
		    success: function(response){ // What to do if we succeed
		        if (response.success === 1) {
		        	window.location.replace('/')
		        }
		    },
		    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail

		    }
		});


	}
}	