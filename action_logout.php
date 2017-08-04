<?php   
   include("config.php");
     if( $_SESSION['user_id'] ){
   $query = "update allusers set  main = 0 where id = ". $_SESSION['user_id'] ;
   mysqli_query( $connection, $query );
   session_destroy(); 
    header("Location: ?logout");  
    }
    safsdaffsa
                 


?>