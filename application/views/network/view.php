 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Network Configuration
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
                  <label for="gSIPAddress" class="col-sm-3 control-label">GS IP Address</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="gSIPAddress" name="gSIPAddress" value="<?php echo $gSIPAddress; ?>" placeholder="Type Here....">
                  </div>
                </div>
                <div class="form-group">
                  <label for="gSIPDefGW" class="col-sm-3 control-label">GS IP Default Gateway</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="gSIPDefGW" name="gSIPDefGW" value="<?php echo $gSIPDefGW; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="gSIPNetmask" class="col-sm-3 control-label">GS IP Netmask</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="gSIPNetmask" name="gSIPNetmask" value="<?php echo $gSIPNetmask; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="maxCommBitRate" class="col-sm-3 control-label">Max Interface Bit Rate (kbps)</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="maxCommBitRate" name="maxCommBitRate" value="<?php echo $maxCommBitRate; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="ipRCMS" class="col-sm-3 control-label">IP RCMS</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ipRCMS" name="ipRCMS" value="<?php echo $ipRCMS; ?>" placeholder="Type Here....">
                  </div>
                </div>
				<div class="form-group">
                  <label for="ipLCMS" class="col-sm-3 control-label">IP LCMS</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ipLCMS" name="ipLCMS" value="<?php echo $ipLCMS; ?>" placeholder="Type Here....">
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