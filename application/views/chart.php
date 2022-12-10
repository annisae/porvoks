<?php
    require 'assets\fusioncharts\integrations\php\samples\includes\fusioncharts.php';
?>
  <main class="flex-shrink-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center mt-5">Chart Data Mahasiswa</h2>
          <div class="card mt-5">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="text-lef">
                  Chart Data Mahasiswa
                </div>
                <div class="text-right">
                  <a href="<?=site_url('/')?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <?php if($jumlah_mahasiswa != '0') {?>
                    <?php 
                    $mahasiswachart = $this->db->query('SELECT *, COUNT(id) AS jml_mahasiswa FROM mahasiswa GROUP BY(nama_kampus)')->result_array();

                    if ($mahasiswachart) {
                      $arrData = array(
                        "chart" => array(
                          "caption" => "Jumlah Mahasiswa Berdasarkan Kampusnya",
                          "showValues" => "0",
                          "theme" => "fusion"
                        )
                      );

                      $arrData["data"] = array();

                      foreach($mahasiswachart as $mahasiswachart) {
                        array_push($arrData["data"], array(
                          "label" => ucfirst($mahasiswachart['nama_kampus']),
                          "value" => $mahasiswachart['jml_mahasiswa']
                        )
                      );
                      }

                      $jsonEncodedData = json_encode($arrData);

                      $columnChart = new FusionCharts("column2D", "mahasiswa" , 500, 400, "chart-2", "json", $jsonEncodedData);

                      $columnChart->render();
                    }
                    ?>
                    <div class="row table-responsive">
                      <div class="col-lg-6 offset-lg-3">
                        <div id="chart-2"></div>
                      </div>
                    </div>
                  <?php } else { ?>
                    <div class="col-lg-12 text-center">
                      <h6>Tidak ada data mahasiswa di sistem, maka grafik tidak dapat ditampilkan</h6>
                    </div>
                  <?php } ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>