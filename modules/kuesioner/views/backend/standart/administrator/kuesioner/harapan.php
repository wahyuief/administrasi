<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Harapan<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Harapan</li>
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
                     <h3 class="widget-user-username">Harapan</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', ['Harapan']); ?></h5>
                  </div>

                  <form name="form_kuesioner" id="form_kuesioner" action="<?= base_url('administrator/kuesioner/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th rowspan="2">Pernyataan</th>
                           <th>SP</th>
                           <th>P</th>
                           <th>CP</th>
                           <th>TP</th>
                           <th>STP</th>
                           <th rowspan="2">Jumlah Responden</th>
                           <th rowspan="2">Jumlah Jawaban</th>
                           <th rowspan="2">Nilai Jawaban</th>
                           <th rowspan="2">Skor Total Perdimensi</th>
                           <th rowspan="2">Skor Total Rata-Rata</th>
                           <th rowspan="2">Presentase</th>
                        </tr>
                        <tr>
                           <th>5</th>
                           <th>4</th>
                           <th>3</th>
                           <th>2</th>
                           <th>1</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_kuesioner">
                     <?php foreach(db_get_all_data('kuesioner_tipe') as $tipe): ?>
                     <?php $jumlah_pertanyaan = count(db_get_all_data('kuesioner_pertanyaan', ['tipe'=>$tipe->id])); ?>
                        <tr>
                           <td colspan="9">
                           <b><?php echo $tipe->nama ?></b>
                           <td rowspan="<?php echo $jumlah_pertanyaan+1 ?>"><?php $hasil = array();foreach(db_get_all_data('kuesioner_pertanyaan', ['tipe'=>$tipe->id]) as $pertanyaan):
                              $sp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Sangat Puas']));
                              $p = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Puas']));
                              $cp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Cukup Puas']));
                              $tp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Tidak Puas']));
                              $stp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Sangat Tidak Puas']));
                              $responden = $sp+$p+$cp+$tp+$stp;
                              $jawaban = ($sp*5)+($p*4)+($cp*3)+($tp*2)+($stp*1);
                              $hasil[] = $jawaban/$responden;
                           endforeach;$hasilnya = array_sum($hasil);echo number_format($hasilnya, 2); ?></td>
                           <td rowspan="<?php echo $jumlah_pertanyaan+1 ?>"><?php echo number_format($hasilnya/$jumlah_pertanyaan,2); ?></td>
                           <td rowspan="<?php echo $jumlah_pertanyaan+1 ?>"><?php $presentase = $hasilnya/110*100;echo number_format($presentase,2).'%';$hasil_presentase[] = $presentase; ?></td>
                           <?php foreach(db_get_all_data('kuesioner_pertanyaan', ['tipe'=>$tipe->id]) as $pertanyaan): ?>
                           <tr>
                              <td><?php echo $pertanyaan->pertanyaan; ?></td>
                              <td><?php $sp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Sangat Puas']));echo $sp; ?></td> 
                              <td><?php $p = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Puas']));echo $p; ?></td> 
                              <td><?php $cp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Cukup Puas']));echo $cp; ?></td> 
                              <td><?php $tp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Tidak Puas']));echo $tp; ?></td> 
                              <td><?php $stp = count(db_get_all_data('kuesioner', ['pertanyaan'=>$pertanyaan->id,'jawaban_harapan'=>'Sangat Tidak Puas']));echo $stp; ?></td> 
                              <td><?php $responden = $sp+$p+$cp+$tp+$stp;echo $responden; ?></td> 
                              <td><?php $jawaban = ($sp*5)+($p*4)+($cp*3)+($tp*2)+($stp*1);echo $jawaban; ?></td> 
                              <td><?php echo number_format($jawaban/$responden, 2); ?></td>
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
                           <th colspan="10">Skor Maks Dimensi</th>
                           <th>110.00</th>
                           <th rowspan="2"><?php echo number_format(array_sum($hasil_presentase), 2).'%'; ?></th>
                        </tr>
                        <tr>
                           <th colspan="10">Presentase</th>
                           <th>100%</th>
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