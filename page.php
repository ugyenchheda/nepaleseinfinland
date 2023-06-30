<?php
 /* Template Name: Homepage */ 

get_header();
?>



    <!--====== POST PART START ======-->

    <div class="post-area">
        <div class="container">
            <div class="row post-slider">
                <div class="col-lg-4">
                    <div class="single__post">
                        <div class="post-thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-1.jpg" alt="post">
                        </div>
                        <div class="post-content">
                            <h4 class="title"><a href="#">The home decorations document: photograph of an empty plane</a></h4>
                            <p>People have been infected in United…</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single__post">
                        <div class="post-thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-2.jpg" alt="post">
                        </div>
                        <div class="post-content">
                            <h4 class="title"><a href="#">U.S. Response subash says he will label regions by risk of…</a></h4>
                            <p>People have been infected in United…</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single__post">
                        <div class="post-thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-3.jpg" alt="post">
                        </div>
                        <div class="post-content">
                            <h4 class="title"><a href="#">Stimul package will fundamentally transform the government.</a></h4>
                            <p>People have been infected in United…</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single__post">
                        <div class="post-thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-2.jpg" alt="post">
                        </div>
                        <div class="post-content">
                            <h4 class="title"><a href="#">U.S. Response subash says he will label regions by risk of…</a></h4>
                            <p>People have been infected in United…</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== POST PART ENDS ======-->

    <!--====== Video Blogs Presentation ======-->

    <div class="post__gallery__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post_gallery_slider">
                        
                    <?php
                        $args = array(
                            'post_type' => 'video_blogs', 
                            'meta_key' => 'news_hot',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC', 
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'news_hot',
                                    'value' => '3',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'news_hot',
                                    'value' => '2',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'news_hot',
                                    'value' => '1',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                            ),
                            'posts_per_page' => 10,
                        );
                        
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo ' 
                                <div class="post_gallery_play">
                                <div class="bg-image" style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'feature_galleries') . ');"></div>
                                <div class="post__gallery_play_content">
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
                                    
                            <h3 class="title"><a class="video-popup" href="'.get_post_meta($post->ID,'video_link', true).'" a>' . get_the_title() . '</a></h3>
                            <p class="text">'. wp_trim_words(get_the_excerpt(), 25) .'</p></div>
                            <div class="post_play_btn">
                                <a class="video-popup" href="https://www.youtube.com/watch?v=4mGyYNuG6us" a><i class="fas fa-play"></i></a>
                            </div></div>';
                            }
                        } else {
                            // No posts found
                        }
                        
                        // Restore original post data
                        wp_reset_postdata();
                        
                    ?>
                </div>
                <div class="post_gallery_inner_slider">
                <?php
                        $args = array(
                            'post_type' => 'video_blogs', 
                            'meta_key' => 'news_hot',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC', 
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'news_hot',
                                    'value' => '3',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'news_hot',
                                    'value' => '2',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'news_hot',
                                    'value' => '1',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                            ),
                            'posts_per_page' => 5,
                        );
                        
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo ' 
                    <div class="item">
                    ' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '
                    </div>';
                            }
                        } else {
                            // No posts found
                        }
                        
                        // Restore original post data
                        wp_reset_postdata();
                        
                    ?>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="post_gallery_sidebar">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">TRENDY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">LATEST</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">POPULAR</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="post_gallery_items">
                                    <div class="gallery_item">
                                        <div class="gallery_item_thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.jpg" alt="gallery">
                                        </div>
                                        <div class="gallery_item_content">
                                            <div class="post-meta">
                                                <div class="meta-categories">
                                                    <a href="#">TECHNOLOGY</a>
                                                </div>
                                                <div class="meta-date">
                                                    <span>March 26, 2020</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="#">Copa America: Luis Suarez from devastated US</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="post_gallery_items">
                                    <div class="gallery_item">
                                        <div class="gallery_item_thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.jpg" alt="gallery">
                                        </div>
                                        <div class="gallery_item_content">
                                            <div class="post-meta">
                                                <div class="meta-categories">
                                                    <a href="#">TECHNOLOGY</a>
                                                </div>
                                                <div class="meta-date">
                                                    <span>March 26, 2020</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="#">Copa America: Luis Suarez from devastated US</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="post_gallery_items">
                                    <div class="gallery_item">
                                        <div class="gallery_item_thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.jpg" alt="gallery">
                                        </div>
                                        <div class="gallery_item_content">
                                            <div class="post-meta">
                                                <div class="meta-categories">
                                                    <a href="#">TECHNOLOGY</a>
                                                </div>
                                                <div class="meta-date">
                                                    <span>March 26, 2020</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="#">Copa America: Luis Suarez from devastated US</a></h4>
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

    <!--====== POST GALLERY PART ENDS ======-->

    <!--====== UAS PART START ======-->

    <section class="feature-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="title">Universitites of Applied Sciences</h3>
                    </div>
                </div>
            </div>
            <div class="row feature-post-slider">
                <?php 
                    query_posts(array( 
                        'post_type' => 'uas',
                    ) );  
                    ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-3">
                        <div class="feature-post">
                            <div class="feature-post-thumb">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large'); ?>" class="img-responsive" alt="<?php the_title(); ?>">
                                
                            </div>
                            <div class="feature-post-content">
                                <div class="post-meta">
                                    <div class="meta-categories">
                                        <a href="#"><?php echo get_post_type( get_the_ID() );?></a>
                                    </div>
                                    <div class="meta-date">
                                        <span><?php echo get_the_date('l, F j,  Y'); ?></span>
                                    </div>
                                </div>
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </section>

    <!--====== UAS PART ENDS ======-->

    <!--====== TRENDING NEWS PART START ======-->

    <section class="trending-news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="title">Trending News</h3>
                    </div>
                    <div class="row trending-news-slider">
                    <?php
                        $args = array(
                            'post_type' => 'news', // Replace 'your_custom_post_type' with the actual name of your custom post type
                            'meta_key' => 'news_hot',
                            'orderby' => 'meta_value_num', // Sort by meta value as numeric
                            'order' => 'DESC', // Sort in descending order
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'news_hot',
                                    'value' => '3',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'news_hot',
                                    'value' => '2',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'news_hot',
                                    'value' => '1',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                            ),
                            'posts_per_page' => 6,
                        );
                        
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '<div class="col-lg-4 col-md-4">
                                        <div class="trending-news-item">
                                            <div class="trending-news-thumb">
                                                ' . get_the_post_thumbnail($post->ID, 'post_image_l') . '
                                                <div class="icon">
                                                    <a href="#"><i class="fas fa-bolt"></i></a>
                                                </div>
                                            </div>
                                            <div class="trending-news-content">
                                                <div class="post-meta">';
                                                $taxonomies = get_object_taxonomies('news');

                                                foreach ($taxonomies as $taxonomy) {
                                                    if (!in_array($taxonomy, ['category', 'post_tag'])) {
                                                        $terms = get_the_terms(get_the_ID(), $taxonomy);
                                                        if ($terms && !is_wp_error($terms)) {
                                                            echo '<div class="meta-taxonomy">';
                                                            foreach ($terms as $term) {
                                                                echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
                                                            }
                                                            echo '</div>';
                                                        }
                                                    }
                                                }
                                echo '<div class="meta-date">
                                        <span>' . get_the_date('F j, Y') . '</span>
                                    </div>
                                </div>
                                <h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                <p class="text">'. wp_trim_words(get_the_excerpt(), 25) .'</p>
                            </div>
                        </div>
                        </div>';
                            }
                        } else {
                            // No posts found
                        }
                        
                        // Restore original post data
                        wp_reset_postdata();
                        
                    ?>
                    </div>
                    <div class="row">
                    <?php
                        $args = array(
                            'post_type' => 'news', // Replace 'your_custom_post_type' with the actual name of your custom post type
                            'meta_key' => 'news_hot',
                            'posts_per_page' => 6,
                        );
                        
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '
                                <div class="col-lg-6 col-md-6">
                                    <div class="trending-news-post-items">
                                        <div class="gallery_item">
                                            <div class="gallery_item_thumb">
                                            ' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '
                                                <div class="icon"><i class="fas fa-bolt"></i></div>
                                            </div>
                                            <div class="gallery_item_content">
                                                <div class="post-meta">';?>
                                               <?php 
                                                $taxonomies = get_object_taxonomies('news'); 

                                                foreach ($taxonomies as $taxonomy) {
                                                    if (!in_array($taxonomy, ['category', 'post_tag'])) {
                                                        $terms = get_the_terms(get_the_ID(), $taxonomy);
                                                        if ($terms && !is_wp_error($terms)) {
                                                            echo '<div class="meta-taxonomy">';
                                                            foreach ($terms as $term) {
                                                                echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
                                                            }
                                                            echo '</div>';
                                                        }
                                                    }
                                                }
                                                echo '<div class="meta-date">
                                                        <span>' . get_the_date('F j, Y') . '</span>
                                                    </div>
                                                </div>
                                                <h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            // No posts found
                        }
                        
                        // Restore original post data
                        wp_reset_postdata();
                        
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== TRENDING NEWS PART ENDS ======-->

    <!--====== SINGLE PLAY POST PART START ======-->

    <section class="single-play-post-area mt-10">
        <div class="container custom-container">
            <div class="single-play-box">
                <div class="row single-play-post-slider">
                
                <?php
                        $args = array(
                            'post_type' => 'event_post_type', // Replace 'your_custom_post_type' with the actual name of your custom post type
                            'meta_key' => 'event_hot',
                            'orderby' => 'meta_value_num', // Sort by meta value as numeric
                            'order' => 'DESC', // Sort in descending order
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'event_hot',
                                    'value' => '3',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'event_hot',
                                    'value' => '2',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => 'event_hot',
                                    'value' => '1',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                            ),
                            'posts_per_page' => 5,
                        );
                        
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '<div class="col-lg-6">
                                        <div class="single-play-post-item">
                                            <div class="trending-news-thumb">
                                                ' . get_the_post_thumbnail($post->ID, 'post_image_xl') . '
                                                <div class="icon">
                                                    <a href="#"><i class="fas fa-bolt"></i></a>
                                                </div>
                                            </div>
                                            <div class="single-play-post-content">
                                                <div class="post-meta">';
                                                $taxonomies = get_object_taxonomies('event_post_type'); // Replace 'post' with your desired post type

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
                                                }
                                ?>
                                <div class="meta-date">
                                    <span><?php 
                                    $event_sdate = get_post_meta( get_the_ID(), 'event_sdate', true );
                                    $event_edate = get_post_meta( get_the_ID(), 'event_edate', true );
                                    echo $event_sdate; if ($event_edate) { echo " - $event_edate";}?> </span>
                                </div>
                                <?php echo '</div>
                                <h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                            </div>
                            <div class="play-btn">
                                <a class="video-popup" href="' . get_the_permalink() . '"><i class="far fa-calendar-alt"></i></a>
                            </div>
                        </div>
                        </div>';
                            }
                        } else {
                            // No posts found
                        }
                        
                        // Restore original post data
                        wp_reset_postdata();
                        
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!--====== SINGLE PLAY POST PART ENDS ======-->

    <!--====== VIDEO NEWS PART START ======-->

    <section class="video-news-area">
        <div class="container custom-container">
            <div class="video-news-box">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="video-news-post">
                            <div class="section-title section-title-2">
                                <h3 class="title">Videos News</h3>
                            </div>
                            <div class="video-news-post-item">
                                <div class="video-news-post-thumb">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/video-post-thumb.jpg" alt="">
                                    <div class="play-btn">
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=HalMzk1FFM0"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                                <div class="video-news-post-content">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Riots Report Shows London Needs To Maintain Police Numbers, Says Mayor</a></h3>
                                </div>
                            </div>
                        </div>
                    </div> <div class="col-lg-4">
                    <div class="trending-right-sidebar">
                        <div class="trending-most-view mt-25">
                            <div class="section-title">
                                <h3 class="title">Most Interacted News</h3>
                            </div>
                        </div>
                        <div class="trending-sidebar-slider">
                            <div class="post_gallery_items"><?php
                            $args = array(
                                'post_type'      => 'news', // Change 'post' to your desired post type if needed
                                'posts_per_page' => 5,     // Adjust the number of posts you want to retrieve
                                'orderby'        => 'comment_count',
                            );
                            
                            $query = new WP_Query($args);
                            
                            if ($query->have_posts()) {
                                $count = 1;
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    // Output the post title or perform other actions
                                    echo '
                                    <div class="gallery_item gallery_item-style-2">
                                        <div class="gallery_item_thumb">
                                        ' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '
                                            <div class="icon"><i class="fas fa-star"></i></div>
                                        </div>
                                        <div class="gallery_item_content">
                                            <div class="post-meta">
                                            ';?>
                                            <?php 
                                             $taxonomies = get_object_taxonomies('news'); // Replace 'post' with your desired post type

                                             foreach ($taxonomies as $taxonomy) {
                                                 if (!in_array($taxonomy, ['category', 'post_tag'])) {
                                                     $terms = get_the_terms(get_the_ID(), $taxonomy);
                                                     if ($terms && !is_wp_error($terms)) {
                                                         echo '<div class="meta-categories">';
                                                         foreach ($terms as $term) {
                                                             echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
                                                         }
                                                         echo '</div>';
                                                     }
                                                 }
                                             }
                                             echo '
                                                <div class="meta-date">
                                                    <span>' . get_the_date('F j, Y') . '</span>
                                                </div>
                                            </div>
                                            <h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                                            <span>'.$count++.'</span>
                                        </div>
                                    </div>';
                                }
                            } else {
                                echo 'No posts found.';
                            }
                            
                            wp_reset_postdata();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== VIDEO NEWS PART ENDS ======-->

    <!--====== ALL POST PART START ======-->

    <section class="all-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="post-entertainment">
                        <div class="section-title">
                            
					<?php $hompage_news_title = get_theme_mod('hompage_news_title');?>
                            <h3 class="title"><?php echo $hompage_news_title; ?></h3>
                        </div>
                        <div class="row">
                            
							<?php 
                                $hompeage_news = get_theme_mod('hompeage_news');
                                $news_number = get_theme_mod('homepage_news_number');
                                $custom_terms = get_terms('news_category');
                                foreach($custom_terms as $custom_term) {
                                    wp_reset_query();
                                    $args = array('post_type' => 'news',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'news_category',
                                                'field' => 'term_id',
                                                'terms' => $hompeage_news,
                                                'posts_per_page' => $news_number,  
                                            ),
                                        ),
                                    );

                                    $loop = new WP_Query($args);
                                    if($loop->have_posts()) {
                                        while($loop->have_posts()) : $loop->the_post();
                                            echo '<div class="col-lg-6 col-md-6">
                                            <div class="trending-news-item mb-30">
                                                <div class="trending-news-thumb">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/entertainment-1.jpg" alt="trending">
                                                    <div class="circle-bar">
            
                                                        <div class="first circle">
                                                            <strong></strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="trending-news-content">
                                                    <div class="post-meta">
                                                        <div class="meta-categories">
                                                            <a href="#">TECHNOLOGY</a>
                                                        </div>
                                                        <div class="meta-date">
                                                            <span>March 26, 2020</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="title"><a href="#">There may be no consoles in the future ea exec says</a></h3>
                                                    <p class="text">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
                                                </div>
                                            </div>
                                        </div>';
                                        endwhile;
                                    } else {
                                        echo '<div class="trending-item"><p>There is no NEWS trending currenlty...</p></div>';
                                    }
                                }?>

                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="all-post-sidebar">
                        <div class="Categories-post mt-40">
                            <div class="section-title d-flex justify-content-between align-items-center">
                                <h3 class="title">Categories</h3>
                                <a href="#">ALL SEE</a>
                            </div>
                            <div class="Categories-item">
                                
                            <?php
                                $custom_post_type = 'news'; // Replace 'your_custom_post_type' with the actual name of your custom post type

                                $taxonomies = get_object_taxonomies($custom_post_type, 'objects');

                                if ($taxonomies) {
                                    foreach ($taxonomies as $taxonomy) {
                                        // Exclude the "tags" taxonomy
                                        if ($taxonomy->name === 'post_tag') {
                                            continue;
                                        }

                                        $terms = get_terms($taxonomy->name);
                                        if ($terms) {
                                            foreach ($terms as $term) {
                                                $news_taxonomy_banner = get_term_meta($term->term_id, 'news_category_thumbnail', true);
                                                $post_count = $term->count;
                                                echo '<div class="item">
                                                <img src="'.$news_taxonomy_banner.'" alt="categories">
                                                <div class="Categories-content">
                                                    <a href="' . esc_url(get_term_link($term)) . '">
                                                        <span>' . $term->name . '<b class="post-count">(' . $post_count . ')</b></span>
                                                        
                                                        <img src="'.get_template_directory_uri().'/assets/images/arrow.svg" alt="post image">
                                                    </a>
                                                </div>
                                            </div>';
                                            }
                                            echo '</div>';
                                        } else {
                                            echo '<li>No terms found for ' . $taxonomy->label .'</li>';
                                        }
                                    }
                                    echo '
                                    </div>';
                                } else {
                                    echo 'No taxonomies found for this post type.';
                                }
                            ?>
                                
                            </div>
                            <?php 
                                $adv_link = get_theme_mod('adv_banner_link');
                                $adv_banner = get_theme_mod('adv_banner', get_template_directory_uri() . '/assets/images/ad/ad-1.png');
                                if(!empty($adv_banner)) {?>
                                    <div class="sidebar-add pt-35">
                                        <a href="<?php echo $adv_link; ?>"><img src="<?php echo $adv_banner ; ?>"  class="img-responsive"></a>
                                    </div>
                                <?php }; ?>
                        </div>
                    </div>
                    
                    
                    <?php 
                                $footer_adv_link = get_theme_mod('footer_adv_link');
                                $adv_banner_footer = get_theme_mod('adv_banner_footer', get_template_directory_uri() . '/assets/images/ad/ad-1.png');
                                if(!empty($adv_banner_footer)) {?>
                                    <div class="sidebar-add mt-30">
                                        <a href="<?php echo $footer_adv_link; ?>"><img src="<?php echo $adv_banner_footer ; ?>"  class="img-responsive"></a>
                                    </div>
                                <?php }; ?>
                </div>
            </div>
        </div>
    </section>

    <!--====== ALL POST PART ENDS ======-->

    <!--====== FOOTER PART START ======-->




    <!--====== FOOTER PART ENDS ======-->

    <!--====== GO TO TOP PART START ======-->

    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fa fa-angle-double-up"></i>
                    <i class="fa fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>

    <!--====== GO TO TOP PART ENDS ======-->




</body>

<?php
//get_sidebar();
get_footer();
