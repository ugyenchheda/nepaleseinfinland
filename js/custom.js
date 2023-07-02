const element = document.getElementById('myElementId');


function handleTouchStart(event) {

	element.addEventListener('touchstart', handleTouchStart, { passive: true });
}
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

jQuery(document).ready(function($) {
    var currentPage = 1;
    var maxPages = my_ajax_object.max_pages;

    jQuery(document).on('click', '#load-more-news', function() {
            loading = true; // Set loading to true to prevent multiple AJAX requests

            var nextPage = currentPage + 1;
            var ajaxurl = my_ajax_object.ajax_url; // Corrected the variable name here

            $.ajax({
                url: ajaxurl, // Use the correct variable name here
                type: 'POST',
                data: {
                    action: 'loadingNews',
                    page: nextPage,
                    homepage_news_category: my_ajax_object.homepage_news_category,
                    no_of_news_hp: my_ajax_object.no_of_news_hp,
                },
                beforeSend: function() {
                    $('#load-more-news').text('Loading...');
                },
                success: function(response) {
                    $('#load-more-news').text('Load More'); // Reset the button text
                    if (response) {
                        $('.trending-news-container').append(response); // Append the new news items to the container
                        currentPage = nextPage; // Update the current page
                        loading = false; // Reset loading flag after success
                        if (currentPage === maxPages) {
                            $('#load-more-news').hide(); // Hide the button when no more items to load
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    loading = false; // Reset loading to false in case of an error
                }
            });
    });
});