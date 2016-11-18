<footer class="main-footer">
	<div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>RCMS - Remote Control and Monitoring System - Copyright &copy; 2016 <a href="http://www.inti.co.id" target="_blank">PT. Industri Telekomunikasi Indonesia</a>.</strong> All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>asset/dist/js/demo.js"></script>

<?php 
	if($link_active == 'adsb') {
		?>
			<!-- Map Clusterer -->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVlVXgJnTAexq0VSHvBLAzARq6AnxPk9U"></script>
			<script src="<?php echo base_url();?>asset/marker-clusterer/markerclusterer.js"></script>

			<script>
				$(document).ready(function(){
					// Google Maps
					function initialize(){
					  var center = new google.maps.LatLng(-3.710783, 114.125977)

					  var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 5,
						center: center,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					  });

					  var infowindow = new google.maps.InfoWindow({
							maxWidth: 300
					  });

					  var markers = [];
						<?php
							for ($i = 0; $i < count($listGroundstation); $i++) {
								?>
									i = <?php echo $i; ?>;
									var dataLoc = '<?php echo $listGroundstation[$i]['host']; ?>';
									dataLoc.lat = '<?php echo number_format(($listGroundstation[$i]['host_latitude']/1000000),6); ?>';
									dataLoc.lon = '<?php echo number_format(($listGroundstation[$i]['host_longitude']/1000000),6); ?>';
									dataLoc.location = '<?php echo $listGroundstation[$i]['stationName']; ?>';

									var latLng = new google.maps.LatLng('<?php echo number_format(($listGroundstation[$i]['host_latitude']/1000000),6); ?>',
										'<?php echo number_format(($listGroundstation[$i]['host_longitude']/1000000),6); ?>');
									var marker = new google.maps.Marker({
									  position: latLng
									});
									markers.push(marker);

									google.maps.event.addListener(marker, 'click', (function(marker, i) {
									  return function() {

										var linkcontent = "<a href='<?php echo site_url('systemidentification/index/'.$listGroundstation[$i]['id_host']); ?>'><button class='btn btn-sm btn-primary' style='width:100%'><?php echo $listGroundstation[$i]['stationName']; ?> [<?php echo $listGroundstation[$i]['host']; ?>]</button></a>"+
														  "<br/><span><strong>Lat : </strong><?php echo number_format(($listGroundstation[$i]['host_latitude']/1000000),6); ?></span><span style='float:right;'><strong>  Long : </strong><?php echo number_format(($listGroundstation[$i]['host_longitude']/1000000),6); ?></span>";
										

										infowindow.setContent(
										  linkcontent
										);
										infowindow.open(map, marker);
									  }
									})(marker, i));
								<?php
							}
						?>

					  var markerCluster = new MarkerClusterer(map, markers);    
					}
						
					google.maps.event.addDomListener(window, 'load', initialize);
					
					
				});
				
			</script>
		<?php
		}
		else {
			?>
				<!-- DataTables -->
				<link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
				<!-- DataTables -->
				<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
				<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
				<script>
				  $(function () {
					$("#example1").DataTable();
				  });
				</script>
			<?php
		}
	?>
</body>
</html>