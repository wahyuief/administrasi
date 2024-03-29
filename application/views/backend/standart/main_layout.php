<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?= get_option('site_description'); ?>">
  <meta name="keywords" content="<?= get_option('keywords'); ?>">
  <meta name="author" content="<?= get_option('author'); ?>">
  <link rel="icon" href="<?=base_url()?>setting/<?=get_option('favicon')?>">
  <title><?= get_option('site_name'); ?> | <?= $template['title']; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/sweet-alert/sweetalert.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/toastr/build/toastr.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/fancy-box/source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/chosen/chosen.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>chartjs/Chart.min.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>/css/custom.css?timestamp=201803311526">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>datetimepicker/jquery.datetimepicker.css"/>
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>js-scroll/style/jquery.jscrollpane.css" rel="stylesheet" media="all" />
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>flag-icon/css/flag-icon.css" rel="stylesheet" media="all" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?= $this->cc_html->getCssFileTop(); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="<?= BASE_ASSET; ?>/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="<?= BASE_ASSET; ?>/admin-lte/plugins/iCheck/icheck.min.js"></script>
  <script src="<?= BASE_ASSET; ?>/sweet-alert/sweetalert-dev.js"></script>
  <script src="<?= BASE_ASSET; ?>/admin-lte/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= BASE_ASSET; ?>/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= BASE_ASSET; ?>/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?= BASE_ASSET; ?>/toastr/toastr.js"></script>
  <script src="<?= BASE_ASSET; ?>/fancy-box/source/jquery.fancybox.js?v=2.1.5"></script>
  <script src="<?= BASE_ASSET; ?>/datetimepicker/build/jquery.datetimepicker.full.js"></script>
  <script src="<?= BASE_ASSET; ?>/editor/dist/js/medium-editor.js"></script>
  <script src="<?= BASE_ASSET; ?>js/cc-extension.js"></script>
  <script src="<?= BASE_ASSET; ?>chartjs/Chart.min.js"></script>
  <script src="<?= BASE_ASSET; ?>/js/cc-page-element.js"></script>
  <script>
    var BASE_URL = "<?= base_url(); ?>";
    var HTTP_REFERER = "<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/' ; ?>";
    var csrf = '<?= $this->security->get_csrf_token_name(); ?>';
    var token = '<?= $this->security->get_csrf_hash(); ?>';

    $(document).ready(function(){

      toastr.options = {
        "positionClass": "toast-top-center",
      }

      var f_message = '<?= $this->session->flashdata('f_message'); ?>';
      var f_type = '<?= $this->session->flashdata('f_type'); ?>';

      if (f_message.length > 0) {
        toastr[f_type](f_message);
      }

      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      });
    });
  </script>
  <?= $this->cc_html->getScriptFileTop(); ?>
