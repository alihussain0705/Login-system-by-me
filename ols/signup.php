<?php
    $showalert=false;
    $showerror=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include "partials/_dbconnect.php";

        $username=$_POST["username"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        // $exists=false;
        $existsql="SELECT * FROM `user` WHERE username = '$username'";
        $result=mysqli_query($conn,$existsql);
        $numexistrows=mysqli_num_rows($result);
        if($numexistrows>0){
          $showerror="Username already exists";
        }
        else{
          // $exists=false;
        if(($password==$cpassword)){
            $sql="INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showalert=true;
            }
            
        }
        else{
            $showerror="Passwords do not match";
        }
      }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>signup</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
        require "partials/_navbar.php";
    ?>
    <form action="signup.php" method="post">
      <div class="scontainer">
        <div class="shead">
          <h3>SIGN UP</h3>
        </div>
        <div class="susername selement">
          <h6>Username</h6>
          <input type="text" placeholder="Enter username" name="username" value="<?php echo isset($username) ? $username : ''; ?>"/>
        </div>
        <div class="spassword selement">
          <h6>Password</h6>
          <input type="password" placeholder="Enter username" name="password" value="<?php echo isset($username) ? $username : ''; ?>"/>
        </div>
        <div class="scpassword selement">
          <h6>Confirm password</h6>
          <input
            type="password"
            placeholder="Enter username"
            name="cpassword"
            value="<?php echo isset($username) ? $username : ''; ?>"
          />
        </div>
        <div class="sbtn">
          <input type="submit" value="SIGN IN"/>
        </div>
        <div class="stext">
          <p>Have an account? <a href="login.php">Login here!</a></p>
        </div>
      </div>
    </form>
    <?php
    
      if($showalert){
        echo '<div class="alert alert-success alert-dismissible fade show my-4 w-25 mx-auto text-center" role="alert">
        <strong>Success!</strong> Your account is now created you can now login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      if($showerror){
        echo '<div class="alert alert-danger alert-dismissible fade show my-4 w-25 mx-auto text-center" role="alert">
        <strong>Error!</strong> '.$showerror.'.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
