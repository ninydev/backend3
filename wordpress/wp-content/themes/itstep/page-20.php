<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itstep
 */

get_header();
?>


    <div id="primary" class="content-area" style="background-color: aliceblue; padding: 10px; margin: 10px;">
        <main id="main" class="site-main">

            <?php

            $arg_to_db = array(
                'post_type' => 'staff'
            );

            $query = new WP_Query(  $arg_to_db );



            // var_dump($query);


            echo "<ul>";
            while ( $query->have_posts() ) {
                $query->the_post();
                echo "<li>";
                the_title(); // выведем заголовок поста
                echo "</li>";
            }
            echo "</ul>";






            ?>





        </main><!-- #main -->
    </div><!-- #primary -->



<?php
get_footer();
