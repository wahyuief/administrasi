
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
                    <form action="<?= BASE_URL . 'administrator/kuesioner/simpan_jawaban' ?>" method="post">
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
                                  <th width="200">Persepsi</th>
                                  <th width="200">Harapan</th>
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
                                    <td>
                                      <?php echo $pertanyaan->pertanyaan; ?>
                                      <input type="hidden" name="pertanyaan[]" id="pertanyaan" value="<?php echo $pertanyaan->id; ?>">
                                    </td>
                                    <td>
                                      <select  class="form-control" name="jawaban_persepsi" id="jawaban_persepsi" onchange="//location.replace(BASE_URL + 'administrator/kuesioner/simpan_jawaban?pertanyaan=<?php echo $pertanyaan->id ?>&jawaban=' + this.value + '&tipe=<?php echo $pertanyaan->tipe ?>')" data-placeholder="Pilih Jawaban" >
                                        <option selected disabled>Pilih Persepsi</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_persepsi == 'Sangat Puas' ? 'selected' : '') ?> value="Sangat Puas">Sangat Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_persepsi == 'Puas' ? 'selected' : '') ?> value="Puas">Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_persepsi == 'Cukup Puas' ? 'selected' : '') ?> value="Cukup Puas">Cukup Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_persepsi == 'Tidak Puas' ? 'selected' : '') ?> value="Tidak Puas">Tidak Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_persepsi == 'Sangat Tidak Puas' ? 'selected' : '') ?> value="Sangat Tidak Puas">Sangat Tidak Puas</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select  class="form-control" name="jawaban_harapan" id="jawaban_harapan" onchange="//location.replace(BASE_URL + 'administrator/kuesioner/simpan_jawaban?pertanyaan=<?php echo $pertanyaan->id ?>&jawaban=' + this.value + '&tipe=<?php echo $pertanyaan->tipe ?>')" data-placeholder="Pilih Jawaban Harapan" >
                                        <option selected disabled>Pilih Harapan</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_harapan == 'Sangat Puas' ? 'selected' : '') ?> value="Sangat Puas">Sangat Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_harapan == 'Puas' ? 'selected' : '') ?> value="Puas">Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_harapan == 'Cukup Puas' ? 'selected' : '') ?> value="Cukup Puas">Cukup Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_harapan == 'Tidak Puas' ? 'selected' : '') ?> value="Tidak Puas">Tidak Puas</option>
                                        <option <?php echo(db_get_data('kuesioner', ['user'=>get_user_data('id'), 'pertanyaan'=>$pertanyaan->id])->jawaban_harapan == 'Sangat Tidak Puas' ? 'selected' : '') ?> value="Sangat Tidak Puas">Sangat Tidak Puas</option>
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
                      <input type="submit" value="Simpan" class="form-control btn btn-primary">
                    </form>
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