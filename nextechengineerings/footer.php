<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nextechengineerings
 */

?>
<footer class="site-footer section-spacing text-center" id="eight">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<p class="footer-links">
					<a href="#">Terms of Use</a> <a href="#">Privacy Policy</a>
				</p>
			</div>
			<div class="col-md-4">
				<small>&copy; 2015 Nim. All rights reserved.</small>
			</div>
			<div class="col-md-4">
				<!--social-->

				<ul class="social">
					<li>
						<a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
					</li>
					<li>
						<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
					</li>
					<li>
						<a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a>
					</li>
				</ul>

				<!--social end-->
			</div>
		</div>
	</div>
</footer>
</div>

<?php wp_footer(); ?>
<!-- [ DEFAULT SCRIPT ] -->
<script src="<?php echo get_template_directory_uri();?>/library/modernizr.custom.97074.js"></script>
<script src="<?php echo get_template_directory_uri();?>/library/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/library/bootstrap/js/bootstrap.js"></script>
<script type="<?php echo get_template_directory_uri();?>/text/javascript" src="js/jquery.easing.1.3.js"></script>
<!-- [ PLUGIN SCRIPT ] -->
<script src="<?php echo get_template_directory_uri();?>/library/vegas/vegas.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/plugins.js"></script>
<!-- [ TYPING SCRIPT ] -->
<script src="<?php echo get_template_directory_uri();?>/js/typed.js"></script>
<!-- [ COUNT SCRIPT ] -->
<script src="<?php echo get_template_directory_uri();?>/js/fappear.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.countTo.js"></script>
<!-- [ SLIDER SCRIPT ] -->
<script src="<?php echo get_template_directory_uri();?>/js/owl.carousel.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script type="<?php echo get_template_directory_uri();?>/text/javascript" src="js/SmoothScroll.js"></script>
<!-- [ COMMON SCRIPT ] -->
<script src="<?php echo get_template_directory_uri();?>/js/common.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/my.js"></script>
</body>

</html>