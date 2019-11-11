<?php
session_start(); 
  if(isset($_SESSION["username"])){
      include "phpfunction/header.php";
      include "phpfunction/navbar.php";

      $user = "";
      if(isset($_GET["user"])){
          $user = $_GET["user"];
      }else{
          $user = "users"; 
      }

      if($user == "users"){
      ?>
      <div class="container mt-3">
          <div class="row">
      <table class="table table-striped col-md-12 col-6">
            <thead>
              <tr>
                <th>userID</th>
                <th>Username</th>
                <th>fullname</th>
                <th>Emails</th>
              </tr>
            </thead>
            <tbody>
                <?php 

                $stmt= $con->prepare("SELECT * FROM
                                      users
                                      WHERE
                                      admins = 0
                ");
                $stmt->execute();
                $rows = $stmt->fetchAll();
                foreach ($rows as  $row) {
                   echo '<tr>
                   <td>'.$row["userid"].'</td>
                   <td>'.$row["username"].'</td>
                   <td>'.$row["fullname"].'</td>
                   <td>'.$row["email"].'</td>
                 </tr>';
                }
                 ?>
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="container-fluid Controll ">
          <div class="controll" >
              <div class="row">
                  <div class="col-md-6 d-none d-md-block d-lg-block"><?php echo" "; ?></div>
                  <div class="col-md-6 color  text-light">
                      <div class="row">
                          <div class="col-4"><h2 class="text-center"><a href="users.php?user=add">Add User</a></h1></div>
                          <div class="col-4"><h2 class="text-center"><a href="users.php?user=edit">Edit User</a></h1></div>
                          <div class="col-4"><h2 class="text-center"><a href="users.php?user=delete">Delet User</a></h1></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php
      }elseif($user == "add"){
         ?>
         <div class="container">
         <form action="<?php echo $_SERVER['PHP_SELF'].'?user=add'; ?>" method="POST">
            <div class="form-group">
              <label for="email">User Name:</label>
              <input type="text" class="form-control" id="email" name="username">
            </div>
            <div class="form-group">
                    <label for="pwd">Full Name:</label>
                    <input type="text" class="form-control" id="pwd" name="fullname">
        </div>
        <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" id="pwd" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div> 
     <?php

     if($_SERVER["REQUEST_METHOD"] == "POST"){
         $username = $_POST["username"];
         $fullname = $_POST["fullname"];
         $email = $_POST["email"];
         $password = $_POST["password"];
         $hashpass = sha1($_POST["password"]);          

         $stmt = $con->prepare("INSERT INTO users( username , fullname , email ,userpass) 
                                                  VALUES(:zuser,:zfullname,:zemail,:zpass)");
               $stmt->execute(array(
                   "zuser" => $username,
                   "zfullname" => $fullname,
                   "zemail" => $email,
                   "zpass" => $hashpass,
               ));

               header("Location:users.php");
     }

    }elseif($user == "edit"){
        ?>


<div class="container mt-3">
          <div class="row">
      <table class="table table-striped col-md-12 col-6">
            <thead>
              <tr>
                <th>userID</th>
                <th>Username</th>
                <th>fullname</th>
                <th>Emails</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $stmt= $con->prepare("SELECT * FROM
                                      users
                                      WHERE
                                      admins = 0
                ");
                $stmt->execute();
                $rows = $stmt->fetchAll();
                foreach ($rows as  $row) {
                    
                   echo '<tr>
                   <td>'.$row["userid"].'</td>
                   <td>'.$row["username"].'</td>
                   <td>'.$row["fullname"].'</td>
                   <td>'.$row["email"].'</td>
                   <td>
                    <a href="users.php?user=editing&userid='.$row["userid"].'"><botton class="btn btn-info" >Edit</botton></a>
                   </td>
                 </tr>';
                }
                 ?>
              
            </tbody>
          </table>
        </div>
      </div>
      <?php
      
      }elseif($user == "editing" ){
        $userid = isset($_GET["userid"]) && is_numeric($_GET["userid"]) ? intval($_GET["userid"]): 0 ;
          $stmt = $con->prepare("SELECT * FROM users WHERE userid = ? AND admins=0 LIMIT 1 ");
          $stmt->execute(array($userid));
          $row = $stmt->fetch();
          $count = $stmt->rowCount();

          if($stmt->rowCount() > 0){ 
              ?>
              
              <div class="container">
         <form action="<?php echo $_SERVER['PHP_SELF'].'?user=editing'; ?>" method="POST">
            <div class="form-group">
              <label for="email">User Name:</label>
              <input type="text" class="form-control" id="email" name="username" value="<?php echo $row["username"]?>">
              <input type="text" class="form-control d-none" id="email" name="userid" value="<?php echo $row["userid"]?>">
            </div>
            <div class="form-group">
                    <label for="pwd">Full Name:</label>
                    <input type="text" class="form-control" id="pwd" name="fullname" value="<?php echo $row["fullname"]?>">
        </div>
        <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" id="pwd" name="email" value="<?php echo $row["email"]?>">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control d-none" id="pwd" name="oldpassword" value="<?php echo $row["userpass"]?>">
              <input type="password" class="form-control" id="pwd" name="newpassword" value="">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
              
              
              
              
              <?php
          }
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = $_POST["username"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $pass= empty($_POST["newpassword"]) ? $pass = $_POST["oldpassword"] : $pass = sha1($_POST['newpassword']) ;            $userid = $_POST["userid"];
   
            $stmt = $con->prepare("UPDATE users SET username = ? , fullname = ?  , email = ? , userpass = ? WHERE userid=?");
                  $stmt->execute(array(
                      $username,
                      $fullname,
                     $email,
                    $pass,
                    $userid
                  ));
   
                  header("Location:users.php");
        }
      }



      elseif($user == "delete"){?>


<div class="container mt-3">
          <div class="row">
      <table class="table table-striped col-md-12 col-6">
            <thead>
              <tr>
                <th>userID</th>
                <th>Username</th>
                <th>fullname</th>
                <th>Emails</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php 

                $stmt= $con->prepare("SELECT * FROM
                                      users
                                      WHERE
                                      admins = 0
                ");
                $stmt->execute();
                $rows = $stmt->fetchAll();
                foreach ($rows as  $row) {
                   echo '<tr>
                   <td>'.$row["userid"].'</td>
                   <td>'.$row["username"].'</td>
                   <td>'.$row["fullname"].'</td>
                   <td>'.$row["email"].'</td>
                   <td><a href="users.php?user=Deleting&userid='.$row["userid"].'"><botton class="btn btn-danger" >Delete</botton></a></td>

                 </tr>';
                }
                 ?>
              
            </tbody>
          </table>
        </div>
      </div>
        

     <?php }elseif($user == "Deleting" ){
                $userid = isset($_GET["userid"]) && is_numeric($_GET["userid"]) ? intval($_GET["userid"]): 0 ;
                $stmt = $con->prepare("SELECT * FROM users WHERE userid = ?  LIMIT 1 ");
               $stmt->execute(array($userid));
               $row = $stmt->fetch();
               $count = $stmt->rowCount();
               
        
               if($stmt->rowCount() > 0){
                   $stmt = $con->prepare("DELETE FROM users WHERE userid = :zuser");
                   $stmt->bindParam(":zuser",$userid);
                   $stmt->execute();
                  
                   header("location:users.php");
        
               }

     }

     
  }else{
      echo "there is no page like it";
  }
?>