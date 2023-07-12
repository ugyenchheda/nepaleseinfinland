<?php get_header(); ?>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-author-content pt-15">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Home</a></li>
                            <li class="breadcrumb-item">Search Page</li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html(single_term_title()); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="about-tab-btn mt-40">
                    <div class="archive-btn">
                        <ul>
                            <li><?php printf( esc_html__( 'Search Results for: %s', 'nepaleseinfinland' ), '<span>' . get_search_query() . '</span>' ); ?></li>
                        </ul>
                    </div>
                    <div class="about-post-items">
                        <div class="row">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="trending-image-post feature-item mt-30">
                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'post_image_l'); ?>
                                        <div class="trending-image-content" id="post-<?php the_ID(); ?>">
                                            <div class="post-meta">
                                                <div class="meta-categories my_posttypes">
												<?php 
													$post_type = get_post_type(); 
													echo $post_type;
												?>
												</div>
												<div class="meta-categories"><?php
												$taxonomies = get_object_taxonomies($post_type); // Replace 'post' with your desired post type
													foreach ($taxonomies as $taxonomy) {
														if (!in_array($taxonomy, ['category', 'post_tag'])) {
															$terms = get_the_terms(get_the_ID(), $taxonomy);
															if ($terms && !is_wp_error($terms)) {
																echo '<div class="meta-categories">';
																foreach ($terms as $term) {
																	echo '<a href="' . esc_url(get_term_link($term)) . '" class="home-event">' . esc_html($term->name) . '</a> ';
																}
																echo '</div>';
															}
														}
													}?>
                                                </div>
                                                <div class="meta-date">
                                                    <span><?php echo get_the_date(); ?></span>
                                                </div>
                                            </div>
                                            <h3 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
                        <?php
                            global $wp_query;
                            $big = 999999999; // need an unlikely integer

                            $pages = paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $wp_query->max_num_pages,
                                'prev_text' => '<span aria-hidden="true"><i class="fas fa-caret-left"></i></span>',
                                'next_text' => '<span aria-hidden="true"><i class="fas fa-caret-right"></i></span>',
                                'type'  => 'array',
                            ));
                            if (is_array($pages)) {
                                $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged'); ?>
                                <div class="pagination-item pt-40">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <?php foreach ($pages as $page) { ?>
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
    </div>
</section>

<?php get_footer(); ?>