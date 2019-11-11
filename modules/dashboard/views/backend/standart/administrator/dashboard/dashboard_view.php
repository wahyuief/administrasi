<style type="text/css">
   .widget-user-header {
      padding-left: 20px !important;
   }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        <?= cclang('dashboard') ?>
        <small>
            
        <?= cclang('Statistik') ?>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard">
                </i>
                <?= cclang('home') ?>
            </a>
        </li>
        <li class="active">
            <?= cclang('dashboard') ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
      <?php cicool()->eventListen('dashboard_content_top'); ?>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/pelayanan')">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-list-ul">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Permintaan Baru') ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/pelayanan')">
                <span class="info-box-icon bg-yellow">
                    <i class="fa fa-check">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Permintaan Selesai') ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/arsip')">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-archive">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Arsip Baru') ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/penduduk')">
                <span class="info-box-icon bg-yellow">
                    <i class="fa fa-users">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Penduduk Baru') ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
  
      <!-- /.row -->
      <?php cicool()->eventListen('dashboard_content_bottom'); ?>

</section>
<!-- /.content -->
