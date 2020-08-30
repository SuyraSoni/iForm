<?php
      session_start();
      echo "loggin you out, please wait...";
      session_unset();
      session_destroy();
      header('location:../index.php');
?>