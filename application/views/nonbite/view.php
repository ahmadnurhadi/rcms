 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Non BITE Monitoring
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
	
				<div class="alert alert-danger alert-dismissible" <?php if($checkstatusserver == 'Active') {echo 'style="display:none"';} ?> >			
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Alert!</h4>
					Server Is Not Actived
				</div>
				
      <!-- Small boxes (Stat box) -->
      <div class="row">
	  
		<!-- Ground Station State -->
        <div class="col-md-3">
		<?php
				if($groundStationState == 0) {
					?>
						<div class="box bg-gray-active  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Ground Station State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="groundStationState" class="control-label" name="groundStationState">INITIALISATION</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($groundStationState == 1){
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Ground Station State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="groundStationState" class="control-label" name="groundStationState">ONLINE</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php					
				}
				elseif($groundStationState == 2){
					?>
						<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Time Source State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="groundStationState" class="control-label" name="groundStationState">FAILED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				else {
					?>
						<div class="box box-default  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Ground Station State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
								<!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="groundStationState" class="control-label" name="groundStationState"><?php echo $groundStationState; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
        </div>
		
		<!-- Receiver Sensitivity -->
		<div class="col-md-3">
		<?php
				if($receiverSensitivity == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Receiver Sensitivity</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="receiverSensitivity" class="control-label" name="receiverSensitivity">PASSED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($receiverSensitivity == 1){
					?>
						<div class="box box-warning  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Receiver Sensitivity</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="receiverSensitivity" class="control-label" name="receiverSensitivity">WARNING</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php					
				}
				elseif($receiverSensitivity == 2){
					?>
						<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Receiver Sensitivity</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="receiverSensitivity" class="control-label" name="receiverSensitivity">FAILED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				else {
					?>
						<div class="box box-default  box-solid">
							<div class="box-header with-border">
									<center><h3 class="box-title">Receiver Sensitivity</h3></center>

								<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							</div>
							<!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="receiverSensitivity" class="control-label" name="receiverSensitivity"><?php echo $receiverSensitivity; ?></label></center>
							</div>
									<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
        </div>
		
		  <!-- Test Transmission Loss -->
		<div class="col-md-3">
		<?php
				if($testTransmissionLoss == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Test Transmission Loss</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="testTransmissionLoss" class="control-label" name="testTransmissionLoss">PASSED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($testTransmissionLoss == 1){
					?>
						<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Test Transmission Loss</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="testTransmissionLoss" class="control-label" name="testTransmissionLoss">FAILED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php					
				}
				else {
					?>
						<div class="box box-default  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Test Transmission Loss</h3></center>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
									</div>
										<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="testTransmissionLoss" class="control-label" name="testTransmissionLoss"><?php echo $testTransmissionLoss; ?></label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
          <!-- /.box -->
        </div>
		
		 <!-- Decoder Test -->
		<div class="col-md-3">
		
		<?php
				if($decoderTest == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Decoder Test</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="decoderTest" class="control-label" name="decoderTest">PASSED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($decoderTest == 1){
					?>
						<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Decoder Test</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="decoderTest" class="control-label" name="decoderTest">FAILED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php					
				}
				else {
					?>
						<div class="box box-default  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Decoder Test</h3></center>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
									</div>
										<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="decoderTest" class="control-label" name="decoderTest"><?php echo $decoderTest; ?></label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
          <!-- /.box -->
        </div>
		
		<!-- Status Of Individual LRU's -->
		<div class="col-md-3">
          <div class="box box-danger  box-solid">
            <div class="box-header with-border">
              <center><h3 class="box-title">Status Of Individual LRU's</h3></center>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					  </div>
              <!-- /.box-tools -->
					</div>
						<!-- /.box-header -->
					<div class="box-body">
					  <center><label for="statusOfIndividualLRU" class="control-label" name="statusOfIndividualLRU"><?php echo $statusOfIndividualLRU; ?></label></center>
					</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
             
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->