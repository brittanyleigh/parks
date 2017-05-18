$(document).ready(function() {
	$('.park').hide();
	$('.hide').hide();
	$('.options').hide();
	$('#log-in').hide();
	$('#new-account').hide();
	var natl = true;
	var st = true;
	var cty = true;

/// Individual State Display ///
	$('.state h3 i').on('click', function(){
		var parent_state = $(this).parents('.state');
		$(parent_state).toggleClass('visible hidden');
		var natlPks = $(parent_state).find('.national-pk');
		var stPks = $(parent_state).find('.state-pk');
		var ctyPks = $(parent_state).find('.city-pk');
		viewAndFilter(natlPks, stPks, ctyPks);
		upDown(this);
	});

/// Filter Options ///
	$('.filter').on('click', function(){
		upDown($(this).find('i'));
		$('.options').slideToggle(500);
	});
	$('.options i').on('click', function(){
		$(this).toggleClass('fa-circle-o fa-check-circle-o');
	});
		$('#natl').on('click', function(){
		natl = !natl;
		findVisiblePks('.national');
	});
	$('#st').on('click', function(){
		st = !st;
		findVisiblePks('.state');
	});
	$('#cty').on('click', function(){
		cty = !cty;
		findVisiblePks('.city');
	});

/// Show & Hide Buttons ///
	$('.show-hide').on('click', function(){
		$('.show').toggle();
		$('.hide').toggle();
	});
	$('.show').on('click', function(){
		var natlPks = '.national-pk:hidden';
		var stPks = '.state-pk:hidden';
		var ctyPks = '.city-pk:hidden';
		$('.hidden').toggleClass('visible hidden');
		viewAndFilter(natlPks, stPks, ctyPks);
		upDown('.state .fa-angle-down');
	});
	$('.hide').on('click', function(){
		$('.park:visible').toggle(750);
		$('.visible').toggleClass('visible hidden');
		upDown('.state .fa-angle-up');
	});

	$('.login').on('click', function(){
		$('#log-in').fadeIn(750);
		$(this).hide();
		$('.createAcct').hide();
	});
	$('.createAcct').on('click', function(){
		$('#new-account').fadeIn(750);
		$(this).hide();
		$('.login').hide();
	});
	$('#log-in .cancel').on('click', function(){
		$('#log-in').hide();
		$('.login').fadeIn(750);
		$('.createAcct').fadeIn(750);
	});
	$('#new-account .cancel').on('click', function(){
		$('#new-account').hide();
		$('.createAcct').fadeIn(750);
		$('.login').fadeIn(750);
	})



	function upDown(selection){
		$(selection).toggleClass('fa-angle-down fa-angle-up');
	};

	function findVisiblePks(type){
		var visiblePks = $('.list').find('.visible');
		$(visiblePks).find(type + '-pk').toggle(750);
	};

	function viewAndFilter(national, state, city){
		if (natl){
			$(national).toggle(750);};
		if (st){
			$(state).toggle(750);};
		if (cty){
			$(city).toggle(750);};
	} //only displays park types that are checked (natl, st, cty = true when checked)

});