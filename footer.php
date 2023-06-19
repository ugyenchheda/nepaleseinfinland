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
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-5">
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
                    <div class="col-lg-5 col-md-7">
                        <div class="footer-newaletter">
                            <div class="input-box">
                                <input type="text" placeholder="Your email address">
                                <button type="button">SIGN UP</button>
                            </div>
                            <p>We hate spam as much as you do</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-widget-area">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="footer-widget-right-border">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="widget widget-list">
                                        <div class="section-title section-title-2">
                                            <h3 class="title">News categories</h3>
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
                                            <ul>
                                                <li><a href="#">Education</a></li>
                                                <li><a href="#">Obituaries</a></li>
                                                <li><a href="#">Corrections</a></li>
                                                <li><a href="#">Education</a></li>
                                                <li><a href="#">Today’s Paper</a></li>
                                                <li><a href="#">Corrections</a></li>
                                                <li><a href="#">Foods</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="widget widget-list widget-list-2">
                                        <div class="section-title section-title-2">
                                            <h3 class="title">Living</h3>
                                        </div>
                                        <div class="list d-flex justify-content-between">
                                            <ul>
                                                <li><a href="#">Crossword</a></li>
                                                <li><a href="#">Food</a></li>
                                                <li><a href="#">Automobiles</a></li>
                                                <li><a href="#">Education</a></li>
                                                <li><a href="#">Health</a></li>
                                                <li><a href="#">Magazine</a></li>
                                                <li><a href="#">Weddings</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#">Classifieds</a></li>
                                                <li><a href="#">Photographies</a></li>
                                                <li><a href="#">NYT Store</a></li>
                                                <li><a href="#">Journalisms</a></li>
                                                <li><a href="#">Public Editor</a></li>
                                                <li><a href="#">Tools & Services</a></li>
                                                <li><a href="#">My Account</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-rightbar mt-60">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="widget widget-news">
                                        <div class="section-title section-title-2">
                                            <h3 class="title">Visit Our Facebook Page</h3>
                                        </div>
                                        <div class="footer-news">
										<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0&appId=295072851144465&autoLogAppEvents=1" nonce="Al0PyavC"></script>
		<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="" data-height="280" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
