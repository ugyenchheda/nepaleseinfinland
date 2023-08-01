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

jQuery(document).ready(function() {
    var currentPage = 1;
    var maxPages = 1; // Initialize maxPages to 1
    var loading = false;
	jQuery('#fully-loaded').hide();
    jQuery(document).on('click', '#load-more-news', function() {
        if (!loading && currentPage <= maxPages) { // Modify the condition to include equal to
            loading = true; // Set loading to true to prevent multiple AJAX requests
            var nextPage = currentPage + 1;
            var ajaxurl = my_ajax_object.ajax_url;
            var loadedPostIds = []; // Array to store the loaded post IDs

            // Get the container element where the news items will be appended
            var $appendContainer = jQuery('#append-here');

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'loadingNews',
                    page: nextPage,
                    homepage_news_category: my_ajax_object.homepage_news_category,
                    no_of_news_hp: my_ajax_object.no_of_news_hp,
                    loaded_post_ids: loadedPostIds,
                },
                beforeSend: function() {
                    $('#load-more-news').html('<span>Loading <i class="fa fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    $('#load-more-news').text('Load More'); // Reset the button text
                    if (response.content) {
                        $appendContainer.append(response.content); // Append the new news items to the container
                        currentPage = nextPage; // Update the current page
                        loading = false; // Reset loading flag after success
                        loadedPostIds = response.loaded_post_ids; // Update the loaded post IDs

                        // Check if it's the last page and hide the button if true
						if (currentPage >= response.max_pages) {
                            jQuery('#load-more-news').hide();
                            jQuery('#fully-loaded').show(); // Show the fully-loaded element
                        } else {
                            jQuery('#load-more-news').show(); // Show the load more button if there are more pages
                            jQuery('#fully-loaded').hide(); // Hide the fully-loaded element if there are more pages
                        }
                        // Update maxPages with the actual value from the server response
                        maxPages = response.max_pages;
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    loading = false; // Reset loading to false in case of an error
                }
            });
        }
    });
    $('#event-booking-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var ajaxurl = my_ajax_object.ajax_url;
    
        var eventID = $('[name="event_id"]').val();
        formData += '&event_id=' + eventID;
    
        // Get the name and email from the input fields using their IDs
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var nopep = $('#nopep').val();
        var bookingnum = $('#bookingnum').val();
        var booking_message = $('#booking_message').val();
        var booking_date = $('#booking_date').val();
        var event_id = $('#event_id').val();
    
        // Add name and email as data parameters
        formData += '&name=' + encodeURIComponent(name) + '&email=' + encodeURIComponent(email) + '&phone=' + encodeURIComponent(phone) 
          + '&nopep=' + encodeURIComponent(nopep) + '&bookingnum=' + encodeURIComponent(bookingnum) + '&booking_date=' + encodeURIComponent(booking_date) 
          + '&booking_message=' + encodeURIComponent(booking_message)+ '&event_id=' + encodeURIComponent(event_id);
    
        $.ajax({
          url: ajaxurl,
          type: 'POST',
          data: {
            action: 'submit_event_booking',
            formData: formData,
          },
          dataType: 'json',
          success: function(response) {
            if (response.success) {

              $('#bookingDetails').html(response.message);
    
              $('#popup1').modal('show');
              
              var bookingDetails = response.message;

              $('.event-textarea').val($('.event-textarea').val() + bookingDetails);
            } else {
              alert('Booking failed. Please try again.');
            }
          },
          error: function(xhr, status, error) {
            console.error(error);
            alert('An error occurred. Please try again later.');
          },
        });
      });
    
});