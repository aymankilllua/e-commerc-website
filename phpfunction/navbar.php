<?php
$user = $_SESSION["username"];
$admin = 1;
$stmt = $con->prepare("SELECT
                            userid,username
                           FROM 
                           users
                           WHERE
                           username = ?
                           AND
                           admins = ?
                           LIMIT 1  
                            ");
$stmt->execute(array($user,$admin));
$row = $stmt->fetch();
$count = $stmt->rowCount();
?>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #130f40;">
        <a class="navbar-brand" href="Home.php">TE-commerc |</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-align-center"></i></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item text-light">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
                <?php

if($count > 0) { echo '<li class="nav-item text-light"><a class="nav-link" href="users.php?user=users">Users</a></li>';
                  }
               ?>
                
            </ul>
            <div class=" my-2 my-lg-0 text-light">
                <?php 
                 if(isset($_SESSION["username"])){
                    echo $_SESSION["username"] . " | ";
                }
                 ?>
            </div>
            <div class=" my-2 my-lg-0 text-light">
            <a class="nav-link text-light" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    
