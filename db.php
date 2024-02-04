<?php

   $con = mysqli_connect("localhost", "root", "", "musicshow");

   if(!$con) {
      die("Connection error: " . mysqli_connect_error());
   }

?>
