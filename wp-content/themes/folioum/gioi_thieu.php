<?php
/*
 Template Name: Giới thiệu
 */
get_header(); ?>
<?php global $smof_data; ?>


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
    <div class="row single-gioithieu">
        <?php
        if(have_posts()): while(have_posts()): the_post();
            ?>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 left">
                <?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right">
                <div class="content">
                    <div class="inner">
                        <h3><?php the_title(); ?></h3>
                        <?php if( strpos(get_the_content(), '<span id="more-') ) : ?>
                            <div class="before-more">
                                <?php global $more; $more=0; the_content(''); $more=1; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endwhile;endif;
        ?>
        <div style="clear: both; margin-top:10px;"></div>
        <?php   the_content('', true); ?>
    </div>
</div>



<?php get_footer(); ?>
