 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BITE Monitoring
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
		<!-- /.col -->
		<!-- Time Source State -->
        <div class="col-md-3">
			<?php
				if($timeSourceState == 0) {
					?>
						<div class="box box-success  box-solid">
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
								<center><label for="timeSourceState" class="control-label" name="timeSourceState">UtcCOUPLED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($timeSourceState == 1){
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
								<center><label for="timeSourceState" class="control-label" name="timeSourceState">NOTCOUPLED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php					
				}
				elseif($timeSourceState == 2){
					?>
						<div class="box box-warning  box-solid">
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
								<center><label for="timeSourceState" class="control-label" name="timeSourceState">COASTING</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($timeSourceState == 3){
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
								<center><label for="timeSourceState" class="control-label" name="timeSourceState">FAILED</label></center>
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
								<center><h3 class="box-title">Time Source State</h3><center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="timeSourceState" class="control-label" name="timeSourceState"><?php echo $timeSourceState; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
		</div>
		
		<!-- Target Overload -->
		<div class="col-md-3">
		<?php
				if($targetOverload == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Target Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="targetOverload" class="control-label" name="targetOverload">PASS</label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<?php
				}
				elseif($targetOverload == 1){
					?>
					<div class="box box-warning  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Target Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="targetOverload" class="control-label" name="targetOverload">WARNING</label></center>
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
								<center><h3 class="box-title">Target Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="targetOverload" class="control-label" name="targetOverload"><?php echo $targetOverload; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
					
        </div>
		<!-- Communications Overload -->
		<div class="col-md-3">
			<?php
				if($communicationOverload == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Communications Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="communicationOverload" class="control-label" name="communicationOverload">PASS</label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<?php
				}
				elseif($communicationOverload == 1){
					?>
					<div class="box box-warning  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Communications Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="communicationOverload" class="control-label" name="communicationOverload">WARNING</label></center>
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
								<center><h3 class="box-title">Communications Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
							<div class="box-body">
								<center><label for="communicationOverload" class="control-label" name="communicationOverload"><?php echo $communicationOverload; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
							<!-- /.box -->
						<!-- /.box -->
					<?php
				}
			?>
        </div>
		
		<!-- Communications Loss -->
		<div class="col-md-3">
		<?php
				if($communicationLoss == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Communications Loss</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="communicationLoss" class="control-label" name="communicationLoss">PASS</label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<?php
				}
				elseif($communicationLoss == 1){
					?>
					<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Communications Loss</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="communicationLoss" class="control-label" name="communicationLoss">FAILED</label></center>
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
								<center><h3 class="box-title">Communications Loss</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
							<div class="box-body">
								<center><label for="communicationLoss" class="control-label" name="communicationLoss"><?php echo $communicationLoss; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
							<!-- /.box -->
						<!-- /.box -->
					<?php
				}
			?>
        </div>
		<!-- Buffer Overflow -->
		<div class="col-md-3">
		<?php
				if($bufferOverflow == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Buffer Over Flow</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="bufferOverflow" class="control-label" name="bufferOverflow">PASS</label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<?php
				}
				elseif($bufferOverflow == 1){
					?>
					<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Buffer Over Flow</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="bufferOverflow" class="control-label" name="bufferOverflow">FAILED</label></center>
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
								<center><h3 class="box-title">Buffer Over Flow</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
							<div class="box-body">
								<center><label for="bufferOverflow" class="control-label" name="bufferOverflow"><?php echo $bufferOverflow; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
							<!-- /.box -->
						<!-- /.box -->
					<?php
				}
			?>
          <!-- /.box -->
        </div>
		
		<!-- Processor Overload -->
		<div class="col-md-3">
		<?php
				if($processorOverload == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Processor Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="processorOverload" class="control-label" name="processorOverload">PASS</label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<?php
				}
				elseif($processorOverload == 1){
					?>
					<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Processor Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="processorOverload" class="control-label" name="processorOverload">FAILED</label></center>
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
								<center><h3 class="box-title">Processor Overload</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
							<div class="box-body">
								<center><label for="processorOverload" class="control-label" name="processorOverload"><?php echo $processorOverload; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
							<!-- /.box -->
						<!-- /.box -->
					<?php
				}
			?>
          <!-- /.box -->
        </div>
		
		<!-- Temperature Range -->
		<div class="col-md-3">
		
		<?php
				if($temperatureRange == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Temperature Range</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="temperatureRange" class="control-label" name="temperatureRange">PASS</label></center>
								</div>
								<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<?php
				}
				elseif($temperatureRange == 1){
					?>
					<div class="box box-warning  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">Temperature Range</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
								<div class="box-body">
								  <center><label for="temperatureRange" class="control-label" name="temperatureRange">WARNING</label></center>
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
								<center><h3 class="box-title">Temperature Range</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
									<!-- /.box-tools -->
							</div>
								<!-- /.box-header -->
							<div class="box-body">
								<center><label for="temperatureRange" class="control-label" name="temperatureRange"><?php echo $temperatureRange; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
							<!-- /.box -->
						<!-- /.box -->
					<?php
				}
			?>
          <!-- /.box -->
        </div>
		
		<!-- End to End -->
		<div class="col-md-3">
		<?php
				if($endToEndState == 0) {
					?>
						<div class="box box-success  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">End To End State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="endToEndState" class="control-label" name="endToEndState">PASSED</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
				elseif($endToEndState == 1){
					?>
						<div class="box box-warning  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">End To End State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="endToEndState" class="control-label" name="endToEndState">WARNING</label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php					
				}
				elseif($endToEndState == 2){
					?>
						<div class="box box-danger  box-solid">
							<div class="box-header with-border">
								<center><h3 class="box-title">End To End State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="endToEndState" class="control-label" name="endToEndState">FAILED</label></center>
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
								<center><h3 class="box-title">End To End State</h3></center>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<center><label for="endToEndState" class="control-label" name="endToEndState"><?php echo $endToEndState; ?></label></center>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					<?php
				}
			?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
             
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->