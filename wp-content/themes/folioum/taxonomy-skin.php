<?php



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

    <div class="row">

        <div id="taxonomy">

            <?php if(have_posts()): while(have_posts()): the_post(); 
                $custom_link=get_post_meta( get_the_ID(), '_cmb_project_linkcustom', TRUE );
                $link=get_permalink();
                if(isset($custom_link)&& !empty($custom_link)){
                $link=$custom_link;
                }
            ?>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 img_taxo">

                    <a href="<?php echo $link; ?>" >

                        <?php the_post_thumbnail('thumbnail_230x185',array('class'=>'img-responsive')); ?>

                        <div class="mask">

                            <div class="content">

                                <div class="inner-content">

                                    <div class="name">

                                        <?php the_title(); ?>

                                    </div>

                                    <?php

                                    if(get_post_meta(get_the_iD(),'_cmb_project_chudautu', true)){ ?>

                                    <div class="client">

                                        <?php echo  "CĐT:".get_post_meta(get_the_iD(),'_cmb_project_chudautu', true); ?>

                                    </div>

                                    <?php }

                                    ?>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            <?php endwhile;endif; ?>

        </div>



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

