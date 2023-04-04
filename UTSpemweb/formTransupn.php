<?php 
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_trans_upn = $_POST['id_trans_upn'];
      $id_kondektur = $_POST['id_kondektur'];
      $id_bus = $_POST['id_bus'];
      $id_driver = $_POST['id_driver'];
      $jumlah_km = $_POST['jumlah_km'];
      $tanggal = $_POST['tanggal'];

      //query SQL
      $query = "INSERT INTO trans_upn VALUES('$id_trans_upn','$id_kondektur','$id_bus', '$id_driver', '$jumlah_km', '$tanggal')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
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
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data  berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data  gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Trans UPN</h2>
          <form action="formTransupn.php" method="POST">
            
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

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </main>

  </body>
</html>