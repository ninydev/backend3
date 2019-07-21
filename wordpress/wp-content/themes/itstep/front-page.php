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
<?php echo __FILE__ ; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
//		while ( have_posts() ) :
//			the_post();
//
//			get_template_part( 'template-parts/content', 'page' );
//
//			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;
//
//		endwhile; // End of the loop.


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

        wp_reset_query();

        unset ($query);

        $arg_to_db = array(
            'post_type' => 'post'
        );

        $query = new WP_Query(  $arg_to_db );


        echo "<ul>";
        while ( $query->have_posts() ) {
            $query->the_post();
            echo "<li>";
            the_title(); // выведем заголовок поста
            echo "</li>";
        }
        echo "</ul>";

        wp_reset_query();

        unset ($query);




		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
