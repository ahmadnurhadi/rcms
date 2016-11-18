 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Data
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
					  <div class="alert alert-danger alert-dismissible" <?php if(empty($message)) {echo 'style="display:none"';} ?> >
						
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						<?php echo $message; ?>
					  </div>
				<div class="form-group">
                  <label for="host" class="col-sm-3 control-label">Host</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="host" value="<?php if( isset($host)  ) {echo $host;}?>" placeholder="Type Here....">
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