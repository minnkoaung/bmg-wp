<?php
/* Template Name: CustomPageT1 */
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package shopbiz
 */

get_header(); ?>
<?php get_template_part('index','banner'); ?>
<div class="clearfix"></div>
<div >
  <?php echo do_shortcode('[metaslider id=18]'); ?>
</div>
<div class="clearfix"></div>
<main id="content">
    <div class="container">

      <div class="row">
		<!-- Blog Area -->
			<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
			<div class="col-md-12" >
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; else : endif; ?>
			<?php } else { ?>
			<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Modern Business
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-globe"></i> What We are ?</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="<?php echo get_site_url(); ?>/about-us" class="btn btn-info">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-users"></i> Who we are ?</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="<?php echo get_site_url(); ?>/about-us/our-team/" class="btn btn-info">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-briefcase"></i> What we do?</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="<?php echo get_site_url(); ?>/our-services" class="btn btn-info">Learn More</a>

                    </div>
                </div>
            </div>
        </div>
         <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Recent Projects</h2>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px;">
                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px;">
                <a href="#">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px;">
                <a href="#">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px;">
                <a href="#">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px;">
                <a href="#">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px;">
                <a href="#">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->
			<div class="col-md-12">
			<?php if( have_posts()) :  the_post(); ?>		
			<?php the_content(); ?>
				<?php endif; ?>
				<?php comments_template( '', true ); // show comments ?>
			<!-- /Blog Area -->			
			</div>

			  <!-- Call to Action Section -->
        	<div class="clearfix"></div>
            <div class="row" style="margin-top: 30px !important; border-top:1px solid #eaeaea; padding-top: 20px;">
            <div class="container">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-success btn-block" href="tel:+959250280016" data-toggle="tooltip" data-placement="top" title="Plaese Call to 095063385"><i class="fa fa-phone-square" aria-hidden="true"></i> Call to Action</a>
                </div>
             </div>
           
            </div>


        
			
			<!--Sidebar Area-->
			<aside class="col-md-3">
				<?php get_sidebar(); ?>
			</aside>
			<?php } ?>
			<!--Sidebar Area-->
			</div>
		</div>
	</div>
</main>
<?php
get_footer();