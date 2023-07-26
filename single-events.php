<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NepaleseinFinland
 */

get_header();

while ( have_posts() ) :
    the_post(); 
    $post_id =get_the_ID();
    $events_hot = get_post_meta( $post_id, 'events_hot', true );
    $events_free = get_post_meta( $post_id, 'events_free', true );
    $events_price = get_post_meta( $post_id, 'events_price', true );
    $events_organizer = get_post_meta( $post_id, 'events_organizer', true );
    $event_sdate = get_post_meta( $post_id, 'event_sdate', true );
    $event_edate = get_post_meta( $post_id, 'event_edate', true );
    $event_banner = get_post_meta( $post_id, 'event_banner', true );
    $event_video = get_post_meta( $post_id, 'event_video', true );
    $event_location = get_post_meta( $post_id, 'event_location', true );
    $latitude = $event_location['latitude'];
    $longitude = $event_location['longitude'];
    $event_address = event_location($latitude, $longitude);

    // Get the list of files
    $gallery_images = get_post_meta( get_the_ID(), 'event_banner', true );
    ?>
    <div class="event_banner" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
        <div class=container>
            <div class="event_banner_wrap">
                <h1 class="title"><span class="uas-main"><?php the_title(); ?></span></h1>
            </div>
        </div>
    </div>
