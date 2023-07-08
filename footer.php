<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NepaleseinFinland
 */

?>
    <footer class="footer-area">
        <div class="container">
            <div class="footer-topbar">
                <div class="row">
                    <div class="col-lg-3 col-md-3 align-items-center">
                        <div class="footer-logo">
                        <a href="<?php echo get_home_url(); ?>">
						<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
								$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								echo '<img src="'.$image[0].'" class="img-responsive">';?>
						</a>
                            <ul>
							<?php $facebook_link = get_theme_mod('facebook_link');
									$twitter_link = get_theme_mod('twitter_link');
									$instagram_link = get_theme_mod('instagram_link');
									$youtube_link = get_theme_mod('youtube_link');
									$linkedin_link = get_theme_mod('linkedin_link');
									if (!empty($facebook_link)) {
										echo '<li><a href="'.$facebook_link.'" target="_blank"><i class="fab fa-facebook"></i></a></li>';
									}
									if (!empty($twitter_link)) {
										echo '<li><a href="'.$twitter_link.'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
									}
									if (!empty($linkedin_link)) {
										echo '<li><a href="'.$linkedin_link.'" target="_blank"><i class="fab fa-linkedin"></i></a></li>';
									}
									if (!empty($instagram_link)) {
										echo '<li><a href="'.$instagram_link.'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
									}
									if (!empty($youtube_link)) {
										echo '<li><a href="'.$youtube_link.'" target="_blank"><i class="fab fa-youtube"></i></a></li>';
									}
								?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="widget widget-list">
                            <div class="section-title section-title-2">
                                <h3 class="title-footer">News</h3>
                            </div>
                            <div class="list d-flex justify-content-between">
                                <ul>
                                    <?php $terms = get_terms([
                                        'taxonomy' => 'news_category',
                                        'hide_empty' => false,
                                    ]); 
                                    foreach ($terms as $term){
                                        echo '<li class="category-link"><a href="'. esc_url( get_term_link( $term )). '">'.$term->name.'</a></li>';
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="widget widget-list">
                            <div class="section-title section-title-2">
                                <h3 class="title-footer">Events</h3>
                            </div>
                            <div class="list d-flex justify-content-between">
                                <ul>
                                    <?php $terms = get_terms([
                                        'taxonomy' => 'event_category',
                                        'hide_empty' => false,
                                    ]); 
                                    foreach ($terms as $term){
                                        echo '<li class="category-link"><a href="'. esc_url( get_term_link( $term )). '">'.$term->name.'</a></li>';
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="widget widget-list">
                            <div class="section-title section-title-2">
                                <h3 class="title-footer">Universities</h3>
                            </div>
                            <div class="list d-flex justify-content-between">
                                <ul>
                                    <?php $terms = get_terms([
                                        'taxonomy' => 'uas_category',
                                        'hide_empty' => false,
                                    ]); 
                                    foreach ($terms as $term){
                                        echo '<li class="category-link"><a href="'. esc_url( get_term_link( $term )). '">'.$term->name.'</a></li>';
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
	<div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-item d-block d-md-flex justify-content-between align-items-center">
                        <p><?php
						printf( esc_html__( 'Developed and Powered by: %2$s.', 'nepaleseinfinland' ), 'nepaleseinfinland', '<a href="https://ugyen.com.np/">Ugyen</a>' );
					?></p>
                        <ul>
						<?php
							$defaults = array( 'menu' => 'primary_menu', 
							'container' => false, 
							'fallback_cb' => 'wp_page_menu', 
							'items_wrap' => '<ul id="myTab">%3$s</ul>', 
							'add_li_class'  => 'ugyen',
							'theme_location' => 'footer_menu' );
							wp_nav_menu( $defaults ); 
						?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
