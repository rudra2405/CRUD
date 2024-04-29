<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "crud2";

   $conn = mysqli_connect($servername,$username,$password,$dbname);

   if($conn){
     echo "database is connected";
     echo "<br>";
   }
   else{
    echo "not connected";
   }
?>