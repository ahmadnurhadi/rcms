 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADBS Filter Configuration
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
                  <label for="capacityThreshold" class="col-sm-3 control-label">Capacity Threshold</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="capacityThreshold" name="capacityThreshold" value="<?php echo $capacityThreshold; ?>" placeholder="Input Number Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cPRAirborneMaxRange" class="col-sm-3 control-label">CPR Airborne Maximum Range</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="cPRAirborneMaxRange" name="cPRAirborneMaxRange" value="<?php echo $cPRAirborneMaxRange; ?>" placeholder="Type Here....(Ex 300 NM)">
                  </div>
                </div>
				<div class="form-group">
                  <label for="ReportingNonValidated" class="col-sm-3 control-label">Reporting of Non-Validated Targets</label>
						<div class="col-sm-9">
					  <div class="radio">
						<label>
						  <input type="radio" name="optionsRadiosV" id="optionsRadios1V" value="optionV1" checked>
						    Not Enable
						</label>
					  </div>
					  <div class="radio">
						<label>
						  <input type="radio" name="optionsRadiosV" id="optionsRadios2V" value="optionV2">
						    Enable
						</label>
					  </div>
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