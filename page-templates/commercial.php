<?php
/**
 * Template Name: Commercial Page
 *
 */
get_header();
?>
<div class="search" id="search">
			<div class="searchForm" id="searchForm">
				<h2>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/logo-exr.png" alt="logo" />
					Commercial
				</h2>
				<?php echo do_shortcode( '[we3_search_bar_commercial]' ); ?>
				<?php /*<form action="">
					<div class="inner">
						<input type="text" name="search_query" id="search_query" class="searchQuery" placeholder="Search Query..." />
						<!--<div class="searchParam price" data-target=".dropdown.price">
							Price
						</div>
						<div class="dropdown price">
							<div class="range min">Min</div>
							<div class="range max">Max</div>
							<div id="priceRange" class="priceRange" data-range="0-200"></div>
							<div class="totalMin total">$ <input type="text" disabled value="" id="priceRange_lower" /></div>
							<div class="totalMax total">$ <input type="text" disabled value="" id="priceRange_upper" /></div>
						</div>
						<div class="searchParam beds" data-target=".dropdown.beds">
							Beds
						</div>
						<div class="dropdown beds center">
							<div class="select">
								<div class="title">Beds (Select all that apply)</div>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-primary active">
										<input type="radio" name="bedType" id="option1" autocomplete="off" checked> Any
									</label>
									<label class="btn btn-primary">
										<input type="radio" name="bedType" id="option2" autocomplete="off"> Studio
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 1
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 2
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 3
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 4
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 5
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 6+
									</label>
								</div>
							</div>

							<div class="select">
								<div class="title">Beds (Select all that apply)</div>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> Any
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 1
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 2
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 3
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 4
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 5
									</label>
									<label class="btn btn-primary">
										<input type="checkbox" autocomplete="off" /> 6+
									</label>
								</div>
							</div>

						</div>-->
						<div class="submit">Search</div>
					</div>
				</form>*/ ?>
				<div class="contacts">
					<a href="tel:2129918983" class="contactItem call">        	
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/phone@2x.png" alt="email" />
						(212) 991-8983
					</a>
					<a href="mailto:hello@exrny.com" class="contactItem email">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/img/mail@2x.png" alt="email" />
						hello@exrny.com
					</a>
					<!--<a href="#" class="contactItem chat">Chat</a>-->
				</div>
			</div>
		</div>
<?php get_footer(); ?> 