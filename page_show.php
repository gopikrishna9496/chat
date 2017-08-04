 <div style="background:url(snowy-mountains.jpg)">
     <div  id="display_friends"  style="width:23%;height:508px;background:rgba(0, 0, 0, 0) url(transparent-image.png) repeat scroll 0 0;color:white;float:left;overflow-y:scroll !important;"> 
        <script>
                dont_confirm_leave  = 1 ;
                var user_friends_data = [] ;  
                var data_of_groups  = [] ;
                data_of_groups = <?=json_encode( $groups_data ) ?>  ;
                var user_friends = "<?=trim($user[0]['friends'] ) ?>" ;
                var user_profile_pic = "<?=$user[0]['profile_pic'] ?>" ;
                var today_date = "<?=$date ?>";
                var user_friends_data = <?=json_encode( $users_data )?>;
                var userid = <?=$user_id ?> ; 
                var display_div = document.getElementById("display_friends") ; 
                get_friends_and_groups() ;
                
       function get_friends_and_groups(){              
              $.ajax({                                          
                        url:"add_friend.php",
                        type:'POST',
                        data:{"id":0},
                        success:function(res){
                          console.log( "get u r friends  : " + res );
                            active_user = res ;
                            display_friends_list( res );   
                            show_active_list(res );                                      
                            }
                });
        }    
    function display_friends_list( res ){                        
                var  friends_list = res.split("##"); 
                     for( i=1;i<=friends_list.length ;i++){        
                           friend_id =  friends_list[i]  
                          if( document.getElementById("my_friend_" + friend_id ) ){
                             
                           }else{      
                                        friend_name = "" ;
                                        for( j in user_friends_data ){
                                                if ( user_friends_data[j]["id"]  == friend_id ){
                                                        friend_name = user_friends_data[j]["name"];
                                                       console.log( friend_name );
                                                 }
                                          }
                                          // for groups 
                                          group_name = "" ;
                                         for( g  in  data_of_groups ){
                                               if(data_of_groups[g]["group_id"] == friend_id ){
                                                  group_name  = data_of_groups[g]["group_name"]  ; 
                                                    console.log( group_name );
                                               }
                                                 
                                         }   
                                                                                   
                                    if( friend_name  != "" ){
                                         display_div.innerHTML += "<div  onclick='create_chat("+friend_id+", 0)' class='add_friend' id='my_friend_"+friend_id+"'><i  class='fa fa-user'>&nbsp&nbsp</i>"+ friend_name  +"<div id='active_status_"+friend_id+"' class='status-circle'> </div></div> "; 
                                     }else if ( group_name != "" ){
                                         clickfun = 'create_chat("' + friend_id + '","' + group_name  +'")' ;
                                        display_div.innerHTML += "<div  onclick="+clickfun+" class='add_friend' id='my_friend_"+friend_id+"'><i  class='fa fa-users'>&nbsp&nbsp</i>"+ group_name  +"<div id='active_status_"+friend_id+"' class='status-circle'> </div></div> "; 
                                     }
                             }                    
                     }                                                                
          }  
          
          
   function show_active_list( res ){
            $.ajax({                                          
                url:"active_user.php",
                type:'POST',
                data:{"friends_list":res },
                success:function(result ){
                  console.log( "get u r friends  status : " + result );
                  show_user_friends_status( result ) ;                                                                   
                }
             }); 
      }
      
     function  show_user_friends_status( active_list ){
             var active_users =  JSON.parse( active_list );
             active_users = active_users["active_list"] ;
               for( a  in active_users  ){
                   activeid = active_users[a]["id"] ;
                     if( active_users[a]["main"] == 1 ){
                        document.getElementById("active_status_" + activeid ).style.backgroundColor = "green" ;
                     }else{
                        document.getElementById("active_status_" + activeid ).style.backgroundColor = "red" ;
                     }
             }             
     }   
     setInterval(function(){   show_active_list( active_user ); },"15000" );    
                            
            
  
        </script>
     </div>
                                 
     <div   style="width:54%;height:508px;background-color:white;float:left;font-size:15px;">    
     <div   id="main_chat_div"  style="height:457px;border:1px solid;position:relative"> 
   
     </div>
           <script>
               var scrolled = 0 ; 
            function  create_chat( friend_id , name  ){     
               
                        console.log( "chat creating :" + friend_id );
                        clicked_div =  document.getElementById("my_friend_"+ friend_id ) ;
                        friends_list_div = document.getElementById("display_friends" ) ;
                        var autodiv =  document.getElementById("main_chat_div") ;
                         if( autodiv.childNodes.length > 0  ){  
                                $("#main_chat_div").empty();
                          }
                                var cDiv = friends_list_div.children;
                                for (var i = 0; i < cDiv.length; i++) {
                                   if (cDiv[i].tagName == "DIV") {   //or use toUpperCase()
                                       cDiv[i].style.background = ''; 
                                        cDiv[i].style.color = 'white'; //do styling here
                                    }
                                 }    
                      clicked_div.style.backgroundColor = "dodgerblue" ;
                      clicked_div.style.color ="white";
                      clicked_div.style.borderBottom = "1px solid" ;
                        
                          headerdiv = document.createElement("div");
                           headerdiv.style.height  =  "90px" ;
                           headerdiv.style.backgroundColor = "turquoise" ;
                           headerdiv.id = "chat_header_div_"+friend_id ; 
                           document.getElementById("main_chat_div").appendChild(headerdiv); 
                                  
                           newdiv = document.createElement("div");
                           newdiv.id = "chat_div_"+friend_id ; 
                           document.getElementById("main_chat_div").appendChild(newdiv);
                          $("#chat_div_"+ friend_id ).addClass("chating_block");
                           
                
                
                  var headerdiv = document.getElementById("chat_header_div_" + friend_id ) ;
                    fid = friend_id-1 ;
                 if( friend_id  != "" ){              
                                document.getElementById("friend_id").value = friend_id ; 
                                document.getElementById("message").style.display = "block";  
                                if( isNaN( friend_id ) == true ){
                                 headerdiv.innerHTML = "<div  style='padding:5px 50px;float:left;'><h2>"+ name +"</h2></div><div><a style='float:right;padding:30px 82px;' href='javascript:add_user_to_group()'><i class='fa fa-user-plus'></i></div>"  ;
                                     get_message_data( "group" );
                                }else{
                                 headerdiv.innerHTML = "<div style='padding:5px 50px;float:left;'><h2>"+user_friends_data[fid]["name"]  +"</h2></div><div style='padding:30px 82px;float:right'><a href='../webstr/index.php?userid="+userid+"&friend_id="+user_friends_data[fid]["id"]+"'target='_blank'><i class='fa fa-video-camera'></i></a></div>"  ;
                                     get_message_data( "user" );
                                }
                                get_message_data();
                                console.log("create_chat is activate : " + friend_id );   
                                counter_on();                                   
                        }   
                   scrolled=scrolled+300;             //scroll down function
                              $("#chat_div_"+friend_id).animate({
                                     scrollTop:  scrolled
                                });             
                        
                                                           
        }   
        /*
        $(document).keyup(function(e){
       	     if(e.keyCode == 13){ 
                 send_msg() ;
              }
        
         });
           */
      function send_msg(){
          group_chat = "no" ;
                   var msg = document.getElementById("msg_box").value ;
                   var  frnd_id = document.getElementById("friend_id").value ; 
                   console.log( "message sending friend_id : "+ frnd_id + msg ); 
                        if( isNaN( frnd_id ) == true ){
                             group_chat = "yes" ;   
                         }
                   
               if( msg.trim() != "" ){ 
                     $.ajax({
                              url:"send_message.php",
                              type:'POST',
                              data:{"friend_id":frnd_id,"message":msg,"group":group_chat},
                              success :function(result){
                                    console.log( "message sent to  : " + result  );
                                     document.getElementById("msg_box").value  = "" ;
                                         if( isNaN( frnd_id ) == true ){
                                               get_message_data( "group" );
                                          }else{
                                               get_message_data( "user" );
                                           }
                                   
                              }
                     });  
                 }                   
          }               
                     
        function  get_message_data( chat ){
                group_chat = "no" ;
                var  frnd_id = document.getElementById("friend_id").value ; 
                var last_message_id = document.getElementById("last_id").value ;
                console.log("sending messages data is on :" + frnd_id + "  " + last_message_id );
                li = 0 ;
                        if( last_message_id !=  "" ){
                          li = last_message_id ;   
                        }
                        if( chat ==  "group" ){
                          group_chat = "yes" ;
                        }
           
                     $.ajax({
                              url:"message_data.php",
                              type:'POST',
                              data:{"friend_id":frnd_id,"lastid":li,"group":group_chat},
                              success :function(data){
                                    console.log(  "Get the messages data result: " + data  + chat );
                                      display_chat( data, frnd_id , chat  );
                                
                              }
                     }); 
        }  
    
        var date = "";   
         
        function display_chat( r, f , c ){    
                    var dt = new Date();
                     var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            
                        var  chating_div = document.getElementById("chat_div_" + f ) ;                     
                        var chat_history = JSON.parse( r ) ;                              
                        var chat_data = chat_history["messages"] ;
                        var last = chat_history["last_id"];
                           
                        for( m in  chat_data ){
                               id =  chat_data[m]["id"] ;
                                              
                               if(  document.getElementById("msg_"+ id ) ){
                                 
                                }else{
                                
                                        var date1 = new Date(today_date+" "+time);
                                        var date2 = new Date(chat_data[m]["datetime"] );
                                        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                                        var diffdays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                                        var datestring = chat_data[m]["datetime"];
                                        if( diffdays == 1 ){
                                               date = "Today " ;
                                        }else if( diffdays == 2 ){
                                              date = "Yesterday " ;  
                                        }else{
                                            date = datestring ;
                                        }                         
                             
                                      if( chat_data[m]["user_id"] ==  userid ){ 
                                          // console.log( "userid :" + chat_data[m]["user_id"]+ " " + userid   );          
                                          chating_div.innerHTML += "<img src='images/tmp_images/"+user_profile_pic+"' style='border-radius:50%;width:40px;float:right;'><div  class='user_message'   id='msg_"+id+"'>"+chat_data[m]["message"] + "<span style='font-size: 10px;font-weight: bold;float: right;margin-top: 17px;color: blueviolet;'>"+ date +"</span></div><br><div style='clear:both;'></div><br>"   ;        
                                  
                                      }else{    
                                             if( c == "group" ){
                                                 for( f  in user_friends_data ){
                                                     if( user_friends_data[f]['id'] ==  chat_data[m]["user_id"] ){
                                                          frnd_name = user_friends_data[f]['name']  ;
                                                         break ;
                                                       }
                                                  }                                               
                                              }else{
                                                 frnd_name = "" ;
                                              }                              
                                           //console.log( "userid :" + chat_data[m]["user_id"] + " " + userid  );
                                           chating_div.innerHTML += "<div style='color:teal;margin-left:20px;'>"+frnd_name+"</div><div  class='other_message'  id='msg_"+id+"'>"+ chat_data[m]["message"] + "<span style='font-size: 10px;font-weight: bold;float: right;margin-top: 17px;color: blueviolet;'>"+ date +"</span></div><br><div style='clear:both;'></div><br>"   ;
                                     
                                      } 
                         
                                }                                                                                                        
                        }     
                                document.getElementById("last_id").value  = last ;
                                console.log("last id is updated : " +    document.getElementById("last_id").value  ); 
                          
                                
                                                          
         }
         function counter_on(){
                        console.log( "set interval function is on" );
                        setInterval(function(){  
                                var  frnd_id = document.getElementById("friend_id").value ;  
                               if( isNaN( frnd_id ) == true ){
                                  get_message_data("group"); 
                               }else{
                                   get_message_data( "user" );
                                }                                             
                        },"10000" );               
          }         
     // only for notification         
       function get_all_friends_data(){
            
                     $.ajax({
                              url:"all_friends_message_data.php",
                              type:'POST',
                              data:{"friends_id":user_friends},
                              success :function(data){
                                    console.log(  "Get the all messages data result: " + data );
                                     show_notification( data ); 
                              }
                     });
                       
       }     
       function show_notification( res ){
            new_message_history  = JSON.parse( res ) ;
            new_message_history =  new_message_history['new_messages'] ;
            for( n in   new_message_history ){
                 console.log( "newmsg : " + new_message_history[n] );
           
           }            
       }               
