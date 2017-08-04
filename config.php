<?php  
   session_start();
   error_reporting( E_ALL & ~E_NOTICE );

  $connection = mysqli_connect("localhost","root","","gopi");
  if( !$connection ){
        echo "<div> DB Down </div>" ;
   }

   
?>