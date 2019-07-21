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
		while ( have_posts() ) : // Если есть что отображать
			the_post(); // Взять на отображение

//			get_template_part( 'template-parts/content', 'page' ); // Как отображать

?>
        <ul>
            <li> Номер поста <?php the_ID(); ?></li>
            <li> Заголовок <?php the_title(); ?></li>
            <li><?php echo get_the_title(); ?></li>
        </ul>


        <?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2723.7908791963205!2d32.04890201575236!3d46.946149041359256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c5cba0aaa0c18f%3A0xabc56846b2a6cb11!2z0JDQv9GC0LXQutCwINCd0LjQt9C60LjRhSDQpg!5e0!3m2!1sru!2sua!4v1561132771563!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>



		</main><!-- #main -->
	</div><!-- #primary -->



<?php
get_sidebar();
get_footer();
