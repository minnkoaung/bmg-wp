<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package shopbiz
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div class="wrapper">
<a style="display:none;" class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'shopbiz' ); ?>
</a>
<header> 
  <!--==================== TOP BAR ====================-->
  <div class="ta-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
          <ul class="info-left">
            <?php 
              $shopbiz_head_info_one = get_theme_mod('shopbiz_head_info_one');
              $shopbiz_head_info_two = get_theme_mod('shopbiz_head_info_two');
            ?>
            <li><?php echo $shopbiz_head_info_one; ?></li>
            <li><?php echo $shopbiz_head_info_two; ?></li>
          </ul>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
          <?php wp_nav_menu( 
              array(  
              'theme_location'  => 'top',
              'container' => '',
              'menu_class' => 'info-right',
              'fallback_cb' => 'shopbiz_custom_navwalker',
              'walker' => new shopbiz_custom_navwalker()
            ) ); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <!--==================== Header ====================-->
  <div class="ta-main-nav">
    <nav class="navbar navbar-default navbar-wp">
      <div class="container">
        <div class="navbar-header"> 
			<!-- Logo -->
			<?php
			if(has_custom_logo())
			{
			// Display the Custom Logo
			the_custom_logo();
			}
			 else { ?>
			<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?><br>
      <span class="site-description"><?php echo  get_bloginfo( 'description', 'display' ); ?></span>   
      </a>			
			<?php } ?>
			</h1>
          <!-- navbar-toggle -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle Navigation</span> <span class="fa fa-ellipsis-v fa-lg"></span> </button>
        </div>
        <!-- /navbar-toggle --> 
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'shopbiz_custom_navwalker::fallback' , 'walker' => new shopbiz_custom_navwalker() ) ); ?>
        </div>
        <!-- /Navigation --> 
      </div>
    </nav>
  </div>
</header>
<!-- #masthead --> 