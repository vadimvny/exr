<?php
get_header();
?>
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original'); ?>
<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">
<h1><span class="headerCaption"><?php the_title(); ?></span></h1>
</div>
		<div class="staticContent">
			<div class="contentTabs">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="overlay mobileOnly" id="overlay"></div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?> 