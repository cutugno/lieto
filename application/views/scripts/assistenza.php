<!-- gmap -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBXWYizUMzUSUKLsAzMZeiAfe2mHi6V5Xc&sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmaps.js"></script>
<script type="text/javascript">

	var map;
	$(document).ready(function(){
	  map = new GMaps({
		el: '#map',
		lat: 41.226378, 
		lng: 13.567426,
		zoom: 9
	  });
	  map.addMarker({
		lat: 41.146378,
		lng: 13.567426,
		title: 'Marker with InfoWindow',
		infoWindow: {
		  content: '<p>77 Mass. Ave., E14/E15 Seattle, MA 02139-4307 USA</p>'
		}
	  });
	});

</script>
