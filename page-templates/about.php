<?php
/**
 * Template Name: About Page
 *
 */
get_header();
?>

<style>
.about .staticContent .parallax-background{opacity:0;margin-top:220px;}
.about .staticContent .scrollme.fixed{position:fixed!important;width:100%;margin-top:0;left:0;top:0;}
.about .staticContent .scrollme.fixed .parallax-background, .about .staticContent .scrollme.fixed .parallax{position:absolute;width:100%;}
.scrollme.fixed .parallax{top:0;}
</style>
<script>
jQuery( document ).ready(function() {

	
	var height= jQuery('#history').height();
	var opacity = 0;
	var hOpacity = 1;
	var headerTop = 20;
	var startParallax = jQuery('.parallax').offset().top - jQuery('.scroll-top').offset().top
	
	jQuery( window ).scroll(function() {
	
		var thisTop = jQuery('.scroll-top').offset().top - jQuery(window).scrollTop();
		console.log('thisTop: ' + thisTop);
		var pTop =  thisTop + 300;
		if(thisTop <= startParallax){	

			jQuery('#history').height(height);
			jQuery('.scrollme').addClass('fixed');
			jQuery('.parallax-background').css('top', pTop);
			opacity = opacity+.1;
			jQuery('.parallax-background').css('opacity', opacity);		
			
		}else{
			jQuery('.scrollme').removeClass('fixed');
			jQuery('.parallax').removeAttr('style');
			jQuery('.parallax-background').removeAttr('style');
			opacity = 0;
			hOpacity = 1;
			headerTop = 20;
			jQuery('.parallax-background').css('opacity', opacity);
			jQuery('.parallax').css('opacity', hOpacity);
		}
		
		
		if(thisTop <= (startParallax - 200)){
			   headerTop = headerTop - 20;
			   jQuery('.parallax').css('top', headerTop);
			   hOpacity = hOpacity - .1;
			   jQuery('.parallax').css('opacity', hOpacity);
		}
		
		
		
	});

});
</script>

