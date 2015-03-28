<?php
get_header(); 
?>

<?php global $smof_data; ?>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <img src="" class="fancybox-image">
      </div>
    </div>
  </div>
</div>
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

    <div class="row single-portfolio">
        <?php
        if(have_posts()): while(have_posts()): the_post();
        ?>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="right">
                    <div class="name"><?php the_title(); ?></div>
                    <div class="client"><span>Chủ đầu tư: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_chudautu', true); ?></div>
                    <div class="address"><span>Địa chỉ: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_diachi', true); ?></div>
                    <div class="area"><span>Diện tích: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_dientich', true); ?></div>
                    <div class="time_design"><span>Thời gian thiết kế: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_thoigianthietke', true); ?></div>
                    <div class="time_action"><span>Thời gian thi công: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_thoigianthicong', true); ?></div>
                    <div class="content"><?php the_content(); ?></div>

                </div>
                            <!-- <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 left"> -->

                <?php

                // Get galleries

                $galleries = get_post_gallery(get_the_ID(), false);

                if(isset($galleries['ids'])){

                    ?>

                    <div id="bigPic" class="">

                        <?php

                        $gallery_ids = $galleries['ids'];

                        $img_ids = explode(",",$gallery_ids);

                        $i=1;

                        foreach( $img_ids AS $img_id ){

                            $image_src = wp_get_attachment_image_src($img_id,'');

                            ?>

                            <a  class="fancybox" rel="gallery1" href="<?php echo $image_src['0']; ?>">

                            <img class="img-responsive" src="<?php echo $image_src['0']; ?>"  />

                            </a>

                        <?php

                        }

                        ?>

                    </div><!-- end gallery -->

                    <div style="clear: both"></div>

                    <ul id="thumbs">

                        <?php

                        $i=1;

                        $last = '';

                        foreach( $img_ids AS $img_id ){

                            $image_src = wp_get_attachment_image_src($img_id,'');

                            if(count($img_ids) == $i){ $last = 'last'; }

                            ?>

                            <li class='<?php if($i==1) echo 'active'; echo $last; ?>' rel="<?php echo $i; ?>"><img src="<?php echo $image_src['0']; ?>" alt="" width="100px" /></li>

                        <?php $i++;

                        }

                        ?>

                    </ul>



                <?php } ?>

            <!-- </div> -->

            </div>


        <?php

        endwhile;endif;

        ?>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 baivietmoi">

        <div class="newpost">

            <div class="content">

            <h3><?php echo __('BÀI VIẾt MỚI'); ?></h3>

                <ul>

                <?php



                        $args = array(

                            'post_type'         => 'post',

                            'posts_per_page'    => '6'

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



<div class="container" style="margin-top: 5px; margin-bottom: 10px">

<div class="row">

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

        <div class="another_project">

        <h3><?php echo __('MỘT SỐ CÔNG TRÌNH KHÁC'); ?></h3>



                <?php

                global $wp_query;

                $post = $wp_query->post;



                $args = array(

                    'post_type'         => 'portfolio',

                    'posts_per_page'    => '8',

                    'post_no_in'        => array($post->iD)

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

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.right img').click(function(e){
            jQuery('#myModal').modal('show');
            var img=e.currentTarget.src;
            jQuery(".modal-body img").attr('src',img);
            jQuery("#myModal").click(function(){
                jQuery('#myModal').modal('hide');
            });
        });
    });
    var currentImage;

    var currentIndex = -1;

    var interval;

    function showImage(index){

        if(index < jQuery('#bigPic img').length){

            var indexImage = jQuery('#bigPic img')[index]

            if(currentImage){

                if(currentImage != indexImage ){

                    jQuery(currentImage).css('z-index',2);

                    clearTimeout(myTimer);

                    jQuery(currentImage).fadeOut(250, function() {

                        myTimer = setTimeout("showNext()", 3000000);

                        jQuery(this).css({'display':'none','z-index':1})

                    });

                }

            }

            jQuery(indexImage).css({'display':'block', 'opacity':1});

            currentImage = indexImage;

            currentIndex = index;

            jQuery('#thumbs li').removeClass('active');

            jQuery(jQuery('#thumbs li')[index]).addClass('active');

        }

    }



    function showNext(){

        var len = jQuery('#bigPic img').length;

        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;

        showImage(next);

    }



    var myTimer;

	

	var setHight = function(){

		var heightimg = jQuery('#bigPic > a >img:first-child').outerHeight();

		jQuery('#bigPic').css({height:heightimg});

	}



    jQuery(document).ready(function() {

        
        myTimer = setTimeout("showNext()", 3000);

//        showNext(); //loads first image

        jQuery('#thumbs li').bind('click',function(e){

            var count = jQuery(this).attr('rel');

            showImage(parseInt(count)-1);

        });

		setHight();

    });

	jQuery(window).resize(function(){

		setHight();

	});



    jQuery(document).ready(function() {

        jQuery(".fancybox").fancybox({

            openEffect	: 'elastic',

            closeEffect	: 'elastic'

        });

    });



</script>



<?php get_footer(); ?>

