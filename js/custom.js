
$(document).ready(function(){
		$('.close').click(function(){
			$('.alert').remove();
		});


		$('#get-started').hide();

		$('.signup-btn').click(function(){
			$('#get-started').slideToggle('slow');
			$('#recent-classifieds').slideToggle('slow');
			


		});
	});

