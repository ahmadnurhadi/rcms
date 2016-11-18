 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ground Station Configuration
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
                  <label for="SystemMode" class="col-sm-3 control-label">System Mode</label>
					<div class="col-sm-9">
					  <div class="radio">
						<label>
						  <input type="radio" name="optionsRadiosV" id="optionsRadios1V" value="optionV1" checked>
						    Operational
						</label>
					  </div>
					  <div class="radio">
						<label>
						  <input type="radio" name="optionsRadiosV" id="optionsRadios2V" value="optionV2">
						    Maintenance
						</label>
					  </div>
					</div>
                </div>
				<div class="form-group">
                  <label for="testTargetAlertPower" class="col-sm-3 control-label">Test Target Alert Power Threshold</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="testTargetAlertPower" name="testTargetAlertPower" value="<?php echo $testTargetAlertPower; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="testTargetFailPower" class="col-sm-3 control-label">Test Target Fail Power Threshold</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="testTargetFailPower" name="testTargetFailPower" value="<?php echo $testTargetFailPower; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="masterSlaveSelection" class="col-sm-3 control-label">Master Slave Selection</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="masterSlaveSelection" name="masterSlaveSelection" value="<?php echo $masterSlaveSelection; ?>" placeholder="Type Here....">
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

        </div>
      </div> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->