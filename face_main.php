<div  style="width:100%;height:auto;">

      <?php     
        if( $pagename == "" ){
           include("page_login.php");
        }else{
          include("page_".$pagename.".php");
        }
        
      if( $_GET['event'] ){
           echo "<div  style='color:red;font-size:16px;margin-bottom:20px;' align=center>".$_GET['event'] ."</p>";
      }
      ?>

</div>