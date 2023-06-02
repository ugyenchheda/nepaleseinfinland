jQuery(document).ready(function(){
	$('.button').click( function() {
		$('.overlay').fadeIn();
	});
	
	$('.close-popup').click( function() {
		$('.overlay').fadeOut();
	});
	
	$(document).mouseup( function (e) { 
		var popup = $('.popup');
		if (e.target != popup[0] && popup.has(e.target).length === 0){
			$('.overlay').fadeOut();
		}
	});
	var tabClicked = 2;
$('.uas-click-button li').click(function() {
  tabClicked = ($(this).index());
  $(this).addClass('active').siblings().removeClass('active');
  $(this).parent().siblings(".uas-tab-content").find(".uas-tab-panel").eq(tabClicked).show().addClass("active").siblings().hide().removeClass("active");
  
});
$('.uas-click-button li').eq(tabClicked).addClass('active');
$('.uas-tab-content > div').eq(tabClicked).show();
});