<?php 

function connection() {
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "transupn";
   $dbPort = "3307";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass,$dbName,$dbPort);

   if(! $conn) {
	die('Koneksi gagal: ' . mysqli_error());
   }
   return $conn;
}