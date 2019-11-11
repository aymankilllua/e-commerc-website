<?php
session_start();
?>

<div class="container  text-center mt-5 p-5">
    <form class="login"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" class="form-control" id="email" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</div>

<?php

include "phpfunction/header.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $hashpass = sha1($_POST["password"]);
    
    $stmt = $con->prepare("SELECT
                            userid,username,userpass
                           FROM 
                           users
                           WHERE
                           username = ?
                           AND
                           userpass = ?
                           LIMIT 1  
                            ");
    $stmt->execute(array($user,$hashpass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();


    if( $count > 0){
        $_SESSION["username"]=$user;
        $_SESSION["ID"] = $row["userid"];
        $_SESSION["admin"] = $row["Admin"];
        header("location:Home.php");
        exit();
    }else{
        echo "error";
    }
}

?>