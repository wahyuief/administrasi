
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Penduduk        <small>Edit Data Penduduk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/penduduk'); ?>">Data Penduduk</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Data Pribadi</h3>
                            <h5 class="widget-user-desc">Edit Data Pribadi</h5>
                            <hr>
                        </div>
                        <?php
                        if (empty(db_get_data('penduduk', ['nik'=>get_user_data('username')]))) {
                            $target = base_url('administrator/penduduk/add_save');
                        } else {
                            $target = base_url('administrator/penduduk/edit_data_pribadi_save?nik='.get_user_data('username'));
                        }
                        echo form_open($target, [
                            'name'    => 'form_penduduk', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_penduduk', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="nkk" class="col-sm-2 control-label">Nomor Kartu Keluarga 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nkk" id="nkk" placeholder="Nomor Kartu Keluarga" value="<?= set_value('nkk', $penduduk->nkk); ?>">
                                <small class="info help-block"></small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nik" class="col-sm-2 control-label">NIK 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Keluarga" value="<?= (isset($penduduk->nik) ? $penduduk->nik : get_user_data('username')); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?= (isset($penduduk->nama_lengkap) ? $penduduk->nama_lengkap : get_user_data('full_name')); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $penduduk->jenis_kelamin == "Pria" ? "checked" : ""; ?> type="radio" class="flat-red" name="jenis_kelamin" value="Pria"> Pria                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $penduduk->jenis_kelamin == "Wanita" ? "checked" : ""; ?> type="radio" class="flat-red" name="jenis_kelamin" value="Wanita"> Wanita                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="tempat_lahir" id="tempat_lahir" data-placeholder="Select Tempat Lahir" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('kota') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->tempat_lahir ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_lahir"  placeholder="Tanggal Lahir" id="tanggal_lahir" value="<?= set_value('penduduk_tanggal_lahir_name', $penduduk->tanggal_lahir); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="golongan_darah" class="col-sm-2 control-label">Golongan Darah 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="golongan_darah" id="golongan_darah" data-placeholder="Select Golongan Darah" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('golongandarah') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->golongan_darah ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="agama" class="col-sm-2 control-label">Agama 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="agama" id="agama" data-placeholder="Select Agama" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('agama') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->agama ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="pendidikan_akhir" class="col-sm-2 control-label">Pendidikan Terakhir 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="pendidikan_akhir" id="pendidikan_akhir" data-placeholder="Select Pendidikan Akhir" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('pendidikan') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->pendidikan_akhir ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="pekerjaan" id="pekerjaan" data-placeholder="Select Pekerjaan" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('pekerjaan') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->pekerjaan ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="status_perkawinan" class="col-sm-2 control-label">Status Perkawinan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="status_perkawinan" id="status_perkawinan" data-placeholder="Select Status Perkawinan" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('statuskawin') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->status_perkawinan ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="status_keluarga" class="col-sm-2 control-label">Status Hubungan Dalam Keluarga 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="status_keluarga" id="status_keluarga" data-placeholder="Select Status Keluarga" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('statuskeluarga') as $row): ?>
                                    <option <?=  $row->nama ==  $penduduk->status_keluarga ? 'selected' : ''; ?> value="<?= $row->nama ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="nama_ibu" class="col-sm-2 control-label">Nama Ibu 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?= set_value('nama_ibu', $penduduk->nama_ibu); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nama_ayah" class="col-sm-2 control-label">Nama Ayah 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?= set_value('nama_ayah', $penduduk->nama_ayah); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="alamat_lengkap" class="col-sm-2 control-label">Alamat Lengkap 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="alamat_lengkap" name="alamat_lengkap" rows="5" class="textarea form-control"><?= set_value('alamat_lengkap', $penduduk->alamat_lengkap); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="rt" class="col-sm-2 control-label">RT Berapa 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="rt" id="rt" placeholder="RT Berapa" value="<?= (isset($penduduk->rt) ? $penduduk->rt : get_user_data('rt')); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="rw" class="col-sm-2 control-label">RW Berapa 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="rw" id="rw" placeholder="RW Berapa" value="<?= (isset($penduduk->rw) ? $penduduk->rw : get_user_data('rw')); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/user/profile';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_penduduk = $('#form_penduduk');
        var data_post = form_penduduk.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_penduduk.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#penduduk_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
            window.location.href = location.href;
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>