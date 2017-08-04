 <style scoped>
 td{
     color:grey ;
     font-size:16px;
 }
 td div {
     color:white;
     margin-left:20px;
 
 }
 </style>    
 <div  style="background-image:url(snowy-mountains.jpg);">  
     <div style="background-image:url(transparent-image.png);" align="center">
       <div style="width: 900px;border: 1px solid;background-color:dimgrey;"> 
       
                   <div style="float:left;">
                      <img src="images/<?=$user[0]['profile_pic']?>"  width="200px">
                   </div>
                   <div style="float:right">
                         <form method="post"  enctype="multipart/form-data">
                                 <input type="file" name="profile_pic">
                                 <input type="submit" value="upload"  name="upload">
                                 <input type="hidden" value="profile" name="action">
                         </form>
                   </div>
         <div style="clear:both"></div>
        </div> 
        <div   style="width: 900px;border: 1px solid;"> 
                <table>
                        <tr ><td>Name : </td></tr>
                        <tr><td><div><?=$user[0]["name"] ?></div></td></tr>
                        <tr><td>Email : </td></tr>
                        <tr><td><div><?=$user[0]["username"] ?></div></td></tr>
                        <tr><td>Mobile : </td></tr>
                        <tr><td><div><?=$user[0]["name"] ?></div> </td></tr>
                        <tr><td>Designation : </td></tr>
                        <tr><td><div><?=$user[0]["designation"] ?></div></td></tr>
                        <tr><td>Age : </td></tr>
                        <tr><td><div><?=$user[0]["name"] ?> </div>  </td></tr>
                        <tr><td> Joining Date : </td></tr>
                        <tr><td><div><?=$user[0]["joining_date"] ?></div></td></tr>
                
                </table>
         </div>
          
     </div>
</div>