<?php
include "connection.php";
/****************************************
A posztokat beletöltsük az adatbázisba
 ****************************************/
function insertPost(){
    if(isset($_POST['sub'])) {
        global $con;
        global $user_id;

        $content = htmlentities($_POST['content']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $random_number = rand(1, 100);

        if(strlen($content) > 500){
            echo "<script>alert('Maximum 500 karaktert adhatsz meg!')</script>";
            echo "<script>window.open('home.php', '_self')</script>";
        }else{
            if(strlen($image) >= 1 && strlen($content) >= 1){
                move_uploaded_file($image_tmp, "$random_number.$image");
                $insert = "insert into posts (user_id, post_comment, upload_image, post_date) values('$user_id', '$content', '$random_number.$image', NOW())";

                $run = mysqli_query($con, $insert);

                if($run){
                    echo "<script>alert('Sikeresen közzétetted !')</script>";
                    echo "<script>window.open('home.php', '_self')</script>";

                    $update = "update users set posts='yes' where user_id='$user_id'";
                    $run_update = mysqli_query($con, $update);
                }

                exit();
            }else{
                if($image=='' && $content == ''){

                    echo "<script>window.open('home.php', '_self')</script>";
                }else{
                    if($content==''){
                        move_uploaded_file($image_tmp, "$random_number.$image");
                        $insert = "insert into posts (user_id,post_comment,upload_image,post_date) values ('$user_id','No','$random_number.$image',NOW())";
                        $run = mysqli_query($con, $insert);

                        if($run){
                            echo "<script>alert('Sikeresen közzétetted !')</script>";
                            echo "<script>window.open('home.php', '_self')</script>";

                            $update = "update users set posts='yes' where user_id='$user_id'";
                            $run_update = mysqli_query($con, $update);
                        }

                        exit();
                    }else {

                        $insert = "insert into posts (user_id, post_comment, post_date) values('$user_id', '$content', NOW())";
                        $run = mysqli_query($con, $insert);

                        if($run){
                            echo "<script>alert('Sikeresen közzétetted!')</script>";
                            echo "<script>window.open('home.php', '_self')</script>";

                            $update = "update users set posts='yes' where user_id='$user_id'";
                            $run_update = mysqli_query($con, $update);
                        }
                    }
                }
            }
        }
        }
    }
/****************************************
A posztokat kiírjuk az adatbázisból
 ****************************************/
function getPost()
{
    global $con;
    $query = "SELECT * from posts  order by post_date desc";
    $run_post = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($run_post)) {


        $user_id = $row['user_id'];
        $post_id = $row['post_id'];
        $query_2 = "SELECT * from users where posts='yes' and user_id='$user_id' ";
        $run_user = mysqli_query($con, $query_2);
        $row_user = mysqli_fetch_array($run_user);
        $username = $row_user['username'];
        $content = $row['post_comment'];
        $image = $row['upload_image'];
        $user_image = $row_user['user_image'];
        $post_time = $row['post_date'];


        echo "
     <div id='maincnt' class=\"container\">
  <div  id='mainrow' class=\"row\">
    <div class=\"col\"> <a href='profile.php?uid=$user_id' $username</a>
    <img  class='userimg' src='$user_image' width='32px' height='32px'><p class='date'> $post_time</p></div>
    <div class=\"col\"><p class='cnt'>$content</p>
    <img class='imig' src='$image' width='422px' height='422px'></div>
    <div class=\"col\"> </div>
  </div>
</div>
                     
";

        /***************************************************************************************************************/

    }
}