<div class="about" id="about">
			<div class="inner">
				<div class="about-header">
					<h1>A harmony of scale and focus</h1>
					<div class="outer-btn">
						<a href="#mission" class="inner-btn">Mission</a>
						<a href="#brand" class="inner-btn">Brand</a>
						<a href="#team" class="inner-btn">Team</a>
						<a href="#history" class="inner-btn">History</a>
					</div>
					</h2>
					<span class="arrow">
						<a class="next" href="#mission">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/scroll-down@2x.png" alt="arrow" />
						</a>
					</span>
				</div>
				<div class="nav">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/logo.png" alt="EXR" class="logo" />
					<ul>
						<li><a href="#mission">Mission</a>
						</li>
						<li><a href="#brand">Brand</a>
						</li>
						<li><a href="#team">Team</a>
						</li>
						<li><a href="#history">History</a>
						</li>
					</ul>
				</div>
				<div class="staticContent">
					<section id="mission">
						<div class="row">
							<h2>Mission</h2>
							<div class="col-md-7">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/mission.png" alt="mission" />
							</div>
							<div class="col-md-5">
								<div class="about-content">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section>
					<section id="brand">
						<div class="row">
							<h2>Brand</h2>
							<div class="col-md-12">
								<div class="text-container">
									<p> We are used to live in a three dimensional world: up and down, left and right, forwards and backwards, these are the only ways to move. </p>

									<p>But in topology they formulated, and even represented, a fourth dimension. Common three dimensional polygons, like a pyramid or a cube, can be transposed in a four dimensional space.In some places we can experience a fourth dimension. When the place becomes more than the sum of its parts. It’s no longer just measures and angles, square meters and rooms. The three usual dimensions merge to let a fourth dimension rise from them. </p>

									<p>When four walls become an house, that’s when we are experiencing it, the fourth dimension. </p>
								</div>
								<!-- text-container end -->
								<div class="symbol-container">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/symbol.png" alt="symbol" />"
								</div>
							</div>
					</section>
					<section id="team">

						<div class="row">
							<h2>Team</h2>

							<div class="col-md-12 col-centered">
								<div class="team">
									<div class="image-container">
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/john.png" class="team-img" />
										<span class="team-overlay"></span>
										<div class="social">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-twitter"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-instagram"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-paper-plane"></i></a>
												</li>
											</ul>
										</div>
										<!-- social -->
									</div>
									<!-- image container -->
									<div class="name">
										<h3>John Le Vine</h3>
										<p>Founder</p>
									</div>
									<!-- name -->
								</div>
								<!-- team end -->
								<div class="team">
									<div class="image-container">
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/sam.png" alt="" class="team-img" />
										<span class="team-overlay"></span>
										<div class="social">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-twitter"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-instagram"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-paper-plane"></i></a>
												</li>
											</ul>
										</div>
										<!-- social -->
									</div>
									<!-- image-container -->
									<div class="name">
										<h3>Sam Rubin</h3>
										<p>Founder</p>
									</div>
								</div>
								<div class="team">
									<div class="image-container">
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/mario.png" alt="" class="team-img" />
										<span class="team-overlay"></span>
										<div class="social">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-twitter"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-instagram"></i></a>
												</li>
												<li><a href="#"><i class="fa-send"></i></a>
												</li>
											</ul>
										</div>
										<!-- social -->
									</div>
									<!-- image-container -->
									<div class="name">
										<h3>Mario Faggiano</h3>
										<p>Founder</p>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="scroll-top"></div>
					<section id="history">
						<div class="scrollme">
							<div class="row">
								<h2 class="parallax">History</h2>
								<div class="parallax-background" <?php /* data-when="enter" data-from="0.5" data-to="0" data-opacity="0" data-translatex="200" data-rotatez="90" */ ?>>
									<div class="timeline-container">
										<ul class="timeline">
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="date">Apr 2014</h4>
													</div>
												</div>
											</li>

											<li class="timeline-inverted">
												<div class="tl-circ odd"></div>
												<div class="timeline-panel">
													<div class="tl-heading">
														<h4 class="summary">EXR launches residential leasing division</h4>
													</div>
												</div>
											</li>

											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="summary">EXR launches the Hive</h4>
													</div>
												</div>
											</li>

											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="date">Jun 2014</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel even">
													<div class="tl-heading">
														<h4 class="date">Jul 2014</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel even">
													<div class="tl-heading">
														<h4 class="summary">EXR signs lease for flagship retail location, EXR Williamsburg</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel odd buttom">
													<div class="tl-heading">
														<h4 class="summary">Construction begins at EXR Williamsburg</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel odd buttom">
													<div class="tl-heading">
														<h4 class="date">Aug 2014</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel even top">
													<div class="tl-heading">
														<h4 class="date">Sep 2014</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel even top">
													<div class="tl-heading">
														<h4 class="summary"> EXR launches commercial leasing division</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel">
													<div class="tl-heading">
														<h4 class="summary"> EXR launches commercial leasing division</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel">
													<div class="tl-heading">
														<h4 class="date"> Oct 2014</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel even">
													<div class="tl-heading">
														<h4 class="date">Nov 2014</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel even">
													<div class="tl-heading">
														<h4 class="summary">Construction finishes at EXR Williamsburg</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="summary">EXR launches commercial sales division</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="date">Dec 2014</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel even">
													<div class="tl-heading">
														<h4 class="date">Jan 2014</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel even">
													<div class="tl-heading">
														<h4 class="summary">EXR Williamsburg officially opens</h4>
													</div>
												</div>
											</li>
											<li>
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="summary">EXR launches residential sales division</h4>
													</div>
												</div>
											</li>
											<li class="timeline-inverted">
												<div class="tl-circ"></div>
												<div class="timeline-panel odd">
													<div class="tl-heading">
														<h4 class="date">Feb 2015</h4>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<!-- container end -->
								</div>
								<!--  timeline-container end -->
							</div>
							<!-- animate -->
						</div>
						<!-- scroll -->
					</section>
					</div>
				</div>
			
    </div>
    <!--  staticContent end    -->

<?php get_footer(); ?> 