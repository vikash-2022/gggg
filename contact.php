<?php
$token_id="ST123";
$recv_id="ST124";

date_default_timezone_set("Asia/Kolkata");
$today_time=date('h:i:s A');
$today_date=date('d-m-Y');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Chat Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
              
                <ul class="list-unstyled chat-list mt-2 mb-0">

<?php
$cn=mysqli_connect('localhost','root','','chat');

$user_fetch_query=mysqli_query($cn, "select * from user");
while($row=mysqli_fetch_array($user_fetch_query)){
    ?>

<li class="clearfix">
                        
                        <div class="about">
                            <div class="name"><?php echo $row['name'];?></div>
                           </div>
                    </li>

    <?php
}

?>

                    
                   
                                                   
                   
                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <?php
$cn=mysqli_connect('localhost','root','','chat');

$user_fetch_query=mysqli_query($cn, "select * from user where token_id='$token_id'");
while($row=mysqli_fetch_array($user_fetch_query)){
    ?>
                                <h6 class="m-b-0"><?php echo $row['name'];?></h6>
                                <?php
                            }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="chat-history">
                    <ul class="m-b-0">


<?php
$cn=mysqli_connect('localhost','root','','chat');

$user_fetch_query=mysqli_query($cn, "select * from gossips where sender_token_id='$token_id' or reciever_token_id='$token_id'");
while($row=mysqli_fetch_array($user_fetch_query)){
   
$sender_id=$row['sender_token_id'];
$reciever_id=$row['reciever_token_id'];



if($sender_id==$token_id)
{
    ?>
<li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time"><?php echo $row['chat_time'];?></span>
                                
                            </div>
                            <div class="message other-message float-right"><?php echo $row['msg'];?></div>
                        </li>

<?php
}

else if($reciever_id==$token_id)
{

$msg_reciever_fetch=mysqli_query($cn,"select * from gossips where reciever_token_id='$token_id'");
$fetch_reciever_row=mysqli_fetch_assoc($msg_reciever_fetch);
$reciever_msg=$fetch_reciever_row['msg'];
?>

 <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time"><?php echo $row['chat_time'];?></span>
                            </div>
                            <div class="message my-message"><?php echo $row['msg'];?></div>                                    
                        </li> 

<?php
}
}
?>

   
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                       
                        
                        <input type="text" class="form-control" placeholder="Enter text here..." id="mk">
                                                <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-send" id="sd"></i></span>
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

$(document).ready(function(){

$('#sd').click(function(){

let msgkp=$('#mk').val();
$.post("send_msg.php",     
{
chattime:"<?php echo $today_time;?>",
chatdate: "<?php echo $today_date;?>",      
msg:msgkp,
std:"<?php echo $token_id;?>",
rtd:"<?php echo $recv_id;?>"
},
function(data, status){ 
console.log("Data: " + data + "\nStatus: " + status);
});

});
});



</script>




<style type="text/css">
body{
    background-color: #f4f7f6;
    margin-top:20px;
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>

<script type="text/javascript">

</script>
</body>
</html>