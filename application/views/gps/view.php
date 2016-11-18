 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        GPS Configuration
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
		<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo $action; ?>" method="POST">
              <div class="box-body">
			  
				  
				<div class="alert alert-danger alert-dismissible" <?php if($checkstatusserver == 'Active') {echo 'style="display:none"';} ?> >			
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Alert!</h4>
					Server Is Not Actived
				</div>
			
			  
				<div class="alert alert-danger alert-dismissible" <?php if(empty($message)) {echo 'style="display:none"';} ?> >
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Alert!</h4>
					<?php echo $message; ?>
				</div>
                <div class="form-group">
                  <label for="coastingTImeout" class="col-sm-3 control-label">GS Coasting Timeout (Min)</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="coastingTImeout" name="coastingTImeout" value="<?php echo $coastingTImeout; ?>" placeholder="Input Number in Minutes">
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="gSLatitude" class="col-sm-3 control-label">GS Latitude</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="gSLatitude" name="gSLatitude" value="<?php echo number_format(($gSLatitude/1000000),6); ?>" placeholder="Type Here....">
                  </div>
              
                  <label for="gSLatitudeRef" class="col-sm-3 control-label">GS Latitude (Reference)</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="gSLatitudeRef" name="gSLatitudeRef" value="<?php echo number_format(($gSLatitudeRef/1000000),6); ?>" placeholder="Type Here....">
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="gSLongitude" class="col-sm-3 control-label">GS Longitude</label>
				  <div class="col-sm-3">
                    <input type="text" class="form-control" id="gSLongitude" name="gSLongitude" value="<?php echo number_format(($gSLongitude/1000000),6); ?>" placeholder="Type Here....">
                  </div>
				  <label for="gSLongitudeRef" class="col-sm-3 control-label">GS Longitude(Reference)</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="gSLongitudeRef" name="gSLongitudeRef" value="<?php echo number_format(($gSLongitudeRef/1000000),6); ?>" placeholder="Type Here....">
                  </div>
                </div>
							
			<div class="row">
					<div class="col-xs-12">
					  <div class="box clearfix">
						<div class="box-header">
						  <center><h2 class="box-title"><strong>Threshold</strong></h2></center>
						</div>
						<!-- form start -->
						<form class="form-horizontal" action="" method="POST">
						<div class="box-body field_wrapper">
						
					<div class="form-group">
					  <label for="gPSQualityThd" class="col-sm-3 control-label">GPS Quality</label>
					  <div class="col-sm-3">
						<input type="text" class="form-control" id="gPSQualityThd" name="gPSQualityThd" value="<?php echo ($gPSQualityThd); ?>" placeholder="Type Here....">
					  </div>
				  
					  <label for="satelliteQntyCountInThd" class="col-sm-3 control-label">Satellite Quantity Count-In</label>
					  <div class="col-sm-3">
						<input type="text" class="form-control" id="satelliteQntyCountInThd" name="satelliteQntyCountInThd" value="<?php echo ($satelliteQntyCountInThd); ?>" placeholder="Type Here....">
					  </div>
					</div>
			
					<div class="form-group">
						<label for="gPSSatelitQty" class="col-sm-3 control-label">Satellite Quantity</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gPSSatelitQty" name="gPSSatelitQty" value="<?php echo $gPSSatelitQty; ?>" placeholder="Input Number in Minutes">
						</div>
						  
							<label for="satelliteQntyCountOutThd" class="col-sm-3 control-label">Satellite Quantity Count-Out</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="satelliteQntyCountOutThd" name="satelliteQntyCountOutThd" value="<?php echo $satelliteQntyCountOutThd; ?>" placeholder="Input Number in Minutes">
						</div>
					</div>
					<div class="form-group">
						<label for="gpsQltyCountInThd" class="col-sm-3 control-label">GPS Quality Count-In </label>
					  <div class="col-sm-3">
						<input type="text" class="form-control" id="gpsQltyCountInThd" name="gpsQltyCountInThd" value="<?php echo $gpsQltyCountInThd; ?>" placeholder="Input Number in Minutes">
					  </div>             
									  
					  <label for="positionRangeCountInThd" class="col-sm-3 control-label">Position Range Count-In </label>
					  <div class="col-sm-3">
						<input type="text" class="form-control" id="positionRangeCountInThd" name="positionRangeCountInThd" value="<?php echo $positionRangeCountInThd; ?>" placeholder="Input Number in Minutes">
					  </div>
					</div>
					
					<div class="form-group">
						<label for="gpsQltyCountOutThd" class="col-sm-3 control-label">GPS Quality Count-Out </label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gpsQltyCountOutThd" name="gpsQltyCountOutThd" value="<?php echo $gpsQltyCountOutThd; ?>" placeholder="Input Number in Minutes">
						</div>
					  
						<label for="positionRangeCountOutThd" class="col-sm-3 control-label">Position Range Count-Out </label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="positionRangeCountOutThd" name="positionRangeCountOutThd" value="<?php echo $positionRangeCountOutThd; ?>" placeholder="Input Number in Minutes">
						</div>
					</div>
					
					<div class="form-group">
					  <label for="positionRangeThd" class="col-sm-3 control-label">Position Range </label>
					  <div class="col-sm-3">
						<input type="text" class="form-control" id="positionRangeThd" name="positionRangeThd" value="<?php echo $positionRangeThd; ?>" placeholder="Input Number in Minutes">
					  </div>
					</div>
 
             </div>
		
					  </div>
					  <!-- /.box-body -->
					  
					  </form>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->
					</div>
					<!-- /.col -->
				  </div>
				
				

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
