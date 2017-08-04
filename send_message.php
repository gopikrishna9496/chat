
  <?php
  include("config.php");
                  
    if( $_POST ){           
        $userid = $_SESSION['user_id'] ;
        $friendid = $_POST['friend_id'] ;
        $datetime = date('Y-m-d H:i:s') ;
        echo $_POST['group'] ; 
      if( $_POST['group'] == "no" ){
         
           if( $_POST['message'] != "" ){   

                          
               $query = "insert into chat_history ( `user_id`,`friend_id`,message, datetime  ) values 
               ( " .$userid.", ".$friendid." , '".mysqli_escape_string( $connection , $_POST['message'] ) ."' , '".$datetime."' )";
              $res = mysqli_query( $connection , $query );                                                                          
       echo  $query ;
          }                  
     } else if( $_POST['group'] == "yes") {
     
     
       $query = "INSERT INTO `group_chat`(`group_id`, `user_id`, `message`, `datetime`) VALUES 
       ('".mysqli_escape_string( $connection , $friendid )."', 
        ".$userid." ,
        '".mysqli_escape_string( $connection , $_POST['message'] )."' ,
        '".$datetime."' ) " ;
        mysqli_query( $connection , $query );
     }
                                                                                                                                             
  }   
   mysqli_close( $connection );
 ?>