<?php
/**
 * Template Name: Contact Page
 *
 */
get_header();
?>
<?php while(have_posts()): the_post(); ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original'); ?>
<div class="headerImage"<?php if (isset($image[0])): ?> style="background-image:url('<?php echo $image[0]; ?>');"<?php endif; ?>>
    <h1>Contacting EXR</h1>
</div>
<div class="staticContent"> 
    <div class="contentTabs">
        <div class="row">
            <div class="contactForm">
                <div class="col-md-6">  
                    <h2>Inquiry</h2>
                    <p>Questions? Concerns? Let us know. We're always happy to hear from you.</p>
                     <?php the_content();?>
                </div>   
                 <div class="col-md-6">    
                    <div class="contactData">
                        <div class="dataItem email">
                        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/mail@2x.png" alt="email" />
                			<span>hello@exrny.com</span>	
                		</div>
                        <div class="dataItem phone">
                			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/phone@2x.png" alt="email" />
                        	<a href="tel://(212)991-8983"><span>(212) 991-8983</span></a>
                        </div>
                        <div class="dataItem location">
                     		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/location@2x.png.jpg" alt="location" />
                  		        <span>160 Havemeyer St. Store 7 Brooklyn, NY 11211 </span>
                        	</div>
                        <div class="map-container">
                        	<div class="map" style='background-image: url("/wp-content/uploads/2015/10/map-marker-1.png");'></div>
                        </div>	
                    </div>    
                <?php endwhile; ?>
                </div>
             </div> <!-- contact form end -->
        </div> <!-- row end   -->
   </div> <!--  contentTabs end -->
</div> <!-- staticContent  end --> 
<?php get_footer(); ?> 