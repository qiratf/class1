<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Plants
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content_navigator">
<?php esc_html_e( 'Skip to content', 'skt-plants' ); ?>
</a>
<?php
	$showpagebanner = get_theme_mod('inner_page_banner_option', 1);
	$showpostbanner = get_theme_mod('inner_post_banner_option', 1);
	$pagethumb = get_theme_mod('inner_page_banner_thumb');
	$postthumb = get_theme_mod('inner_post_banner_thumb');
?>
<div class="header">
  <div class="container">
    <div class="logo">
		<?php skt_plants_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <div id="logo-main">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
        </div>
    </div> 
    <div id="navigation">
    	<nav id="site-navigation" class="main-navigation">
            <button type="button" class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
    		<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary', 'menu_class' => 'primary-menu menu' ) ); ?>
        </nav>
    </div>
    <div class="header-extras">
                <li><div class="header-search-toggle"><button type="button"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/icon-search.png"/></button></div></li>
            	<div class="header-search-form">
                    <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'skt-plants' ); ?>" name="s">
                      <input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'skt-plants' ); ?>">
                    </form>
          		</div>
            	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    			<li><div class="header-cart">
				<a class="cart-customlocation" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'skt-plants' ); ?>"> <img class="cart-customlocation" src="<?php echo esc_url(get_template_directory_uri());?>/images/cart-icon.png" /> <span class="custom-cart-count"><div id="mini-cart-count"></div></span> </a>  
    			</div></li>
    <?php } ?>
    		<div class="clear"></div>
            </div>
        <div class="clear"></div>    
    </div> <!-- container --> 
    <div class="clear"></div>  
  </div>
  <?php if( !is_home() && !is_front_page() && is_page()) {?>
      <div class="clear"></div>
      <div class="inner-banner-thumb">
      	<?php if($showpagebanner == '') {?>
        <?php 	if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail('full'));
                }else{
			if(!empty($pagethumb)){ ?>
            <img src="<?php echo esc_url($pagethumb); ?>" />
            <?php } } ?>
        <?php } ?>    
        <div class="banner-container <?php if($showpagebanner != '') {?>black-title<?php }?>"><h1><?php the_title(); ?></h1></div>
        <div class="clear"></div>
      </div>
  <?php } ?>
  <?php if( !is_home() && !is_front_page() && !is_page() && is_single() && 'post' == get_post_type()) {?>
      <div class="clear"></div>
      <div class="inner-banner-thumb">
      	<?php if($showpostbanner == '') {?>
        <?php 	if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail('full'));
                }else{
			if(!empty($postthumb)){ ?>
            <img src="<?php echo esc_url($postthumb); ?>" />
            <?php }  } ?>
         <?php } ?>   
        <div class="banner-container <?php if($showpostbanner != '') {?>black-title<?php }?>"><h1><?php the_title(); ?></h1></div>
        <div class="clear"></div>
      </div>
  <?php } ?>  
  
  <div class="clear"></div> 