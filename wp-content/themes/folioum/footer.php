<?php global $smof_data; //fetch options stored in $data?>



<div class="fotter-top">

    <div class="container">

            <div class="row">
		          <div class="col-lg-12 text-center hotline facebook-fan">
                      <a target="facebookfaneco" href="<?php echo $smof_data['fan_facebook'] ; ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo-facebook.png"/></a>
                  </div>
                <div class="col-lg-12 text-center hotline">

                    <?php

                    echo __("Hotline: ").$smof_data['contact_hotline'];

                    ?>
                </div>
            <div class="col-lg-12 menu-footer">

                        <?php

                        $defaults = array(

                            'theme_location'  => 'intro',

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
                        if ( has_nav_menu( 'intro' ) ) {

                            wp_nav_menu( $defaults );

                        } ?>
            </div>

            <div class="col-lg-12 text-center email-footer">

                <?php echo $smof_data['footer_email'].'<br>'.$smof_data['footer_text']; ?>
                <input type="hidden" value="Website develop by Toanpv toanpv92hy@gmail.com" />
            </div>

        </div>

    </div>

</div>





<script>

    jQuery(document).ready(function(){

        /* var bcf_settings = { buttonText:'Contact Us', buttonTop:'30%', language:'en_US' }; // Better Contact Form Settings */

        (function (d, s, id) { if ('https:' == document.location.protocol || d.getElementById(id)) return; var js, fjs = d.getElementsByTagName(s)[0]; js = d.createElement(s); js.id = id; js.src = "http://bettercontactform.com/contact/form/render?f=ca3809e3c43ad2679cae16d4126d2d6e37e82b8c"; fjs.parentNode.insertBefore(js, fjs); }(document, "script", "bcf-render"));

    });

</script>

<!-- <a id="bcf_trigger" href="http://bettercontactform.com" rel="bcf_trigger">Contact Form</a> -->



<?php wp_footer(); ?>

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-48140161-1', 'eco.net.vn');

  ga('send', 'pageview');

jQuery(document).ready(function() {
    jQuery(window).resize(function(){
        var width_window=jQuery(window).width();
        if (width_window <= 768) {
            jQuery(".isotope img").attr('height','auto');
        };
    });
});

</script>

</body>

</html>