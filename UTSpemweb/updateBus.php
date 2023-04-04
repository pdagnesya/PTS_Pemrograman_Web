<?php
  include ('conn.php');

  $status = '';
  $result = '';

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
      //query SQL
      $sql = "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus = $id_bus";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: home.php?status='.$status); 
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB A081</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
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

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Bus</h2>
          <form action="updateBus.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="ID" name="id_bus" value="<?php echo $data['id_bus'];?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Plat</label>
              <input type="text" class="form-control" placeholder="enter plat" name="plat" required="required">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" placeholder="status"  name="status" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>

  </body>
</html>