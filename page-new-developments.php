<?php /* Template Name: New Developments */ 

get_header(); ?>

<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">
  <div class="header-container">	
	<h1><span class="headerCaption"><?php the_title(); ?></span></h1>
	<h2><span class="headerSubCaption">Marketing Strategies For New Construction</h2>
  </div>	
</div>
		<div class="staticContent">
			<div class="contentTabs">

 <?php
        
        $featured_params = array(
			'meta_value' => 'featured',
			'post_type' => 'new-developments',
          	'post_status' => 'publish',
          	'posts_per_page' => 1
		);
		$feature_query = new WP_Query( $featured_params );
		if($feature_query->have_posts()){
			$feature_query->the_post();
			$featured_new_dev = $post;
			//print_r($featured_new_dev);
		}
         wp_reset_query();
         wp_reset_postdata();
         
        $args=array(
          'post_type' => 'new-developments', 
          'post_status' => 'publish',
          'posts_per_page' => -1
          );
        if(!empty($featured_new_dev)){       	
        	$args['post__not_in'] = (array) $featured_new_dev->ID;
        }
        $current_page_id = get_the_id();
        $dev_query = null;
        $dev_query = new WP_Query($args);
        $new_devs = array();
        
        $devCount = 0;
        if ($dev_query->have_posts()) { 
        
        	 while ( $dev_query->have_posts() ) : $dev_query->the_post();
				$new_devs[] = $post;
				$devCount++;
			endwhile; 
		}
		wp_reset_query();
        wp_reset_postdata();
        
        if ( false === ( $agents = get_transient( 'exr_agents' ) ) ) {
			$we3Options = get_option('we3-real-estate');
			$we3_agent_api = $we3Options['search_api'] . '/agents?source_namespace=' . $we3Options['name_space'].'&rp=999&sort='.urlencode('last_name asc');
			//echo $we3_agent_api;
			$result = json_decode(file_get_contents($we3_agent_api));
			$agents = $result->data;
			set_transient( 'exr_agents', $agents, 360 * MINUTE_IN_SECONDS );
			
		}
		$agentArray = array();
		foreach($agents as $agent){
			$agentArray[$agent->key] = $agent;
		}
       
        function exr_print_small_new_dev($new_dev_post){
       			global $agentArray;
       			
				if(empty($new_dev_post)){
					return;
				}
				
				$soldOut = get_field('exr_new_development_sold_out', $new_dev_post->ID); 
				$soldOutDisplay = '';
				if($soldOut=='sold-out'){
					$soldOutDisplay = '<li>Sold Out</li>';
				}
		
			?>
			<div class="row bottom-buffer">
				<div class="col-md-6">
			  
					<div class="listing-photo">
						<a href="<?php echo get_permalink( $new_dev_post->ID ); ?>" class="mainImg">
						  <?= get_the_post_thumbnail($new_dev_post->ID, array(512, 325)); // Declare pixel size you need inside the array ?>
						</a>
					</div>
				</div>	
				
	
				<div class="col-md-6">
					<!-- <div class="listing-info"> -->
					<div class="listing-data">	
						<h3><a href="<?php echo get_permalink( $new_dev_post->ID ); ?>"><?=$new_dev_post->post_title?></a></h3>
		
						<?=$soldOutDisplay?>
						<div class="excerpt">
						<?php 
							if (strlen($new_dev_post->post_excerpt) > 150) {
								echo substr($new_dev_post->post_excerpt, 0, 150) . '...'; } else {
								echo $new_dev_post->post_excerpt;
							} 
						?>
						</div>
						<div class="learn-more"><a href="<?php echo get_permalink( $new_dev_post->ID ); ?>">Learn More</a></div>
						 <?php 
							$newDevAgentCount = 4;
							$agents = array();
							for($i=1; $i<=$newDevAgentCount; $i++){
								$agentField = 'exr_new_development_agent_'.$i;
								$agentID = get_field($agentField, $new_dev_post->ID);
								if(!empty($agentID) && strlen($agentID)>1){
						  ?>
								<!-- <li class="agent-line"><span class="agent-photo-container"><img src="<?=$agentArray[$agentID]->image?>" class="agent-photo"></span> <a href="/agent/<?=$agentArray[$agentID]->key?>" ><?=$agentArray[$agentID]->display_name?></a>, <?=$agentArray[$agentID]->phone?></li> -->
							<?php }
							} ?>
					
					</div>
				</div> <!-- col-md-6 listing -->
			</div> <!-- row end -->
       <?php } 
?>
  
 
<!--     <div class="row">
    	<div class="col-sm-12 margin-10"><hr/></div> 
	</div> -->
 
 	<!-- <div class="row">  -->
 		<?php
 		for($i = 0; $i<$devCount; $i++){
 		?>
<!--        <div class="col-md-12 col-sm-12 margin-20"> 
 -->      	<?php exr_print_small_new_dev($new_devs[$i]); d?> 
      	
      <!--  </div>  -->
      <?php } ?>
<!--     </div> 
 -->  
  <!-- contains the content to be loaded when scrolled -->
  <a id="page-nav" href="developments/2"></a>

  

          
      </div>
	</div>
<div class="overlay mobileOnly" id="overlay"></div>
    
<?php get_footer(); ?>
