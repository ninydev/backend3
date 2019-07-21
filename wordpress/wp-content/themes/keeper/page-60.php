<?php
get_header();
?>

    <section class="photos">
        <div class="container">
            <div class="row">

<?php


$query = new WP_Query( [
    'post_type' => 'photo'
]);

//var_dump($query);

while ($query->have_posts()) :  $query->the_post();
?>

<div>
<?php
        if ( has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" class="photo-open">';
            the_post_thumbnail('thumbnail');
        }
        ?>
        <img src="http://backend3.nikstep.com.ua/wordpress/wp-content/themes/keeper/_imgs/eye-overlay.png" alt="overlay" class="eye">
    </a>
</div>

<?php
endwhile; // End of the loop.
?>

            </div>
        </div>
        <a href="#" class="btn load-more">load more</a>
    </section>

<?php

get_footer();

//echo "<pre>";
//var_dump($query);
//echo "</pre>";

