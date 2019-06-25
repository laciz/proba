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

              <i class="fas fa-user-cog"></i>

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
             <img src="<?php echo $row['cover_image'];?>" width="700px" height="300px">

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
