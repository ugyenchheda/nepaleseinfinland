jQuery(document).ready(function(){
	$('.button').click( function() {
		$('.overlay').fadeIn();
	});
	
	// Закрытие окна на крестик
	$('.close-popup').click( function() {
		$('.overlay').fadeOut();
	});
	
	// Закрытие окна на поле
	$(document).mouseup( function (e) { 
		var popup = $('.popup');
		if (e.target != popup[0] && popup.has(e.target).length === 0){
			$('.overlay').fadeOut();
		}
	});
});