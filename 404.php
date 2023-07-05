<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package NepaleseinFinland
 */

get_header();
?>

<section class="error-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="error-thumb text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="error-content text-center">
                        <ul>
                            <li><a class="main-btn" href="<?php echo get_home_url(); ?>">GO TO HOME</a></li>
                            <li><a class="main-btn btn-2" href="#">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
