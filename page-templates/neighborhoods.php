<?php
/**
 * Template Name: Neighborhoods Page
 *
 */
get_header();
?>
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
<div class="neighborhoods" id="neighborhoods">
                    <div class="headerImage terms">
                        	<h1><?php the_title(); ?></h1>
                        	<h2>Brooklyn</h2>
                    </div>
                    <div class="inner">
                        <!-- <div class="buttons">
                            <a href="javascript://" data-filter="" class="button active neighborhoods-filter">All</a>
                            <?php
                            $categories = $categories = get_categories(array(
                            ));
                            foreach ($categories as $category): ?>
                            <a href="javascript://" data-filter="<?php echo $category->term_id; ?>" class="button neighborhoods-filter"><?php echo $category->name; ?></a>
                            <?php endforeach; ?>
                        </div> --> 
                        <?php 
                            $args = array(
                                'posts_per_page'    => -1,
                                'post_type'         => 'post',
                                'orderby'           => 'title',
                                'order'             => 'ASC'
                            );
                            $neighborhoods = new WP_Query($args);
                        ?>
                        <div class="row images">
                            <?php if ($neighborhoods->have_posts()): ?>
                            <?php while($neighborhoods->have_posts()): $neighborhoods->the_post(); $categories = get_the_category(get_the_ID()); ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 cat-<?php echo $categories[0]->term_id; ?>">
                                <a href="<?php the_permalink(); ?>">
                                <div class="image">
                                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'neighborhoods'); ?>
                                    <img src="<?php echo $image[0]; ?>" alt="" class="img-responsive">
                                    <span class="caption"><?php the_title(); ?></span>
                                </div>    
                                </a>    
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                            <?php endif; ?>
                    </div> 
                </div>    
		
		
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?> 