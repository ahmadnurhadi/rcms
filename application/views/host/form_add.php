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
              <div class="box-body field_wrapper">
					  <div class="alert alert-danger alert-dismissible" <?php if(empty($message)) {echo 'style="display:none"';} ?>>
						
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						<?php echo $message; ?>
					  </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Host</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="host1" name="host[]" value="<?php if( isset($host)  ) { echo $host[0]; }?>" placeholder="255.255.255.255">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<button type="button" class="btn btn-default pull-right add_button">Add Host</button>
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
	<script type="text/javascript">
		$(document).ready(function(){
			var addButton = $('.add_button'); //Add button selector
			var wrapper = $('.field_wrapper'); //Input field wrapper
			var x = 1;
			$(addButton).click(function(){
				var value_host_depan = $('#host'+x).val();
				x++;
				var value_host_depan_split1 = value_host_depan.split('.')[0];
				var value_host_depan_split2 = value_host_depan.split('.')[1];
				var value_host_depan_split3 = value_host_depan.split('.')[2];
				var fieldHTML = '<div class="form-group">';
				fieldHTML += '<label for="host" class="col-sm-3 control-label"></label>';
				fieldHTML += '<div class="col-sm-8">';
				fieldHTML += '<input type="text" id="host'+x+'" class="form-control" name="host[]" value="'+value_host_depan_split1+'.'+value_host_depan_split2+'.'+value_host_depan_split3+'." placeholder="255.255.255.255">';
				fieldHTML += '</div>';
				fieldHTML += '<div class="col-sm-1">';
				fieldHTML += '<a href="javascript:void(0);" class="remove_button" id="remove'+x+'" title="Remove field" ><button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></a>';
				fieldHTML += '</div>';
				fieldHTML += '</div>';
				$(wrapper).append(fieldHTML);
				eleme = document.getElementById("host"+x);
				SetCaretAtEnd(eleme);
			});
			$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
				e.preventDefault();
				$(this).parents('.form-group').remove();
				var id_remove = $(this).attr('id');
				if(id_remove == 'remove'+x){
					x--;
				}
			});
			function SetCaretAtEnd(elem) {
				var elemLen = elem.value.length;
				// For IE Only
				if (document.selection) {
					// Set focus
					elem.focus();
					// Use IE Ranges
					var oSel = document.selection.createRange();
					// Reset position to 0 & then set at end
					oSel.moveStart('character', -elemLen);
					oSel.moveStart('character', elemLen);
					oSel.moveEnd('character', 0);
					oSel.select();
				}
				else if (elem.selectionStart || elem.selectionStart == '0') {
					// Firefox/Chrome
					elem.selectionStart = elemLen;
					elem.selectionEnd = elemLen;
					elem.focus();
				} // if
			}
		});
	</script>
  <!-- /.content-wrapper -->