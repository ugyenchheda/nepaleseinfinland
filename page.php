<?php
 /* Template Name: Homepage */ 

get_header();
global $wp_query;
?>



    <!--====== POST PART START ======-->
    <div class="post-area">
        <div class="container">
            <div class="row post-slider">
                        <?php 
                        $homepage_topslider_posttype = get_theme_mod('homepage_topslider_posttype');
                        $post_number = get_theme_mod('post_number'); 
                        
                        $args = array(
                            'post_type' => $homepage_topslider_posttype,
                            'posts_per_page' => $post_number, // Number of posts to display
                            'orderby' => 'date', // Order posts by date
                            'order' => 'DESC', // Display posts in descending order (latest first)
                        );
                        
                        $query = new WP_Query($args);
                        
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '
                                <div class="col-lg-4">
                                    <div class="single__post">
                                        <div class="post-thumb"><a href="' . get_the_permalink() . '">' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '</a></div>
                                        <div class="post-content">
                                            <h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                                            <p>' . wp_trim_words(get_the_excerpt(), 6) . '</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            // No posts found
                        }
                        
                        // Restore original post data
                        wp_reset_postdata();?>
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
                                $video_link = get_post_meta( get_the_ID(), 'video_link', true );
                                $get_video_id = get_youtube_video_id($video_link);
                                $final_video = 'https://www.youtube.com/watch?v='. $get_video_id;
                                echo $final_video;
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
                                        
                                        <h3 class="title"><a class="video-popup" href="'.$final_video.'" a>' . get_the_title() . '</a></h3>
                                        <p class="text">'. wp_trim_words(get_the_excerpt(), 25) .'</p>
                                    </div>
                                    <div class="post_play_btn">
                                        <a class="video-popup" href="'.$final_video.'" a><i class="fas fa-play"></i></a>
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
                        <?php 
                        $sidebar_news_title_one = get_theme_mod('sidebar_news_title_one');
                        $no_of_news_one = get_theme_mod('no_of_news_one');
                        $sidebar_news_one = get_theme_mod('sidebar_news_one');
                        
                        $sidebar_news_title_two = get_theme_mod('sidebar_news_title_two');
                        $no_of_news_two = get_theme_mod('no_of_news_two');
                        $sidebar_news_two = get_theme_mod('sidebar_news_two');
                        
                        $sidebar_news_title_three = get_theme_mod('sidebar_news_title_three');
                        $no_of_news_three = get_theme_mod('no_of_news_three');
                        $sidebar_news_three = get_theme_mod('sidebar_news_three');


                        if(!empty($sidebar_news_title_one)){ ?>
                            <li class="nav-item">
                                <a class="nav-link active" id="sidebar_news_title_one-tab" data-toggle="pill" href="#sidebar_news_title_one" role="tab" aria-controls="sidebar_news_title_one" aria-selected="true"><?php echo $sidebar_news_title_one;?></a>
                            </li>
                        <?php }  if(!empty($sidebar_news_title_two)) { ?>
                            <li class="nav-item"> 
                                <a class="nav-link" id="sidebar_news_title_two-tab" data-toggle="pill" href="#sidebar_news_title_two" role="tab" aria-controls="sidebar_news_title_two" aria-selected="true"><?php echo $sidebar_news_title_two;?></a>
                            </li>
                        <?php }  if(!empty($sidebar_news_title_three)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar_news_title_three-tab" data-toggle="pill" href="#sidebar_news_title_three" role="tab" aria-controls="sidebar_news_title_three" aria-selected="true"><?php echo $sidebar_news_title_three;?></a>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                        <?php          
                        //query for sidebar news 1
                        $args = array(
                            'post_type' => 'news', 
                            'order' => 'DESC', 
                            'posts_per_page' => $no_of_news_one,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'news_category',
                                    'field' => 'term_id',
                                    'terms' => $sidebar_news_one,
                                ),
                            ),
                        );
                        
                        echo '<div class="tab-pane fade show active" id="sidebar_news_title_one" role="tabpanel" aria-labelledby="sidebar_news_title_one-tab">';
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo    '<div class="post_gallery_items"><div class="gallery_item">
                                            <div class="gallery_item_thumb">' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '</div>
                                            <div class="gallery_item_content">
                                                <div class="post-meta">';
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
                                                echo '<div class="meta-date"><span> ' . get_the_date('F j, Y') . '</span></div></div>
                                                    <h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                        </div></div>
                                    </div>';
                            }
                        } else {
                           echo 'Sorry there is no post to display.';
                        }
                        wp_reset_postdata(); 
                        echo '</div>';


                        //query for sidebar news 2
                    $args = array(
                        'post_type' => 'news', 
                        'order' => 'DESC', 
                        'posts_per_page' => $no_of_news_two,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news_category',
                                'field' => 'term_id',
                                'terms' => $sidebar_news_two,
                            ),
                        ),
                    );
                    
                    echo '<div class="tab-pane fade show" id="sidebar_news_title_two" role="tabpanel" aria-labelledby="sidebar_news_title_two-tab">';
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '<div class="post_gallery_items"><div class="gallery_item">
                                            <div class="gallery_item_thumb">' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '</div>
                                            <div class="gallery_item_content">
                                                <div class="post-meta">';
                                                $taxonomies = get_object_taxonomies('news'); 
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
                                                echo '<div class="meta-date"><span> ' . get_the_date('F j, Y') . '</span></div></div>
                                                    <h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                        </div></div>
                                    </div>';
                            }
                        } else {
                        echo 'Sorry there is no post to display.';
                        }
                        wp_reset_postdata(); 
                    echo '</div>';

                    //query for sidebar news three
                    $args = array(
                        'post_type' => 'news', 
                        'order' => 'DESC', 
                        'posts_per_page' => $no_of_news_three,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news_category',
                                'field' => 'term_id',
                                'terms' => $sidebar_news_three,
                            ),
                        ),
                    );
                 echo '<div class="tab-pane fade show" id="sidebar_news_title_three" role="tabpanel" aria-labelledby="sidebar_news_title_three-tab">';
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            echo    '<div class="post_gallery_items"><div class="gallery_item">
                                        <div class="gallery_item_thumb">' . get_the_post_thumbnail($post->ID, 'post_image_xs') . '</div>
                                        <div class="gallery_item_content">
                                            <div class="post-meta">';
                                            $taxonomies = get_object_taxonomies('news'); // Replace 'post' with your desired post type

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
                                            echo '<div class="meta-date"><span> ' . get_the_date('F j, Y') . '</span></div></div>
                                                <h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                        </div></div>
                                    </div>';
                        }
                    } else {
                    echo 'Sorry there is no post to display.';
                    }
                    wp_reset_postdata(); 
                
                echo '</div>';
            ?>
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
                <div class="col-lg-8">
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
                                echo '<div class="col-lg-6 col-md-6">
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
                                                            $term = reset($terms);
                                                                echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
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
                                                                $term = reset($terms);
                                                                    echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
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

                <div class="col-lg-4">
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
                                                            $term = reset($terms);
                                                                echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
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
    </section>

    <!--====== TRENDING NEWS PART ENDS ======-->

    <!--====== SINGLE PLAY POST PART START ======-->

    <section class="single-play-post-area mt-10">
        <div class="container custom-container">
            <div class="single-play-box">
                <div class="section-title">
					<h3 class="title">Upcoming Events</h3>
                </div>
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
                                            </div>
                                            <div class="single-play-post-content">
                                                <div class="post-meta">';
                                                $taxonomies = get_object_taxonomies('event_post_type'); // Replace 'post' with your desired post type

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
                                <a class="video-popup" ><i class="far fa-calendar-alt"></i></a>
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
                    <?php 
						$hompage_video_link = get_theme_mod('hompage_video_link');
                        if(!empty($hompage_video_link)){?>
                    <div class="col-lg-8">
                        <div class="video-news-post">
                            <?php 
								$hompage_video_title = get_theme_mod('hompage_video_title');
								$hompage_video_description = get_theme_mod('hompage_video_description');
                                if(!empty($hompage_video_title)){ 
                            ?>
                            <div class="section-title section-title-2">
                                <h3 class="title"><?php echo $hompage_video_title; ?></h3>
                            </div>
                            <?php } ?>
                            <div class="video-news-post-item">
                                <div class="video-news-post-thumb">
                                    <?php 
                                        $video_id = get_youtube_video_id($hompage_video_link);
                                        $embed_link = 'https://www.youtube.com/embed/'. $video_id;
                                    ?>
                                    <iframe width="100%" height="440" src="<?php echo $embed_link.'?&showinfo=0' ; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><div class="play-btn">
                                </div>
                                </div>
                                <?php if(!empty($hompage_video_description)) {?>
                                <div class="video-news-post-content">
                                    <h3 class="title"><a href="#"><?php echo $hompage_video_description; ?></a></h3>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="all-post-sidebar">
                            <div class="Categories-post mt-40">
                                <div class="section-title d-flex justify-content-between align-items-center">
                                    <h3 class="title">Categories</h3>
                                    <?php $taxonomy_slug = 'news_category';
                                        $archive_link = get_post_type_archive_link('news') . $taxonomy_slug . '/';
                                        echo '<a href="#">ALL SEE</a>';
                                    ?>

                                </div>
                                <div class="Categories-item">
                                <?php
                                    $custom_post_type = 'news'; 
                                    function get_top_three_taxonomies($custom_post_type) {
                                        $taxonomies = get_object_taxonomies($custom_post_type, 'objects');
                                        $taxonomy_counts = array();
                                    
                                        if ($taxonomies) {
                                            foreach ($taxonomies as $taxonomy) {
                                                if ($taxonomy->name === 'post_tag') {
                                                    continue;
                                                }
                                    
                                                $terms = get_terms($taxonomy->name);
                                                if ($terms) {
                                                    $post_count = 0;
                                                    foreach ($terms as $term) {
                                                        $post_count += $term->count;
                                                    }
                                                    $taxonomy_counts[$taxonomy->name] = $post_count;
                                                }
                                            }
                                            arsort($taxonomy_counts);
                                            $top_three_taxonomies = array_slice($taxonomy_counts, 0, 3, true);
                                            return $top_three_taxonomies;
                                        }
                                        return array();
                                    }
                                    
                                    $top_three_taxonomies = get_top_three_taxonomies($custom_post_type);
                                    if (!empty($top_three_taxonomies)) {
                                        echo '<div>';
                                        foreach ($top_three_taxonomies as $taxonomy_name => $post_count) {
                                            $taxonomy = get_taxonomy($taxonomy_name);
                                    
                                            $terms = get_terms(array(
                                                'taxonomy' => $taxonomy_name,
                                                'hide_empty' => false,
                                            ));
                                            if ($terms) {
                                                $sorted_terms = usort($terms, function ($a, $b) {
                                                    return $b->count - $a->count;
                                                });
                                    
                                                $limited_terms = array_slice($terms, 0, 3);
                                                foreach ($limited_terms as $term) {
                                                    $news_taxonomy_banner = get_term_meta($term->term_id, 'news_category_thumbnail', true);
                                                    $term_post_count = $term->count;
                                                    echo '<div class="item">
                                                            <img src="'.$news_taxonomy_banner.'" alt="categories">
                                                            <div class="Categories-content">
                                                                <a href="' . esc_url(get_term_link($term)) . '">
                                                                    <span>' . $term->name . '<b class="post-count">(' . $term_post_count . ')</b></span>
                                                                    <img src="'.get_template_directory_uri().'/assets/images/arrow.svg" alt="post image">
                                                                </a>
                                                            </div>
                                                        </div>';
                                                }
                                            } else {
                                                echo '<p>No terms found for ' . $taxonomy->label .'</p>';
                                            }
                                        }
                                        echo '</div>';
                                    } else {
                                        echo 'No taxonomies found for this post type.';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } 
                    if(empty($hompage_video_link)){?>
                <div class="col-lg-12">
                    <div class="all-post-sidebar">
                        <div class="Categories-post mt-40">
                            <div class="section-title d-flex justify-content-between align-items-center">
                                <h3 class="title">Categories</h3>
                                <?php $taxonomy_slug = 'news_category';
                                    $archive_link = get_post_type_archive_link('news') . $taxonomy_slug . '/';
                                    echo '<a href="#">ALL SEE</a>';
                                ?>

                            </div>
                            <div class="container Categories-item">
                            <?php
                                $custom_post_type = 'news'; 
                                function get_top_three_taxonomies($custom_post_type) {
                                    $taxonomies = get_object_taxonomies($custom_post_type, 'objects');
                                    $taxonomy_counts = array();

                                    if ($taxonomies) {
                                        foreach ($taxonomies as $taxonomy) {
                                            if ($taxonomy->name === 'post_tag') {
                                                continue;
                                            }

                                            $terms = get_terms($taxonomy->name);
                                            if ($terms) {
                                                $post_count = 0;
                                                foreach ($terms as $term) {
                                                    $post_count += $term->count;
                                                }
                                                $taxonomy_counts[$taxonomy->name] = $post_count;
                                            }
                                        }
                                        arsort($taxonomy_counts);
                                        $top_three_taxonomies = array_slice($taxonomy_counts, 0, 3);
                                        return array_keys($top_three_taxonomies);
                                    }
                                    return array();
                                }
                                $top_three_taxonomies = get_top_three_taxonomies($custom_post_type);
                                if (!empty($top_three_taxonomies)) {
                                    echo '<div class="row">';
                                    foreach ($top_three_taxonomies as $taxonomy_name) {
                                        $taxonomy = get_taxonomy($taxonomy_name);
                                        $terms = get_terms($taxonomy_name);

                                        if ($terms) {
                                            foreach ($terms as $term) {
                                                $news_taxonomy_banner = get_term_meta($term->term_id, 'news_category_thumbnail', true);
                                                $post_count = $term->count;
                                                echo '<div class="col-lg-4 item">
                                                        <img src="'.$news_taxonomy_banner.'" alt="categories">
                                                        <div class="Categories-content">
                                                            <a href="' . esc_url(get_term_link($term)) . '">
                                                                <span>' . $term->name . '<b class="post-count">(' . $post_count . ')</b></span>
                                                                <img src="'.get_template_directory_uri().'/assets/images/arrow.svg" alt="post image">
                                                            </a>
                                                        </div>
                                                    </div>';
                                            }
                                        } else {
                                            echo '<li>No terms found for ' . $taxonomy->label .'</li>';
                                        }
                                    }
                                    echo '</div>';
                                } else {
                                    echo 'No taxonomies found for this post type.';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!--====== VIDEO NEWS PART ENDS ======-->

    <!--====== all news display  ======-->

    <section class="all-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="post-entertainment">
                        <div class="section-title">
					        <?php $homepage_news_title = get_theme_mod('hompage_news_title');?>
                            <h3 class="title"><?php echo $homepage_news_title; ?></h3>
                        </div>
                        <div class="row" id="append-here">
                            <?php
                                $homepage_news_category = get_theme_mod('homepage_news_category');
                                $no_of_news_hp = get_theme_mod('no_of_news_hp');
                                $loaded_post_ids = isset($_POST['loaded_post_ids']) ? $_POST['loaded_post_ids'] : array();

                                // Check if $homepage_news is an array and not empty
                                if (!empty($homepage_news_category)) {

                                    $args = array(
                                        'posts_per_page' => $no_of_news_hp,
                                        'post_type'      => 'news',// Display 3 latest news posts
                                        'orderby' => 'date', // Order by the latest date
                                        'order' => 'DESC', 
                                        'post__not_in' => $loaded_post_ids,
                                    );

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            $loaded_post_ids[] = get_the_ID();
                                            echo '<div class="col-lg-4 col-md-4">
                                                    <div class="trending-news-item mb-30">
                                                        <div class="trending-news-thumb">
                                                        ' . get_the_post_thumbnail($post->ID, 'post_image_l') . '
                                                            <div class="circle-bar">
                                                                <div class="first circle">
                                                                    <strong></strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="trending-news-content">
                                                            <div class="post-meta">';
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
                                                                echo '<div class="meta-date"><span>' . get_the_date('F j, Y') . '</span></div>
                                                            </div>
                                                            <h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                                            <p class="text">' . wp_trim_words(get_the_excerpt(), 20) . '</p>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    } else {
                                        echo '<div class="trending-item"><p>No news available currently.</p></div>';
                                    }
                                }
                                wp_reset_postdata(); // Restore original post data
                            ?>
                        </div>
                            <div class="load-more-container">
                                <button id="load-more-news">View More News</button>
                                <p id="fully-loaded">Hooray! You caught up with all the news for today.</p>
                            </div>
                            
                    </div>
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
    </section>

    <!--====== all news display ENDS ======-->

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