</script>
  <div   id="show_all_users" style="width:210px;display:none;max-height: 170px;overflow-y:scroll;overflow-x:hidden;position:absolute;right:300px;top:130px;z-index:2">
  <input type="text" id="auto-suggest" style="width:194px;" onkeyup='show_results(this.value)' placeholder="search">
  <div  id="auto-suggestion-div"  style='cursor:pointer;'>
  <script>
    //this code is used in groups .
   function show_results( val ){
                var group_id = document.getElementById("friend_id").value ;  
                console.log( group_id );
                autodiv = document.getElementById("auto-suggestion-div") ;
                if( autodiv.childNodes.length > 0  ){  
                      $("#auto-suggestion-div").empty();
                } 
                matched_names = [];  
                matched_id =[];
                 for( u in  user_friends_data){    
                        var user_name = user_friends_data[u]['name'] ;
                        var user_id = user_friends_data[u]['id']; 
                        var reg = new RegExp(val,'gi');                          
                          if( user_name.match( reg ) ){
                                matched_names.push( user_name  ); 
                                matched_id.push( user_id ) ;   
                           }         
                  }    
        
                      
        for( u  in  matched_names ){
           if( matched_id[u] != userid ){             
                 clickfun = 'user_add_to_group("' + group_id + '","' + matched_id[u] +'")' ;
                 document.getElementById("auto-suggestion-div").innerHTML += "<div  onclick="+clickfun+" id='matched_id_"+matched_id[u]+"' style='background-color:beige;padding:3px;border:1px solid wheat'>" +matched_names[u] +"</div>" ;
         }
        }
    }
 function users_data_for_group(){
  var group_id = document.getElementById("friend_id").value ;   
    for( u  in  user_friends_data ){   
          clickfun = 'user_add_to_group("' + group_id + '","' + user_friends_data[u]["id"]+'")' ;
          document.getElementById("auto-suggestion-div").innerHTML += "<div  onclick="+clickfun+"  id='matched_id_"+user_friends_data[u]["id"]+"' style='background-color:beige;padding:3px;border:1px solid wheat'>" +user_friends_data[u]["name"] +"</div>" ;
        
    }  
  }                                                                                  
  </script> 
  </div>
  
  
  
  
  </div>
        <div style='clear:both'> </div>
        <div style="text-align:center;display:none;"  id="message">
                <textarea type="text" id="msg_box"  rows='3' cols='70'></textarea>
 
       <img src="sendicon.png" width="46px"  onclick="send_msg()" style="cursor:pointer" >  
       <!--        <input type="submit" value="submit"  onclick="send_msg()">  -->
                
                <input type="hidden"  name="friend_id" id="friend_id">
                <input type="hidden" name='last_id' id="last_id">
                <input type="hidden" id="group_name">
        </div>
      </div>
      <div style="width:23%;height:508px;background-color:steelblue;float:left;overflow-y:scroll">
      <?php 
        $user_friends =  explode("#", $user[0]['friends'] ) ;                     
         foreach( $users_data as $key=>$data ){
             
              if( $data['id'] != $_SESSION['user_id'] ){
              $true_friend = false ;
             foreach( $user_friends  as $id=>$friend ){ 
                     if( $data['id'] == $friend ){
                          $true_friend = true;
                           break;
                     }else{
                         $true_friend = false ;
                     } 
             }
        if ( $true_friend == false ){   
                 
        ?>
             <div  class="add_friend">
               <div>
                   <?=ucwords( $data['name'] ) ?>
               </div> 
             <div style="margin-top:10px"> 
             <input type="button"  name="add_friend" id="add_friend_<?=$data['id']?>" value="Add friend"  onclick="add_new_friend('<?=$data['id']?>')">
             <input type="button" name="cancel" id="cancel"  value="Cancel"  onclick="cancel_friend()">
             <input type="hidden" value="<?=$data['id']?>"   name="new_friend_id" id="new_friend_id">
             
             </div>
             </div>
      <?php 
               }   
            }else{
                 echo "<input type='hidden'  value='".$data["friends"]."' id='friends_list' >" ;
            }
        }
      ?>     
      </div>
      <div style="clear:both"></div>
</div>