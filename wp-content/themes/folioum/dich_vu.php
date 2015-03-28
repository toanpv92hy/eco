<?php
/*
 Template Name: Dịch vụ
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
    <div class="row">

        <?php
        if(have_posts()): while(have_posts()): the_post();
            ?>
            <?php global $more; $more=0; the_content(''); $more=1; ?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left single-dichvu">
                <div class="content">
                    <h3><?php the_title(); ?></h3>
                    <?php  the_content('', true); ?>
                </div>
            </div>

        <?php
        endwhile;endif;
        ?>
    </div>
</div>

<div class="container" style="margin-top: 5px; margin-bottom: 10px">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="another_project">
                <h3><?php echo __('MỘT SỐ CÔNG TRÌNH KHÁC'); ?></h3>

                <?php
                global $wp_query;
                $post = $wp_query->post;

                $args = array(
                    'post_type'         => 'portfolio',
                    'posts_per_page'    => '8'
                );
                $query = new WP_Query($args);

                if($query->have_posts()){
                    while($query->have_posts()): $query->the_post();
                        $meta = get_post_meta( get_the_ID(), '_cmb_project_kieuanh', TRUE );
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 img_taxo_congtrinhkhac">
                            <a href="<?php the_permalink() ?>" >
                                <?php the_post_thumbnail('thumbnail_142x135',array('class'=>'img-responsive')); ?>
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
                    <?php
                    endwhile;
                }
                ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 baivietmoi">
            <div class="newpost">
                <div class="content">
                    <h3><?php echo __('BÀI VIẾt MỚI'); ?></h3>
                    <ul>
                        <?php

                        $args = array(
                            'post_type'         => 'post',
                            'posts_per_page'    => '3'
                        );
                        $query = new WP_Query($args);
						$i=0;
                        if($query->have_posts()){
                            while($query->have_posts()): $query->the_post();
                                ?>

                                <?php
                                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                
                                ?>
                                <li class="<?php if($i==0) echo 'first'; $i++; ?>">
                                    <!-- <img src="<?php // echo $url['0']; ?>"/> -->
									<?php the_post_thumbnail('thumbnail_80x60'); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo short_title(); ?>
                                    </a>
                                </li>
                            <?php
                            endwhile;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="menu-congtrinh">
            <div class="dropdown">
            <a data-toggle="dropdown" href="#"><img src="<?php echo get_template_directory_uri().'/images/select.png' ?>" class="img-responsive" /></a>
                <?php  $menu_name = 'primary';

                if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

                    $menu_items = wp_get_nav_menu_items($menu->term_id);

                    $menu_list = '<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" id="menu-' . $menu_name . '">';

                    foreach ( (array) $menu_items as $key => $menu_item ) {
                        $title = $menu_item->title;
                        $url = $menu_item->url;
                        $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
                    }
                    $menu_list .= '</ul>';
                } else {
                    $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
                }

                ?>
                <?php echo $menu_list; ?>



            </div>
        </div>
    </div>
</div>




<?php get_footer(); ?>
