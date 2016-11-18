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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Log List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>GS Name</th>
                  <th>Host</th>
                  <th>Log</th>
                  <th>Value</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th style="text-align:center ; width:20%">Action</th>
                </tr>
                </thead>
                <tbody>
					<?php
						for ($i = 0; $i < count($listLog); $i++) {
							?>
								<tr>
									<td><a href="<?php echo site_url('systemidentification'); ?>"><?php echo $listLog[$i]['stationName']; ?></a></td>
									<td><a href="<?php echo site_url('systemidentification'); ?>"><?php echo $listLog[$i]['host']; ?></a></td>
									<td><?php echo $listLog[$i]['key_oid']; ?></td>
									<td><?php echo $listLog[$i]['value']; ?></td>
									<td><?php echo $listLog[$i]['status']; ?></td>
									<td><?php echo $listLog[$i]['date']; ?></td>
									<td><?php echo $listLog[$i]['time']; ?></td>
									<td>
										<center>
										<div class="btn-group">
										  <a href="<?php echo site_url('log/delete/'.$listLog[$i]['id_log']); ?>" onClick="return confirm('Apakah anda ingin menghapus Host ini ?') "><button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></a>
										</div>
										</center>
									</td>
								</tr>
							<?php
						}
					?>
                </tbody>
              </table>
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