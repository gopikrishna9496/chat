<style class="cp-pen-styles">* {
  -ms-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  border: 0;
}

.login {
  position: relative;
  top: 50%;
  width: 400px;
  display: table;
  background: #fff;
  border-radius: 4px;
}
.legend {
  position: relative;
  width: 100%;
  display: block;
  background: #FF7052;
  padding: 15px;
  color: #fff;
  font-size: 20px;
}
.legend:after {
  content: "";
  background-image: url(http://simpleicon.com/wp-content/uploads/multy-user.png);
  background-size: 100px 100px;
  background-repeat: no-repeat;
  background-position: 152px -16px;
  opacity: 0.06;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
}
.input {
  position: relative;
  width: 90%;
  margin: 15px auto;
}
.input span {
  position: absolute;
  display: block;
  color: #d4d4d4;
  left: 10px;
  top: 8px;
  font-size: 20px;
}
.input input {
  width: 100%;
  padding: 10px 5px 10px 40px;
  display: block;
  border: 1px solid #EDEDED;
  border-radius: 4px;
  transition: 0.2s ease-out;
  color: #a1a1a1;
}
.input input:focus {
  padding: 10px 5px 10px 10px;
  outline: 0;
  border-color: #FF7052;
}
.submit {
  width: 45px;
  height: 45px;
  display: block;
  margin: 0 auto -15px auto;
  background: #fff;
  border-radius: 100%;
  border: 1px solid #FF7052;
  color: #FF7052;
  font-size: 24px;
  cursor: pointer;
  box-shadow: 0px 0px 0px 7px #fff;
  transition: 0.2s ease-out;
}
.submit:hover,
.submit:focus {
  background: #FF7052;
  color: #fff;
  outline: 0;
}
.feedback {
  position: absolute;
  bottom: -70px;
  width: 100%;
  text-align: center;
  color: #fff;
  background: #2ecc71;
  padding: 10px 0;
  font-size: 12px;
  display: none;
  opacity: 0;
}
.feedback:before {
  bottom: 100%;
  left: 50%;
  border: solid transparent;
  content: "";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(46, 204, 113, 0);
  border-bottom-color: #2ecc71;
  border-width: 10px;
  margin-left: -10px;
}
.signupbut{
background-color: tomato;
    border-radius: 4px;
    color: white;
    padding: 8px 61px;
    text-decoration: none;
    font-size: 15px;
}
.signupbut:hover{
   background-color:transparent ;
   border:1px solid white;
}
</style>


<div style='background-image:url(chat-bird.jpg);background-repeat:no-repeat;height:508px;' >
    <div style="width:100%;padding:144px;background-image:url(transparent-image.png);height:552px;"  align="right">
     <div>
      <form class="login"  method="post">
        <fieldset>
        <legend class="legend">Login</legend> 
                <div class="input">
                        <input type="email"   name="email" placeholder="Email" required />
                        <span><i class="fa fa-envelope-o"></i></span>
                </div>
                
                <div class="input">
                        <input type="password"  name="pass"  placeholder="Password" required />
                        <span><i class="fa fa-lock"></i></span>
                </div>  
         <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>   
        </fieldset>
       <input type="hidden" name="action" value="login">
     </form>
    </div>
<script>
$('.input').focusin(function () {
    $(this).find('span').animate({ 'opacity': '0' }, 200);
});
$('.input').focusout(function () {
    $(this).find('span').animate({ 'opacity': '1' }, 300);
});

</script>

  <div style="position:absolute;right:260px;bottom:130px;">  <a  href="?go=register"  class="signupbut"  >SingUp</a>  </div>
</div>
</div>