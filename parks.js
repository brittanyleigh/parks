$(document).ready(function() {
	$('.park').hide();
	$('.hide').hide();
	$('.options').hide();
	var natl = true;
	var st = true;
	var cty = true;
	$('.state h3 i').on('click', function(){
		var parent_state = $(this).parents('.state');
		$(parent_state).toggleClass('visible hidden');
		var natlPks = $(parent_state).find('.park.national-pk');
		var stPks = $(parent_state).find('.park.state-pk');
		var ctyPks = $(parent_state).find('.park.city-pk');
		if (natl){
			$(natlPks).toggle(750);
		};
		if (st){
			$(stPks).toggle(750);
		};
		if (cty) {
			$(ctyPks).toggle(750);
		};
		
		upDown(this);
	});

	function upDown(selection){
		$(selection).toggleClass('fa-angle-down fa-angle-up');
	}

	$('.filter h4 i').on('click', function(){
		upDown(this);
		$('.options').slideToggle(500);
	});
	$('.options i').on('click', function(){
		$(this).toggleClass('fa-circle-o fa-check-circle-o');
	});

	$('.show-hide').on('click', function(){
		$('.show').toggle();
		$('.hide').toggle();
		$('.state').toggleClass('visible hidden');
	});



	$('.show').on('click', function(){
		var natlHidden = '.park.national-pk:hidden';
		var stHidden = '.park.state-pk:hidden';
		var ctyHidden = '.park.city-pk:hidden';

		if (natl){
			$(natlHidden).toggle(750);}
		if (st){
			$(stHidden).toggle(750);
		}
		if (cty){
			$(ctyHidden).toggle(750);
		}
		upDown('.state .fa-angle-down');
	});
	$('.hide').on('click', function(){
		var visible = '.park:visible';
		$(visible).toggle(750);
		upDown('.state .fa-angle-up');

	});
	$('#natl').on('click', function(){
		natl = !natl;
		var visiblePks = $('.list').find('.visible');
		$(visiblePks).find('.national-pk').toggle(750);
	});
	$('#st').on('click', function(){
		st = !st;
		var visiblePks = $('.list').find('.visible');
		$(visiblePks).find('.state-pk').toggle(750);
	});
	$('#cty').on('click', function(){
		cty = !cty;
		var visiblePks = $('.list').find('.visible');
		$(visiblePks).find('.city-pk').toggle(750);
	});

});