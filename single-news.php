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
            $news_image = wp_get_attachment_image( get_post_meta( $post_id, 'news_image', 1 ), 'medium' );

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
                            <?php echo get_the_content();?>
                            <?php echo $news_image;?>
                        </div>
                        <div class="post-tags">
                            <ul>
                                <li><a href="#"><i class="fas fa-tag"></i> Tags</a></li>
                                <li><a href="#">Health</a></li>
                                <li><a href="#">World</a></li>
                                <li><a href="#">Corona</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-reader-text post-reader-text-2 post-reader-text-3 pt-50">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-reader-prev">
                                    <span>PREVIOUS NEWS <i class="fal fa-angle-right"></i></span>
                                    <h4 class="title"><a href="#">Kushner puts himself in middle of white house’s chaotic coronavirus response.</a></h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post-reader-prev">
                                    <span>NEXT NEWS <i class="fal fa-angle-right"></i></span>
                                    <h4 class="title"><a href="#">C.I.A. Hunts for authentic virus totals in china, dismissing government tallies</a></h4>
                                </div>
                            </div>
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
                                <div class="col-lg-6">
                                    <div class="trending-news-item">
                                        <div class="trending-news-thumb">
                                            <img src="assets/images/trending-thumb.png" alt="trending">
                                            <div class="icon">
                                                <a href="#"><i class="fas fa-bolt"></i></a>
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="trending-news-item">
                                        <div class="trending-news-thumb">
                                            <img src="assets/images/trending-news-2.jpg" alt="trending">
                                            <div class="icon">
                                                <a href="#"><i class="fas fa-bolt"></i></a>
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
                                            <h3 class="title"><a href="#">Japan’s virus success has puzzled the world. Is its luck running out?</a></h3>
                                            <p class="text">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="trending-news-item">
                                        <div class="trending-news-thumb">
                                            <img src="assets/images/trending-news-3.jpg" alt="trending">
                                            <div class="icon">
                                                <a href="#"><i class="fas fa-bolt"></i></a>
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
                                            <h3 class="title"><a href="#">Japan’s virus success has puzzled the world. Is its luck running out?</a></h3>
                                            <p class="text">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trending-news-post-items">
                                <div class="gallery_item">
                                    <div class="gallery_item_thumb">
                                        <img src="assets/images/gallery-1.jpg" alt="gallery">
                                        <div class="icon"><i class="fas fa-bolt"></i></div>
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
                                        <h4 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h4>
                                    </div>
                                </div>
                                <div class="gallery_item">
                                    <div class="gallery_item_thumb">
                                        <img src="assets/images/gallery-2.jpg" alt="gallery">
                                        <div class="icon"><i class="fas fa-bolt"></i></div>
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
                                        <h4 class="title"><a href="#">The billionaire Philan thropist read to learn</a></h4>
                                    </div>
                                </div>
                                <div class="gallery_item">
                                    <div class="gallery_item_thumb">
                                        <img src="assets/images/gallery-3.jpg" alt="gallery">
                                        <div class="icon"><i class="fas fa-bolt"></i></div>
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
                                        <h4 class="title"><a href="#">Cheap smartphone sensor could help you old food safe</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-add pt-40">
                            <a href="#"><img src="assets/images/ad/ad-2.jpg" alt="ad"></a>
                        </div>
                        <div class="trending-sidebar-slider">
                            <div class="most-share-post-items">
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>1</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>2</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>3</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>4</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>5</span>
                                    </div>
                                </div>
                            </div>
                            <div class="most-share-post-items">
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>1</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>2</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>3</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>4</span>
                                    </div>
                                </div>
                                <div class="most-share-post-item">
                                    <div class="post-meta">
                                        <div class="meta-categories">
                                            <a href="#">TECHNOLOGY</a>
                                        </div>
                                        <div class="meta-date">
                                            <span>March 26, 2020</span>
                                        </div>
                                    </div>
                                    <h3 class="title"><a href="#">Nancy zhang a chinese busy woman and dhaka</a></h3>
                                    <ul>
                                        <li><i class="fab fa-twitter"></i> 2.2K</li>
                                        <li><i class="fab fa-facebook-f"></i> 3.5K</li>
                                    </ul>
                                    <div class="count">
                                        <span>5</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="newsletter-box mt-45">
                            <h5 class="title">Newsletter</h5>
                            <p>Your email address will not be this published. Required fields are News Today.</p>
                            <form action="#">
                                <div class="input-box">
                                    <input type="text" placeholder="Your email address">
                                    <button type="button">SIGN UP</button>
                                </div>
                            </form>
                            <span>We hate spam as much as you do</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== POST LAYOUT 1 PART ENDS ======-->

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
                <div class="col-lg-4">
                    <div class="trending-news-item mb-30">
                        <div class="trending-news-thumb">
                            <img src="assets/images/latest-news-1.png" alt="trending">
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
                </div>
                <div class="col-lg-4">
                    <div class="trending-news-item mb-30">
                        <div class="trending-news-thumb">
                            <img src="assets/images/latest-news-2.png" alt="trending">
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
                </div>
                <div class="col-lg-4">
                    <div class="trending-news-item mb-30">
                        <div class="trending-news-thumb">
                            <img src="assets/images/latest-news-3.png" alt="trending">
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
                </div>
            </div>
        </div>
    </section>

    <!--====== LATEST NEWS PART ENDS ======-->

    <!--====== POST FORM PART START ======-->

    <div class="post-form-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title">
                        <h3 class="title">Leave an opinion</h3>
                    </div>
                    <div class="post-form-box">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <input type="text" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <input type="text" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <textarea name="#" id="#" cols="30" rows="10" placeholder="Tell us about your opinion…"></textarea>
                                        <button class="main-btn" type="button">POST OPINION</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== POST FORM PART ENDS ======-->

    <!--====== POST COMMENTS PART START ======-->

    <section class="post-comments-area pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title">
                        <h3 class="title">Post Comments</h3>
                    </div>
                    <div class="post-comments-list">
                        <div class="post-comments-item">
                            <div class="thumb">
                                <img src="assets/images/comments-1.png" alt="comments">
                            </div>
                            <div class="post">
                                <a href="#">Reply</a>
                                <h5 class="title">Subash Chandra</h5>
                                <p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
                            </div>
                        </div>
                        <div class="post-comments-item">
                            <div class="thumb">
                                <img src="assets/images/comments-2.png" alt="comments">
                            </div>
                            <div class="post">
                                <a href="#">Reply</a>
                                <h5 class="title">Subash Chandra</h5>
                                <p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
                            </div>
                        </div>
                        <div class="post-comments-item ml-30">
                            <div class="thumb">
                                <img src="assets/images/comments-3.png" alt="comments">
                            </div>
                            <div class="post">
                                <a href="#">Reply</a>
                                <h5 class="title">Subash Chandra</h5>
                                <p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
                            </div>
                        </div>
                        <div class="post-comments-item">
                            <div class="thumb">
                                <img src="assets/images/comments-4.png" alt="comments">
                            </div>
                            <div class="post">
                                <a href="#">Reply</a>
                                <h5 class="title">Subash Chandra</h5>
                                <p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-load-btn">
                        <a class="main-btn" href="#">LOAD MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php


                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                      
get_sidebar();
get_footer();
