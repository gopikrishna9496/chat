<?php 
   include("config.php");
  if( $_POST ){
   $query = "select users_id from groups_info where  group_id = '" . $_POST["groupid"]. "'  ";
   $res = mysqli_query( $connection , $query );
   $row = mysqli_fetch_assoc( $res );
   $userlist =  $row['users_id'] ;
   
   if( $userlist == "" ){
        $userlist = "##".$_POST["userid"]  ;
   }else{
       $userlist = $userlist."##".$_POST["userid"]  ;
   }
                     
   $query2 = "update  groups_info set `users_id` = '".$userlist."'  where  `group_id` = '" . $_POST["groupid"]."' " ;
   mysqli_query( $connection , $query2 ); 
   if( mysqli_error( $connection ) ){
      echo  "error at user_add_to_group page" . mysqli_error( $connection )  ;
   }
  }

?>