$( document ).ready(function() {
  	$('.runtoTop').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
  	});

	$(function () {
		
		$('.single').pickmeup({
		flat	: true
		});
		
		$('input.openDate').datepicker({
			format: 'dd/mm/yyyy'
		});

		$('.multiple').pickmeup({
			flat	: true,
			mode	: 'multiple'
		});
		$('.range').pickmeup({
			flat	: true,
			mode	: 'range'
		});
		var plus_5_days	= new Date;
		plus_5_days.addDays(5);
		$('.3-calendars').pickmeup({
			flat		: true,
			date		: [
				new Date,
				plus_5_days
			],
			mode		: 'range',
			calendars	: 3
		});		

	});
});

