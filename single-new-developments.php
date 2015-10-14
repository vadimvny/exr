<?php get_header(); ?>
<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">
<h1><span class="headerCaption"><?php the_title(); ?></span></h1>
</div>
		<div class="staticContent">
			<div class="contentTabs">
     <?php wp_reset_query(); ?>
    <div class="row margin-80">
    <section id="development">
      <div class="col-sm-7 new-dev-main">
        <div class="article-container"> 
          <!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
		
				<a href='https://www.google.com/maps/place/<?php the_field("show_on_the_map") ?>' class="show-map"  target="_blank">Show on Map</a>

				<h3>Overview</h3>

				<?php the_content(); // Dynamic Content ?>

<!-- 				<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
 -->
				<p><?php _e( '', 'html5blank' ); // Separated by commas ?></p>

				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			</article>
			<!-- /article -->
		<?php
      		$amenities = get_field('exr_new_development_amenities');
      	if(	!empty($amenities) && strlen($amenities)>1){
      	?>
      		<hr>
		<!-- 	<h2>Amenities</h2> -->
			<div class="new-development-amenities new-dev-side-section">
			  <div class="first-row">	
				<div class="amenity">
					<h3><?php the_field('cat_1'); ?></h3>
					<?php the_field('cat_1_type'); ?>
				</div>
				<div class="amenity">
					<h3><?php the_field('cat_2'); ?></h3>
						<?php the_field('cat_2_type'); ?>
				</div>
				<div class="amenity">
					<h3><?php the_field('cat_3'); ?></h3>
					<?php the_field('cat_3_type'); ?>
				</div>
			   </div>
			   <div class="second-row">	
				<div class="amenity">
					<h3><?php the_field('cat_4'); ?></h3>
					<?php the_field('cat_4_type'); ?>
				</div>
				<div class="amenity">
					<h3><?php the_field('cat_5'); ?></h3>
						<?php the_field('cat_5_type'); ?>
				</div>
				<div class="amenity">
					<h3><?php the_field('cat_6'); ?></h3>
					<?php the_field('cat_6_type'); ?>
				</div>
			  </div>	
			</div>
			<hr>
        <?php } ?>  
         </div> <!-- article-container -->
      
        <?php
        	$buildingID = get_field('exr_new_development_building');
        	$we3Options = get_option('we3-real-estate');
			$we3_building_api = $we3Options['search_api'] . '/search-results?source_namespace=' . $we3Options['name_space'].'&building='. $buildingID .'&sale_status=active&rp=999&sort='.urlencode('price desc');
			//echo $we3_agent_api;
			$result = json_decode(file_get_contents($we3_building_api));
			$listings = $result->data;
			if(!empty($buildingID) && strlen($buildingID)>1){
		?>
		<hr>
        <h2>Availabilities</h2>
		<ul class="new-dev-availabilities new-dev-side-section">
		<?php
			foreach($listings as $listing){
		?>
			<li class="building-listing Condo" itemscope="" itemtype="http://schema.org/Residence"> 
			  <a class="overlay-link" href="/listing/<?=$listing->key?>/">	 
						</a><div class="building-info headingHold"><a class="overlay-link" href="/listing/<?=$listing->key?>/">
						</a><a href="/listing/WARBURG-SALES-1450297/harlem-ny-10039/" itemprop="url name">
							<?=strtoupper($listing->address_2)?>
						</a>
						</div>
						<div class="building-info priceHold" data-value="$500,000">
							<div class="price"><?=$listing->price?></div>
						</div>
						<div class="building-info bd-info" data-value="1">
							<span><?=$listing->bedrooms?></span> BD 
						</div>
						<div class="building-info  ba-info" data-value="1">
							<span><?=$listing->baths?></span> BA
						</div>
						<div class="building-info  sq_ft" data-value="600">
							<span><?=$listing->sq_ft?></span> FT<sup>2</sup>
						</div>					
			</li>
		<?php
			
			}
        ?>
        </ul>
       <?php }else{ 
       
       	$soldOut = get_field('exr_new_development_sold_out'); 
		$soldOutDisplay = '';
		if($soldOut=='sold-out'){	
       ?>
       	<hr>
        <h2>Availabilities</h2>
    	<div class="new-development-sold-out new-dev-side-section">
				Sold Out
		</div>
       <?php } } ?>
        </div>

    <div class="col-sm-5 margin-30  new-dev-sidebar">
        <div class="social-container">
        <h3> Share </h3>
        	<?php echo do_shortcode( '[cresta-social-share]' );?>
        	<h4>Visit Website</h4>
        	<a href='<?php the_field('development_link'); ?>' class="dev-link" target="_blank"><?php the_field('development_link'); ?></a>
   		</div>	<!-- social-container -->
        <div class="counter">
			Photos <span class="brackets"> (<?php the_field('counter'); ?>)</span>
        </div>
        <div class="slider-container">
		 	<?php $slider = get_field("master_slider");
		 		
		 		echo do_shortcode( $slider  );
		 	?>   	
        </div>
      </div>
     </div>
    </div>
    <section id="agents">
    <div class="row">  
      <div class="col-md-12">
        <div class="agents-container"> 
         <h2>Agents Representing This Listing</h2>
		   
		    <?php
		    	$we3Options = get_option('we3-real-estate');
		    	$newDevAgentCount = 4;
		    	$agents = array();
				for($i=1; $i<=$newDevAgentCount; $i++){
					$agentField = 'exr_new_development_agent_'.$i;
					$agentID = get_field($agentField);
					if(!empty($agentID) && strlen($agentID)>1){
						$we3_agent_api = $we3Options['search_api'] . '/agents?source_namespace=' . $we3Options['name_space'].'&key=' . $agentID . '&rp=1&sort='.urlencode('last_name asc');
						//echo $we3_agent_api;
						$result = json_decode(file_get_contents($we3_agent_api));
						$agents[] = $result->data[0];
					}
				}
		    	//print_r($agents);
				
			?>
		<div class="info-agent new-dev-side-section">
		<?php
			foreach($agents as $agent){
		?>
			
				<div class="agent-profile" itemscope="" itemtype="http://schema.org/Person">
					<div class="agent-thumbnail" style='background-image:url("<?=$agent->image?>");'>
						<!-- 	<img src="<?=$agent->image?>" class="agent-photo"> -->
					</div>
					<div class="agent-details">
							<div class="agent-name" itemprop="name"><?=$agent->display_name?></div>
						<div class="phone" itemscope="" itemtype="http://schema.org/RealEstateAgent">
							<div itemprop="telephone">
							  	<a href="/brokerage/<?=$agent->company[0]?>">
								<?php if(empty($agent->phone)) { 
									echo "(212) 658-0783"; 
									}else{
								   	echo $agent->phone;
								   }
								 ?>
								</a>
							</div>
							<meta itemprop="url" content="/brokerage/<?=$agent->company[0]?>">
						</div>

<!-- 							<div class="email"><span class="number" itemprop="email"><a href="mailto:+<?=$agent->email?>"><?=$agent->email?></a></span></div>
 -->											
						<!-- <div class="realtor-url"><a href="/agent/<?=$agent->key?>" class="agent-link">See my listings  ›</a></div>
						<meta itemprop="url" content="/agent/<?=$agent->key?>"> -->
					</div>
				</div>
			
		<?php
			
			}
        ?>

          </div>
        </div> <!-- agents-container --> 
       </div><!--  container column --> 
     </div> <!--  container row -->     
	</section> 
	<section id="listing">    
	    <div class="row">
	    	<div class="col-md-12">
	    		<h2>Listings</h2>
	    		
	    	</div> <!-- container column -->
	    </div> <!-- container row -->	
	  </div>
    </div>
  </div> 
	   </section> 
		<div id="willimsburg">
		 <div class="row">
    		<div class="col-md-12">
    			<h2>Willimsburg</h2>
				<div class="train-container">
					<div class="trains">
						<?php 
							$selected = get_field('trains');
							// foreach ( $selected as $select );
							
							if( in_array('1', $selected)  ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/1.png"></span>';
								}
							if( in_array('2', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/2.png"></span>';
								}
							if( in_array('3', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/3.png"></span>';
								}
							if( in_array('4', $selected)) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/4.png"></span>';
								}	
							if( in_array('5', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/5.png"></span>';
								}
							if( in_array('6', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/6.png"></span>';
								}
							if( in_array('7', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/7.png"></span>';
								}
							if( in_array('A', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/A.png"></span>';
								}
							if( in_array('C', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/C.png"></span>';
								}
							if( in_array('E', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/E.png"></span>';
								}
							if( in_array('B', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/B.png"></span>';
								}
							if( in_array('D', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/D.png"></span>';
								}
							if( in_array('F', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/F.png"></span>';
								}	
							if( in_array('M', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/M.png"></span>';
								}
							if( in_array('J', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/J.png"></span>';
								}
							if( in_array('L', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/L.png"></span>';
								}
							if( in_array('N', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/N.png"></span>';
								}	
							if( in_array('Q', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/Q.png"></span>';
								}
							if( in_array('R', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/R.png"></span>';
								}	
							if( in_array('S', $selected) ) {
								echo '<span class="train-icon"><img src="/wp-content/uploads/2015/10/S.png"></span>';
								}						
						?>	
					</div>
				</div>
				<div class="map-container">
					<?php 
							$map = get_field('burg_map');
							if( !empty($map) ): ?>
								<div class="burg_map" style='background-image:url("<?php echo $map['url']; ?>")'>
						<?php endif; ?>
				</div>
    		</div> <!-- container column -->
    	</div> <!-- container row -->	
      </div>	<!-- section willimsburg -->
<?php get_footer(); ?>
