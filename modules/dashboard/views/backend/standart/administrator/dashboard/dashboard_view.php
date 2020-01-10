<style type="text/css">
   .widget-user-header {
      padding-left: 20px !important;
   }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        <?= cclang('dashboard') ?>
        <small>
            
        <?= cclang('Statistik') ?>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard">
                </i>
                <?= cclang('home') ?>
            </a>
        </li>
        <li class="active">
            <?= cclang('dashboard') ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
      <?php cicool()->eventListen('dashboard_content_top'); ?>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/pelayanan')">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-list-ul">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Permintaan Baru') ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/pelayanan')">
                <span class="info-box-icon bg-yellow">
                    <i class="fa fa-check">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Permintaan Selesai') ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/arsip')">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-archive">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Arsip Baru') ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box button" onclick="goUrl('administrator/penduduk')">
                <span class="info-box-icon bg-yellow">
                    <i class="fa fa-users">
                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <?= cclang('Penduduk Baru') ?>
                    </span>
                </div>
            </div>
        </div>

        <?php if($this->aauth->is_member(1) || $this->aauth->is_member(4)): ?>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-body ">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-body ">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        

        <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
                <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>No</th>
                           <th>Pertanyaan</th>
                           <th>Sangat Puas</th>
                           <th>Puas</th>
                           <th>Cukup Puas</th>
                           <th>Tidak Puas</th>
                           <th>Sangat Tidak Puas</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_kuesioner_pertanyaan">
                     <?php $i=1;foreach(db_get_all_data('kuesioner_tipe') as $tipe): ?>
                        <tr>
                            <td></td>
                            <td colspan="2">
                            <b><?php echo $tipe->nama ?></b>
                            <?php foreach(db_get_all_data('kuesioner_pertanyaan', ['tipe'=>$tipe->id]) as $kuesioner_pertanyaan): ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?= _ent($kuesioner_pertanyaan->pertanyaan); ?></td>
                                <td align="center"><?php echo count(db_get_all_data('kuesioner', ['pertanyaan'=>$kuesioner_pertanyaan->id, 'jawaban_persepsi'=>'Sangat Puas'])); ?></td>
                                <td align="center"><?php echo count(db_get_all_data('kuesioner', ['pertanyaan'=>$kuesioner_pertanyaan->id, 'jawaban_persepsi'=>'Puas'])); ?></td>
                                <td align="center"><?php echo count(db_get_all_data('kuesioner', ['pertanyaan'=>$kuesioner_pertanyaan->id, 'jawaban_persepsi'=>'Cukup Puas'])); ?></td>
                                <td align="center"><?php echo count(db_get_all_data('kuesioner', ['pertanyaan'=>$kuesioner_pertanyaan->id, 'jawaban_persepsi'=>'Tidak Puas'])); ?></td>
                                <td align="center"><?php echo count(db_get_all_data('kuesioner', ['pertanyaan'=>$kuesioner_pertanyaan->id, 'jawaban_persepsi'=>'Sangat Tidak Puas'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                     </tbody>
                  </table>
                </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
      <?php endif; ?>
    </div>
  
      <!-- /.row -->
      <?php cicool()->eventListen('dashboard_content_bottom'); ?>

</section>
<!-- /.content -->
<script>
var ctx = document.getElementById("pieChart").getContext("2d");
var data = {
labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
datasets: [{
    label: "Statistik Kuesioner",
    data: [
        <?php echo count(db_get_all_data('kuesioner', ['jawaban_persepsi'=>'Sangat Puas'])); ?>,
        <?php echo count(db_get_all_data('kuesioner', ['jawaban_persepsi'=>'Puas'])); ?>,
        <?php echo count(db_get_all_data('kuesioner', ['jawaban_persepsi'=>'Cukup Puas'])); ?>,
        <?php echo count(db_get_all_data('kuesioner', ['jawaban_persepsi'=>'Tidak Puas'])); ?>,
        <?php echo count(db_get_all_data('kuesioner', ['jawaban_persepsi'=>'Sangat Tidak Puas'])); ?>],
    backgroundColor: [
    "rgb(153, 102, 255)",
    "rgb(54, 162, 235)",
    "rgb(75, 192, 192)",
    "rgb(255, 205, 86)",
    "rgb(255, 99, 132)",
    ]
}]
};

var myBarChart = new Chart(ctx, {
type: 'pie',
data: data,
options: {
responsive: true
}
});

var ctx1 = document.getElementById("barChart").getContext("2d");
  var myChart = new Chart(ctx1, {
      type: 'bar',
      data: {
          labels: ['Tangible', 'Reliability', 'Responsiveness', 'Assurance', 'Emphaty'],
          datasets: [{
              label: 'Statistik Kuesioner',
              data: [
                <?php $this->db->from('kuesioner');
                    $this->db->join('kuesioner_pertanyaan', 'kuesioner_pertanyaan.id = kuesioner.pertanyaan');
                    $this->db->where('tipe', 1);
                    echo count($this->db->get()->result()); ?>,
                <?php $this->db->from('kuesioner');
                    $this->db->join('kuesioner_pertanyaan', 'kuesioner_pertanyaan.id = kuesioner.pertanyaan');
                    $this->db->where('tipe', 2);
                    echo count($this->db->get()->result()); ?>,
                <?php $this->db->from('kuesioner');
                    $this->db->join('kuesioner_pertanyaan', 'kuesioner_pertanyaan.id = kuesioner.pertanyaan');
                    $this->db->where('tipe', 3);
                    echo count($this->db->get()->result()); ?>,
                <?php $this->db->from('kuesioner');
                    $this->db->join('kuesioner_pertanyaan', 'kuesioner_pertanyaan.id = kuesioner.pertanyaan');
                    $this->db->where('tipe', 4);
                    echo count($this->db->get()->result()); ?>,
                <?php $this->db->from('kuesioner');
                    $this->db->join('kuesioner_pertanyaan', 'kuesioner_pertanyaan.id = kuesioner.pertanyaan');
                    $this->db->where('tipe', 5);
                    echo count($this->db->get()->result()); ?>],
              backgroundColor: [
                "rgb(153, 102, 255)",
                "rgb(54, 162, 235)",
                "rgb(75, 192, 192)",
                "rgb(255, 205, 86)",
                "rgb(255, 99, 132)",
              ],
              borderColor: [
                "rgb(153, 102, 255)",
                "rgb(54, 162, 235)",
                "rgb(75, 192, 192)",
                "rgb(255, 205, 86)",
                "rgb(255, 99, 132)",
              ],
              borderWidth: 1
          }]
      },
      options: {
        scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true
              }
          }]
        }
      }
  });
</script>