<section class="post-layout-1-area post-layout-2-area pb-80">
        <div class="container">
            <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="post-layout-top-content post-layout-top-content-2">
                                <div class="post-author">
                                    <div class="author-info">
                                        <h5 class="title"><i class="far fa-id-badge event_small" alt="Organizer"></i> Organizer: <?php echo $events_organizer;?></h5>
                                        <ul>
                                            <li><i class="far fa-calendar-alt event_small" alt="Organizer"></i> Date of Event: <?php   echo $event_sdate; if ($event_edate) { echo " - $event_edate";}?></li>
                                        </ul>   
                                    <ul>                             
                                        <li class="button"><i class="fas fa-map-marker-alt event_small" alt="Organizer"></i> <?php echo $event_address;?></li>
                                    </ul>
                                    </div>

                                    <div class="author-social">
                                        <ul>  Share:                          
                                            <?php
                                                echo '<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='. urlencode(esc_url(get_permalink())) .'"><i class="fab fa-facebook-f"></i></a></li>'; 
                                                echo '<li><a target="_blank" href="https://twitter.com/intent/tweet?text='. esc_attr(wp_get_document_title()) .'. '. esc_url(get_permalink()) .'"><i class="fab fa-twitter"></i></a></li>';
                                                echo '<li><a target="_blank" href="https://plus.google.com/share?url='. urlencode(esc_url(get_permalink())) .'"><i class="fab fa-google-plus"></i></a></li>';
                                                echo '<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='. urlencode(esc_url(get_permalink())) .'&title='. esc_attr(wp_get_document_title()) .'"><i class="fab fa-linkedin"></i></a></li>';
                                                echo '<li><a target="_blank" href="https://pinterest.com/pin/find/?url='. urlencode(esc_url(get_permalink())) .'"><i class="fab fa-pinterest"></i></a></li>';
                                                echo '<li><a target="_blank" href="mailto:?subject='. esc_attr(wp_get_document_title()) .'. '. esc_url(get_permalink()) .'"><i class="far fa-envelope"></i></a></li>';
                                            ?>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-categories d-flex justify-content-start align-content-center">
                                    <div class="categories-item">	
                                        <span><i class="fas fa-award event_small" alt="Organizer"></i> Event</span>
                                    <?php if( $gallery_images) {?>
                                        <div class="view-event-gallery"  id="inline-popups"><a href="#ugyen-uas-gallery" data-effect="mfp-zoom-in">View Gallery<i class='fas fa-images event-gallery-iconer'></i></a></div>
                                        <div id="ugyen-uas-gallery" class="white-popup mfp-with-anim mfp-hide"> 
                                            <div class="loading">Loading Gallery Images</div>
                                            <div class="container">
                                                <div class="synch-carousels">
                                                    <div class="left child">
                                                        <div class="gallery">
                                                            <?php foreach ((array) $gallery_images as $attachment_id => $attachment_url) { ?>
                                                                <div class="item"> <img src="<?php echo $attachment_url; ?>" alt="Gallery Image"></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="right child">
                                                        <div class="gallery2">
                                                            <?php foreach ((array) $gallery_images as $attachment_id => $attachment_url) { ?>
                                                                <div class="item"> <img src="<?php echo $attachment_url; ?>" alt="Gallery Image"></div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="nav-arrows">
                                                            <button class="arrow-left"><i class='fas fa-chevron-left'></i></button>
                                                            <button class="arrow-right"><i class='fas fa-chevron-right'></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="categories-share">
                                        <ul>
                                            <li><i class="fas fa-comment"></i>45020</li>
                                            <li><i class="fas fa-fire"></i>45020</li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                                if($event_video ) {
                                ?>
                                  <iframe width="100%" height="400" src="<?php echo $event_video; ?>" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                                <?php }  ?>
                                <!-- Map shown in pop up -->
                                <div class="overlay">
                                        <div class="popup">
	                                        <?php $API_KEY = get_theme_mod('google_map_api'); ?>
                                            <div id="map" style="height: 450px;" class="kindergarden_map"></div>
                                            <script async defer  src="https://maps.googleapis.com/maps/api/js?key=<?php echo $API_KEY; ?>&callback=initMap">   </script>
                                            <script>
                                                function initMap() {
                                                    var uluru = {lat: <?php echo $event_location['latitude'] ?>, lng: <?php echo $event_location['longitude'] ?>};
                                                    var map = new google.maps.Map( document.getElementById("map"), {zoom: 13, center: uluru});
                                                    var marker = new google.maps.Marker({position: uluru, map: map});
                                                }   
                                            </script><div class="close-popup"></div>
                                        </div>
                                </div>
                                <!-- Map ends here... -->
                                            </br>
                                <div class="post-quote post-quote-2-style d-block d-md-flex align-items-center">
                                    <div class="post-quote-content">
                                        <?php the_content();?>
                                    </div>
                                </div>
                                <div class="post-tags">
                                    <ul>
                                <li><a><i class="fas fa-tag"></i> Categories</a></li>
                                    <?php 
                                $terms = get_the_terms( $post->ID, 'event_category' ); 
                                foreach($terms as $term) {
                                echo '<li class="category-link"><a href="'. esc_url( get_term_link( $term )). '">'.$term->name.'</a></li>';
                                }
                            ?>
                                    </ul>
                                </div>
                                <div class="post-reader-text post-reader-text-2 pt-50">
                                    <div class="row">
                                        
                        <?php
                            if ($terms && !is_wp_error($terms)) {
                                foreach($terms as $term) {

                                    // Query arguments for related posts
                                    $related_args = array(
                                        'post_type' => 'events',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'event_category',
                                                'field' => 'slug',
                                                'terms' => $term->slug,
                                            ),
                                        ),
                                        'post__not_in' => array($post->ID), // Exclude the current post
                                        'posts_per_page' => 2,
                                    );

                                    // The Query for related posts
                                    $related_query = new WP_Query($related_args);

                                    // The Loop for related posts
                                    if ($related_query->have_posts()) {
                                        while ($related_query->have_posts()) {
                                            $related_query->the_post();
                                            // Display the title of the related post
                                            echo '<div class="col-md-6">
                                            <div class="post-reader-prev">
                                                <span>PREVIOUS NEWS <i class="fal fa-angle-right"></i></span>
                                                <h4 class="title"><a href="'. get_the_permalink(). '">'.get_the_title().'</a></h4>
                                            </div>
                                        </div>';
                                        }
                                    }

                                    // Reset Post Data for related posts
                                    wp_reset_postdata();
                                }
                            }
                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                        <?php
                            $booking_details = get_post_meta(get_the_ID(), 'booking_details', true);
                            ?>

                            <!-- Display the event details -->

                            <!-- Display the booking form -->
                            <div class="booking-form">
                                <h2>Booking Form</h2>
                                <form id="event-booking-form" method="post">
                                <input type="hidden" name="event_id" value="<?php echo get_the_ID(); ?>">
                                    <label for="name">Name:</label>
                                    <input type="text" name="booking_details[name]" value="<?php echo isset($booking_details['name']) ? esc_attr($booking_details['name']) : ''; ?>" >

                                    <label for="email">Email:</label>
                                    <input type="email" name="booking_details[email]" value="<?php echo isset($booking_details['email']) ? esc_attr($booking_details['email']) : ''; ?>" >

                                    <label for="phone">Phone:</label>
                                    <input type="tel" name="booking_details[phone]" value="<?php echo isset($booking_details['phone']) ? esc_attr($booking_details['phone']) : ''; ?>" >

                                    <label for="booking_date">Booking Date:</label>
                                    <input type="date" name="booking_details[booking_date]" value="<?php echo isset($booking_details['booking_date']) ? esc_attr($booking_details['booking_date']) : ''; ?>" required>

                                    <input type="submit" value="Submit">
                                </form>
                            </div>

                            <!-- Display the booking details -->
                            <?php if (!empty($booking_details)) : ?>
                                <div class="booking-details">
                                    <h2>Booking Details</h2>
                                    <ul>
                                        <li>
                                            <strong>Name:</strong> <?php echo isset($booking_details['name']) ? esc_html($booking_details['name']) : ''; ?><br>
                                            <strong>Email:</strong> <?php echo isset($booking_details['email']) ? esc_html($booking_details['email']) : ''; ?><br>
                                            <strong>Phone:</strong> <?php echo isset($booking_details['phone']) ? esc_html($booking_details['phone']) : ''; ?><br>
                                            <strong>Booking Date:</strong> <?php echo isset($booking_details['booking_date']) ? esc_html($booking_details['booking_date']) : ''; ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; // End of the loop.?>
        </div>
    </section>

<?php
get_footer();
