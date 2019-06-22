<!DOCTYPE html>
<?php session_start();
include 'connection.php';
 if (!isset($_SESSION['email'])){
     header("Location : index.php");
 }

?>
<html>
<head>
    <?php ;
    $user=$_SESSION['email'];
    $get_user="SELECT * from users where email='$user'";
    $run_user=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);

    $user_name=$row['username'];
    $user_id=$row['user_id'];

    ?>
<title><?php echo $row['username'];?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>
</head>
<body>
<script>
    function SettingPop(x){
        var span = document.getElementsByClassName('settings');
        if (x==1){
            span[0].style.display='block';
        }
        if (x==2){
            span[0].style.display='none ';
        }
    }
</script>
<div class="container">
<div class="header">
    <div class="header-logo">


       <img class="home-pic" width="55px" height="55px" src="<?php echo $row['user_image'];?>">

                  <ul>
                      <li><p class="name"><?php echo $row['f_name'].$row['l_name'];?></p></li>
                      <li><p class="usrname"><?php echo '@'.$row['username'].'';?></p></li>
                      <li><p class="szakirany"><?php echo $row['szakirany'];?></p></li>
                      <a class="prof-settings" onclick="SettingPop(1)"><li><i class="fas fa-user-cog"></i></li></a>
                    </ul>








       <!-- <form class="upld" method="POST" action="profile.php?u_id=<?php echo $user_id?>" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">

        <input type="file" name="image">
        <button type="submit" name="upload">Feltöltés</button>

        </form>-->
        <?php
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {
        // Get image name
        $image = $_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $random_number=rand(1,100);
        if($image==''){
            echo "<script>alert('Válassz ki egy képet')</script>";
        exit();
        }else{
            move_uploaded_file($image_tmp,"$image.$random_number");
            $update="update users set user_image='$image.$random_number' where user_id=$user_id";
            $run=mysqli_query($con,$update);
            if ($run){
                echo "<script>alert('Siker');</script>";
                echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
            }
        }
        // image file directory
        $target = "images/".basename($image);

        $sql = "INSERT INTO users (user_image) VALUES ('$image')";
        // execute query
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        }else{
        $msg = "Failed to upload image";
        }
        }

        ?>



    </div>
    <div class="header-info">
        <a href="x"><i class="far fa-comments"></i>Üzenetek</a>
        <a href="x"><i class="far fa-bell"></i>Értesítések</a>
        <a href="x"><i class="fas fa-blog"></i>Bejegyzések</a>
    </div>
    <div class="header-login">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kijelentkezés</a>


        </a>
    </div>
</div>
<div class="main">
   <div class="sett"></div>
    <div class="settings">

        <a onclick="SettingPop(2)" <i class="fas fa-times-circle"></i></a>

        <h3>Beállítások</h3>
        <h4>Profilkép frissítése</h4>
         <form class="upld" method="POST" action="profile.php?u_id=<?php echo $user_id?>" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">

        <input type="file" name="image">
        <button type="submit" name="upload">Feltöltés</button>
             <img class="home-pic" width="55px" height="55px" src="<?php echo $row['user_image'];?>">

        </form>
    </div>
    <div class="sett2"></div>
</div>
<div class="footer"></div>
</div>
</body>
</html>