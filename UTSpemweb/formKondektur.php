<?php 
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_kondektur = $_POST['id_kondektur'];
      $nama = $_POST['nama'];

      //query SQL
      $query = "INSERT INTO kondektur VALUES('$id_kondektur','$nama')"; 

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

          <h2>Form KONDEKTUR</h2>
          <form action="formKondektur.php" method="POST">
            
            <div class="form-group">
              <label>Id Kondektur</label>
              <input type="text" class="form-control" placeholder="id" name="id_kondektur" required="required">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="enter nama" name="nama" required="required">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </main>

  </body>
</html>