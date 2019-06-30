<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div id="profilecol" class="col">

            <a class="mainmenu" href="messages.php?u_id=new"><i class="far fa-comments"></i>Üzenetek</a>
            <a href="x"><i class="far fa-bell"></i>Értesítések</a>
            <a href="home.php"><i class="fas fa-blog"></i>Bejegyzések</a></div>
    </div>

</div>



<?php
session_start();

include 'connection.php';


 if (isset($_GET['u_id'])){
     global $con;

     $get_id=$_GET['u_id'];

     $get_user="SELECT * from users where user_id='$get_id'";
     $run_user=mysqli_query($con,$get_user);
     $row_user=mysqli_fetch_array($run_user);

     $user_to_msg=$row_user['user_id'];
     $user_to_name=$row_user['username'];


 }

 $user=$_SESSION['email'];
 $get_user="select * from users where email='$user'";
 $run_user=mysqli_query($con,$get_user);
 $row=mysqli_fetch_array($run_user);

 $user_from_msg=$row['user_id'];
 $user_from_name=$row['username'];

 ?>
<div class="col-sm-3" id="select_user">
    <?php
    $user="select * from users ";
    $run_user=mysqli_query($con,$user);

    while($row_user=mysqli_fetch_array($run_user)){
        $user_id=$row_user['user_id'];
        $user_name=$row_user['username'];
        $user_image=$row_user['user_image'];

        echo "
        
        <div class='container-fluid'>
        <a href='messages.php?u_id=$user_id'><!$ userid volt -->
        <img  class='img-circle' src='$user_image' width='90px' height='80px' title='$user_name'><strong>$user_name</strong>
        </a>
        
</div>
        
        ";
    }

    ?>

<div class="col-sm-6">
    <div class="load_msg" id="scroll_messages">
     <?php
     $sel_msg="SELECT *  from user_messages  where (user_to='$user_to_msg' AND user_from='$user_from_msg') or (user_from='$user_to_msg' and user_to='$user_to_msg') order by 1 asc ";
     $run_msg=mysqli_query($con,$sel_msg);
     while($row_msg=mysqli_fetch_array($run_msg)){
         $user_to=$row_msg['user_to'];
         $user_from=$row_msg['user_from'];
         $msg_body=$row_msg['msg_body'];
         $msg_date=$row_msg['date'];
      ?>
        <div id="loaded_msg">
          <p><?php if($user_to == $user_to_msg AND $user_from == $user_from_msg){
              echo "<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body </div><br><br><br>";
              }else if($user_from == $user_to_msg AND $user_to == $user_from_msg){echo "<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body </div><br><br><br>";}?></p>
        </div>
        <?php
     }
     ?>

    </div>
     <?php
      if (isset($_GET['u_id'])){
          $u_id=$_GET['u_id'];
          if($u_id == "new"){
              echo'
              <form>
              <center><h3>Valaszd ki kivel chatelsz</h3></center>
              <textarea disabled class="form-control" placeholder="Irj valamit"> </textarea>
              <input type="text" class="btn btn-default" disabled value="kuld">
</form><br><br>
              
              ';
          }else {
              echo'
   <p>fasz</p>
              <form action="" method="post">
              <h3>Valaszd ki kivel chatelsz</h3>
              <textarea  class="form-control" id="message_textarea"  name="msg_box"> </textarea>
              <input type="submit"  id="btn-msg" name="send_msg" value="kuld">
</form><br><br>
              
              ';
          }
      }

     ?>
    <?php
    if (isset($_POST['send_msg'])){
        $msg=htmlentities($_POST['msg_box']);
        if($msg == " "){
            echo "<h4>nemlehet elkuldeni</h4>";
        }else if(strlen($msg) > 37){
            echo "<h4>tul sok char</h4>";
        }else {
            $insert= "insert into user_messages (user_to,user_from,msg_body,date,msg_seen)
      values ('$user_to_msg','$user_from_msg','$msg',now(),'no')";
            $run_insert=mysqli_query($con,$insert);
        }
    }

    ?>
</div>

</div>
</body>
</html>




