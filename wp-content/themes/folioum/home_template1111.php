<?php

/*

 Template Name: Trang chủ

 */

get_header(); ?>

<?php global $smof_data; 
$skinid=$_GET['skin'];
$child=get_term_children( $skinid,'skin');
?>

<div id="banner">

    <div class="container">

        <div class="row">

            <div style="padding: 0px 5px;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <?php
                    foreach ($child as $key => $value) {
                        ?>
                        <div style="margin-right: 15px;" class=" menu-intro-cat">
                        <a href="<?php echo get_term_link( $value, 'skin' ); ?>"><img src="<?php echo z_taxonomy_image_url($value) ?>">
                        <span class="title-index"><?php echo get_term_by( 'id', $value, 'skin')->name ?></span></a>
                    </div>
                        <?php
                    }
                ?>
                </div>
            
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                    <?php //if( function_exists('cyclone_slider') ) cyclone_slider('238'); ?>

                </div>
        </div></div>

    </div>

</div>



<div class="container">

    <div class="row">

        <div id="portfolio">

            <div class="col-sm-12">

                <div class="isotope js-isotope is-varying-sizes rainbowed" data-isotope-options='{ "masonry": { "columnWidth": 237} }'>

            <?php

                if(have_posts()): while(have_posts()): the_post();
                    the_content();
                endwhile;endif;
            ?>

            </div>
            </div>
            </div>
            </div>



    </div>

</div>





<?php get_footer(); ?>

