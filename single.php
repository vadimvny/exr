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
				 <div class="row"> 
					<div class="col-md-6">	
						<h2>Overview</h2>
						<h4>Willimsburg, Brooklyn, New York</h4>
					</div>
					<div class="col-md-6">
						<div class="social-container">
					        <h3> Share </h3>
					          <?php echo do_shortcode( '[cresta-social-share]' ); ?>
   						</div>	<!-- social-container -->
					</div> <!-- row container -->
				</div>	
					<div class="row">
						<div class="col-md-12">
							<?php the_content(); ?>
						</div> <!-- content col-md-12 -->
					</div> <!-- content end row -->
					<div class="row">
						<div class="col-md-12 col-sm-12	">
							<div class="categories">
								<?php 
									$cats = get_field('categories');
									if( in_array( 'Nightlife', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Nightlife.png"</span>';
									} 
									if( in_array( 'Shopping', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Shopping.png"</span>';
									} 
									if( in_array( 'Food', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Food.png"</span>';
									} 
									if( in_array( 'Sport', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Sport.png"</span>';
									} 
									if( in_array( 'Parks', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Parks.png"</span>';
									} 
									if( in_array( 'Business', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Business.png"</span>';
									} 
									if( in_array( 'Space', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Space.png"</span>';
									} 
									if( in_array( 'Transportation', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Transportation.png"</span>';
									} 
									if( in_array( 'Culture', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Culture.png"</span>';
									} 
									if( in_array( 'Family Friendly', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Family-Oriented.png"</span>';
									} 
									if( in_array( 'Up & Coming', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Nightlife.png"</span>';
									} 
									if( in_array( 'Quiet', $cats) ) {
										echo '<span class="cat-icon"><img src="/wp-content/uploads/2015/10/Quite.png"</span>';
									} 
	
								?>
							</div>
						</div> <!-- col-sm-12	 -->
					</div>
					<div class="row">
						<div class="col-md-12">
						 <?php	$map = get_field('burg_map');
								if( !empty($map) ): ?>
									<div class="map" style='background-image:url("<?php echo $map['url']; ?>")'></div>
							<?php endif; ?>
						</div> <!-- map col-md-12 -->
					</div> <!-- map end row -->

					<div class="row">
						<div class="col-md-4">
							<div class="train-container">
								<div class="trains">
									<p> Nearest Subways </p>
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
						</div> <!-- col-md-4 trains -->
					</div> <!-- train row -->	
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
								<?php
									$buildingID = get_field('exr_new_development_building');
									$we3Options = get_option('we3-real-estate');
								
									$sort = $we3Options['default_sort'];
									
									$sortTypes = array(

												'listing_date desc' => 'Recently Added',
												'modified_date desc' => 'Recently Updated',
												'price desc' => 'Price - High',
												'price asc' => 'Price - Low',
												'bedrooms desc' => 'Beds - Most',
												'bedrooms asc' =>'Beds - Least'
									);
									//print_r($we3Options);
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
												<li data-property-category="residential" data-listing-type="rent" class="active">Residential Rentals</li>
												<li data-property-category="residential" data-listing-type="sale">Residential Sales</li>
												<li data-property-category="commercial" data-listing-type="rent">Commercial Leasing</li>
												<li data-property-category="commercial" data-listing-type="sale">Commercial Sales</li>
											</ul>
										</div>
										<div id="building-availabilities-sale">
											<div id="building-sales" class="listings-section">
								
												<?php
													$query = array( 'neighborhood' => array(strtolower(get_the_title())), 'property_category' => 'residential', 'listing_type' => 'rent', 'sale_status' => array($we3Options['default_sale_status']), 'sort' => 'price desc', 'source_namespace' =>  $we3Options['name_space'] );
												?>		
						
											</div>
											
											<button class="we3-more-link">More Listings</button> 
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
													var listingType = jQuery(this).data('listingType');
													var propertyCategory = jQuery(this).data('propertyCategory');
													listingQuery.listing_type = listingType;
													listingQuery.property_category = propertyCategory;
													listingQuery.pg = 1;
													
													we3WidgetSearch.doSearch(listingQuery);
													jQuery('.we3-listings-filters li').removeClass('active');
													jQuery(this).addClass('active');
													
												});
												
												jQuery(document).on('click', '.we3-more-link', function(event, ui){
													var url = '/search/' + listingQuery.property_category + '/' + listingQuery.listing_type + '/' + listingQuery.neighborhood[0] + '/';
													window.location = url;
													
												})


											});
										</script>
						
									</div>
							</div> <!-- container column -->
						</div> <!-- container row -->	
				  </section> 	
				</div>
			</div>
		<div class="overlay mobileOnly" id="overlay"></div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?> 