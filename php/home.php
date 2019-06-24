
<?php include 'connection.php';
include 'functions.php';
session_start();

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>

</head>
<body>
<div class="container">
    <div class="row row-no-gutters">
        <div class="col-xs-6 col-md-4">
            <?php $user=$_SESSION['email'];
            $get_user="SELECT * from users where email='$user'";
            $run_user=mysqli_query($con,$get_user);
            $row=mysqli_fetch_array($run_user);

            $user_name=$row['username'];
            $user_id=$row['user_id'];

            ?>
            <img  width="55px" height="55px" src="<?php echo $row['user_image'];?>">
            <a  href="profile.php?<?php echo "u_id=$user_id"?>"><b>Üdv </b><?php echo '@'.$row['username'].'';?></a>
        </div>
        <div class="col-xs-6 col-md-4">
            <a href="x"><i class="far fa-comments"></i>Üzenetek</a>
            <a href="x"><i class="far fa-bell"></i>Értesítések</a>
            <a href="x"><i class="fas fa-blog"></i>Bejegyzések</a></div>
        <div class="col-xs-6 col-md-4">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kijelentkezés</a>
        </div>
    </div>
    <br>
    <br>
    <div class="row row-no-gutters">
        <div class="col-xs-6 col-md-4">
            </div>
        <div class="col-xs-6 col-md-4"> <form action="home.php?id=<?php echo $row['user_id'];?>" method="post" id="f" enctype="multipart/form-data">
                <textarea class="form-control"  id="content" rows="3" name="content" placeholder="Mi jár a fejedben?"></textarea><br>
                <label class="label label-success" id="upload_image_button">Válassz képet
                    <input  type="file"  name="image" size="30">
                </label>
                <button id="btn btn-primary"  class="btn btn-primary" name="sub" >Küldés</button>
                <?php
                insertPost();
                ?>
            </form>
            <h3>Bejegyzések</h3>

            <?php
            getPost();
            ?>
        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
    </div>

</div>
</div>
</body>
</html>