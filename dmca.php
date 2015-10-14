<?php /* Template Name: DMCA */ 

get_header(); ?>

<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">	
   	<h1><?php the_title(); ?></h1>
</div>   	
<div class="staticContent">
	<div class="contentTabs">
		<div id="tabs">
			<ul>
				<li><a href="/summary/">Summary</a></li>
			    <li><a href="/terms-and-conditions/">Terms and Conditions</a></li>
			    <li><a href="/privacy-policy/" >Privacy Policy</a></li>
			    <li><a href="/dmca/" class="active">DMCA</a></li>
			</ul>
		</div>	
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-container">
					<?php the_content(); ?>
				</div><!-- content-container end -->
			</div>
		</div>	
	</div>
</div>		
<div class="overlay mobileOnly" id="overlay"></div>
    

<?php get_footer(); ?>
