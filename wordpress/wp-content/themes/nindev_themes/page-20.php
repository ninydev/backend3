<?php
get_header();
?>

<?php


$query = new WP_Query( 'post_type=product' );

//echo "<pre>";
//var_dump($query);
//echo "</pre>";

while( $query->have_posts() ){
    $query->the_post();

    the_title();
    the_content();



}
$query->reset_postdata();
//wp_reset_query(); // сброс глобальной $wp_query
?>

<?php
get_footer();
