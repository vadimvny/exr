<?php get_header(); ?>
<div class="headerImage" style="background-image:url('<?php echo $image[0]; ?>');">
<h1><span class="headerCaption"><?php the_title(); ?></span></h1>
</div>
<div class="staticContent">
	<div class="contentTabs">
     <?php wp_reset_query(); ?>
    <div class="row margin-80">
    <section id="development">
      <div class="col-sm-7 new-dev-main ">
        <div class="article-container"> 
          <!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
				<h4><?php $subTitle  = get_post_meta( get_the_id(), 'exr_new_development_address', true);
					echo $subTitle;
				  ?>
				</h4>

				<a href='https://www.google.com/maps/place/<?php the_field("show_on_the_map") ?>' target="_blank"><button class="show-map">Show on Map</button></a>
				
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
         </div> <!-- article-container -->
     
        </div>

    <div class="col-sm-5 margin-30  new-dev-sidebar ">
        <div class="social-container">
        <h3> Share </h3>
        	<?php echo do_shortcode( '[cresta-social-share]' );?>
        	<h4>Visit Website</h4>
        	<a href='<?php the_field('development_link'); ?>' class="dev-link" target="_blank"><?php the_field('development_link'); ?></a>
   		</div>	<!-- social-container -->

		<div class="counter"></div> 
        <div class="slider-container">
		<?php
		    while ( have_posts() ) : the_post();
		        if ( get_post_gallery() ) :
		            $gallery = get_post_gallery( get_the_ID(), false );
		            
		            foreach( $gallery['src'] AS $src )
		            {
		                ?>
		                
		                <a href='<?php echo $src; ?>' class='gallery'><img src='<?php echo $src; ?>' /></a>
		                
		                <?php
		            }
		        endif;
		    endwhile;
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

							<div class="email"><span class="number" itemprop="email"><a href="tel:+<?=$agent->email?>"><?=$agent->email?></a></span></div>
											
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
	<section id="listing" class="we3">    
	    <div class="row search-results listings">
	    	<div class="col-md-12">
	    	<script id="listing-template" type="text/x-handlebars-template">
					<article class="listing {{type}}" itemscope itemtype="http://schema.org/Residence"> 
					  <a class="overlay-link" href="{{link}}">
						  <header>
							<h3>
							<a href="{{link}}" itemprop="url name">
								{{display_name}}
							</a>
							</h3>
							<div class="utility-buttons">		
										{{#if saved}}
											<div class="utility-button save-listing-button we3-user-profile-only">
												<button class="we3-listing-saved we3-user-save-listing disabled" data-listing-info="{{encodeListingInfo this}}" data-pub-type="listing.save" data-pub-data="{{key}}">
												<i class="icon-home"></i><span class="status">Saved</span>
												</button>
											</div>
										{{else}}
						
											<div class="utility-button hide-listing-button we3-user-profile-only">
												{{#if hidden}}
												<button class="we3-listing-hidden we3-user-hide-listing disabled" data-listing-info="{{encodeListingInfo this}}" data-pub-type="listing.hide" data-pub-data="{{key}}">
													<i class="icon-close"></i><span class="status">Hidden</span>
												</button>
												{{else}}
												<button class="we3-pub-user-action we3-user-save-listing" data-pub-type="listing.save" data-listing-info="{{encodeListingInfo this}}" data-pub-data="{{key}}">
													<i class="icon-home"></i><span class="status">Save</span>
												</button>
												<button class="we3-pub-user-action we3-user-hide-listing" data-listing-info="{{encodeListingInfo this}}" data-pub-type="listing.hide" data-pub-data="{{key}}">
													<i class="icon-close"></i><span class="status">Hide</span>
												</button>
												{{/if}}
											</div>
										{{/if}}

							</div>
							<div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<div class="neighborhood" itemprop="addressLocality">
											<a href="" class="follow">{{neighborhood}}</a>
										</div>
				  
									<div class="neighborhood" itemprop="addressLocality">
										<a href="{{link}}" class="follow">
											{{city}}
										</a>
									</div>

									<div class="state" itemprop="addressRegion">
										<a href="{{link}}" class="follow">
											{{state}}
										</a>
									</div>
									<div class="zip" itemprop="postalCode">
										<a href="{{link}}" class="follow">
											{{zip}}
										</a>
									</div>
								<div class="sl sl1">		      
								</div>
							</div>
						  </header>
							<div class="pic">
								<img itemprop="photo" src="{{main_photo}}">
								<div class="sale_status" data-value="{{sale_status}}">
										{{sale_status}}
								</div>
							</div>
							<div class="trendingBanner">&nbsp;</div>
							<div class="info-wrapper">
								<div class="priceHold" data-value="{{price}}">
									<div class="price">{{price}}</div>
								</div>
								<div class="bd-ba-Hold">
									<div class="info bd-info" data-value="{{bedrooms}}">
										<span>{{bedrooms}}</span> BD 
									</div>
									<div class="info ba-info" data-value="{{baths}}">
										<span>{{baths}}</span> BA
									</div>				
								</div>
								<div class="type" data-value="{{type}}">
										{{type}}
									</div>
								<div class="time-info" data-value="{{modified_date_formatted}}">
									<div class="days-ago">Added: {{created_date_formatted}}</div>
									<div class="days-ago">Updated: {{modified_date_formatted}}</div>
								</div>
							</div>
							{{openhouseHTML}}      
						  <div class="meta">
						  </div>
						</a>
					  <div class="clearme"> &nbsp;</div>
					</article>
				</script>
	    		<h2>Listings</h2>
				<?php
					$buildingID = get_field('exr_new_development_building');
					$we3Options = get_option('we3-real-estate');
					//print_r($we3Options);
					$sort = $we3Options['default_sort'];
									
					$sortTypes = array(

								'listing_date desc' => 'Recently Added',
								'modified_date desc' => 'Recently Updated',
								'price desc' => 'Price - High',
								'price asc' => 'Price - Low',
								'bedrooms desc' => 'Beds - Most',
								'bedrooms asc' =>'Beds - Least'
					);
					
				?>	
					<div class="building listings listings-section">
						<div class="we3-sort-by-container">
							<div class="we3-search-dropdown we3-sort-by">
								<label class="we3-selected-sort"><?=$sortTypes[$sort]?></label>
								<i class="icon-arrow-down7"></i>
								<div class="we3-sorty-options">
									<ul>
										<?php foreach($sortTypes as $skey => $sval){ ?>
											<li data-sort-by="<?=$skey?>">
												<?=$sval?>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>

						</div>
						<div class="we3-listings-filters">
							<ul>
								<li data-sale-status="available" class="active">Available</li>
								<li data-sale-status="app pending" >In Contract</li>
							</ul>
						</div>
						<div id="building-availabilities-sale">
						
							
							<div id="building-sales" class="listings-section">
								
								<?php
									$query = array( 'building' => $buildingID, 'sale_status' => $we3Options['sale_status'], 'sort' => 'price desc', 'source_namespace' =>  $we3Options['name_space'] );
								?>		
						
							</div> 
						</div>
						<script>
							jQuery(document).ready(function() {
								var listingQuery = <?=json_encode($query)?>; 
								var source   = jQuery("#listing-template").html();
								var listingTemplate = Handlebars.compile(source);
								 Handlebars.registerHelper('encodeListingInfo', function(l){
								  var info = {};
								  info.key = l.key;
								  info.neighborhood = l.neighborhood;
								  info.property_category = l.property_category;
								  info.city = l.city;
								  info.state = l.state;
								  info.zip = l.zip;
								  info.price = l.price;
								  info.display_name = l.display_name;
								  info.photoCount = l.photo_count;
								  info.property_featrues = l.property_features;
								  info.year_built = l.year_built;
								  info.display_publicly = l.display_publicly;
								  info.baths = l.baths;
								  info.bedrooms = l.bedrooms;
								  info.sq_ft = l.sq_ft;
								  info.type = l.type;
								  var string = encodeURI(JSON.stringify(info));
								  return new Handlebars.SafeString(string);
							  });


								var we3WidgetSearch = jQuery('#building-sales').we3Search({
									template: listingTemplate,
									saveQuery: false,
									onComplete: function(response){
										//console.log(response.count);
										if(response.count > 0 ){
											jQuery('#building-availabilities-sale').show();
				
										}
									}
								});
								we3WidgetSearch.doSearch(listingQuery);
									 
								jQuery(document).on('click','.we3-sort-by', function(event, ui){
									if(jQuery('.we3-sorty-options').hasClass('active')){
										jQuery('.we3-sorty-options').removeClass('active');
									}else{
										jQuery('.we3-sorty-options').addClass('active')
									}
									var sortBy = jQuery(event.target).data('sortBy');

									if(typeof sortBy !== 'undefined'){
										listingQuery.sort = sortBy;
										listingQuery.pg = 1;
										we3WidgetSearch.doSearch(listingQuery);
										jQuery('.we3-selected-sort').text(jQuery(event.target).text());
									}
								});
							
								jQuery(document).on('click', '.we3-listings-filters li', function(event, ui){
									var saleStatus = jQuery(this).data('saleStatus');
									
									listingQuery.sale_status = [ saleStatus ];
									
									listingQuery.pg = 1;
								
									we3WidgetSearch.doSearch(listingQuery);
									jQuery('.we3-listings-filters li').removeClass('active');
									jQuery(this).addClass('active');
								
								});

							});
						

						</script>
						
					</div>
	    	</div> <!-- container column -->
	    </div> <!-- container row -->	
	  </div>
    </div>
  </div> 
  </section> 
		<div id="willimsburg">
		 <div class="row">
    		<div class="col-md-12">
    			<h2>Williamsburg</h2>
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

<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery(".slider-container").tosrus({
      	infinite: true,
      	slides: { 
      		visible : 1,      		
      	},
      	show: true,
	    pagination : {
	      add: true,
	      type: "thumbnails"
	    }
      });
      jQuery('.slider-container a').tosrus();
   	  var n = jQuery('.slider-container a').size;
   	  jQuery( '.counter').append( n );
   });
</script>

