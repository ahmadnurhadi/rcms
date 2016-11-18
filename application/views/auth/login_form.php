<?php
if ($login_by_username AND $login_by_email) {
	$login = array(
		'name'	=> 'login',
		'id'	=> 'login',
		'class' => 'form-control',
		'value' => set_value('login'),
		'placeholder' => 'Email or login'
	);
} else if ($login_by_username) {
	$login = array(
		'name'	=> 'login',
		'id'	=> 'login',
		'class' => 'form-control',
		'value' => set_value('login'),
		'placeholder' => 'Login'
	);
} else {
	$login = array(
		'name'	=> 'login',
		'id'	=> 'login',
		'class' => 'form-control',
		'value' => set_value('login'),
		'placeholder' => 'Email'
	);
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'form-control',
	'placeholder' => 'Password'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember')
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'class' => 'form-control',
	'placeholder' => 'Enter The Code'
);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RCMS AGS 216 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>"><b>RCMS AGS 216 Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
		<?php echo form_open($this->uri->uri_string()); ?>
			<div class="form-group has-feedback">
				<?php echo form_input($login); ?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<?php echo form_password($password); ?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>
			  <?php if ($show_captcha) {
					if ($use_recaptcha) { ?>
						<div id="recaptcha_image"></div>
					
						<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
						<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
						<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
				
						<div class="recaptcha_only_if_image">Enter the words above</div>
						<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
					
						<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
						<?php echo form_error('recaptcha_response_field'); ?>
						<?php echo $recaptcha_html; ?>
				<?php } else { ?>
						<?php echo $captcha_html; ?>
						<?php echo form_input($captcha); ?>
						<?php echo form_error($captcha['name']); ?>
				<?php }
				} ?>
				<div class="row">
					<div class="col-xs-8">
					  <div class="checkbox icheck">
						<label>
						  <?php echo form_checkbox($remember); ?> Remember Me
						</label>
					  </div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
					  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			<?php echo form_close(); ?>
			<span style="float:left;"><?php echo anchor('/auth/forgot_password/', 'Forgot password?'); ?></span>
			<?php if ($this->config->item('allow_registration', 'tank_auth')) echo '<span style="float:right;">'.anchor('/auth/register/', 'Register').'</span>'; ?>
			<div style="clear:both;"></div>
		</div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>asset/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>