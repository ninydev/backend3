<?php
get_header();
?>
    <section class="about-section">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="left-side">
                        <?php dynamic_sidebar( 'AboutLeft' );
                        ?>
                    </div>
                </div>







                <div class="col-md-8">
                    <div class="right-side">
                        <?php
                            while ( have_posts() ) {
                                the_post();
                                the_content();
                            }
                        ?>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php

get_footer();

//echo "<pre>";
//var_dump($query);
//echo "</pre>";

