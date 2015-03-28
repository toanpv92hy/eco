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
            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                <div class="single-blog">
                    <?php
                    global $wp;
                    $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );

                    if(have_posts()):while(have_posts()):the_post(); ?>
                        <?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
                        <h3><?php echo the_title(); ?></h3>
                        <div class="content">
                            <?php echo the_content(); ?>
                        </div>
                        <div class="footer_baiviet">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <span style="margin-top: 0px; float:left; color: #868686; margin-left: 15px; font-style: italic;"><span><?php echo __('Bài đăng: ') ?></span><span class="date"><?php the_date(); ?></span></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div id="fb-root"></div>
                                <script src="http://connect.facebook.net/vi_VN/all.js#xfbml=1"></script><fb:like href="<?php echo get_permalink(); ?>" show_faces="false" width="450"></fb:like>

                            </div>
                        </div>
                    <?php endwhile;endif;
                    ?>
                </div>
                <div class="baivietkhac">
                    <h3><?php echo __('MỘT SỐ BÀI VIẾT KHÁC'); ?></h3>
                    <ul>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => '5'
                        );
                        $wp_query = new WP_Query($args);
                        if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>
                            <li>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    >> <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <span style="padding-right: 10px;text-align: right;float:right;"><?php echo the_date(); ?></span>
                                </div>
                            </li>
                        <?php endwhile;endif;
                    ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12 baivietmoi">
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
                <div style="clear: both; margin-top: 10px"></div>
                <div style="background: #fff;margin-top: 10px" class="fb-like-box" data-href="<?php echo $smof_data['fan_facebook']; ?>" data-width="310" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
            </div>
    </div>
</div>


<div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=1465494103676873";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<?php get_footer(); ?>
