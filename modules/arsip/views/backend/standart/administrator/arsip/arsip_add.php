
<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
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
        Data Arsip        <small><?= cclang('new', ['Data Arsip']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/arsip'); ?>">Data Arsip</a></li>
        <li class="active"><?= cclang('new'); ?></li>
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
                            <h3 class="widget-user-username">Data Arsip</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Data Arsip']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_arsip', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_arsip', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="nama" class="col-sm-2 control-label">Nama 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="nama" id="nama" data-placeholder="Select Nama" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('penduduk') as $row): ?>
                                    <option value="<?= $row->nama_lengkap ?>"><?= $row->nama_lengkap; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="ktp" class="col-sm-2 control-label">Kartu Tanda Penduduk 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div id="arsip_ktp_galery"></div>
                                <input class="data_file" name="arsip_ktp_uuid" id="arsip_ktp_uuid" type="hidden" value="<?= set_value('arsip_ktp_uuid'); ?>">
                                <input class="data_file" name="arsip_ktp_name" id="arsip_ktp_name" type="hidden" value="<?= set_value('arsip_ktp_name'); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,JPEG,PNG.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kk" class="col-sm-2 control-label">Kartu Keluarga 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div id="arsip_kk_galery"></div>
                                <input class="data_file" name="arsip_kk_uuid" id="arsip_kk_uuid" type="hidden" value="<?= set_value('arsip_kk_uuid'); ?>">
                                <input class="data_file" name="arsip_kk_name" id="arsip_kk_name" type="hidden" value="<?= set_value('arsip_kk_name'); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,JPEG,PNG.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="foto" class="col-sm-2 control-label">Foto Formal (2x3, 3x4, 4x6) 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div id="arsip_foto_galery"></div>
                                <div id="arsip_foto_galery_listed"></div>
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,JPEG,PNG.</small>
                            </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                           <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
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
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
              window.location.href = BASE_URL + 'administrator/arsip';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_arsip = $('#form_arsip');
        var data_post = form_arsip.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/arsip/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id_ktp = $('#arsip_ktp_galery').find('li').attr('qq-file-id');
            var id_kk = $('#arsip_kk_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            $('#arsip_foto_galery').find('li').each(function() {
               $('#arsip_foto_galery').fineUploader('deleteFile', $(this).attr('qq-file-id'));
            });
            if (typeof id_ktp !== 'undefined') {
                    $('#arsip_ktp_galery').fineUploader('deleteFile', id_ktp);
                }
            if (typeof id_kk !== 'undefined') {
                    $('#arsip_kk_galery').fineUploader('deleteFile', id_kk);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
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
      
              var params = {};
       params[csrf] = token;

       $('#arsip_ktp_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/arsip/upload_ktp_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/arsip/delete_ktp_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","jpeg","png"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#arsip_ktp_galery').fineUploader('getUuid', id);
                   $('#arsip_ktp_uuid').val(uuid);
                   $('#arsip_ktp_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#arsip_ktp_uuid').val();
                  $.get(BASE_URL + '/administrator/arsip/delete_ktp_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#arsip_ktp_uuid').val('');
                  $('#arsip_ktp_name').val('');
                }
              }
          }
      }); /*end ktp galery*/
                     var params = {};
       params[csrf] = token;

       $('#arsip_kk_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/arsip/upload_kk_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/arsip/delete_kk_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","jpeg","png"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#arsip_kk_galery').fineUploader('getUuid', id);
                   $('#arsip_kk_uuid').val(uuid);
                   $('#arsip_kk_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#arsip_kk_uuid').val();
                  $.get(BASE_URL + '/administrator/arsip/delete_kk_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#arsip_kk_uuid').val('');
                  $('#arsip_kk_name').val('');
                }
              }
          }
      }); /*end kk galery*/
              
 
              var params = {};
       params[csrf] = token;

       $('#arsip_foto_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/arsip/upload_foto_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/arsip/delete_foto_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          validation: {
              allowedExtensions: ["jpg","jpeg","png"],
              sizeLimit : 0,
                            
          },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#arsip_foto_galery').fineUploader('getUuid', id);
                   $('#arsip_foto_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="arsip_foto_uuid['+id+']" value="'+uuid+'" /><input type="hidden" class="listed_file_name" name="arsip_foto_name['+id+']" value="'+xhr.uploadName+'" />');
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#arsip_foto_galery_listed').find('.listed_file_uuid[name="arsip_foto_uuid['+id+']"]').remove();
                  $('#arsip_foto_galery_listed').find('.listed_file_name[name="arsip_foto_name['+id+']"]').remove();
                }
              }
          }
      }); /*end foto galery*/
              
    
    
    }); /*end doc ready*/
</script>