<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <title> Facebook </title>
  <style>
    body{
      font-family:serif ;
      font-size:11px;
      padding:0px;
      margin:0px;
     }
  .add_friend{
     padding: 20px 38px;  
     font-size: 17px;
     border-bottom :1px solid whitesmoke;
  }
  .add_friend input{
  border: 1px solid whitesmoke;
    height: 23px;
    width: 92px;
    cursor:pointer;
  }
  .chating_div{
  height:500px;
  width:100%;
  border:1px solid;
  overflow-y:scroll;
  overflow-x:hidden;
  }
  .status-circle {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    behavior: url(PIE.htc);
    float:right;
    margin-right:18px;
    margin-top:6px;
  }
  
  .user_message{
   float:right;
   background-color:white;
   padding:4px 25px;
   position:relative;
   box-shadow:0px 1px 7px 2px lightgray ;
   margin-right:20px;
   min-width:200px;
   max-width:350px;
   
  }
.user_message:after, .user_message:before {
	left: 100%;
	top: 54%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}
.user_message:before {
	border-color: rgba(194, 225, 245, 0);
	border-left-color: lavender;
	border-width: 10px;
	margin-top: -11px;
}
  .other_message{
     float:left;
     margin-left:20px;
     background-color:lightseagreen;
     color:white;
     padding:4px 25px;
     box-shadow:0px 1px 6px 3px lightgray;
     border-radius:3px ;
     position:relative;
     min-width:200px;
   max-width:350px;
  }

  .other_message:after, .other_message:before {
	right: 100%;
	top: 54%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}


.other_message:before {
    border-color: rgba(194, 225, 245, 0);
    border-right-color: lightseagreen;
    border-width: 10px;
    margin-top: -11px;
}
#display_friends::-webkit-scrollbar , .chating_block::-webkit-scrollbar {
    width: 5px;
}
#display_friends::-webkit-scrollbar-thumb{
    -webkit-border-radius: 10px;
    border-radius: 50px;
    background:whitesmoke; 
 }
  .chating_block::-webkit-scrollbar-thumb{
     -webkit-border-radius: 10px;
    border-radius: 50px;
    background:grey; 
  }
 #display_friends::-webkit-scrollbar-thumb:window-inactive , .chating_block::-webkit-scrollbar-thumb:window-inactive {
	background: rgba(255,0,0,0.4); 
}   
 #display_friends::-webkit-scrollbar-track, .chating_block::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}  

.chating_block {
  overflow-x :hidden;
  overflow-y :scroll ;
   max-height:367px; 

}
  </style>                                               
  
  <script>

  function add_new_friend( id ){
   friend_id = document.getElementById("new_friend_id").value ;
   friends_list = document.getElementById("friends_list").value;
       $.ajax({
                url:"add_friend.php",
                type:'POST',
                data:{"id":id,"friends":friends_list},
                success:function(res){  
                 document.getElementById("add_friend_"+id ).style.display = "none";
                 document.getElementById("friends_list").value = res ;
                   //console.log(res );
                  console.log( "new friends : " + res );
                  display_friends_list( res );
                   
                    }
                });
                 
 }
                                         
                       
 
  var dont_confirm_leave = 0;                                         //this code execute when user close the browser tab .
var leave_message = 'You sure you want to leave?'            
function goodbye(e)                                         
{                                                   
   if(dont_confirm_leave ==1){ 
          if(!e) e = window.event;
               //e.cancelBubble is supported by IE - this will kill the bubbling process.
                e.cancelBubble = true;
                e.returnValue = leave_message;
                //e.stopPropagation works in Firefox.
          if (e.stopPropagation) {
                e.stopPropagation();
                e.preventDefault();
            }
        $.ajax({
                url:"action_logout.php",
                type:'POST',
                data:{"id":0},
                success:function(res){ console.log( "session was removed " ) }
                });
  //return works for Chrome and Safari
   return leave_message;
    }
} 
//window.onbeforeunload=goodbye;



function show_add_form(){                   
       $("#add_form").toggle();
}
function add_group(){
   var name = document.getElementById("groupname").value;
   if(  name.trim() != "" ){
         $.ajax({
                url:"add_group.php",
                type:'POST',
                data:{"groupname": name },
                success:function(res){
                   console.log( " group added " +res );
                   document.getElementById("add_form").style.display = "none"  ;
                    get_friends_and_groups() ;
                }
        });
    }

}

function user_add_to_group( gi , ui ){
        $.ajax({
                url:"user_add_to_group.php",
                type:'POST',
                data:{"groupid":gi,"userid":ui },
                success:function(res){
                   console.log( " user added to group  " +res  );
                   $("#show_all_users").css("display","none");
                }
        })
    

}

function add_user_to_group(){
 users_data_for_group(); 
   $("#show_all_users").toggle();
  
}

  </script>  
  </head>
  <body >
   <div style="background-color:black;width:100%;height:65px;"> 
     <div style="float:left;margin-left:60px;margin-top:3px;"> <div style="font-size:42px;color:aqua"> C<span style="font-size:25px;color:whitesmoke">hat </span>O<span style="font-size:20px;color:whitesmoke"> n </span></div></div>
       <table align="right" style="border-spacing:13px;margin-left:120px;color:white;">
       <tr> 
          <?PHP 
           $ses = false ;
            if( $_SESSION['user_id'] ){
               echo "<td><a href='?go=profile'>".$user[0]['name']."</a.></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href='javascript:show_add_form()' > Add group</a>" ;
               $ses = true;
               
            }
          ?>
       
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Menu </td><td> About Us</td><td><?=( $ses == true ? "<a href='?action=logout' > Sign out</a>" : " "  ) ?></td></tr>
       </table>  
       
       <div  id="add_form"  style="display:none;position:absolute;right:140px;top:32px;background-color:whitesmoke;padding:17px;z-index:2;border:1px solid">
        <table>
        <tr><td> Group name : </td><td><input type="text" id="groupname" > </td></tr>
       <tr><td> <input type="submit"  onclick="add_group()"></td></tr>
         </table>
       </div>     
   </div>
                                                                
