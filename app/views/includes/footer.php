 
        <div class="footer">
            <div class="copyright">
                <p>&copy; <span class="current-year"><?= date('Y') ?></span> <a href="#" target="_blank">Signum Properties Ltd</a> </p>
            </div>
        </div>
      
        
    </div>
   
    <script src="<?php echo URLROOT ?>/public/assets/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/dropzone/dist/dropzone.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/js/user-wizard.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/custom.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/js/deznav-init.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/general.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/notify.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/flatpickr.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.sumoselect.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/chartjs/chart.bundle.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/owl-carousel/owl.carousel.js"></script>
		
	<script src="<?php echo URLROOT ?>/public/assets/vendor/apexchart/apexchart.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/vendor/jqvmap/js/jquery.vmap.world.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script> 
    <script src="<?php echo URLROOT ?>/public/assets/vendor/peity/jquery.peity.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/js/dashboard/dashboard-1.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/datatables/responsive/responsive.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/vendor/datatables/responsive/responsive.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/jquery-confirm/js/jquery-confirm.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/js/select2.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/js/crypto-js.min.js"></script>
	<script src="<?php echo URLROOT ?>/public/assets/js/print.js"></script>
	<script src="<?php echo URLROOT ?>/public/uploadifive/jquery.uploadifive.min.js"></script>

	<script>
		window.onload = function () {
			// Hide the loader and show the content
			document.getElementById('page-loader').style.display = 'none';
			document.getElementById('content').style.display = 'block';
		};


		function carouselReview(){
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:0,
				nav:true,
				dots: false,
				navText: ['<i class="las la-long-arrow-alt-left"></i>', '<i class="las la-long-arrow-alt-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					
					480:{
						items:1
					},			
					
					767:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})		
			/*Custom Navigation work*/
			jQuery('#next-slide').on('click', function(){
			   $('.testimonial-one').trigger('next.owl.carousel');
			});

			jQuery('#prev-slide').on('click', function(){
			   $('.testimonial-one').trigger('prev.owl.carousel');
			});
			/*Custom Navigation work*/
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>

	
</body>

</html>
