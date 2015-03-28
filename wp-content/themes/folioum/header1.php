<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<?php
    global $smof_data; //fetch options stored in $data
    global $wp_query;
    $seo_title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_title", true);
    $seo_description = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_description", true);
    $seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_keywords", true);
?>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php if($seo_title!="") { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
    <meta name="author" content="aether_">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- For SEO -->
    <?php if($seo_description!="") { ?>
        <meta name="description" content="<?php echo $seo_description; ?>">
    <?php }elseif($smof_data['seo_des']){ ?>
        <meta name="description" content="<?php echo $smof_data['seo_des']; ?>">
    <?php } ?>
    <?php if($seo_keywords!="") { ?>
        <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    <?php }elseif($smof_data['seo_keywords']){ ?>
        <meta name="keywords" content="<?php echo $smof_data['seo_keywords']; ?>">
    <?php } ?>
    <!-- End SEO-->

    <link rel="shortcut icon" href="<?php echo $smof_data['favicon']; ?>">
    <link rel="apple-touch-icon" href="<?php echo $smof_data['app_icon']; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $smof_data['app_icon72']; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $smof_data['app_icon114']; ?>">

    <?php wp_head(); ?>
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48140161-1', 'eco.net.vn');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
    <!-- Google Analytics start -->
    
    ?>
    <!-- Google Analytics end -->
	<div style="display:none;">
	<a href="http://mastheme.com">
	mastheme provide wordpress theme, joomla template
	</a>
	</div>


<div class="container">
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 logo">

                <img src="<?php echo $smof_data['logo-id']; ?>" alt="Thiết kế">

        </div>
        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">
            <nav class="st-menu st-effect-14" id="menu-14">
                <ul>
                    <?php
                    class My_Walker_Nav_Menu extends Walker_Nav_Menu {
                        function start_lvl(&$output, $depth = 0, $args = array()) {
                            $indent = str_repeat("\t", $depth);
                            $output = preg_replace( "/(.*)(\<li.*?class\=\")([^\"]*)(\".*?)$/", "$1$2$3 drop$4", $output );
                            $output .= "\n$indent<ul class=\"dropdown clearfix\">\n";
                        }
                    }
                    ?>
                    <?php
                    $defaults = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => 'nav',
                        'container_class' => 'nine columns',
                        'container_id'    => 'nav',
                        'menu_class'      => '',
                        'menu_id'         => 'navigation',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => new My_Walker_Nav_Menu()
                    );
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( $defaults );
                    } ?>
                </ul>
            </nav><!-- end nav -->
        </div>
    </div>
</div>



