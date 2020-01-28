require('./bootstrap');
require('./config/config');
require('./components/homepage');
require('./components/new_paint');

$(document).on('change', '.car-details-colors', function() {
	if ($(this).hasClass('car-details-current-color')) {
		newPaintJobFunctions.changeColorCar('current', $(this).val());
	} else {
		newPaintJobFunctions.changeColorCar('target', $(this).val());
	}
});

$(document).on('click', '.car-details-submit', function() {
	var formData = $('#paint-job-form').serialize();
	newPaintJobFunctions.createPaintJob(formData);
});


$(document).on('click', '.mark-completed', function() {
	var id = $(this).data('id');
	homePageFunctions.updatePaintJob({'id':id});
});


