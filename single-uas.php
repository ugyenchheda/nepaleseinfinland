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
            $uas_hot = get_post_meta( $post_id, 'uas_hot', true );
            $uas_price = get_post_meta( $post_id, 'uas_price', true );
            $uas_organizer = get_post_meta( $post_id, 'uas_organizer', true );
            $uas_sdate = get_post_meta( $post_id, 'uas_sdate', true );
            $uas_edate = get_post_meta( $post_id, 'uas_edate', true );
            $uas_banner = get_post_meta( $post_id, 'uas_banner', true );
            $uas_video = get_post_meta( $post_id, 'uas_video', true );
            $uas_location = get_post_meta( $post_id, 'uas_location', true );
            $uas_phone = get_post_meta( $post_id, 'uas_phone', true );
            $uas_email = get_post_meta( $post_id, 'uas_email', true );
            $uas_facebook = get_post_meta( $post_id, 'uas_facebook', true );
            $uas_twitter = get_post_meta( $post_id, 'uas_twitter', true );
            $uas_youtube = get_post_meta( $post_id, 'uas_youtube', true );
            $uas_instagram = get_post_meta( $post_id, 'uas_instagram', true );
            $uas_linkedin = get_post_meta( $post_id, 'uas_linkedin', true );
            $uas_website = get_post_meta( $post_id, 'uas_website', true );
            if(!empty($uas_location)){
                $latitude = $uas_location['latitude'];
                $longitude = $uas_location['longitude'];
                $uas_address = event_location($latitude, $longitude);
            }
            ?>
                    <div class="row uas_banner">
                            <div class="col-lg-8 map_block">
                        
                        <div class="uas_banner_main" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                                <div class="row">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="event_banner_wrap">
                                            <h3 class="title"><span class="event_bg"><span class="event_title"><?php the_title(); ?></span></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 map_block">
                            <!-- Map shown in pop up -->
                            <div id="map" style="height: 502px;" class="kindergarden_map"></div>
                            <script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_g4sqti9HeM-c2_CklyEnPoVZq-j3bMU&callback=initMap">   </script>
                            <script>
                                function initMap() {
                                    var uluru = {lat: <?php echo $uas_location['latitude'] ?>, lng: <?php echo $uas_location['longitude'] ?>};
                                    var map = new google.maps.Map( document.getElementById("map"), {zoom: 13, center: uluru});
                                    var marker = new google.maps.Marker({position: uluru, map: map});
                                }   
                            </script>
                            <!-- Map ends here... -->
                        </div>
                    </div>
<section class="post-layout-1-area post-layout-2-area pb-80">
        <div class="container">
            <div class="row justify-content-center">
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
                                        <ul>
                                            <li><i class="far fa-calendar-alt uas_small" alt="Organizer"></i> Date of uas: <?php   echo $uas_sdate; if ($uas_edate) { echo " - $uas_edate";}?></li>
                                        </ul>   
                                    <ul>                             
                                        <li class="button"><i class="fas fa-map-marker-alt uas_small" alt="Organizer"></i> <?php echo $uas_address;?></li>
                                    </ul>
                                    </div>

                                    <div class="author-social">
                                        <ul>  Share:                          
                                            <?php
                                            
            $uas_phone = get_post_meta( $post_id, 'uas_phone', true );
            $uas_email = get_post_meta( $post_id, 'uas_email', true );
            $uas_facebook = get_post_meta( $post_id, 'uas_facebook', true );
            $uas_twitter = get_post_meta( $post_id, 'uas_twitter', true );
            $uas_youtube = get_post_meta( $post_id, 'uas_youtube', true );
            $uas_instagram = get_post_meta( $post_id, 'uas_instagram', true );
            $uas_linkedin = get_post_meta( $post_id, 'uas_linkedin', true );
            $uas_website = get_post_meta( $post_id, 'uas_website', true );
            if($uas_phone ) {
                echo '<li><a target="_blank" href="'. $uas_phone .'"><i class="fas fa-phone-volume"></i></a></li>'; 
            }
            if($uas_email ) {
                echo '<li><a target="_blank" href="'. $uas_email .'" target="_blank"><i class="far fa-envelope"></i></a></li>'; 
            }
            if($uas_facebook ) {
                echo '<li><a target="_blank" href="'. $uas_facebook .'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>'; 
            }
            
                                                
                                                echo '<li><a target="_blank" href="https://twitter.com/intent/tweet?text='. esc_attr(wp_get_document_title()) .'. '. esc_url(get_permalink()) .'"><i class="fab fa-twitter"></i></a></li>';
                                                echo '<li><a target="_blank" href="https://plus.google.com/share?url='. urlencode(esc_url(get_permalink())) .'"><i class="fab fa-google-plus"></i></a></li>';
                                                echo '<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='. urlencode(esc_url(get_permalink())) .'&title='. esc_attr(wp_get_document_title()) .'"><i class="fab fa-linkedin"></i></a></li>';
                                                echo '<li><a target="_blank" href="https://pinterest.com/pin/find/?url='. urlencode(esc_url(get_permalink())) .'"><i class="fab fa-pinterest"></i></a></li>';
                                            ?>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-categories d-flex justify-content-start align-content-center">
                                    <div class="categories-item">	
                                        <span><i class="fas fa-award uas_small" alt="Organizer"></i> uas</span>
                                    </div>
                                    <div class="categories-share">
                                        <ul>
                                            <li><i class="fas fa-comment"></i>45020</li>
                                            <li><i class="fas fa-fire"></i>45020</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-text">
                                    <div class="row pt-10">
                                            <div class="text">
                                                <?php echo get_the_content();?></div>
                                    </div>
                                </div>
                                <?php
                                if($uas_video ) {
                                ?>
                                  <iframe width="100%" height="400" src="<?php echo $uas_video; ?>" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                                <?php }  ?>

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
