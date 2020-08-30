<?php
      $server = "localhost";
      $user = "root";
      $pass = "";
      $db = "db_iform";

      $con = mysqli_connect($server,$user,$pass,$db);

      if(!$con){
            die("Connection failed!..".mysqli_connect_error($con));
      }
?>