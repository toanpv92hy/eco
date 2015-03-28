<?php  get_header();

global $smof_data;

?>

<div class="container">

    <div class="row" style="margin-bottom: 10px">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="background: #25282b;">

            <div class="breadcrumbs">

                <?php if(function_exists('bcn_display'))

                {

                    bcn_display();

                }?>

            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background: #25282b;">

            <div class="breadcrumbs text-right">

                <span class="hotline">

                <?php

                echo __("Hotline: ").$smof_data['contact_hotline'];

                ?>

                </span>

            </div>

        </div>

    </div>

</div>



<div class="container">

    <div class="row blog">

        <?php

        if(have_posts()): while(have_posts()): the_post(); ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="blog-item">

                        <a href="<?php the_permalink(); ?>">

                            <?php the_post_thumbnail('thumbnail_310x200',array('class'=>'img-responsive')); ?>

                        </a>

                        <div class="title">

                            <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>

                        </div>

                        <!-- <div class="content"><?php //echo short_content(); ?></div> -->

                        <div class="date">Bài đăng: <?php the_date(); ?></div>

                    </div>

                </div>

        <?php endwhile;endif;

        ?>

    </div>

</div>

<div class="container">

    <div class="row">

        <?php global $wp_query; ?>

        <?php if( $wp_query->max_num_pages>1){ ?>

            <div class="pagination text-center clearfix">

                <?php folioum_pagination($prev = '&laquo;', $next = '&raquo;', $pages=$wp_query->max_num_pages); ?>

            </div>

        <?php } ?>

    </div>

</div>





<?php get_footer(); ?>

