<h4>Admin Registration</h4>
<?php
$_SESSION['store']=[];
$data["errors"]=[];
$request =[];
$flag = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['full_name']) && $_POST['full_name'] !== '') {
        $request['full_name'] = $_POST['full_name'];
        $_SESSION['store']['name'] = $_POST['full_name'];

    }else{
        $data["errors"]['name'] = 'Name Not Found!';
    }

    if(isset($_POST['phone'])){
        $request['phone'] = $_POST['phone'];
        $_SESSION['store']['phone'] = $_POST['phone'];
    }
    if(isset($_POST['email'])){
        $request['email'] = $_POST['email'];
        $_SESSION['store']['email'] = $_POST['email'];

    }

    if (isset($_POST['password']) && $_POST['password'] !== '') {
        if(7> strlen($_POST['password'])){
            $data['errors']['minimum'] ="Password must be 8 digit";
        }
        else{
            if($_POST['password']=== $_POST['confirm_password']){
                $request['password'] = $_POST['password'];
            }
            else{
                $data['errors']['notmatched'] = 'Password not matched!';
            }
        }
    }
    else{
        $data["errors"]['password'] = 'Password can not be empty!';
    }

    //image upload
//    $image_name = $_FILES['image']['name'];
//    $image_size = $_FILES['image']['size'];
//    $tmp_name = $_FILES['image']['tmp_name'];
//    $error = $_FILES['image']['error'];
//
//    if($error == 0){
//        if($image_size > 1000000){
//            $data['errors']['image'] = 'File size too big!';
//        }
//        else{
//            $image_extention = pathinfo($image_name, PATHINFO_EXTENSION);
//            $image_extention_lower = strtolower($image_extention);
//
//            $allowed_type = array("jpg", "jpeg" ,"png");
//
//            if(in_array($image_extention_lower,$allowed_type)){
//                $image_name_new = uniqid('IMG-', true).'.'.$image_extention_lower;
//                $image_upload_path = './images/uploads/'. $image_name_new;
//                move_uploaded_file($tmp_name,$image_upload_path);
//            }
//            else{
//                $data['errors']['image'] = 'Your are not allowed to upload this file!';
//            }
//        }
//    }
//    else{
//        $data['errors']['image'] = 'Error Occured!';
//    }

    //store data
    if(!file_exists('data.txt')){
        $data['errors']['no_file'] = 'No data file found!';
    }
    else{
        file_put_contents("admin_data.txt","Name: {$request['full_name']} ", FILE_APPEND);
        file_put_contents("admin_data.txt","Email:{$request['email']} ", FILE_APPEND);
        file_put_contents("admin_data.txt","Phone:{$request['phone']} ", FILE_APPEND);
        file_put_contents("admin_data.txt","Password:{$request['password']} ", FILE_APPEND);
        clearstatcache();
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <label for="full_name">Name:</label><br>
    <input type="text" id="full_name" name="full_name" placeholder="enter your full name" value="<?=isset($_SESSION['store']['name'])? $_SESSION['store']['name']:null;?>">
    <span><?=isset($data['errors']['name'])? $data['errors']['name']:null;?></span><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" placeholder="enter your email" value="<?=isset($_SESSION['store']['email'])? $_SESSION['store']['email']:null;?>" required><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" placeholder="+880123456789" value="<?=isset($_SESSION['store']['phone'])? $_SESSION['store']['phone']:null;?>"><br>
    <label for="password">Password:</label><br>
    <input type="password" placeholder="enter your password" id="password" name="password"><br>
    <span>
            <?php
            if(isset($data['errors']['password'])){
                echo $data['errors']['password'];
            }
            else{
                if(isset($data['errors']['minimum'])){
                    echo $data['errors']['minimum'];
                }
            }
            ?>
        </span><br>
    <input type="password" name="confirm_password" placeholder="confirm password"/>
    <span>
            <?php
            if(isset($data['errors']['notmatched'])){
                echo $data['errors']['notmatched'];
            }
            ?>
        </span><br>
    <label for="profile_photo">Upload a photo</label><br>
    <input type="file" id="profile_photo" name="image"><br>
    <span><?=isset($data['errors']['image'])? $data['errors']['image']:null;?></span><br>
    <br><br>
    <input type="submit" value="submit">
    <span><?=isset($data['errors']['no_file'])? $data['errors']['no_file']:null;?></span><br>
</form>

<a href="admin_login.php">Go back to login</a>
