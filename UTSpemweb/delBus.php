<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus = $_GET['id_bus'];
          $query = "DELETE FROM bus WHERE id_bus = '$id_bus'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          header('Location: home.php?status='.$status);
      }  
  }