   <style>
   .chat-box-main {
    max-height:500px;
    overflow:auto;
}
.chat-box-div {
    border:2px solid #A12EB3;
    border-bottom:2px solid #A12EB3;
} 
.chat-box-head {
    padding: 10px 15px;
border-bottom: 2px solid #A12EB3;
background-color: #B25AE5;
color: #fff;
text-align: center;

}

.chat-box-left {
    width: 100%;
    height: auto;
    padding: 15px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #C5C5C5;
    font-size:12px;
}
.chat-box-left:after {
    top: 100%;
    left: 10%;
    border: solid transparent;
    content: " ";
    position: absolute;
    border-top-color: #C5C5C5;
    border-width: 15px;
    margin-left: -15px;
}

.chat-box-name-left {
    margin-top: 30px;
    margin-left: 60px;
    text-align:left;
    color:#049E64;
}
    .chat-box-name-left img {
        max-width:40px;
        border: 2px solid #049E64;
    }

    .chat-box-right {
    width: 100%;
    height: auto;
    padding: 15px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #C5C5C5;
    font-size:12px;
}
.chat-box-right:after {
    top: 100%;
    right: 10%;
    border: solid transparent;
    content: " ";
    position: absolute;
    border-top-color: #C5C5C5;
    border-width: 15px;
    margin-left: -15px;
}

.chat-box-name-right {
    color: #354EA0;
    margin-top: 30px;
    margin-right: 60px;
    text-align:right;
}

.chat-box-name-right img {
        max-width:40px;
        border: 2px solid #354EA0;
    }
.chat-box-footer {
    background-color: #D8D8D8;
padding: 10px;
}
/*======================================
    CHAT BOX ONLINE STYLES
======================================= */


.hr-clas-low {
    border-top: 1px solid #C5C5C5;
}

.chat-box-online {
     max-height:554px;
    overflow:auto;
}
.chat-box-online-div {
    border:2px solid #03DB2F;
    border-bottom:2px solid #03DB2F;
} 

.chat-box-online-head {
    padding: 10px 15px;
border-bottom: 2px solid #03DB2F;
background-color: #03DB2F;
color: #fff;
text-align: center;

}

.chat-box-online-left {
    margin-left: 10px;
    text-align:left;
    color:#049E64;
}
    .chat-box-online-left img {
        max-width:30px;
        border:1px solid #049E64;
        margin-bottom:10px;
    }
    .chat-box-online-right {
    margin-right: 10px;
   text-align:right;
    color:#354EA0;
}
    .chat-box-online-right img {
       max-width:30px;
        border:1px solid #354EA0;
        margin-bottom:10px;
        
    }
   </style>
  
  <div class=" col-lg-6 col-md-6 col-sm-6">
                <div class="chat-box-div">
                    <div class="chat-box-head">
                        GROUP CHAT HISTORY
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-cogs"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><span class="fa fa-map-marker"></span>&nbsp;Invisible</a></li>
                                    <li><a href="#"><span class="fa fa-comments-o"></span>&nbsp;Online</a></li>
                                    <li><a href="#"><span class="fa fa-lock"></span>&nbsp;Busy</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><span class="fa fa-circle-o-notch"></span>&nbsp;Logout</a></li>
                                </ul>
                            </div>
                    </div>
                    <div class="panel-body chat-box-main">
                        <div class="chat-box-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="chat-box-name-left">
                            <img src="assets/img/user.png" alt="bootstrap Chat box user image" class="img-circle" />
                            -  Justine Goliyad
                        </div>
                        <hr class="hr-clas" />
                        <div class="chat-box-right">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="chat-box-name-right">
                            <img src="assets/img/user.gif" alt="bootstrap Chat box user image" class="img-circle" />
                            - Romin Royeelin
                        </div>
                        <hr class="hr-clas" />
                        <div class="chat-box-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="chat-box-name-left">
                            <img src="assets/img/user.png" alt="bootstrap Chat box user image" class="img-circle" />
                            -  Justine Goliyad
                        </div>
                        <hr class="hr-clas" />
                        <div class="chat-box-right">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="chat-box-name-right">
                            <img src="assets/img/user.gif" alt="bootstrap Chat box user image" class="img-circle" />
                            - Romin Royeelin
                        </div>
                        <hr class="hr-clas" />
                    </div>
                    <div class="chat-box-footer">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Text Here...">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button">SEND</button>
                            </span>
                        </div>
                    </div>

                </div>