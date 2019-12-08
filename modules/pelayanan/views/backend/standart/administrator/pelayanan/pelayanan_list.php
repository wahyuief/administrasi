
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Pelayanan/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Pelayanan<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pelayanan</li>
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
                     <div class="row pull-right">
                        <?php is_allowed('pelayanan_add', function(){?>
                        <?php if(!$this->aauth->is_member(4)): ?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', ['Pelayanan']); ?>  (Ctrl+a)" href="<?=  site_url('administrator/pelayanan/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', ['Pelayanan']); ?></a>
                        <?php endif;}) ?>
                        <?php is_allowed('pelayanan_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> Pelayanan" href="<?= site_url('administrator/pelayanan/export'); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('pelayanan_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf Pelayanan" href="<?= site_url('administrator/pelayanan/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Pelayanan</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', ['Pelayanan']); ?>  <i class="label bg-yellow"><?= $pelayanan_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_pelayanan" id="form_pelayanan" action="<?= base_url('administrator/pelayanan/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>Nama Pemohon</th>
                           <th>Surat Permintaan</th>
                           <th>Persetujuan RT</th>
                           <th>Persetujuan RW</th>
                           <th>Persetujuan Kelurahan</th>
                           <th>Status</th>
                           <th>Tanggal</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_pelayanan">
                     <?php foreach($pelayanans as $pelayanan): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $pelayanan->id; ?>">
                           </td>
                           
                           <td><?= _ent($pelayanan->penduduk_nama_lengkap); ?></td>
                             
                           <td><?= _ent($pelayanan->tipe_pelayanan_nama_pelayanan); ?></td>

                           <td><?php if ($pelayanan->approve_rt == '0') {
                              echo '<small class="badge btn-info">Menunggu</small>';
                           } else if ($pelayanan->approve_rt == '1') {
                              echo '<small class="badge btn-success">Disetujui</small>';
                           } else {
                              echo '<small class="badge btn-danger">Ditolak</small>';
                           } ?></td> 
                           <td><?php if ($pelayanan->approve_rw == '0') {
                              echo '<small class="badge btn-info">Menunggu</small>';
                           } else if ($pelayanan->approve_rw == '1') {
                              echo '<small class="badge btn-success">Disetujui</small>';
                           } else {
                              echo '<small class="badge btn-danger">Ditolak</small>';
                           } ?></td> 
                           <td><?php if ($pelayanan->approve_kelurahan == '0') {
                              echo '<small class="badge btn-info">Menunggu</small>';
                           } else if ($pelayanan->approve_kelurahan == '1') {
                              echo '<small class="badge btn-success">Disetujui</small>';
                           } else {
                              echo '<small class="badge btn-danger">Ditolak</small>';
                           } ?></td> 
                             
                           <td><?= _ent($pelayanan->status); ?></td> 
                           <td><?= _ent($pelayanan->tanggal); ?></td> 
                           <td width="200">
                              <?php if($this->aauth->is_member(6) && db_get_data('pelayanan', ['id'=>$pelayanan->id, 'status'=>'Kuesioner'])){?>
                              <a href="<?= site_url('administrator/keusioner/add'); ?>" class="label-default"><i class="fa fa-pencil"></i> Kuesioner
                              <?php } ?>
                              <?php is_allowed('pelayanan_view', function() use ($pelayanan){?>
                              <a href="<?= site_url('administrator/pelayanan/view/' . $pelayanan->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('pelayanan_update', function() use ($pelayanan){?>
                              <a href="<?= site_url('administrator/pelayanan/edit/' . $pelayanan->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('pelayanan_delete', function() use ($pelayanan){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/pelayanan/delete/' . $pelayanan->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($pelayanan_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Pelayanan data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value=""><?= cclang('all'); ?></option>
                            <option <?= $this->input->get('f') == 'nama' ? 'selected' :''; ?> value="nama">Nama</option>
                           <option <?= $this->input->get('f') == 'tipe' ? 'selected' :''; ?> value="tipe">Tipe</option>
                           <option <?= $this->input->get('f') == 'status' ? 'selected' :''; ?> value="status">Status</option>
                           <option <?= $this->input->get('f') == 'tanggal' ? 'selected' :''; ?> value="tanggal">Tanggal</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/pelayanan');?>" title="<?= cclang('reset_filter'); ?>">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
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

<!-- Page script -->
<script>
  $(document).ready(function(){
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_pelayanan').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/pelayanan/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>