
  <?php
  include("config.php");
   if( $_POST ){   
     if( $_POST['id'] != '0' ){
        if( $_POST['friends'] == '' ){
            $friends = "";
        }else{
           $friends = $_POST['friends'];
        }      
      $add_friends = $friends. "##". $_POST['id'] ;
        $query = "update allusers set friends = '".$add_friends."'  where id = ".$_SESSION['user_id']  ;
         mysqli_query( $connection , $query );
                if( mysqli_error( $connection )){
                     echo "<div>DB error <br>". mysqli_error( $connection ) ."</div>";
                }
    } 
     
       $query = "select friends from allusers  where  id = " .$_SESSION['user_id'] ;
       $res = mysqli_query( $connection , $query );
       $row = mysqli_fetch_assoc( $res );
       $your_friends =  $row['friends'];
       
          
       $query2 = "select `group_id`,`group_name` from  `groups_info`  where `users_id` like '%".$_SESSION['user_id']."%'  "  ;
       $ress = mysqli_query( $connection , $query2 );
       $groups = "";
       while(   $roww = mysqli_fetch_assoc( $ress ) ){
              $your_group =   $roww['group_id'] ;
              if( $your_group ){
                  $groups = "##" . $your_group  . $groups;
              }
       }
          echo  $your_friends . $groups ;
     
   
   }
   
   mysqli_close( $connection );
 ?>