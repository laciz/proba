<!DOCTYPE html>
<?php session_start();
header('Content-Type: text/html; charset=utf-8');
include 'connection.php';
include 'functions.php';
if (!isset($_SESSION['email'])){
    header("Location : index.php");
}
 profileChanges();
?>
<html>
<head>
    <?php ;

     if(isset($_GET['uid'])){
         $user=$_GET['uid'];
         $get_user="SELECT * from users where user_id='$user'";
         $run_user=mysqli_query($con,$get_user);
         $row=mysqli_fetch_array($run_user);
         $user_post_id=$row['user_id'];
         $get_user_posts="SELECT * from posts where user_id='$user_post_id' order by post_date desc";

         $run_user_post=mysqli_query($con,$get_user_posts);

         $user_name=$row['username'];
         $user_id=$row['user_id'];
         $szakirany=$row['szakirany'];
         $get_post="SELECT count(user_id) as 'post_numbers' from posts where user_id='$user_id'";
         $run_post=mysqli_query($con,$get_post);
         $row_post=mysqli_fetch_array($run_post);
     }



    ?>
    <title><?php echo $row['f_name'];?></title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>

<div class="container">
    <div class="row row-no-gutters">
        <div id="colxs6" class="col-xs-6 col-md-4">
            <img class="home-pic" width="155px" height="155px" src="<?php echo $row['user_image'];?>">

            <p class="name"><?php echo $row['f_name'].'  '.$row['l_name'];?></p>
            <?php
         $session_user=$_SESSION['email'];
         $session_user_query="SELECT * from users where email='$session_user'";
         $run_session_user=mysqli_query($con,$session_user_query);
         $row_session_user=mysqli_fetch_array($run_session_user);

          if($row_session_user['user_id']==$row['user_id']){ ?>

              <i  id="fasfa" class="fas fa-user-cog" onclick="SettingPop(1)"> </i>

            <?php } ?>


            <p class="usrname"><?php echo '@'.$row['username'].'';?></p>



            <div class="row row-no-gutters">
                <div class="col-xs-6 col-md-4">
                   Szakirány

                    <?php if($szakirany=='Mechatronika'){ ?>

                        <p class="szakirany"><i class="fas fa-robot"><?php echo ' '.$row['szakirany'].'';?></i></p>

                    <?php } ?>
                    <?php if($szakirany=='Informatika'){ ?>

                        <p class="szakirany"><i class="fas fa-laptop-code"><?php echo ' '.$row['szakirany'].'';?></i></p>

                    <?php } ?>
                    <?php if($szakirany=='Gépészet'){ ?>

                        <p class="szakirany"><i class="fas fa-pencil-ruler"><?php echo ' '.$row['szakirany'].'';?></i></p>

                    <?php } ?>
                    <?php if($szakirany=='Gépészet'){ ?>

                        <p class="szakirany"><i class="fas fa-pencil-ruler"><?php echo ' '.$row['szakirany'].'';?></i></p>

                    <?php } ?>
                    <?php if($szakirany=='Menedzsment'){ ?>

                        <p class="szakirany"><i class=" fas fa-tasks"><?php echo ' '.$row['szakirany'].'';?></i></p>

                    <?php } ?>

                </div>
                <div class="col-xs-6 col-md-4">
                    Bejegyzések
                    <p class="post_number"> <?php echo $row_post['post_numbers'];?> közzétett</p>
                </div>
                <div class="col-xs-6 col-md-4">
                    Csatlakozva
                    <p class="reg_date"> <?php echo $row['reg_date'];?></p>
                </div>
            </div>

        </div>
        <div class="col-xs-6 col-md-4">
             <img src="<?php echo $row['cover_image'];?>" width="703px" height="307px">

    </div>
        <div class="container">
            <div class="row">
                <div id="profilecol" class="col">

                    <a class="mainmenu" href="x"><i class="far fa-comments"></i>Üzenetek</a>
                    <a href="x"><i class="far fa-bell"></i>Értesítések</a>
                    <a href="home.php"><i class="fas fa-blog"></i>Bejegyzések</a></div>
                </div>

            </div>

        </div>
    <div id="mainrow-2" class="row">
     <div id="mainrowcol" class="col">
        <form  id="f2" action="profile.php?<?php echo "uid=$user" ?>" method="post" enctype="multipart/form-data">
            <i class="far fa-times-circle" onclick="SettingPop(2)"> </i>
            <h3>Profilkép frissítése</h3>
            <input  type="file"  id="prof-image" name="prof-image" class="inputfile"  size="12">
            <!-- </label>-->
            <h3>Boritókép frissítése</h3>
            <input  type="file"  id="cover-image" name="cover-image" class="inputfile"  size="12">
            <!-- </label>-->
            <button   class="btn btn-primary" name="sub"  >Frissítés</button>


        </form>
         <?php
         if (isset($_POST['sub'])){
             global $con;

             $image = $_FILES['cover-image']['name'];
             $image_tmp = $_FILES['cover-image']['tmp_name'];
             $random_number = rand(1, 100);

             $profile_image=$_FILES['prof-image']['name'];
             $profile_image_tmp=$_FILES['prof-image']['tmp_name'];


             if ($image!==''){
                 move_uploaded_file($image_tmp, "$random_number.$image");
                 $session_user=$_SESSION['email'];
                 $query="update users set cover_image='$random_number.$image' where email='$session_user'";
                 $run_query=mysqli_query($con,$query);

                 echo "<script>alert('Sikeresen frissítetted a boritóképed')</script>";
                 echo "<script>window.open('profile.php?uid=$user', '_self')</script>";

             }

             if($profile_image!==''){

                 move_uploaded_file($profile_image_tmp, "$random_number.$profile_image");
                 $session_user=$_SESSION['email'];
                 $query="update users set user_image='$random_number.$profile_image' where email='$session_user'";
                 $run_query=mysqli_query($con,$query);

                 echo "<script>alert('Sikeresen frissítetted a profilképed')</script>";
                 echo "<script>window.open('profile.php?uid=$user', '_self')</script>";


             }



         }


         ?>

     </div>
    </div>

       <?php

       while ($row_user_post = mysqli_fetch_array($run_user_post)) {

           $username=$row['username'];
           $user_image=$row['user_image'];
           $post_time=$row_user_post['post_date'];
           $content=$row_user_post['post_comment'];
           $image=$row_user_post['upload_image'];

       echo "
     <div id='maincnt' class=\"container\">
  <div  id='mainrow-1' class=\"row\">
    <div class=\"col\"> <p class='usr'>@$username</p>
    <img  class='userimg' src='$user_image' width='32px' height='32px'><p class='date'> $post_time</p></div>
    <div class=\"col\"><p class='cnt'>$content</p>
    <img class='imig' src='$image' width='422px' height='422px'></div>
    <div class=\"col\"> </div>
  </div>
</div>
                     
"; }
      if($row_post['post_numbers']<1){
          echo "
          <div id='maincnt' class=\"container\"><h3>Még nincsenek bejegyzések</h3></div>";
      }



       ?>


</div>

</body>
</html>
