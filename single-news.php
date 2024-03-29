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
            $news_hot = get_post_meta( $post_id, 'news_hot', true );
            $news_author = get_post_meta( $post_id, 'news_author', true );
            $news_image = get_post_meta( $post_id, 'news_image', true );

            ?>
    <section class="post-layout-1-area post-layout-3-area pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-author-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Worldnews</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Health</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="post-layout-top-content post-layout-top-content-3">
                        <div class="post-categories d-flex justify-content-between align-content-center">
                            <div class="categories-share">
                                <ul>
                                    <li><i class="fas fa-comment"></i><?php echo get_comments_number(); ?></li>
                                    <li><i class="fas fa-fire"></i>45020</li>
                                    <li>6 minutes read</li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-content">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <div class="post-author">
                                <div class="author-info">
                                    <div class="thumb">
                                        <img src="assets/images/author.png" alt="">
                                    </div>
                                    <h5 class="title">Author: <?php echo $news_author; ?></h5>
                                    <ul>
                                        <li><?php echo get_the_date(); ?></li>
                                    </ul>
                                </div>
                                <div class="author-social">
                                    <ul>  Share:                          
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
                            <div class="thumb">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                
                            </div>
                        </div>
                        <div class="post-text mt-35">
                            <?php the_content();?>
                            
                            <?php if($news_image) {
                                echo '<p class="faculty-image text-center"><img src="'.$news_image.'" class="img-responsive"></p>';
                            } ?>

                        </div>
                        <div class="post-tags">
                            <ul>
                                <li><a><i class="fas fa-tag"></i> Categories</a></li>
                            <?php 
                                $terms = get_the_terms( $post->ID, 'news_category' ); 
                                foreach($terms as $term) {
                                echo '<li class="category-link"><a href="'. esc_url( get_term_link( $term )). '">'.$term->name.'</a></li>';
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="post-reader-text post-reader-text-2 post-reader-text-3 pt-50">
                        <div class="archive-btn for-search">
                            <span class="searchresult-topic">Related News</span>
                        </div>
                        <div class="row">
                            
                        <?php
                        
                            if ($terms && !is_wp_error($terms)) {
                                foreach($terms as $term) {

                                    // Query arguments for related posts
                                    $related_args = array(
                                        'post_type' => 'news',
                                        'tax_query' => array(
                                            'relation' => 'AND', // To apply both conditions (taxonomy and post__not_in)
                                            array(
                                                'taxonomy' => 'news_category',
                                                'field' => 'slug',
                                                'terms' => $term->slug,
                                            ),
                                        ),
                                        'post__not_in' => array($post->ID),
                                        'posts_per_page' => 1,
                                    );

                                    // The Query for related posts
                                    $related_query = new WP_Query($related_args);

                                    // The Loop for related posts
                                    if ($related_query->have_posts()) {
                                        while ($related_query->have_posts()) {
                                            $related_query->the_post();
                                            echo '<div class="col-md-6">
                                            <div class="post-reader-prev">
                                                <span>PREVIOUS NEWS <i class="fal fa-angle-right"></i></span>
                                                <h4 class="title"><a href="'. get_the_permalink(). '">'.get_the_title().'</a></h4>
                                            </div>
                                        </div>';
                                        }
                                    }

                                    // Reset Post Data for related posts
                                    wp_reset_postdata();
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post_gallery_sidebar mt-20">
                        <div class="trending-sidebar mt-40">
                            <div class="section-title">
                                <h3 class="title">Trending News</h3>
                            </div>
                            <div class="row trending-sidebar-slider">
							<?php 

								$news_highlight = get_theme_mod('news_highlight');
								$news_number = get_theme_mod('news_number');
								$custom_terms = get_terms('news_category');

								foreach($custom_terms as $custom_term) {
									wp_reset_query();
									$args = array(
										'post_type' => 'news',
										'tax_query' => array(
											array(
												'taxonomy' => 'news_category',
												'field' => 'term_id',
												'terms' => $news_highlight,
											),
										),
										'posts_per_page' => 2,
									);

									$loop = new WP_Query($args);
									if($loop->have_posts()) {
										while($loop->have_posts()) : $loop->the_post();
                            echo '<div class="col-lg-6">
                                    <div class="trending-news-item">
                                        <div class="trending-news-thumb">
                                        '.get_the_post_thumbnail(get_the_ID(), 'post_image_l').'
                                            <div class="icon">
                                                <a href="'.get_the_permalink().'"><i class="fas fa-bolt"></i></a>
                                            </div>
                                        </div>
                                        <div class="trending-news-content">
                                            <div class="post-meta">
                                                <div class="meta-categories">';
                                                $taxonomies = get_object_taxonomies('news'); // Replace 'post' with your desired post type
                                                foreach ($taxonomies as $taxonomy) {
                                                    if (!in_array($taxonomy, ['category', 'post_tag'])) {
                                                        $terms = get_the_terms(get_the_ID(), $taxonomy);
                                                        if ($terms && !is_wp_error($terms)) {
                                                            echo '<div class="meta-categories">';
                                                            $term = reset($terms);
                                                                echo '<a href="' . esc_url(get_term_link($term)) . '" class="home-event">' . esc_html($term->name) . '</a> ';
                                                            echo '</div>';
                                                        }
                                                    }
                                                }
                                                echo '</div>
                                                <div class="meta-date">
                                                    <span>'.get_the_date().'</span>
                                                </div>
                                            </div>
                                            <h3 class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                                            <p class="text">' . wp_trim_words(get_the_excerpt(), 20) . '</p>
                                        </div>
                                    </div>
                                </div>
                            ';endwhile;
                        } else {
                            echo '<div class="trending-item"><p>There is no NEWS trending currenlty...</p></div>';
                        }
                    }?></div>
                        </div>
                        <div class="sidebar-add pt-40">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ad/ad-2.jpg" alt="ad"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== POST LAYOUT 1 PART ENDS ======-->


    <div class="container">
            <?php if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            endwhile; // End of the loop.
            ?>
            </div>
    <!--====== LATEST NEWS PART START ======-->

    <section class="latest-news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="title">Our latest news</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php 
            $latest_news_args = array(
                'post_type' => 'news',
                'posts_per_page' => 3, 
                'orderby' => 'date', 
                'order' => 'DESC', 
            );
            
            $latest_news_query = new WP_Query($latest_news_args);
            if ($latest_news_query->have_posts()) {
                while ($latest_news_query->have_posts()) {
                    $latest_news_query->the_post();
                    echo '<div class="col-lg-4">
                    <div class="trending-news-item mb-30">
                        <div class="trending-news-thumb">
                            '.get_the_post_thumbnail($post->ID, 'post_image_l').'
                        </div>
                        <div class="trending-news-content">
                            <div class="post-meta">
                                <div class="meta-categories">
                                    <a href="'. esc_url( get_term_link( $term )). '">'.$term->name.'</a>
                                </div>
                                <div class="meta-date">
                                    <span>'.get_the_date().'</span>
                                </div>
                            </div>
                            <h3 class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                            <p class="text">'.wp_trim_words(get_the_excerpt(), 25, '...').'</p>
                        </div>
                    </div>
                </div>';
                }
            }
            wp_reset_postdata();
            
        ?>
        </div>
    </section>
    <!--====== LATEST NEWS PART ENDS ======-->


            <?php
                      
get_footer();
