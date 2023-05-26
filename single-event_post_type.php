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
            ?>
            <div class="event_banner" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                <div class=container>
                    <div class="event_banner_wrap">
                        <h3 class="title"><span class="event_bg"><span class="event_title"><?php the_title(); ?></span></span></h3>
                    </div>
                </div>
            </div>
<section class="post-layout-1-area post-layout-2-area pb-80">
        <div class="container">
            <div class="row justify-content-center">
                        
                    <div class="post-content">
                                    
                                </div>
                        <div class="col-lg-8">
                            <div class="post-layout-top-content post-layout-top-content-2">
                                <div class="thumb">
                                    <img src="assets/images/post-thumb-5.png" alt="">
                                </div>
                                <div class="post-author">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <img src="assets/images/author.png" alt="">
                                        </div>
                                        <h5 class="title"><i class="far fa-id-badge event_small" alt="Organizer"></i> Organizer: <?php echo $events_organizer;?></h5>
                                        <ul>
                                            <li><i class="far fa-calendar-alt event_small" alt="Organizer"></i> Date of Event: <?php   echo $event_sdate; if ($event_edate) { echo " - $event_edate";}?></li>
                                        </ul>
                                    </div>

                                    <div class="author-social">
                                        <ul>                            
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
                                    </div>
                                    <div class="categories-share">
                                        <ul>
                                            <li><i class="fas fa-comment"></i>45020</li>
                                            <li><i class="fas fa-fire"></i>45020</li>
                                        </ul>
                                    </div>
                                </div>

                                    <div id="map" style="height: 350px;" class="kindergarden_map"></div>

                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr2q08BHCBK-HWA3y0InCwKsCcxPwHDcU&callback=initMap"></script>
                                    <script>
                                        function initMap() {
                                            var uluru = {lat: <?php echo $event_location['latitude'] ?>, lng: <?php echo $event_location['longitude'] ?>};
                                            var map = new google.maps.Map( document.getElementById("map"), {zoom: 16, center: uluru});
                                            var marker = new google.maps.Marker({position: uluru, map: map});
                                        }   
                                    </script>
                                <div class="post-text">
                                    <div class="row pt-10">
                                            <div class="text">
                                                <?php echo get_the_content();?></div>
                                    </div>
                                </div>
                                <div class="post-text pt-20">
                                    <?php
                                        if ($event_video) {echo $event_video;?>
                                        <div class="play-thumb mt-20 mb-35">
                                            <img src="<?php echo $event_banner;?>" alt="">
                                            <span>I just had a baby - now I’m going to the frontline.</span>
                                            <a class="video-popup" href="https://youtu.be/JIY8wk4KBhI"><i class="fas fa-play"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="post-quote post-quote-2-style d-block d-md-flex align-items-center">
                                    <div class="post-quote-content">
                                        <p>I must explain to you how all this mistake idea denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure because it is pleasure.</p>
                                        <div class="user">
                                            <img src="assets/images/author.png" alt="">
                                            <h5 class="title">Subash Chandra</h5>
                                            <span>Founder at Seative Digital</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-tags">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-tag"></i> Tags</a></li>
                                        <li><a href="#">Health</a></li>
                                        <li><a href="#">World</a></li>
                                        <li><a href="#">Corona</a></li>
                                    </ul>
                                </div>
                                <div class="post-reader-text post-reader-text-2 pt-50">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="post-reader-prev">
                                                <span>PREVIOUS NEWS <i class="fal fa-angle-right"></i></span>
                                                <h4 class="title"><a href="#">Kushner puts himself in middle of white house’s chaotic coronavirus response.</a></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="post-reader-prev">
                                                <span>NEXT NEWS <i class="fal fa-angle-right"></i></span>
                                                <h4 class="title"><a href="#">C.I.A. Hunts for authentic virus totals in china, dismissing government tallies</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php

                    the_post_navigation(
                        array(
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nepaleseinfinland' ) . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nepaleseinfinland' ) . '</span> <span class="nav-title">%title</span>',
                        )
                    );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

        </div>
    </section>

<?php
get_sidebar();
get_footer();
