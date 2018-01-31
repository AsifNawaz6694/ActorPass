
    <!-- footer section -->
    <footer>
    	<div class="container-fluid bg_footer_color">
    		<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p class="footer_content">
				ActorsPass is a learning experience. It is not an audition or employment opportunity. As per CSA regulations, when your class is over, the casting director/casting associate teaching your class will not be taking home nor be given access to your headshot, resume or any other of your promotional materials.
			</p>
		</div>
	</div>
</div>
</div>


<div class="container-fluid bg_footer_color_last">
    		<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p class="footer_content_last">
				© COPYRIGHT 2018 BY ACTOR PASS, L.L.C.
			</p>
		</div>
	</div>
</div>
</div>


</footer>



</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Carousel-min -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- Wow-min-js -->
<script src="assets/js/wow.min.js"></script>
<!-- masonry-grid-js -->
<script src="assets/js/masonry.pkgd.min.js"></script>
<!-- alertify-js -->
<script src="assets/js/alertify.min.js"></script>
<!-- juqeyr custom validatoin plugin-js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- custom validatoin-js -->
<script src="assets/js/custom_validatiion.js"></script>
<!-- mobile-menu-js -->
<script src="assets/plugins/menu/js/jquery.mmenu.all.js"></script>
<script src="assets/plugins/menu/js/jquery.mhead.js"></script>
<!-- script-js -->
<script src="assets/js/script.js"></script>
<!-- Custom-js -->
<script src="assets/js/custom.js"></script>
<!-- Animation JS -->
<script src="assets/js/modernizr.custom.js"></script>		
<script>
   $(function() {
				
				$("#my-menu").mmenu({
		extensions 	: [ "shadow-panels", "fx-panels-slide-100", "border-none", "theme-black", "fullscreen" ],
		navbars		: {
			content : [ "prev", "<img src='assets/images/logo_actor.png' />", "close" ],
			height 	: 2
		},
		setSelected: true,
		searchfield: {
			resultsPanel: true
		}}, { });
				$(".mh-head.mm-sticky").mhead({
					scroll: {
						hide: 200
					}
				});
				$(".mh-head:not(.mm-sticky)").mhead({
					scroll: false
				});

				

				$('body').on( 'click',
					'a[href^="#/"]',
					function() {
						alert( "Thank you for clicking, but that's a demo link." );
						return false;
					}
				);
			});
</script>
</body>
</html>