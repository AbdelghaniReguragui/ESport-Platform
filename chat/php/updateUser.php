<?php
    session_start();
      include_once "config.php";
       $ran_id = $_SESSION['unique_id'];
    //first name
    !empty($_POST['fname']) ? $fname = mysqli_real_escape_string($conn, $_POST['fname']) :
         $fname = mysqli_real_escape_string($conn, $_POST['oldFname']);
    //last name
    !empty($_POST['lname']) ? $lname = mysqli_real_escape_string($conn, $_POST['lname']) :
         $lname = mysqli_real_escape_string($conn, $_POST['oldLname']);
    //email
    !empty($_POST['email']) ? $email = mysqli_real_escape_string($conn, $_POST['email']) :
         $email = mysqli_real_escape_string($conn, $_POST['oldEmail']);
    //password
    !empty($_POST['password']) ? $password = mysqli_real_escape_string($conn, $_POST['password']) :
         $password = mysqli_real_escape_string($conn, $_POST['oldPassword']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id ='$ran_id'");
            if(mysqli_num_rows($sql) > 0){
                $img_name = "";
                $img_type = "";
                $tmp_name = "";
                if(  isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg","JPEG", "PNG", "JPG"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"../images/".$new_img_name)){
                               
                                $insert_query = mysqli_query($conn, "Update user set fname='{$fname}', lname='{$lname}',
                                 email='{$email}', password='{$password}', img='{$new_img_name}' where unique_id = {$ran_id}");
                                if($insert_query){
                                    echo "success";
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpggggggg";
                        }
                    }
                    else{
                       
                        $insert_query = mysqli_query($conn, "Update user set fname='{$fname}', lname='{$lname}',
                            email='{$email}', password='{$password}' where unique_id = {$ran_id}");
                        if($insert_query){
                            echo "success";
                            header('Location: /user/updateUser.php');

                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
                }
                else{
                    $insert_query = mysqli_query($conn, "Update user set fname='{$fname}', lname='{$lname}',
                                 email='{$email}', password='{$password}' where unique_id = {$ran_id}");
                                if($insert_query){
                                    echo "success";
                                }
                                else{
                                    echo "Something went wrong. Please try again!";
                                }
                }
            }
    
            else{
                echo "$email - This email does not exist!";    
            }
        }else{
            //
            echo "$email is not a valid email!";
        }
    }
    else{
        echo "All input fields are required!";
    }
?>