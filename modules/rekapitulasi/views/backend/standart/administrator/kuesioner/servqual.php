<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Servqual<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Servqual</li>
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
                        <a class="btn btn-flat btn-success" title="PERSEPSI" href="<?=  site_url('administrator/kuesioner/persepsi'); ?>">PERSEPSI</a>
                        <a class="btn btn-flat btn-success" title="HARAPAN" href="<?=  site_url('administrator/kuesioner/harapan'); ?>">HARAPAN</a>
                        <a class="btn btn-flat btn-success" title="SERVQUAL" href="<?=  site_url('administrator/kuesioner/servqual'); ?>">SERVQUAL</a>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Servqual</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', ['Servqual']); ?></h5>
                  </div>

                  <form name="form_kuesioner" id="form_kuesioner" action="<?= base_url('administrator/kuesioner/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>Pernyataan</th>
                           <th>Nilai Persepsi</th>
                           <th>Nilai Harapan</th>
                           <th>Gap Score</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_kuesioner">
                     <?php foreach(db_get_all_data('kuesioner_tipe') as $tipe): ?>
                        <tr>
                           <td colspan="9">
                           <b><?php echo $tipe->nama ?></b>
                           <?php foreach(db_get_all_data('kuesioner_pertanyaan', ['tipe'=>$tipe->id]) as $pertanyaan): ?>
                           <tr>
                              <td><?php echo $pertanyaan->pertanyaan; ?></td>
                              <?php
                                 $sp_persepsi = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_persepsi'=>'Sangat Puas']));
                                 $sp_harapan = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Sangat Puas']));
                                 $p_persepsi = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_persepsi'=>'Puas']));
                                 $p_harapan = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Puas']));
                                 $cp_persepsi = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_persepsi'=>'Cukup Puas']));
                                 $cp_harapan = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Cukup Puas']));
                                 $tp_persepsi = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_persepsi'=>'Tidak Puas']));
                                 $tp_harapan = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Tidak Puas']));
                                 $stp_persepsi = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_persepsi'=>'Sangat Tidak Puas']));
                                 $stp_harapan = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Sangat Tidak Puas']));
                                 $responden = count(db_get_all_data('kuesioner'));
                                 $jawaban_persepsi = ($sp_persepsi*5)+($p_persepsi*4)+($cp_persepsi*3)+($tp_persepsi*2)+($stp_persepsi*1);
                                 $jawaban_harapan = ($sp_harapan*5)+($p_harapan*4)+($cp_harapan*3)+($tp_harapan*2)+($stp_harapan*1);
                              ?>
                              <td><?php $persepsi = $jawaban_persepsi/$responden;echo number_format($persepsi,2); ?></td>
                              <td><?php $harapan = $jawaban_harapan/$responden;echo number_format($harapan,2); ?></td>
                              <td><?php echo number_format($persepsi-$harapan, 2);$gap[] = $persepsi-$harapan; ?></td>
                           </tr>
                           <?php endforeach; ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                      <?php if ($kuesioner_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Kuesioner data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th colspan="3">Gap Maksimum</th>
                           <th><?php echo number_format(max($gap),2); ?></th>
                        </tr>
                        <tr>
                           <th colspan="3">Gap Minimum</th>
                           <th><?php echo number_format(min($gap),2) ?></th>
                        </tr>
                     </tfoot>
                  </table>
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
      var serialize_bulk = $('#form_kuesioner').serialize();

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
               document.location.href = BASE_URL + '/administrator/kuesioner/delete?' + serialize_bulk;      
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