<?php /* Template Name: Privacy Policy */ 

get_header(); ?>

<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">	
	<h1><?php the_title(); ?></h1>
	<h2>Last updated: June 01, 2015</h2>
</div>
<div class="staticContent">
	<div class="contentTabs">
		<div id="tabs">
			<ul>
				<li><a href="/summary">Summary</a></li>
			    <li><a href="/terms-and-conditions/">Terms and Conditions</a></li>
			    <li><a href="/privacy-policy/" class="active">Privacy Policy</a></li>
			    <li><a href="/dmca/">DMCA</a></li>
			</ul>
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
