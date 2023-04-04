<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
    <title>UTS PEMWEB A081</title>
    <link href="style.css"  rel="stylesheet">
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
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal di-update</div>';
              }
            }
           ?>
               <h2 style="margin: 30px 0 30px 0;"></h2>
          <div class="table-responsive">
            <table border="1" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>id_driver</th>
                  <th>nama</th>
                  <th>no_sim</th>
                  <th>alamat</th>
                  <th>actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "updateDriver.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delDriver.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>

  </body>
</html>
