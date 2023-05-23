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
						<p>Thursday, March 26, 2020</p>
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
						<a href="index.html">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
						</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="header-centerbar-ad">
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ad/ad-1.png" alt=""></a>
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
							<ul>
								<li><a class="active" href="">Home</a>
									<ul>
										<li><a href="index.html">Home 1</a>
											<ul>
												<li><a href="index-v-1.1.html">Virsion 1</a></li>
												<li><a href="index-v-1.2.html">Virsion 2</a></li>
												<li><a href="index-v-1.3.html">Virsion 3</a></li>
												<li><a href="index-v-1.4.html">Virsion 4</a></li>
											</ul>
										</li>
										<li><a href="index-2.html">Home 2</a>
											<ul>
												<li><a href="index-v-2.1.html">Virsion 1</a></li>
												<li><a href="index-v-2.2.html">Virsion 2</a></li>
												<li><a href="index-v-2.3.html">Virsion 3</a></li>
												<li><a href="index-v-2.4.html">Virsion 4</a></li>
											</ul>
										</li>
										<li><a href="index-3.html">Home 3</a>
											<ul>
												<li><a href="index-v-3.1.html">Virsion 1</a></li>
												<li><a href="index-v-3.2.html">Virsion 2</a></li>
												<li><a href="index-v-3.3.html">Virsion 3</a></li>
												<li><a href="index-v-3.4.html">Virsion 4</a></li>
											</ul>
										</li>
										<li><a href="index-4.html">Home 4</a>
											<ul>
												<li><a href="index-v-4.1.html">Virsion 1</a></li>
												<li><a href="index-v-4.2.html">Virsion 2</a></li>
												<li><a href="index-v-4.3.html">Virsion 3</a></li>
												<li><a href="index-v-4.4.html">Virsion 4</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="">Pages</a>
									<ul>
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="archive.html">Archive</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="404.html">404</a></li>
									</ul>
								</li>
								<li><a href="">Posts</a>

									<ul>
										<li class="has-sub"><a href="#">General Posts</a>
											<ul>
												<li><a href="post-1.html">Post 1</a>
												</li>
												<li><a href="post-2.html">Post 2</a>
												</li>
												<li><a href="post-3.html">Post 3</a>
												</li>
											</ul>
											<a class="dd-toggle" href="#"><span class="icon-plus"></span></a>
										</li>
										<li class="has-sub"><a href="#">Video Posts</a>
											<ul>
												<li><a href="#">Video Style 1</a>
												</li>
												<li><a href="#">Video Style 2</a>
												</li>
												<li><a href="#">Video Style 3</a>
												</li>
											</ul>
											<a class="dd-toggle" href="#"><span class="icon-plus"></span></a>
										</li>
										<li class="has-sub"><a href="#">Audio Posts</a>
											<ul>
												<li><a href="#">Audio Style 1</a>
												</li>
												<li><a href="#">Audio Style 2</a>
												</li>
												<li><a href="#">Audio Style 3</a>
												</li>
											</ul>
											<a class="dd-toggle" href="#"><span class="icon-plus"></span></a>
										</li>
									</ul>
								</li>
								<li><a href="">Categories </a>
									<ul>
										<li class="active"><a href="business.html">Business</a>
										</li>
										<li><a href="entertainment.html">Entertainment</a>
										</li>
										<li><a href="features.html">Features</a>
										</li>
										<li><a href="sports.html">Sports</a>
										</li>
										<li><a href="trending.html">Trending</a>
										</li>
										<li><a href="technology.html">Technology</a>
										</li>
									</ul>
								</li>
								<li><a href="">World</a></li>
								<li><a href="">Sports</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
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
