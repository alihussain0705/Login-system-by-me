<?php
  $login=false;
  $showerror=false;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "partials/_dbconnect.php";
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql="SELECT * FROM `user` WHERE username='a'AND password='a'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
      $login=true;
      session_start();
      $_SESSION["loggedin"]=true;
      $_SESSION["username"]=$username;
      header("location: welcome.php");
    }
    else{
      $showerror="Invalid credentials";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>login</title>
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
    <form action="login.php" method="post">
      <div class="scontainer">
        <div class="shead">
          <h3>LOGIN</h3>
        </div>
        <div class="susername selement">
          <h6>Username</h6>
          <input type="text" placeholder="Enter username" name="username" />
        </div>
        <div class="spassword selement">
          <h6>Password</h6>
          <input type="password" placeholder="Enter username" name="password" />
        </div>
        <div class="sbtn">
        <input type="submit" value="LOGIN"/>
        </div>
        <div class="stext">
          <p style="text-align: center">
            Dont have an account?
            <a href="signup.php"><br />Create account!</a>
          </p>
        </div>
      </div>
    </form>
    <?php
    
      if($login){
        echo '<div class="alert alert-success alert-dismissible fade show my-4 w-25 mx-auto" role="alert">
        <strong>Success!</strong> you can log in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      if($showerror){
        echo '<div class="alert alert-danger alert-dismissible fade show my-4 w-25 mx-auto" role="alert">
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
