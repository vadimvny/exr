<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original'); ?>
<div class="headerImage terms"<?php if (isset($image[0])): ?> style="background-image:url('<?php echo $image[0]; ?>');"<?php endif; ?>>
    <h1><?php the_title(); ?></h1>
</div>
<div class="staticContent">
    <?php the_content(); ?>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>  