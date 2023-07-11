<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NepaleseinFinland
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nepaleseinfinland' ); ?></a>

	<body class="home-1-bg">

<!--====== PRELOADER PART START ======-->
<!-- <div class="preloader">
	<div>
		<div class="nb-spinner"></div>
	</div>
</div> -->
<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
	<div class="header-topbar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<div class="topbar-trending">
					<?php $news_title = get_theme_mod('news_title');?>
						<span><?php echo $news_title; ?></span>
						<div class="trending-slider">
							<?php 

								$news_highlight = get_theme_mod('news_highlight');
								$news_number = get_theme_mod('news_number');
								$custom_terms = get_terms('news_category');

								foreach($custom_terms as $custom_term) {
									wp_reset_query();
									$args = array('post_type' => 'news',
										'tax_query' => array(
											array(
												'taxonomy' => 'news_category',
												'field' => 'term_id',
												'terms' => $news_highlight,
                                                'posts_per_page' => $news_number,  
											),
										),
									);

									$loop = new WP_Query($args);
									if($loop->have_posts()) {
										while($loop->have_posts()) : $loop->the_post();
											echo '<div class="trending-item"><p><a href="'.get_permalink().'">'.get_the_title().'</a></p></div>';
										endwhile;
									} else {
										echo '<div class="trending-item"><p>There is no NEWS trending currenlty...</p></div>';
									}
								}?>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="topbar-social d-flex align-items-center">
						<?php date_default_timezone_set('Europe/Helsinki');
								echo date('l, F j,  Y');
						?>
						<div class="social">
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
				</div>
			</div>
		</div>
	</div>


	<div class="header-centerbar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3">
					<div class="logo text-center">
						<a href="<?php echo get_home_url(); ?>">
						<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
								$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								echo '<img src="'.$image[0].'" class="img-responsive">';?>
						</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="header-centerbar-ad">
						
					<?php $adv_link = get_theme_mod('link_to_adv');
					$adv_banner = get_theme_mod('adv_banner_head', get_template_directory_uri() . '/assets/images/ad/ad-1.png');
					?>
						<a href="<?php echo $adv_link; ?>"><img src="<?php echo $adv_banner ; ?>"  class="img-responsive"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-menubar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8 col-sm-3 col-3">
					<div class="header-menu">
						<div class="stellarnav">
						<?php
							$defaults = array( 'menu' => 'primary_menu', 
							'container' => false, 
							'fallback_cb' => 'wp_page_menu', 
							'items_wrap' => '<ul id="myTab">%3$s</ul>', 
							'add_li_class'  => 'ugyen',
							'theme_location' => 'primary_menu' );
							wp_nav_menu( $defaults ); 
						?>
						</div><!-- .stellarnav -->
					</div>
				</div>
				<div class="col-lg-4 col-sm-9 col-9">
					<div class="header-menu-rightbar">
						<div class="header-menu-search">
							<ul>
								<li><div class="box">
    <form name="search">
        <input type="text" class="input" name="txt" onmouseout="this.value = ''; this.blur();">
    </form>
    <i class="fas fa-search"></i>

</div></li>
							</ul>
						</div>
						<div class="nice-select-item">
							<select>
								<option data-display="English">English</option>
								<option value="1">Bangla</option>
								<option value="2">Hindi</option>
								<option value="3">option</option>
								<option value="4">Potato</option>
							</select>
						</div>
						<div class="header-temperature">
							<div class="temperature-content text-center">
							<h5 class="title">
							
							<div id="id9097fe44a8977" a='{"t":"s","v":"1.2","lang":"en","locs":[],"ssot":"c","sics":"ds","cbkg":"#FFFFFF","cfnt":"rgba(139,134,134,1)","slfs":19,"slis":20,"slgp":1,"slbr":0,"slpd":3}'><a href="https://sharpweather.com/widgets/">HTML Weather widget for website by sharpweather.com</a></div><script async src="https://static1.sharpweather.com/widgetjs/?id=id9097fe44a8977"></script>				</div>
			</div>
		</div>

	</div>
</header>

<!--====== HEADER PART ENDS ======-->
