<div class="overlay mobileOnly" id="overlay"></div>
	<div class="footer">
		<div class="copy">
			<span class="desktopOnly">Copyright &copy; 2015 EXR</span>
		</div>
		<div class="footer-nav">
			<?php wp_nav_menu(array('theme_location' => 'footer-nav', 'container' => false, 'menu_class' => 'navigation footer-nav desktopOnly')); ?>
		</div>
		<div class="social">
        	<a href="https://www.facebook.com/exrny" target="_blank" class="footer-social"><i class="icon-facebook"></i></a>
         	<a href="https://twitter.com/exrgroup" target="_blank" class="footer-social"><i class="icon-twitter"></i></a>
       		<a href="https://instagram.com/exrny/" target="_blank" class="footer-social"><i class="icon-instagram"></i></a>

        </div>
		
		<!-- div class="partners">
			<a href="http://facebook.com/exrgroup" class="fb" target="_blank"></a>
			<a href="http://twitter.com/exrgroup" class="twitter" target="_blank"></a>
			<a class="eho" target="_blank"></a>
			<a class="rebny" target="_blank"></a>
                        <a href="http://we3.com" class="we3"target="_blank"></a>
                        <a href="http://nestio.com" class="nestio" target="_blank"></a>
		</div> -->

	</div>
        <?php wp_footer(); ?>
        <?php /*
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
       
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/js/jquery.nouislider.all.min.js"></script>
		 */ ?>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/js/jquery.tosrus.min.all.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/js/app.js"></script> 
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui/js/jquery.scrollme.min.js"></script> 
    </body>
</html>