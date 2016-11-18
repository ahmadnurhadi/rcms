 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        RCMS Configuration
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
		<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
           
  <div class="row">
        <div class="col-xs-12">
          <div class="box clearfix">
            <div class="box-header">
              <h3 class="box-title">Update Period</h3>
            </div>
			<!-- form start -->
            <form class="form-horizontal" action="<?php echo $action; ?>" method="POST">
				<div class="box-body field_wrapper">
					<div class="form-group">
					  <label for="configperiode" class="col-sm-3 control-label">Period(second)</label>

					  <div class="col-sm-9">
						<input type="text" class="form-control" name="configperiode" id="configperiode" value="<?php if( isset($configperiode->value)  ) {echo $configperiode->value;}?>" placeholder="Type Here....">
					  </div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-info pull-right">Submit</button>
				</div>
			</form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>


	  <!-- Data Tables -->
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Groundstation (GS List)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>GS IP Address</th>
                  <th>GS Name</th>
                  <th>GS Status</th>
                  <th style="text-align:center ; width:20%">Action</th>
                </tr>
                </thead>
                <tbody>
					<?php
						for ($i = 0; $i < count($listGroundstation); $i++) {
							?>
								<tr>
									<td><a href="<?php echo site_url('systemidentification'); ?>"><?php echo $listGroundstation[$i]['host']; ?></a></td>
									<td><a href="<?php echo site_url('systemidentification'); ?>"><?php echo $listGroundstation[$i]['stationName']; ?></a></td>
									<td>
										<?php
											if($listGroundstation[$i]['host_status'] == 'Active'){
												?>
													<span class="label label-success">Active</span>
												<?php
											}
											else{
												?>
													<span class="label label-danger">Deactive</span>
												<?php
											}
										?>
									</td>
									<td>
										<center>
											<div class="btn-group">
											  <a href="<?php echo site_url('host/update/'.$listGroundstation[$i]['id_host']); ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
											  <a href="<?php echo site_url('systemidentification/index/'.$listGroundstation[$i]['id_host']); ?>" ><button type="button" class="btn btn-default"><i class="fa fa-eye"></i></button></a>
											  <a href="<?php echo site_url('host/delete/'.$listGroundstation[$i]['id_host']); ?>" onClick="return confirm('Apakah anda ingin menghapus Host ini ?') "><button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></a>
											</div>
										</center>
									</td>
								</tr>
							<?php
						}
					?>
                </tbody>
              </table>
				<div class="box-footer">
				
					<center>
					<a href="<?php echo site_url('host/add'); ?>"><button class="btn bg-olive btn-flat margin">Add Data</button></a>
					</center>
				
				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->
          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->