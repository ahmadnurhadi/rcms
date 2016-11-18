 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Asterix Configuration
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
                  <label for="aSTERIXDestIPAddr" class="col-sm-3 control-label">ASTERIX Report Destination IP Address</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="aSTERIXDestIPAddr" name="aSTERIXDestIPAddr" value="<?php echo $aSTERIXDestIPAddr; ?>" placeholder="Type Here....">
                  </div>
                </div>
                <div class="form-group">
                  <label for="aSTERIXDestPort" class="col-sm-3 control-label">ASTERIX Report Destination UDP Port</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="aSTERIXDestPort" name="aSTERIXDestPort" value="<?php echo $aSTERIXDestPort; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="aSTERIXTTL" class="col-sm-3 control-label">ASTERIX Report IP TTL</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="aSTERIXTTL" name="aSTERIXTTL" value="<?php echo $aSTERIXTTL; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="ATERIXReportMode" class="col-sm-3 control-label">ASTERIX State Vector Reporting Mode</label>
					<div class="col-sm-9">
					  <div class="radio">
						<label>
						  <input type="radio" name="ATERIXReportMode" id="optionsRadios1" value="Data-driven" class="minimal" checked>
						  Data-Driven
						</label>
					  </div>
					  <div class="radio">
						<label>
						  <input type="radio" name="ATERIXReportMode" id="optionsRadios2" class="minimal" value="Periodic">
						  Periodic
						</label>
					  </div>
					</div>
				</div>	 
				<div class="form-group">
                  <label for="periodicReportInterval" class="col-sm-3 control-label">Period Report Interval</label>

                  <div class="col-sm-9">
                    <input type="text" name="periodicReportInterval" class="form-control" id="periodicReportInterval" value="<?php echo $periodicReportInterval; ?>" placeholder="Minimum 0.5 to 15 (0.5 sec Increment)">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cat23ReportInterval" class="col-sm-3 control-label">ASTERIX Category 023 Ground Station Status Reporting Interval</label>

                  <div class="col-sm-9">					
                    <input type="text" name="cat23ReportInterval" class="form-control" id="cat23ReportInterval" value="<?php echo $cat23ReportInterval; ?>" placeholder="Minimum 1 to 127 (1 sec Increment)">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cat23ServiceReportInterval" class="col-sm-3 control-label">ASTERIX Category 023 Service Status Reporting Interval</label>

                  <div class="col-sm-9">
                    <input type="text" name="cat23ServiceReportInterval" class="form-control" id="cat23ServiceReportInterval" value="<?php echo $cat23ServiceReportInterval; ?>" placeholder="Minimum 0 to 60 (1 sec Increment)">
                  </div>
                </div>
				<div class="form-group">
                  <label for="versionReportInterval" class="col-sm-3 control-label">ASTERIX Category 247 Reporting Interval</label>

                  <div class="col-sm-9">
                    <input type="text" name="versionReportInterval" class="form-control" id="versionReportInterval" value="<?php echo $versionReportInterval; ?>" placeholder="Minimum 0 to 60 (1 min Increment)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ASTERIXVersion" class="col-sm-3 control-label">ASTERIX Category 021 Edition</label>
				  <div class="col-sm-9">
					  <select class="form-control" name="ASTERIXVersion" id="ASTERIXVersion" >
						<?php
							foreach($listEdition->result() as $edition){
								if($edition->asterix_edition == $ASTERIXVersion ){
									echo '<option value="'.$edition->asterix_edition.'" selected >';
									echo $edition->asterix_edition;
									echo '</option>';
								}
								else{
									echo '<option value="'.$edition->asterix_edition.'" >';
									echo $edition->asterix_edition;
									echo '</option>';
								}
							}
						?>
					  </select>
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