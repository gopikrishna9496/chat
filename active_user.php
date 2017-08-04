<?php 
include("config.php") ;

  if( $_POST ){
  
      $friend_id = explode("##",  $_POST['friends_list'] )  ;
       
     $friend_id =  implode( "', '", $friend_id );  
     $friend_id = substr( $friend_id , 2 ); 
       
     $query = "select main,id from allusers where id in ('".$friend_id."') ";
     $res = mysqli_query( $connection , $query );
     
     while( $row = mysqli_fetch_assoc( $res ) ){ 
          $users_active_list[] = $row ;
      }     
          
        echo  json_encode( array( "active_list" =>$users_active_list ) ) ;  
        exit;
   }
?>