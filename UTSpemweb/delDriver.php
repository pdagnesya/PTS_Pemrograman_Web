<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
          $id_driver = $_GET['id_driver'];
          $query = "DELETE FROM driver WHERE id_driver = '$id_driver'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          header('Location: dataDriver.php?status='.$status);
      }  
  }