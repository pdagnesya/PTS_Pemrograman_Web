<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn = $_GET['id_trans_upn'];
          $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          header('Location: dataTransupn.php?status='.$status);
      }  
  }