<?php
get_header();
?>

    <section class="presentation-section">


                <div class="presentation-inner">
                    <div class="container">
                        <div class="row">


                            <div class="filter">
                                <ul>
                                    <li><a href="#">all</a></li>
                                    <li class="current"><a href="#">2017</a></li>
                                    <li><a href="#">2016</a></li>
                                    <li><a href="#">2015</a></li>
                                    <li><a href="#">2014</a></li>
                                    <li><a href="#">2013</a></li>
                                    <li><a href="#">2012</a></li>
                                    <li><a href="#">2011</a></li>
                                </ul>
                            </div>



<?php

$query = new WP_Query( [
    'post_type' => 'presentation',
    'tag_id' => 34,
]);

//var_dump($query);

while ($query->have_posts()) :  $query->the_post();
?>

<div class="col-md-4">
<?php
        if ( has_post_thumbnail()) {
            ?>
            <a href="#">
                <div class="post-img"
                     style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')"></div>
            </a>
            </div>

            <?php
        }

endwhile; // End of the loop.
?>
                        </div>
            </div>
        </div>

    </section>

<?php

get_footer();

//echo "<pre>";
//var_dump($query);
//echo "</pre>";

