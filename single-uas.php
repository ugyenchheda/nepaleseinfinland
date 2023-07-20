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
            $faculties_detail = get_post_meta( get_the_ID(), 'faculties', true );
            $gallery_images = get_post_meta( get_the_ID(), 'uas_banner', 1 );
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
                                    <h1 class="title"><span class="uas-main"><?php the_title(); ?></span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 map_block">
                    <!-- Map shown in pop up -->
                    <div id="map" style="height: 502px;" class="kindergarden_map"></div>
	                <?php $API_KEY = get_theme_mod('google_map_api'); ?>
                    <script async defer  src="https://maps.googleapis.com/maps/api/js?key=<?php echo $API_KEY;?>&callback=initMap">   </script>
                    <script>
                        function initMap() {
                            var uluru = {lat: <?php echo $uas_location['latitude'] ?>, lng: <?php echo $uas_location['longitude'] ?>};
                            var map = new google.maps.Map( document.getElementById("map"), {zoom: 13, center: uluru});
                            var marker = new google.maps.Marker({position: uluru, map: map});
                        }   
                    </script>
                    <!-- Map ends here... -->

                    <?php if( $gallery_images) {?>
                    <div class="view-gallery"  id="inline-popups"><a href="#ugyen-uas-gallery" data-effect="mfp-zoom-in"><i class='fas fa-images gallery-iconer'></i></a></div>
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
                                        <button class="arrow-left"><i class='fas fa-caret-square-left'></i></button>
                                        <button class="arrow-right"><i class='fas fa-caret-square-right'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <section class="post-layout-1-area post-layout-2-area pb-80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="post-layout-top-content post-layout-top-content-2">
                                <div class="post-author">
                                    <?php if($uas_sdate ) { ?>
                                        <div class="author-info">
                                            <ul>
                                                <li>
                                                    <?php
                                                        $admission_start = strtotime($uas_sdate);
                                                        $admission_end = strtotime($uas_edate);
                                                        $admission_start_formatted = date('d/m/Y', $admission_start);
                                                        $admission_end_formatted = date('d/m/Y', $admission_end);
                                                        if ($admission_start_formatted || $admission_start_formatted){ ?>
                                                            <i class="far fa-calendar-alt uas_small" alt="Organizer"></i> Admission Period: 
                                                             <?php   
                                                            if ($admission_start_formatted){
                                                                echo $admission_start_formatted; 
                                                            }
                                                            if ($admission_start_formatted) { 
                                                                echo " - $admission_end_formatted";
                                                            } 
                                                        }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <div class="author-social">
                                        <ul>                       
                                            <?php
                                                if($uas_phone ) {
                                                    echo '<li><a target="_blank" href="tel:'. $uas_phone .'"><i class="fas fa-phone-volume" alt="college Contact Number"></i></a></li>'; 
                                                }
                                                if($uas_email ) {
                                                    echo '<li><a target="_blank" href="mailto:'. $uas_email .'"><i class="far fa-envelope"></i></a></li>'; 
                                                }
                                                if($uas_website ) {
                                                    echo '<li><a target="_blank" href="'. $uas_website .'"><i class="fas fa-globe"></i></a></li>'; 
                                                }
                                                if($uas_facebook ) {
                                                    echo '<li><a target="_blank" href="'. $uas_facebook .'"><i class="fab fa-facebook-f"></i></a></li>'; 
                                                }
                                                if($uas_twitter ) {
                                                    echo '<li><a target="_blank" href="'. $uas_twitter .'"><i class="fab fa-twitter"></i></a></li>';
                                                }
                                                if($uas_linkedin ) {
                                                    echo '<li><a target="_blank" href="'.$uas_linkedin.'"><i class="fab fa-linkedin"></i></a></li>';
                                                }
                                                if($uas_youtube ) {
                                                    echo '<li><a target="_blank" href="'.$uas_youtube.'" alt="Youtube Page"><i class="fab fa-youtube"></i></a></li>';
                                                }
                                                if($uas_instagram ) {
                                                    echo '<li><a target="_blank" href="'.$uas_instagram.'" alt="Instagram Page"><i class="fab fa-instagram"></i></a></li>';
                                                }
                                            ?>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-categories d-flex justify-content-start align-content-center">
                                    <div class="categories-item">	
                                        <span><i class="fas fa-award uas_small" alt="Organizer"></i> University</span>
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
                                <?php }  
                                
                                if($faculties_detail ) {?>

                                <div class="uas-courses"><h2>Courses Available</h2></div>
                                    <div class="post-quote post-quote-2-style d-block d-md-flex align-items-center">
                                        <div class="uas-tab-wrapper">
                                            <ul class="uas-click-button">
                                                <?php
                                                foreach ( (array) $faculties_detail as $key => $entry ) {
                                                    $course_name = ''; if ( isset( $entry['course_name'] ) ) {
                                                    $title = esc_html( $entry['course_name'] ); ?>
                                                    <li><i class='fas fa-graduation-cap'></i><?php echo $title ; ?></li>
                                                    <?php } 
                                                } ?>
                                            </ul>
                                            <div class="uas-tab-content">
                                                <?php
                                                    foreach ( (array) $faculties_detail as $key => $entry ) {

                                                        $course_name = $course_desc = $faculty_banner = '';
                                                        if ( isset( $entry['course_name'] ) ) {
                                                            $title = esc_html( $entry['course_name'] ); 
                                                        }
                                                        if ( isset( $entry['course_desc'] ) ) {
                                                            $desc = wpautop( $entry['course_desc'] );
                                                        }

                                                        if ( isset( $entry['faculty_banner'] ) ) {
                                                            $img = esc_html( $entry['faculty_banner'] );
                                                        } 
                                                        
                                                ?>
                                                    <div class="uas-tab-panel">
                                                        <?php if($img) {
                                                            echo '<p class="faculty-image text-center"><img src="'.$img.'" class="img-responsive"></p>';
                                                        } ?>
                                                        <?php echo $desc; ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; 
                    ?>
            </section>
            

<?php
get_footer();
