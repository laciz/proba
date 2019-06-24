<?php
include "connection.php";

function insertPost(){
    if (isset($_POST['sub'])){
        global $con;
        global $user_id;

        $content=$_POST['content'];
        $image = $_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $random_number=rand(1,100);

        if($content!=''){
            move_uploaded_file($image_tmp,"../images/$image.$random_number");
            $insert= "insert into posts (user_id,post_comment,upload_image,post_date)
        values ('$user_id','$content','$image.$random_number',now())";

            $run=mysqli_query($con,$insert);
            echo "<script>alert('minden ok')</script>";
        }else{
            echo "<script>alert('nem maradhat ures')</script>";
        }


    }

}

function getPost(){
    global $con;
    $query="SELECT * from posts order by post_date desc";
    $run_post=mysqli_query($con,$query);

    while($row=mysqli_fetch_array($run_post)){


        $user_id=$row['user_id'];
        $post_id=$row['post_id'];
     $query_2="SELECT * from users where user_id='$user_id' ";
     $run_user=mysqli_query($con,$query_2);
     $row_user=mysqli_fetch_array($run_user);
     $username=$row_user['username'];
     $content=$row['post_comment'];
     $image=$row['upload_image'];
     $user_image=$row_user['user_image'];
     $post_time=$row['post_date'];


          echo "<div class='row'>
                 <div class='col-sm-3'>
                 <p class='usr'> @$username</p>
                   <img src='$user_image' width='32px' height='32px'>
                   <p class='date'> $post_time</p>
                 </div>
                      <div id='posts' class='row'>
                      <p class='cnt'>$content</p>
                      
                     <img src='$image' width='222px' height='222px'>
                  
                     

</div> </div>";
    }

}
