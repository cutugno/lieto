	<!-- google map -->
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyB2VRmsL0iHkYX6ut7j3V7MfRlqLrQia6U"></script>   
    <!-- gmap -->
    <script type="text/javascript" src="<?php echo site_url('assets/js/gmaps.js') ?>"></script>
    
    <script type="text/javascript">
		//map
		var map;
		$(document).ready(function(){
		  map = new GMaps({
			el: '#map',
			lat: 41.226526,
			lng: 13.567300
		  });
		  map.addMarker({
			lat: 41.226526,
			lng: 13.567300,
			title: 'NAUTICA LIETO',
			infoWindow: {
			  content: '<p><img src="<?php echo site_url('assets/img/logo.png') ?>"><br><strong>NAUTICA LIETO</strong><br>Lungomare Caboto, 23/25 - 04024 Gaeta (LT)</p>'
			}
		  });
		  <?php if ($this->session->ok==1) : ?>
		  swal({title:"", text:"<?php echo $this->lang->line('custom_form_04') ?>", timer:2500, showConfirmButton:false, type:"success"})
		  <?php endif ?>
		});
	</script>


