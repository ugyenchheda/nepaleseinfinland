<?php
/**
 * The template for displaying UAS - category archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NepaleseinFinland
 */

get_header();
?>

<section class="about-item-area">
	<div class="container">
		<div class="row">
				<div class="about-author-content pt-15">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Video Blogs</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo single_term_title();?></li>
						</ol>
					</nav>
				</div>
			</div>
				<div class="about-tab-btn mt-40">
					<div class="archive-btn">
						<div class="archive-btn for-search">
							Video Category: <span class="searchresult-topic"><?php echo single_term_title();?></span>
						</div>
					</div>
					<div class="about-post-items video-blog-category">
						<div class="row">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                                $video_link = get_post_meta( get_the_ID(), 'video_link', true );
                                $get_video_id = get_youtube_video_id($video_link);
                                $final_video = 'https://www.youtube.com/watch?v='. $get_video_id;
                                echo '<div class="col-md-4 col-lg-4">
										<div class="trending-image-post feature-item mt-30">
											<div class="bg-image" style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'feature_galleries') . ');"></div>
											<div class="post__gallery_play_content trending-image-content">
												<div class="post-meta">';
													$terms = get_the_terms($post->ID, 'video_blogs_category'); // Replace 'post' with your desired post type
													if ($terms && !is_wp_error($terms)) {
														echo '<div class="meta-categories">';
														foreach ($terms as $term) {
															echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
														}
														echo '</div>';
													}
													echo '<div class="meta-date">
															<span>' . get_the_date('F j, Y') . '</span>
														</div>
												</div>
												
												<h3 class="title"><a class="video-popup" href="'.$final_video.'" a>' . get_the_title() . '</a></h3>
												<p class="text">'. wp_trim_words(get_the_excerpt(), 25) .'</p>
											</div>
											<div class="post_play_btn">
												<a class="video-popup" href="'.$final_video.'" a><i class="fas fa-play"></i></a>
											</div>
										</div>
										</div>';
								 endwhile; endif; ?>
						</div>
							<?php
								global $wp_query;
								$big = 999999999; // need an unlikely integer

								$pages = paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $wp_query->max_num_pages,
										'prev_text' => '<span aria-hidden="true"><i class="fas fa-caret-left"></i></span>',
										'next_text' => '<span aria-hidden="true"><i class="fas fa-caret-right"></i></span>',
										'type'  => 'array',
									) );
							if( is_array( $pages ) ) {
								$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged'); ?>
								<div class="pagination-item pt-40">
									<nav aria-label="Page navigation example">
										<ul class="pagination">
											<?php
											foreach ( $pages as $page ) { ?>
												<li><?php echo $page; ?></li>
											<?php } ?>
										</ul>
									</nav>
								</div>
							<?php } ?>        
						</div>
					</div>
		</div>
	</div>
</section>


<?php
get_footer();
