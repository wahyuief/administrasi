
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
        Pelayanan        <small>Edit Pelayanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/pelayanan'); ?>">Pelayanan</a></li>
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
                            <h3 class="widget-user-username">Pelayanan</h3>
                            <h5 class="widget-user-desc">Edit Pelayanan</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/pelayanan/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_pelayanan', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_pelayanan', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="nama" class="col-sm-2 control-label">Nama Pemohon 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" id="nama" value="<?= $pelayanan->nama ?>" class="form-control" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="tipe" class="col-sm-2 control-label">Surat Permintaan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="tipe" id="tipe" value="<?= $pelayanan->tipe ?>" class="form-control" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <?php if($this->aauth->is_member(2) && db_get_data('pelayanan', ['id'=>$pelayanan->id, 'approve_rt'=>'0'])): ?>
                        <div class="form-group ">
                            <label for="approve_rt" class="col-sm-2 control-label">Persetujuan RT 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="approve_rt" id="approve_rt" data-placeholder="Select approve_rt" >
                                    <option value=""></option>
                                    <option <?= $pelayanan->approve_rt == "0" ? 'selected' :''; ?> value="0">Menunggu</option>
                                    <option <?= $pelayanan->approve_rt == "1" ? 'selected' :''; ?> value="1">Disetujui</option>
                                    <option <?= $pelayanan->approve_rt == "2" ? 'selected' :''; ?> value="2">Ditolak</option>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($this->aauth->is_member(3) && db_get_data('pelayanan', ['id'=>$pelayanan->id, 'approve_rt'=>'1', 'approve_rw'=>'0'])): ?>
                        <div class="form-group ">
                            <label for="approve_rw" class="col-sm-2 control-label">Persetujuan RW 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="approve_rw" id="approve_rw" data-placeholder="Select approve_rw" >
                                    <option value=""></option>
                                    <option <?= $pelayanan->approve_rw == "0" ? 'selected' :''; ?> value="0">Menunggu</option>
                                    <option <?= $pelayanan->approve_rw == "1" ? 'selected' :''; ?> value="1">Disetujui</option>
                                    <option <?= $pelayanan->approve_rw == "2" ? 'selected' :''; ?> value="2">Ditolak</option>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($this->aauth->is_member(1) || $this->aauth->is_member(4) && db_get_data('pelayanan', ['id'=>$pelayanan->id, 'approve_rt'=>'1', 'approve_rw'=>'1'])): ?>
                        <div class="form-group ">
                            <label for="approve_kelurahan" class="col-sm-2 control-label">Persetujuan Kelurahan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="approve_kelurahan" id="approve_kelurahan" data-placeholder="Select approve_kelurahan" >
                                    <option value=""></option>
                                    <option <?= $pelayanan->approve_kelurahan == "0" ? 'selected' :''; ?> value="0">Menunggu</option>
                                    <option <?= $pelayanan->approve_kelurahan == "1" ? 'selected' :''; ?> value="1">Disetujui</option>
                                    <option <?= $pelayanan->approve_kelurahan == "2" ? 'selected' :''; ?> value="2">Ditolak</option>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($this->aauth->is_member(1) || $this->aauth->is_member(4) && db_get_data('pelayanan', ['id'=>$pelayanan->id, 'approve_rt'=>'1', 'approve_rw'=>'1'])){ ?>
                        <div class="form-group ">
                            <label for="status" class="col-sm-2 control-label">Status 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status" >
                                    <option value=""></option>
                                    <option <?= $pelayanan->status == "Menunggu" ? 'selected' :''; ?> value="Menunggu">Menunggu</option>
                                    <option <?= $pelayanan->status == "Proses" ? 'selected' :''; ?> value="Proses">Proses</option>
                                    <option <?= $pelayanan->status == "Kuesioner" ? 'selected' :''; ?> value="Kuesioner">Kuesioner</option>
                                    <option <?= $pelayanan->status == "Selesai" ? 'selected' :''; ?> value="Selesai">Selesai</option>
                                    </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="form-group ">
                            <label for="status" class="col-sm-2 control-label">Status
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="status" id="status" value="<?= $pelayanan->status ?>" class="form-control" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <?php } ?>
                                                
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
              window.location.href = BASE_URL + 'administrator/pelayanan';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_pelayanan = $('#form_pelayanan');
        var data_post = form_pelayanan.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_pelayanan.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#pelayanan_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
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