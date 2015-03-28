<?php
/*
 Template Name: Liên hệ
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

<div class="container lienhe-contentnew">
    <div class="row">
        <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php global $more; $more=0; the_content(''); $more=1; ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="lienhe-content">
                    <div class="intro">
                        <h3 class="contact"><?php echo 'Liên Hệ'; ?></h3>
                        <div class="address">
                            <span><img src="<?php echo get_template_directory_uri().'/images/address.png' ?>"></span>
                            <span><?php echo $smof_data['contact_address']; ?></span>
                        </div>
                        <div class="phone">
                            <span><img src="<?php echo get_template_directory_uri().'/images/phone.png' ?>"></span>
                            <span><?php echo $smof_data['contact_phone']; ?></span>
                        </div>
                        <div class="address">
                            <span><img src="<?php echo get_template_directory_uri().'/images/email.png' ?>"></span>
                            <span><?php echo $smof_data['contact_email']; ?></span>
                        </div>
                    </div>
                    <div class="lienhe-form">
                        <?php the_content('', true); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
