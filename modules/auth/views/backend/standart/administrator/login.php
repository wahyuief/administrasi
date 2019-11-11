<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url()?>setting/<?=get_option('favicon')?>">
  <title><?=get_option('site_name');?> | Log in</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/iCheck/square/blue.css">
  <style type="text/css">
    .login-box-body {
      border-top: 5px solid #FEF50E;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="background: url('<?=base_url()?>setting/<?=get_option('background')?>'); background-size: cover; background-repeat: no-repeat; background-position: center center; background-attachment: fixed;">
<div class="login-box">
  <div class="login-box-body" style="padding:25px;">
    <center><a href="<?=BASE_URL?>"><img src="<?=base_url()?>setting/<?=get_option('logo')?>" alt="<?= get_option('site_name'); ?>" width="250"></a></center>
    <br>
    <p class="login-box-msg">Login to start your session.</p>
    <?php if(isset($error) AND !empty($error)): ?>
         <div class="callout callout-error"  style="color:#C82626">
              <h4><?= cclang('error'); ?>!</h4>
              <p><?= $error; ?></p>
            </div>
    <?php endif; ?>
    <?php
    $message = $this->session->flashdata('f_message'); 
    $type = $this->session->flashdata('f_type'); 
    if ($message):
    ?>
   <div class="callout callout-<?= $type; ?>"  style="color:#C82626">
        <p><?= $message; ?></p>
      </div>
    <?php endif; ?>
     <?= form_open('', [
        'name'    => 'form_login', 
        'id'      => 'form_login', 
        'method'  => 'POST',
        'autocomplete' => 'off'
      ]); ?>
      <input autocomplete="false" name="hidden" type="text" style="display:none;">
      <div class="form-group has-feedback <?= form_error('username') ? 'has-error' :''; ?>">
        <input type="text" class="form-control" placeholder="Username" name="username" value="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?= form_error('password') ? 'has-error' :''; ?>">
        <input type="password" class="form-control" placeholder="Password" name="password" value="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1"> <?= cclang('remember_me'); ?>
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-danger btn-block btn-flat btn-lg" style="background-color:#0479b4"><?= cclang('sign_in'); ?></button>
        </div>
      </div>
    <?= form_close(); ?>
    <br>
    <p><a href="<?= site_url('administrator/auth/forgot_password'); ?>"><?= cclang('i_forgot_my_password'); ?></a></p>
    <!-- <p class="mt-2">Don’t have an account? <a href="<?=BASE_URL;?>administrator/auth/otp" class="wizard-form-small-text">Register now</a></p> -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?= BASE_ASSET; ?>/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= BASE_ASSET; ?>/admin-lte/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= BASE_ASSET; ?>/admin-lte/plugins/iCheck/icheck.min.js"></script>
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
