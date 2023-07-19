const element = document.getElementById('myElementId');
function handleTouchStart(event) {
	element.addEventListener('touchstart', handleTouchStart, { passive: true });
}

var slideIndex = 0;
var slideshowTimeout;

function openGallery() {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";

  showSlides();
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";

  clearTimeout(slideshowTimeout);
}

function showSlides() {
  var slides = document.getElementsByClassName("slideshow")[0].getElementsByTagName("img");

  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slideIndex++;

  if (slideIndex > slides.length) {
    slideIndex = 1;
  }

  slides[slideIndex - 1].style.display = "block";

  slideshowTimeout = setTimeout(showSlides, 2000); // Change slide every 2 seconds (adjust as needed)
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
});