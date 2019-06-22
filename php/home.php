
<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VTS közösségi oldal</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>


</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-logo">

            <?php $user=$_SESSION['email'];
            $get_user="SELECT * from users where email='$user'";
            $run_user=mysqli_query($con,$get_user);
            $row=mysqli_fetch_array($run_user);

            $user_name=$row['username'];
            $user_id=$row['user_id'];

         ?>
            <img class="home-pic" width="55px" height="55px" src="<?php echo $row['user_image'];?>">
            <a class="usrname" href="profile.php?<?php echo "u_id=$user_id"?>"><b>Üdv </b><?php echo '@'.$row['username'].'';?></a>

        </div>
        <div class="header-info">
            <a href="x"><i class="far fa-comments"></i>Üzenetek</a>
            <a href="x"><i class="far fa-bell"></i>Értesítések</a>
            <a href="x"><i class="fas fa-blog"></i>Bejegyzések</a>
        </div>
        <div class="header-login">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kijelentkezés</a>

        </div>
    </div>
    <div class="main"></div>
    <div class="footer"></div>
</div>



</body>
</html>