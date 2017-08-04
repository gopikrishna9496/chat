<?php  

 if( $_GET['go'] == "" ){
            if(  !$_SESSION['user_id']){                
                    $pagename = "login";  
                } else{                
                     $pagename = "show";
                  }
   }else{
        if( !isset( $_SESSION['user_id'] ) ){
               header("Location: ?logout" ) ; 
               exit;
              }
        
		$pagename = $_GET['go'];              
    }

   if( $_REQUEST['action'] ){  
       $page = "action_". $_REQUEST['action'].".php";
      
    }
     if( isset($page) ){
        include($page);
    }
   $query = "select * from  allusers " ;
   $res = mysqli_query( $connection , $query );
   while( $row = mysqli_fetch_assoc( $res ) ){
      $users_data[]  =  $row ;
      if( $row['id']  == $_SESSION['user_id'] ){
          $user[] = $row ;
      }
      
   }
   
   $query2 = "select * from  `groups_info` " ;
      $ress = mysqli_query( $connection , $query2 );
   while( $roww = mysqli_fetch_assoc( $ress ) ){
      $groups_data[]  =  $roww;
    }


  $user_id = $_SESSION['user_id']  ;
  $date = date("Y-m-d") ;

?>
