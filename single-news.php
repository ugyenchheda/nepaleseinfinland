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


            ?>
            <div class="event_banner" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                <div class=container>
                    <div class="event_banner_wrap">
                        <h3 class="title"><span class="event_bg"><span class="event_title"><?php the_title(); ?></span></span></h3>
                    </div>
                </div>
            </div>
            <?php

                            the_post_navigation(
                                array(
                                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nepaleseinfinland' ) . '</span> <span class="nav-title">%title</span>',
                                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nepaleseinfinland' ) . '</span> <span class="nav-title">%title</span>',
                                )
                            );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                      
get_sidebar();
get_footer();
