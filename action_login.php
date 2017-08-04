<?php 

     echo $query = "select * from  allusers where
      username = '" . $_POST['email'] ."' and 
      password = '". $_POST['pass']."'  ";
       $res = mysqli_query( $connection , $query );
      if(mysqli_error( $connection ) ) {
         echo "<div style='color:red;'>  wrong query   " .$query ."</div>"; 
      }             
      if( mysqli_num_rows( $res )){
           $row = mysqli_fetch_assoc( $res );
           $_SESSION['user_name'] = $row['user_name'];
           $_SESSION['name']  = $row['name'];
           $_SESSION['user_id'] = $row['id'];
        
        $query2 = "update allusers set main = 1 where id = " .$row['id']  ;
        mysqli_query( $connection , $query2 );  
               
      }else{
      
         header("Location: index.php?event=username or password is wrong");
         exit;
      }
      header("Location: index.php?go=show");
      exit;                                                                                                    
?>