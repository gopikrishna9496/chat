<?php  
include("config.php");

  $userid = $_SESSION['user_id'] ;
  $friendid = $_POST['friend_id'] ;
  
             if( $_POST['lastid']  != '0' ){
                   $filter = " and id >= " . $_POST['lastid'] ;
             }else{
                 $filter =  " order by datetime  limit 0 , 20 "   ;
             }   
       if( $_POST["group"] == "no" ){      
         $con = 0 ;                                                                                                                                                                                 
         $query2  = "select  id,message,datetime,user_id  from  `chat_history`  where  `user_id` in ('".$friendid."','".$userid."')  and `friend_id` in ('".$friendid."','".$userid."')  ". $filter ."   " ;
         $ress = mysqli_query( $connection , $query2 );
         echo mysqli_error( $connection ) ;
   
         $messages = array();
        while( $row = mysqli_fetch_assoc( $ress ) ){
                        $messages[] = $row;
                
                   $message_history[] = $row["message"] ;
                  // $date_time[] =  $row['datetime'] ;
                   $user_id[] = $row['user_id']  ;
                   $id[] = $row['id']  ;
                   $last = $row['id']; 
          }
   
        
 //   echo json_encode( array( "messages"=>$message_history, "message_date"=>$date_time , "user"=>$user_id  ,"id"=>$id ) );
  // echo "\n\n";
        
             
     }else if( $_POST["group"] == "yes" ){
         
     
          $query = "SELECT * FROM `group_chat` WHERE  `group_id` = '".$friendid."'  ". $filter ."  " ; 
          $res = mysqli_query( $connection , $query );
          echo mysqli_error( $connection ) ;
          while( $row = mysqli_fetch_assoc( $res ) ){         
             $messages[] = $row ;   
             $last = $row['id'] ;       
          } 
     
 
     
     }
     
          echo str_replace( "},", "},\n", json_encode( array( "messages"=>$messages ,"last_id"=>$last ) ) );

?>