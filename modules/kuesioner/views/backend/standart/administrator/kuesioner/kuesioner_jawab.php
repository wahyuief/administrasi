
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
        Kuesioner        <small><?= cclang('new', ['Kuesioner']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/kuesioner'); ?>">Kuesioner</a></li>
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
                            <h3 class="widget-user-username">Kuesioner</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Kuesioner']); ?></h5>
                            <hr>
                        </div>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Pernyataan</th>
                                <th>Jawaban</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i=1;foreach(db_get_all_data('kuesioner_tipe') as $tipe): ?>
                              <tr>
                                <td></td>
                                <td colspan="3">
                                <b><?php echo $tipe->nama ?></b>
                                <?php foreach(db_get_all_data('kuesioner_pertanyaan', ['tipe'=>$tipe->id]) as $pertanyaan): ?>
                                <tr>
                                  <td><?php echo $i++ ?></td>
                                  <td><?php echo $pertanyaan->pertanyaan; ?></td>
                                  <td>
                                    <select  class="form-control" name="jawaban" id="jawaban" onchange="location.replace(BASE_URL + 'administrator/kuesioner/simpan_jawaban?pertanyaan=<?php echo $pertanyaan->id ?>&jawaban=' + this.value)" data-placeholder="Pilih Jawaban" >
                                      <option selected disabled>Pilih Jawaban</option>
                                      <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban == 'Sangat Puas' ? 'selected' : '') ?> value="Sangat Puas">Sangat Puas</option>
                                      <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban == 'Puas' ? 'selected' : '') ?> value="Puas">Puas</option>
                                      <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban == 'Cukup Puas' ? 'selected' : '') ?> value="Cukup Puas">Cukup Puas</option>
                                      <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban == 'Tidak Puas' ? 'selected' : '') ?> value="Tidak Puas">Tidak Puas</option>
                                      <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban == 'Sangat Tidak Puas' ? 'selected' : '') ?> value="Sangat Tidak Puas">Sangat Tidak Puas</option>
                                    </select>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
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
        

    
    }); /*end doc ready*/
</script>