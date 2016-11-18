 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        System Identification
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
                  <label for="SAC" class="col-sm-3 control-label">System Area Code</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="SAC" name="systemAreaCode" value="<?php echo $systemAreaCode; ?>" placeholder="Input 0 - 255">
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="SIC" class="col-sm-3 control-label">System Identification Code</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="SIC" name="systemIdentificationCode" value="<?php echo $systemIdentificationCode; ?>" placeholder="Input 0 - 255">
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="stationName" class="col-sm-3 control-label">Station Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="stationName" name="stationName" value="<?php echo $stationName; ?>" placeholder="Type Here....">
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="productName" class="col-sm-3 control-label">Product Name</label>

                  <div class="col-sm-9">
					<label for="productName" class="control-label"><?php echo $productName; ?></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="productNumber" class="col-sm-3 control-label">Product Number</label>

                  <div class="col-sm-9">
					<label for="productNumber" class="control-label"><?php echo $productNumber; ?></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="serialNumber" class="col-sm-3 control-label">Serial Number</label>

                  <div class="col-sm-9">
					<label for="serialNumber" class="control-label"><?php echo $serialNumber; ?></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="softwareVersion" class="col-sm-3 control-label">Software Version</label>

                  <div class="col-sm-9">
					<label for="softwareVersion" class="control-label"><?php echo $softwareVersion; ?></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="hardwareVersion" class="col-sm-3 control-label">Hardware Version</label>

                  <div class="col-sm-9">
					<label for="hardwareVersion" class="control-label"><?php echo $hardwareVersion; ?></label>
                  </div>
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