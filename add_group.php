<?php  
   include("config.php") ;
   if( $_POST ){
   $query = "select id from groups_info order by id desc " ;
   $res = mysqli_query( $connection , $query );
   if(mysqli_num_rows( $res ) ){
     $row = mysqli_fetch_assoc( $res);
     $id = $row['id'] ;
      $nextid = $id+1 ;
     
   }else{
      $nextid = 1 ;
   }
   
      $admin = $_SESSION['user_id'] ;
     $query2 = "insert into groups_info (`group_name`,`group_id`,`admin_id`,`users_id`) values 
     ('". mysqli_escape_string( $connection , $_POST['groupname'] )."',
     'g".$nextid."', ".$admin." , '##".$admin ."' )   " ;                                   
      mysqli_query( $connection , $query2 ) ;
   
   }


?>