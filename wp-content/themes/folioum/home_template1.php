<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if($seo_title!="") { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
    <meta charset="utf-8">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css">
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
</head>
<body>
<?php
    $skinid=get_term_by('slug','menu-intro','skin')->term_id;
    $child=get_term_children( $skinid,'skin');
    $page=get_all_page_ids();
?>
<div class="cha">
    <?php  
        foreach ($child as $key => $value) {
            ?>
            <img class="img-intro" id="img-menu-<?php echo $key + 1 ?>"  src="<?php echo z_taxonomy_image_url($value) ?>">    
        <?php
        if($key==3) break;
    }
    ?>
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-poli-form">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-sm hidden-xs">
            </div>
            <?php  
			$link='';
            foreach ($child as $key => $value) {

                    foreach ($page as $k => $v) {
                        if(get_post_meta($v,'_cmb_intromenu',true)==$value)
                        {
                            $link=get_page_link($v).'?skin='.$value;
                        }
                        
                    }
                ?>
                <a href="<?php echo $link ?>">
                <div id="select-menu-<?php echo $key + 1 ?>" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 select-menu">
                    <div class="select-menu-item">
                        <?php echo get_term_by( 'id', $value, 'skin')->name ?>
                    </div>  
                     <p><?php echo get_term_by( 'id', $value, 'skin')->description ?></p>
                </div>
                </a>    
                <?php
                if($key==3) break;
            }
            ?>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-sm hidden-xs">
                
            </div>
        </div>
    </div>
    
</div>
    
</body>
</html>