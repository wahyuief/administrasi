<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= site_name(); ?> | <?= $template['title']; ?></title>
    <link rel="icon" href="<?=base_url()?>setting/<?=get_option('favicon')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="<?= theme_asset(); ?>/css/creative.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?= site_name(); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <?php foreach (get_menu('top-menu') as $menu): ?>
            <?php if (app()->aauth->is_allowed('menu_'.$menu->label)): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url($menu->link); ?>"><?= $menu->label; ?></a>
            </li>
            <?php endif ?>
        <?php endforeach; ?>
        <?php if (!app()->aauth->is_loggedin()): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('administrator/login'); ?>"><i class="fa fa-sign-in"></i> <?= cclang('login'); ?></a>
            </li>
            <?php else: ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <img src="<?= BASE_URL.'uploads/user/'.(!empty(get_user_data('avatar')) ? get_user_data('avatar') :'default.png'); ?>" class="rounded-circle img-user" alt="User Image"> 
                    <?= get_user_data('full_name'); ?>
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= site_url('administrator/user/profile'); ?>">My Profile</a>
                    <a class="dropdown-item" href="<?= site_url('administrator/dashboard'); ?>">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('administrator/auth/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
  </div>
</nav>
<?php print_r($tb_surveys); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <?php if ($this->uri->segment(2) == 'question') { ?>
                <div class="card-header">
                    <b class="card-title">Personal Information</b>
                </div>
                <form method="post" action="<?= BASE_URL.'survey/question' ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="surveyor_nama" class="label">Nama Lengkap</label>
                            <input type="text" name="surveyor_nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="surveyor_email" class="label">Alamat Email</label>
                            <input type="text" name="surveyor_email" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Next</button>
                    </div>
                </form>
                <?php } else { ?>
                <div class="card-header">
                    <b class="card-title">Personal Information</b>
                </div>
                <form method="post" action="<?= BASE_URL.'survey/question' ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="surveyor_nama" class="label">Nama Lengkap</label>
                            <input type="text" name="surveyor_nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="surveyor_email" class="label">Alamat Email</label>
                            <input type="text" name="surveyor_email" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Next</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
