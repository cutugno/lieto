<!-- gmap -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBXWYizUMzUSUKLsAzMZeiAfe2mHi6V5Xc&sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmaps.js"></script>
<script type="text/javascript">

	var map;
	$(document).ready(function(){
	  map = new GMaps({
		el: '#map',
		lat: 41.226526,
		lng: 13.567300,
		zoom: 8
	  });
	   map.addMarker({
		lat: 41.226526,
		lng: 13.567300,
		title: 'NAUTICA LIETO',
		infoWindow: {
		  content: '<p><img src="<?php echo site_url('assets/img/logo.png') ?>"><br><strong>NAUTICA LIETO</strong><br>Lungomare Caboto, 23/25 - 04024 Gaeta (LT)</p>'
		}
	  });
	  map.addMarker({
		lat: 41.249566,
		lng: 13.098832,
		title: 'Nautica Capponi Emanuele',
		infoWindow: {
		  content: '<p><strong>Nautica Capponi Emanuele</strong><br>via Manzoni, 6 - 04017 S. Felice Circeo (LT)<br>Tel/Fax 0773 540220<br><a href="mailto:capponi.emanuele@libero.it">capponi.emanuele@libero.it</a></p>'
		}
	  });
	  map.addMarker({
		lat: 41.386614, 
		lng: 12.968809,
		title: 'RIMM sas',
		infoWindow: {
		  content: '<p><strong>RIMM sas</strong><br>via Bella Farnia, 1 - 04016 Sabaudia (LT)<br>Tel 0773 534256</p>'
		}
	  });
	  map.addMarker({
		lat: 41.460171,
		lng: 12.689245,
		title: 'Nautica Nardini di Nardini Massimo',
		infoWindow: {
		  content: '<p><strong>Nautica Nardini di Nardini Massimo</strong><br>via Simeto, 5 - 00048 Nettuno (RM)<br>Tel/Fax 06 98578026<br><a href="mailto:davidenardini@hotmail.it">davidenardini@hotmail.it</a></p>'
		}
	  });
	});

</script>
