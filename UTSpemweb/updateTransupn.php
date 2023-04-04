<?php
  include ('conn.php');

  $status = '';
  $result = '';

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
      //query SQL
      $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn = '$id_trans_upn'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      header('Location: dataTransupn.php?status='.$status); 
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB A081</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>

  <div><h4>PEMROGRAMAN WEB A081  <br> Putri Dwi Agnesya (21081010142)</h4></div>
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

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Trans UPN</h2>
          <form action="updateTransupn.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <div class="form-group">
              <label>ID Trans UPN</label>
              <input type="text" class="form-control" placeholder="id" name="id_trans_upn" required="required">
            </div>
            <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="id" name="id_kondektur" required="required">
            </div>
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="id"  name="id_bus" required="required">
            </div>
            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="id"  name="id_driver" required="required">
            </div>
            <div class="form-group">
              <label>Jumlah km</label>
              <input type="text" class="form-control" placeholder="angka"  name="jumlah_km" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" placeholder="tanggal"  name="tanggal" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>

  </body>
</html>