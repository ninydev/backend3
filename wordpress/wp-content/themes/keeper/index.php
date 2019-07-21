<?php
get_header();

$query = new WP_Query( 'page_id=6' );


while ($query->have_posts()) :
    $query->the_post();

echo "<h1>" . get_the_title() . "</h1>";


echo "<div>";
the_content();
echo "</div>";

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

endwhile; // End of the loop.

get_footer();

//echo "<pre>";
//var_dump($query);
//echo "</pre>";

