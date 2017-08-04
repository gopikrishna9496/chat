<?php  

   if( $_POST ){
    
        $imgname =  $_FILES["profile_pic"]["name"]  ;
        $temp_name = $_FILES["profile_pic"]["tmp_name"] ;
        $dir = "images/".$imgname ;
        $tmp_dir ="images/tmp_images/".$imgname ;
            
       if( file_exists( $dir ) ){
          echo "sorry it is already exists" ;     
       }else{   
           if( move_uploaded_file( $temp_name , $dir) ){
             echo "your file " . $imgname . "uploaded successfully" ;
             
              	if( preg_match( "/jpg/i", $dir ) ){
			$im = imagecreatefromjpeg( $dir );
		}else if( preg_match( "/gif/i", $dir ) ){
			$im = imagecreatefromgif( $dir );
		}else if( preg_match( "/png/i", $dir ) ){
			$im = imagecreatefrompng( $dir );
		}else{
			echo "<div>Error in identifying image type </div>";
			exit;
		}
                
             	$size = getimagesize( $dir );
		$original_width = $size[0];
		$original_height = $size[1];
		$dest_width = 100;
		$dest_height= 75;

		$new_im = imagecreatetruecolor( $dest_width, $dest_height );
		$new_color = imagecolorallocate( $new_im, 255,255,255);
		imagefill( $new_im, 0, 0, $new_color );
		
		//imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
		
		imagecopyresampled( $new_im, $im, 0, 0, 0, 0, 100, 75, $original_width, $original_height  );
		
		imagejpeg( $new_im, $tmp_dir, 100 );
                
            
                
             
           }else{
              echo "some error occure" ;
           }  
      
   }
       $query = "update allusers set `profile_pic` = '".$imgname."'  where id = ". $_SESSION["user_id"] ;
         $res = mysqli_query( $connection , $query );
          if(  mysqli_error( $connection  ) ){
             echo mysqli_error( $connection ) ;
             exit ;
          
          } 
 }   
?>