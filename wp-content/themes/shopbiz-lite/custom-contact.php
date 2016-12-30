<?php
/* Template Name: custom-contact */
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
			<div class="col-md-6" >
			<?php echo do_shortcode('[contact-form-7 id="35" title="Contact form 1"]'); ?>
			<?php if( have_posts()) :  the_post(); ?>		
			<?php the_content(); ?>
				<?php endif; ?>
				<?php comments_template( '', true ); // show comments ?>
			<!-- /Blog Area -->			
			</div>
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d3818.7791886480027!2d96.12395151655888!3d16.8373069248133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d16.8373728!2d96.12554929999999!4m3!3m2!1d16.837350999999998!2d96.1255417!5e0!3m2!1sen!2smm!4v1483082048767" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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