</head>
<?php $skin = (get_option('skin') != null) ? get_option('skin') : "skin-black-light"; ?>
<body class="sidebar-mini fixed web-body <?=$skin;?>" style="background: url('<?=base_url()?>setting/<?=get_option('background')?>'); background-size: cover; background-repeat: no-repeat; background-position: center center; background-attachment: fixed;">
<div class="wrapper">

  <header class="main-header">

     <?php 
      $logo =  get_option('logo');
      if ($logo) {
        $logo = 'setting/'. get_option('logo');
      } else {
        $logo = 'asset/img/icon-wide.png';
      }

      if (!is_file(FCPATH .'/'. $logo)) {
        $logo = 'asset/img/icon-wide.png';
      }
      ?>

    <a href="<?= site_url('/'); ?>" class="logo">
      <span class="logo-mini"><img src="<?=base_url()?>setting/<?=get_option('favicon')?>" height="25"></span>
      <span class="logo-lg"><b><?=get_option('site_name')?></b> Dashboard</span>

    </a>
    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <?php if ($this->aauth->get_user()): ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications: style can be found in dropdown.less -->
          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o" style="font-size:18px; color:red"></i>
              <span class="label label-danger label-circle"><i id="mynotif"></i></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?= BASE_URL . 'administrator/notifications' ?>">
                      <i class="fa fa-calendar text-success"></i> <span id="approval"></span> Kegiatan Membutuhkan Persetujuan
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL . 'administrator/tb_kegiatan' ?>">
                      <i class="fa fa-calendar text-red"></i> <span id="kegiatan"></span> Kegiatan akan segera berakhir 
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL . 'administrator/tb_kerjasama' ?>">
                      <i class="fa fa-balance-scale text-red"></i> <span id="kerjasama"></span> Kerja Sama akan segera berakhir
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?= BASE_URL . 'administrator/notifications' ?>">Lihat semua</a></li>
            </ul>
          </li> -->
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= BASE_URL.'uploads/user/'.(!empty(get_user_data('avatar')) ? get_user_data('avatar') :'default.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= _ent(ucwords(clean_snake_case(get_user_data('full_name')))); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= BASE_URL.'uploads/user/'.(!empty(get_user_data('avatar')) ? get_user_data('avatar') :'default.png'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?= _ent(ucwords(clean_snake_case($this->aauth->get_user()->full_name))); ?> 
                  <small>Last Login, <?= date('Y-M-D', strtotime(get_user_data('last_login'))); ?></small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= site_url('administrator/user/profile'); ?>" class="btn btn-default btn-flat"><?= cclang('profile'); ?></a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('administrator/auth/logout'); ?>" class="btn btn-default btn-flat"><?= cclang('sign_out'); ?></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <?php endif ?>

    </nav>
  </header>
  <aside class="main-sidebar">

    <section class="sidebar" style="padding-top:0% !important">

      <ul class="sidebar-menu  sidebar-admin tree"  data-widget="tree">
        <?php if ($this->aauth->is_member(1)): ?>
          <li class="active "> 
              <a href="<?= BASE_URL ?>administrator/dashboard"><i class="fa fa-dashboard text-yellow"></i> <span>Dashboard</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/notifications"><i class="fa fa-info-circle text-yellow"></i> <span>Notifikasi</span>
              <span class="pull-right-container"><span class="label label-danger label-circle"><i id="adminnotif"></i></span>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/kuesioner"><i class="fa fa-question-circle text-yellow"></i> <span>Kuesioner</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/pelayanan"><i class="fa fa-book text-yellow"></i> <span>Pelayanan</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/tipe_pelayanan"><i class="fa fa-list-ul text-yellow"></i> <span>Tipe Pelayanan</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/penduduk"><i class="fa fa-users text-yellow"></i> <span>Kelola Penduduk</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/user"><i class="fa fa-user text-yellow"></i> <span>Data Pengguna</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li> 
        <?php elseif($this->aauth->is_member(2)): ?>        
          <li class="active "> 
              <a href="<?= BASE_URL ?>administrator/dashboard"><i class="fa fa-dashboard text-yellow"></i> <span>Dashboard</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/notifications"><i class="fa fa-info-circle text-yellow"></i> <span>Notifikasi</span>
              <span class="pull-right-container"><span class="label label-danger label-circle"><i id="rtnotif"></i></span>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/pelayanan"><i class="fa fa-book text-yellow"></i> <span>Pelayanan</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/penduduk"><i class="fa fa-users text-yellow"></i> <span>Kelola Penduduk</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/user/add"><i class="fa fa-user text-yellow"></i> <span>Pendaftaran NIK</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
        <?php elseif($this->aauth->is_member(3)): ?>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/dashboard"><i class="fa fa-dashboard text-yellow"></i> <span>Dashboard</span>
            <span class="pull-right-container"></i>
            </span>
          </a>
        </li>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/notifications"><i class="fa fa-info-circle text-yellow"></i> <span>Notifikasi</span>
            <span class="pull-right-container"><span class="label label-danger label-circle"><i id="rwnotif"></i></span>
            </span>
          </a>
        </li>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/pelayanan"><i class="fa fa-book text-yellow"></i> <span>Pelayanan</span>
            <span class="pull-right-container"></i>
            </span>
          </a>
        </li>
        <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/penduduk"><i class="fa fa-users text-yellow"></i> <span>Kelola Penduduk</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
        <?php elseif($this->aauth->is_member(4)): ?>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/dashboard"><i class="fa fa-dashboard text-yellow"></i> <span>Dashboard</span>
            <span class="pull-right-container"></i>
            </span>
          </a>
        </li>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/notifications"><i class="fa fa-info-circle text-yellow"></i> <span>Notifikasi</span>
            <span class="pull-right-container"><span class="label label-danger label-circle"><i id="lurahnotif"></i></span>
            </span>
          </a>
        </li>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/kuesioner"><i class="fa fa-question-circle text-yellow"></i> <span>Kuesioner</span>
            <span class="pull-right-container"></i>
            </span>
          </a>
        </li>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/pelayanan"><i class="fa fa-book text-yellow"></i> <span>Pelayanan</span>
            <span class="pull-right-container"></i>
            </span>
          </a>
        </li>
        <li class=" "> 
            <a href="<?= BASE_URL ?>administrator/tipe_pelayanan"><i class="fa fa-list-ul text-yellow"></i> <span>Tipe Pelayanan</span>
            <span class="pull-right-container"></i>
            </span>
          </a>
        </li>
        <?php elseif($this->aauth->is_member(6)): ?>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/user/profile"><i class="fa fa-user text-yellow"></i> <span>Profile</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/notifications"><i class="fa fa-info-circle text-yellow"></i> <span>Notifikasi</span>
              <span class="pull-right-container"><span class="label label-danger label-circle"><i id="warganotif"></i></span>
              </span>
            </a>
          </li>
          <li class=" "> 
              <a href="<?= BASE_URL ?>administrator/pelayanan"><i class="fa fa-book text-yellow"></i> <span>Pelayanan</span>
              <span class="pull-right-container"></i>
              </span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </section>

  </aside>

  <div class="content-wrapper">
    <?php cicool()->eventListen('backend_content_top'); ?>
    <?= $template['partials']['content']; ?>
    <?php cicool()->eventListen('backend_content_bottom'); ?>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?= cclang('version') ?></b> <?= VERSION ?>
    </div>
    <strong>Copyright &copy; <?=date('Y'); ?> <a href="#"><?= get_option('site_name'); ?></a>.</strong> All rights
    reserved.
  </footer>
  
  <div class="control-sidebar-bg"></div>
</div>

<?= $this->cc_html->getHtmlFileBottom(); ?>

<?= $this->cc_html->getCssFileBottom(); ?>
<?= $this->cc_html->getScriptFileBottom(); ?>
<script>
        var AdminLTEOptions = {
          sidebarExpandOnHover: false,
           navbarMenuSlimscroll: false,
        };
      </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?= BASE_ASSET; ?>jquery-ui/jquery-ui.js"></script>
<script src="<?= BASE_ASSET; ?>jquery-switch-button/jquery.switchButton.js"></script>
<script src="<?= BASE_ASSET; ?>/js/jquery.ui.touch-punch.js"></script>
<script src="<?= BASE_ASSET; ?>/admin-lte/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= BASE_ASSET; ?>/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= BASE_ASSET; ?>/admin-lte/plugins/fastclick/fastclick.js"></script>
<script src="<?= BASE_ASSET; ?>/admin-lte/dist/js/app.min.js"></script>
<script src="<?= BASE_ASSET; ?>/admin-lte/dist/js/adminlte.js"></script>
<script src="<?= BASE_ASSET; ?>js-scroll/script/jquery.jscrollpane.min.js"></script>
<script src="<?= BASE_ASSET; ?>jquery-switch-button/jquery.switchButton.js"></script>
<script src="<?= BASE_ASSET; ?>/js/custom.js"></script>

<script>
    $(document).ready(function(){

        var BASE_URL = "<?= base_url(); ?>";

        <?php if ($this->aauth->is_member(1)): ?>
        $.ajax({
            url: BASE_URL + 'administrator/auth/notif_unread',
            type: "GET",
            beforeSend: function(xhr){
                // xhr.setRequestHeader('X-Api-Key', 'A1336F70C2BEF1D3C325F228A06B4447');
            },
            success: function(response) {
                var notif = JSON.parse(response);
                console.log(notif);
                $('#adminnotif').html(notif.notif_unread);
                $('#adminnotif').show();

            }
        });
        <?php endif; ?>
        <?php if ($this->aauth->is_member(2)): ?>
        $.ajax({
            url: BASE_URL + 'administrator/auth/notif_unread',
            type: "GET",
            beforeSend: function(xhr){
                // xhr.setRequestHeader('X-Api-Key', 'A1336F70C2BEF1D3C325F228A06B4447');
            },
            success: function(response) {
                var notif = JSON.parse(response);
                console.log(notif);
                $('#rtnotif').html(notif.notif_unread);
                $('#rtnotif').show();

            }
        });
        <?php endif; ?>
        <?php if ($this->aauth->is_member(3)): ?>
        $.ajax({
            url: BASE_URL + 'administrator/auth/notif_unread',
            type: "GET",
            beforeSend: function(xhr){
                // xhr.setRequestHeader('X-Api-Key', 'A1336F70C2BEF1D3C325F228A06B4447');
            },
            success: function(response) {
                var notif = JSON.parse(response);
                console.log(notif);
                $('#rwnotif').html(notif.notif_unread);
                $('#rwnotif').show();

            }
        });
        <?php endif; ?>
        <?php if ($this->aauth->is_member(4)): ?>
        $.ajax({
            url: BASE_URL + 'administrator/auth/notif_unread',
            type: "GET",
            beforeSend: function(xhr){
                // xhr.setRequestHeader('X-Api-Key', 'A1336F70C2BEF1D3C325F228A06B4447');
            },
            success: function(response) {
                var notif = JSON.parse(response);
                console.log(notif);
                $('#lurahnotif').html(notif.notif_unread);
                $('#lurahnotif').show();

            }
        });
        <?php endif; ?>
        <?php if ($this->aauth->is_member(6)): ?>
        $.ajax({
            url: BASE_URL + 'administrator/auth/notif_unread',
            type: "GET",
            beforeSend: function(xhr){
                // xhr.setRequestHeader('X-Api-Key', 'A1336F70C2BEF1D3C325F228A06B4447');
            },
            success: function(response) {
                var notif = JSON.parse(response);
                console.log(notif);
                $('#warganotif').html(notif.notif_unread);
                $('#warganotif').show();

            }
        });
        <?php endif; ?>
    });
</script>

</body>
</html>
