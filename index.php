<?php
	// session_start();
	// if (!isset($_SESSION['login'])) {
	// 	header("location: login.php");
	// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="">
    <div class="container mt-4">
      <div class="card">
        <div class="card-body">
          <?php
            if (isset($_POST['submit'])) {
              $count = count($_POST['nama_barang']);
              for ($i=0; $i < $count; $i++) {
                $data_by_harga[$i] = $_POST['nama_barang'][$i].",".$_POST['harga_barang'][$i].",".$_POST['urgensi'][$i];
              }
              for ($z=0; $z < $count-1; $z++) {
                for ($i=0; $i < $count; $i++) {
                  if ($i+1 < $count) {
                    $temp_data1 = explode(",",$data_by_harga[$i]);
                    $temp_data2 = explode(",",$data_by_harga[$i+1]);
                    if ($temp_data1[1] > $temp_data2[1]) {
                      $temp = implode(",",$temp_data2);
                      $data_by_harga[$i+1] = $data_by_harga[$i];
                      $data_by_harga[$i] = $temp;
                    }
                  }
                }
              }

              for ($i=0; $i < $count; $i++) {
                $data_by_urgensi[$i] = $_POST['nama_barang'][$i].",".$_POST['harga_barang'][$i].",".$_POST['urgensi'][$i];
              }
              // BUBBLE SORT
              for ($z=0; $z < $count-1; $z++) {
                for ($i=0; $i < $count; $i++) {
                  if ($i+1 < $count) {
                    $temp_data1 = explode(",",$data_by_urgensi[$i]);
                    $temp_data2 = explode(",",$data_by_urgensi[$i+1]);
                    if ($temp_data1[2] < $temp_data2[2]) {
                      $temp = implode(",",$temp_data2);
                      $data_by_urgensi[$i+1] = $data_by_urgensi[$i];
                      $data_by_urgensi[$i] = $temp;
                    }
                  }
                }
              }


              // for ($i=0; $i < $count; $i++) {
              //   $nama = $_POST['nama_barang'][$i];
              //   $harga1 = $_POST['harga_barang'][$i];
              //   $urgensi1 = $_POST['urgensi'][$i];
              //   for ($i1=0; $i1 < $count; $i1++) {
              //     $temp_data_by_harga = explode(",",$data_by_harga[$i1]);
              //     if ($temp_data_by_harga[0] == $nama) {
              //       $harga = ($i1+1)/2;
              //       break;
              //     }
              //   }
              //   for ($i2=0; $i2 < $count; $i2++) {
              //     $temp_data_by_urgensi = explode(",",$data_by_urgensi[$i2]);
              //     if ($temp_data_by_urgensi[0] == $nama) {
              //       $urgensi = ($i2+1);
              //       break;
              //     }
              //   }
              //   $nilai = $harga+$urgensi;
              //   $data_nilai[$i] = $nama.",".$nilai.",".$harga1.",".$urgensi1;
              // }

              for ($i=0; $i < $count; $i++) {
                $nama = $_POST['nama_barang'][$i];
                $harga1 = $_POST['harga_barang'][$i];
                $urgensi1 = $_POST['urgensi'][$i];
                $data_semua[$i] = $nama.",".$harga1.",".$urgensi1;
              }

              // BUBBLE SORT
              for ($z=0; $z < $count-1; $z++) {
                for ($i=0; $i < $count; $i++) {
                  if ($i+1 < $count) {
                    $temp_data1 = explode(",",$data_semua[$i]);
                    $temp_data2 = explode(",",$data_semua[$i+1]);
                    if ($temp_data1[2] < $temp_data2[2]) {
                      $temp = implode(",",$temp_data2);
                      $data_semua[$i+1] = $data_semua[$i];
                      $data_semua[$i] = $temp;
                    }elseif ($temp_data1[2] == $temp_data2[2]) {
                      if ($temp_data1[1] > $temp_data2[1]) {
                        $temp = implode(",",$temp_data2);
                        $data_semua[$i+1] = $data_semua[$i];
                        $data_semua[$i] = $temp;
                      }
                    }
                  }
                }
              }
              $data_nilai = $data_semua;

              // BUBBLE SORT
              // for ($z=0; $z < $count-1; $z++) {
              //   for ($i=0; $i < $count; $i++) {
              //     if ($i+1 < $count) {
              //       $temp_data1 = explode(",",$data_nilai[$i]);
              //       $temp_data2 = explode(",",$data_nilai[$i+1]);
              //       if ($temp_data1[1] > $temp_data2[1]) {
              //         $temp = implode(",",$temp_data2);
              //         $data_nilai[$i+1] = $data_nilai[$i];
              //         $data_nilai[$i] = $temp;
              //       }
              //     }
              //   }
              // }
              // echo "<pre>";
              // print_r($data_nilai);
              // echo "</pre>";
              for ($i=0; $i < $count; $i++) {
                $temp111 = explode(",",$data_nilai[$i]);
                $data_nama_chart[$i] = $temp111[0];
                $data_harga_chart[$i] = $temp111[1];
                $data_urgensi_chart[$i] = $temp111[2];
              }
              $saran = explode(",",$data_nilai[0]);
              ?>
              <center><p class="h4">Berdasarkan urgensi dan harga termurah, saya menyarankan anda membeli item "<?= $saran[0] ?>"</p></center>
              <?php
              echo "<center><h4>Raw Data</h4></center>";
              echo '<table class="table">';
              echo "<tr>";
              echo "<th>No.</th>";
              echo "<th>Nama Barang</th>";
              echo "<th>Harga Barang</th>";
              echo "<th>Urgensi</th>";
              echo "</tr>";
              for ($i=0; $i < $count; $i++) {
                // $_POST['harga_barang'][$i] = rand();
                // $_POST['urgensi'][$i] = rand(1,5);
          ?>
              <tr>
                <td><?= $i+1 ?></td>
                <td><?= $_POST['nama_barang'][$i] ?></td>
                <td><?= $_POST['harga_barang'][$i] ?></td>
                <td><?= $_POST['urgensi'][$i] ?></td>
              </tr>
          <?php
              }
              echo "</table>";
              echo "<br><br>";
              echo "<center><h4>SORT BY Harga Termurah</h4></center>";
              echo '<table class="table">';
              echo "<tr>";
              echo "<th>No.</th>";
              echo "<th>Nama Barang</th>";
              echo "<th>Harga Barang</th>";
              echo "<th>Urgensi</th>";
              echo "</tr>";
              for ($i=0; $i < $count; $i++) {
                $data_by_harga[$i] = explode(",",$data_by_harga[$i]);
          ?>
              <tr>
                <td><?= $i+1 ?></td>
                <td><?= $data_by_harga[$i][0] ?></td>
                <td><?= $data_by_harga[$i][1] ?></td>
                <td><?= $data_by_harga[$i][2] ?></td>
              </tr>
          <?php
              }
              echo "</table>";
          ?>

          <br><br>
          <div class="chart">
            <canvas id="chart_harga" style="min-height: auto; height: 70vh; max-height: auto; max-width: auto;"></canvas>
          </div>
          <?php

              echo "<br><br>";
              echo "<center><h4>SORT BY Terurgent</h4></center>";
              echo '<table class="table">';
              echo "<tr>";
              echo "<th>No.</th>";
              echo "<th>Nama Barang</th>";
              echo "<th>Harga Barang</th>";
              echo "<th>Urgensi</th>";
              echo "</tr>";
              for ($i=0; $i < $count; $i++) {
                $data_by_urgensi[$i] = explode(",",$data_by_urgensi[$i]);
              ?>
              <tr>
                <td><?= $i+1 ?></td>
                <td><?= $data_by_urgensi[$i][0] ?></td>
                <td><?= $data_by_urgensi[$i][1] ?></td>
                <td><?= $data_by_urgensi[$i][2] ?></td>
              </tr>
              <?php
              }
              echo "</table>";
          ?>

          <br><br>
          <div class="chart">
            <canvas id="chart_urgensi" style="min-height: auto; height: 70vh; max-height: auto; max-width: auto;"></canvas>
          </div>
          <br><br>
          <div class="d-flex justify-content-between">
            <a href="./" class="btn btn-primary">Bandingkan yang Lain</a>
            <a href="./" class="btn btn-danger">Export PDF</a>
            <a href="./" class="btn btn-success">Export Excel</a>
          </div>
          <?php
            }else{
          ?>
          <button type="button" name="button" class="btn btn-primary" id="add_item">Tambah Item</button>
          <br><br>
          <form class="" action="" method="post">
            <div class="form-group">
              <div class="isi">
                <table class="table" id="tbl_input">
                  <thead>
                    <tr>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Harga Barang</th>
                      <th scope="col">Urgensi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="isi">
                  </tbody>
                </table>
              </div>
              <br><br>
              <input type="submit" class="btn btn-primary float-left" name="submit" value="Submit">
            </div>
          </form>
        <?php } ?>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js" integrity="sha512-CAv0l04Voko2LIdaPmkvGjH3jLsH+pmTXKFoyh5TIimAME93KjejeP9j7wSeSRXqXForv73KUZGJMn8/P98Ifg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php if (isset($_POST['submit'])): ?>
    <script>
      $(function () {
        var areaChartData = {
          labels  : <?= json_encode($data_nama_chart) ?>,
          datasets: [
            {
              label               : 'Harga',
              backgroundColor     : 'green',
              borderColor         : 'green',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : <?= json_encode($data_harga_chart) ?>
            },
          ]
        }
        var barChartCanvas = $('#chart_harga').get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })





        var areaChartData = {
          labels  : <?= json_encode($data_nama_chart) ?>,
          datasets: [
            {
              label               : 'Urgensi',
              backgroundColor     : 'red',
              borderColor         : 'red',
              pointRadius         : false,
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : <?= json_encode($data_urgensi_chart) ?>
            },
          ]
        }
        var barChartCanvas = $('#chart_urgensi').get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })
      });
    </script>
    <?php endif; ?>
    <script>
      var jumlah_row = 0;
  		$("#add_item").on("click", function(){
        if (jumlah_row > 9) {
          alert('Maksimal 10 Barang')
        }else {
          $("#isi").append('<tr><td><input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang[]"></td><td><input type="number" min="0" class="form-control" placeholder="Harga Barang" name="harga_barang[]"></td><td><input type="range" min="1" max="5" class="form-control-range mt-2" value="1" name="urgensi[]"></td><td><button type="button" class="btn btn-danger" onclick="removeRowDoc(this)">Hapus</button></td></tr>');
          jumlah_row += 1;
        }
  		});

      function removeRowDoc(oButton) {
          var empTab = document.getElementById('tbl_input');
          empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.
      }
  	</script>
  </body>
</html>
