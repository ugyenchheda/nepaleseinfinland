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
<div class="preloader">
	<div>
		<div class="nb-spinner"></div>
	</div>
</div>
<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
	<div class="header-topbar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<div class="topbar-trending">
						<span>Trending</span>
						<div class="trending-slider">
							<div class="trending-item">
								<p>Top 10 Best Movies of 2018 So Far: Great Movies To Watch Now </p>
							</div>
							<div class="trending-item">
								<p>Top 10 Best Movies of 2018 So Far: Great Movies To Watch Now </p>
							</div>
							<div class="trending-item">
								<p>Top 10 Best Movies of 2018 So Far: Great Movies To Watch Now </p>
							</div>
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
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
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
				<div class="col-lg-4">
					<div class="logo">
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
					$adv_banner = get_theme_mod('adv_banner', get_template_directory_uri() . '/assets/images/ad/ad-1.png');
					?>
						<a href="<?php echo $adv_link; ?>"><img src="<?php echo $adv_banner ; ?>" alt=""></a>
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
								<li><a href="#"><i class="fal fa-search"></i></a></li>
								<li><a href="#"><i class="fal fa-user-circle"></i></a></li>
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
							<div class="icon">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/temperature-icon.svg" alt="">
							</div>
							<div class="temperature-content text-center">
								<h5 class="title">13 <sup>0<sub>C</sub></sup></h5>
								<p>San Francisco</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</header>

<!--====== HEADER PART ENDS ======-->
