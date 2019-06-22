
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

         ?>
            <img class="home-pic" width="75px" height="75px" src="<?php echo $row['user_image'];?>">
            <h3 class="usrname"><b>Üdv </b><?php echo '@'.$row['username'].'';?></h3>
        </div>
        <div class="header-info">
            <h3>Üdvözöllek a VTS közösségi médián!</h3>
        </div>
        <div class="header-login">

        </div>
    </div>
</div>



</body>
</html>