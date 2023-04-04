<?php 
  include ('conn.php'); 
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
              <a class="nav-link " href="<?php echo "gajiKondektur.php"; ?>">Gaji Kondektur</a>
            </li>
            <li class="nav">
              <a class="nav-link " href="<?php echo "gajiDriver.php"; ?>">Gaji Driver</a>
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
    <h2>DATA BUS</h2>
    <!-- filter -->
            <form action="" method="GET">
                <label for="">Status</label>
                <select name="status_bus" id="status_bus" required>
                    <option value="">Pilih</option>
                    <option value="1">aktif</option>
                    <option value="2">cadangan</option>
                    <option value="0">perbaikan</option>
                </select>
                <button type="submit">Pilih</button>
            </form>
    <div>
        <table border="1" >
          <thead>
            <tr>
              <th>id_bus</th>
              <th>plat</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(isset($_GET['status_bus'])){
                $status_bus = $_GET['status_bus'];
                $query = "SELECT * FROM bus WHERE status = '$status_bus'";
            }else{
                $query = "SELECT * FROM bus";
            }
              $result = mysqli_query(connection(),$query);
             ?>
             <?php while($data = mysqli_fetch_array($result)): ?>
              <tr >
                <td class="id_bus"><?php echo $data['id_bus'];  ?></td>
                <td class="plat"><?php echo $data['plat'];  ?></td>
                <td class="statusBus_<?php 
                    if ($data['status'] == 1){ echo 'aktif';} 
                    elseif ($data['status'] == 2) { echo 'cadangan';} 
                    elseif ($data['status'] == 0){ echo 'perbaikan';} ?>">
                    <?php 
                    echo $data['status'];  ?></td>
                <td>
                  <a href="<?php echo "updateBus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                  &nbsp;&nbsp;
                  <a href="<?php echo "delBus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                </td>
              </tr>
             <?php endwhile ?>
          </tbody>
        </table>
    </div>
    </main>
  </body>
</html>
