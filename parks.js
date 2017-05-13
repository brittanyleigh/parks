$(document).ready(function() {
	$('.park').hide();
	$('.state h3 i').on('click', function(){
		var parent_state = $(this).parents('.state');
		$(parent_state).find('.park').toggle();
		$(this).toggleClass('fa-angle-down fa-angle-up');
	});
});