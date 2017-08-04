<?php 

    include("config.php");
     
    if( $_POST ){
      
      $friend_id = str_replace("##", "," ,  $_POST['friends_id'] )  ;
      $friend_id = substr($friend_id, 1);
       $date = date('Y-m-d H:i');

        $query  = "select  id,message,datetime,user_id  from  `chat_history`  where  `user_id` in ('".$friend_id."','".$_SESSION['user_id']."')  and `friend_id` in ('".$friend_id."','".$_SESSION['user_id']."')  and datetime like '%".$date."%'  " ;
        $ress = mysqli_query( $connection , $query );
        echo mysqli_error( $connection ) ;
        if(mysqli_num_rows( $ress )){
             while( $row = mysqli_fetch_assoc( $ress ) ){            
                     $new_message[] =  $row ;            
             }
        }else{
          $new_message = "no new messages" ;
        }
        
        echo json_encode( array( "new_messages"=>$new_message ) ) ;
    }  


?>