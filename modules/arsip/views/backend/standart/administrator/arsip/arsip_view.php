
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Data Arsip      <small><?= cclang('detail', ['Data Arsip']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/arsip'); ?>">Data Arsip</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
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
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Data Arsip</h3>
                     <h5 class="widget-user-desc">Detail Data Arsip</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_arsip" id="form_arsip" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                           <?= _ent($arsip->id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama </label>

                        <div class="col-sm-8">
                           <?= _ent($arsip->penduduk_nama_lengkap); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Kartu Tanda Penduduk </label>
                        <div class="col-sm-8">
                             <?php if (is_image($arsip->ktp)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/arsip/' . $arsip->ktp; ?>">
                                <img src="<?= BASE_URL . 'uploads/arsip/' . $arsip->ktp; ?>" class="image-responsive" alt="image arsip" title="ktp arsip" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/arsip/' . $arsip->ktp; ?>">
                                 <img src="<?= get_icon_file($arsip->ktp); ?>" class="image-responsive" alt="image arsip" title="ktp <?= $arsip->ktp; ?>" width="40px"> 
                               <?= $arsip->ktp ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Kartu Keluarga </label>
                        <div class="col-sm-8">
                             <?php if (is_image($arsip->kk)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/arsip/' . $arsip->kk; ?>">
                                <img src="<?= BASE_URL . 'uploads/arsip/' . $arsip->kk; ?>" class="image-responsive" alt="image arsip" title="kk arsip" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/arsip/' . $arsip->kk; ?>">
                                 <img src="<?= get_icon_file($arsip->kk); ?>" class="image-responsive" alt="image arsip" title="kk <?= $arsip->kk; ?>" width="40px"> 
                               <?= $arsip->kk ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Foto Formal (2x3, 3x4, 4x6) </label>
                        <div class="col-sm-8">
                             <?php if (!empty($arsip->foto)): ?>
                             <?php foreach (explode(',', $arsip->foto) as $filename): ?>
                               <?php if (is_image($arsip->foto)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/arsip/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/arsip/' . $filename; ?>" class="image-responsive" alt="image arsip" title="foto arsip" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= BASE_URL . 'administrator/file/download/arsip/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image arsip" title="foto <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('arsip_update', function() use ($arsip){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit arsip (Ctrl+e)" href="<?= site_url('administrator/arsip/edit/'.$arsip->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Data Arsip']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/arsip/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Data Arsip']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->
