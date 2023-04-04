<?php 
  include ('conn.php');
  $query = "SELECT * FROM driver";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    $status = 'ok';
  } else {
    $status = 'err';
  }
?>

<div>
        <h4>PEMROGRAMAN WEB A081  <br> Putri Dwi Agnesya (21081010142)</h4>
    </div>
    <div>
        <ul>
            <li class="nav">
              <a class="nav-link active" href="<?php echo "home.php"; ?>">Data Bus</a>
            </li>
            <li class="nav">
              <a class="nav-link" href="formBus.php">Tambah Data Bus</a>
            </li>
            <li class="navv">
              <a class="nav-link" href="dataDriver.php">Data Driver</a>
            </li>
            <li class="nav">
              <a class="nav-link " href="<?php echo "formDriver.php"; ?>">Tambah Data Driver</a>
            </li>
            <li class="nav">
              <a class="nav-link" href="dataKondektur.php">Data Kondektur</a>
            </li>
            <li class="nav">
              <a class="nav-link " href="<?php echo "formKondektur.php"; ?>">Tambah Data Kondektur</a>
            </li>
            <li class="nav">
              <a class="nav-link" href="dataTransupn.php">Data Trans UPN</a>
            </li>
            <li class="nav">
              <a class="nav-link " href="<?php echo "formTransupn.php"; ?>">Tambah Data Trans UPN</a>
            </li>
            <li class="nav">
              <a class="nav-link active" href="<?php echo "gajiKondektur.php"; ?>">Gaji Kondektur</a>
            </li>
            <li class="nav">
              <a class="nav-link active" href="<?php echo "gajiDriver.php"; ?>">Gaji Driver</a>
            </li>
        </ul>
    </div>

<main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal di-update</div>';
              }
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UTS PEMWEB A081</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>GAJI DRIVER</h2>
    gaji per km = 3000
    <!-- filter -->
    <form action="" method="GET">
                <label for="">Bulan</label>
                <select name="bulan" id="bulan" required>
                    <option value="">Pilih</option>
                    <option value="january">Januari</option>
                    <option value="february">Februari</option>
                    <option value="maret">Maret</option>
                    <option value="april">April</option>
                    <option value="may">Mei</option>
                    <option value="june">Juni</option>
                    <option value="july">Juli</option>
                    <option value="august">Agustus</option>
                    <option value="september">September</option>
                    <option value="october">Oktober</option>
                    <option value="november">November</option>
                    <option value="december">Desember</option>
                </select>
                <button type="submit">Pilih</button>
            </form>
    <div >
        <table border="1" >
          <thead>
            <tr>
              <th>ID Driver</th>
              <th>Nama Driver</th>
              <th>Total KM</th>
              <th>Total Gaji</th>
            </tr>
          </thead>
          <tbody>
          <?php while($data = mysqli_fetch_array($result)): ?>
                    <tr>
                    <?php
                        if(isset($_GET['bulan'])){
                            $bulan = $_GET['bulan'];
                            $query = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE id_driver = $data[id_driver] AND monthname(tanggal) = '$bulan' GROUP BY id_driver";
                        }else{
                            $query = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE id_driver = $data[id_driver] GROUP BY id_driver";
                        }
                        
                        $result_KM = mysqli_query(connection(), $query);
                        $dataDriver = mysqli_fetch_assoc($result_KM);
                        if($dataDriver === NULL) {
                            $total_km = 0;
                        } else {
                            $total_km = $dataDriver['total_km'];
                        }
                        $driver_salarykm = 3000;
                        $driver_salary = $total_km * $driver_salarykm;
                        ?>
                        <td><?php echo $data['id_driver'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $total_km; ?></td>
                        <td><?php echo "Rp. ", $driver_salary; ?></td>
                    </tr>
                    <?php endwhile; ?>

          </tbody>
</body>
</html>