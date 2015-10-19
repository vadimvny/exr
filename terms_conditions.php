<?php /* Template Name:  Terms And Conditions */ 

get_header(); ?>

<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">	
	<h1><?php the_title(); ?></h1>
	<h2><?php the_field('date')?></h2>
</div>	
<div class="staticContent">
	<div class="contentTabs">
		<div id="tabs">
			<?php wp_nav_menu(array('theme_location' => 'middle', 'container' => false, 'menu_class' => 'disclaimer_nav')); ?>
		</div>	
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-container">
					<?php the_content(); ?>
				</div>	
			</div>
		</div>	
	</div>
</div>		
<div class="overlay mobileOnly" id="overlay"></div>
    

<?php get_footer(); ?>
