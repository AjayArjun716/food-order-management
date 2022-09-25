<?php include("../config/constants.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login food-order management</title>
    <link rel="stylesheet" href="../css/admin1.css">
</head>
<body>
    <div class="login">
        <h1 class = "text-center">Login</h1><br><br>
          <?php 
           if(isset($_SESSION['login']))
           {
               echo $_SESSION['login'];
               unset ($_SESSION['login']);
           }
           if(isset($_SESSION['no-login-message']))
           {
              echo $_SESSION['no-login-message'];
              unset($_SESSION['no-login-message']);
           }
            ?>
            <br><br>
                <form action="" method="post" class="text-center">
                    Username: <br>
                    <input type="text" name="username" placeholder="Enter Username"> <br><br>
                    Password: <br>
                    <input type="password" name = "password" placeholder="Enter Password">
                    <br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                    <br><br>


                </form>



        <p class = "text-center" >Created by <a href="#"> Arjun</a></p>
    </div>
    
</body>
</html>
<?php 
 if(isset($_POST['submit'])){
     $username = $_POST['username'];
     $password = $_POST['password'];

     $sql="SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

     $res = mysqli_query($conn, $sql);


     $count = mysqli_num_rows($res);

     if($count == 1)
     {
        $_SESSION['login'] = "<div class = 'sucess'>Login Successful </div>";
        $_SESSION['user'] = $username;
        header('location:'.SITEURL.'admin/');

     }
     else{
        $_SESSION['login'] = "<div class = 'error' text = 'center'>Username or Password did not Match </div>";
        header('location:'.SITEURL.'admin/login.php');

     }

     
 }

?>
