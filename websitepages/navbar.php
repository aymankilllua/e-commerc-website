<?php


include "connction.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style\tools\bootstrap4\css\bootstrap-grid.min.css">
    <link rel="stylesheet" href="../style\tools\bootstrap4\css\bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../style\tools\bootstrap4\css\bootstrap.min.css">
    <link rel="stylesheet" href="../style\tools\font-awesome\css\all.css">
    <link rel="stylesheet" href="style\css\style.css">
    <link rel="stylesheet" href="style\css\animate.css">
    <link rel="stylesheet" href="style\css\owl.carousel.min.css">
    <link rel="stylesheet" href="style\css\owl.theme.default.min.css">
    <link rel="stylesheet" href="style\css\owl.theme.green.min.css">


    <script src="../style\tools\bootstrap4\js\bootstrap.bundle.min.js"></script>
    <script src="../style\tools\bootstrap4\js\jquery.min.js"></script>
    <script src="../style\tools\bootstrap4\js\bootstrap.min.js"></script>
    <script src="../style\tools\font-awesome\js\all.js"></script>
    <script src="style\js\frontendfunction.js"></script>
    <script src="style\js\owl.carousel.min.js"></script>
</head>
<body>

<?php 
 function navbar($page,$color){
     
 ?>

    
<div class="container-fluid text-light text-lg height " style="z-index: 10; background: <?php echo $color ?>;">
    
    <div class="row">
        <div class="logo col-8  mt-3">
            <div class="row">
        <h5 class="text-dark col-12 text-left">
            <a href="Home.php">TE-commerc </a> | <a href="#"><?php echo $page; ?></a> </h5>
        </div>
        </div>
        <div class="logo col-4 text-right mt-2 pr-5">
            
            <button class="btn btn-outline-dark" id="menuopen" >
                <i class="fas fa-align-right"></i></button>
        </div>
    </div>
</div>
<div class="container-fluid navvbar ">
    <div class="row">
        <div class="col-12  navvbardiv pt-5  " style=" background: <?php echo $color ?>;">

            <ul>
                <li><h4 class="text-right text-light"><i id="menuclose" class="fa fa-arrow-right icon"></i></h4></li>
                <li class="mt-5"><h4> <a href="Home.php"><i class="fa fa-home"></i> Home </a></h4></li>
                <li class="mt-5"><h4> <a href="About.php"><i class="fas fa-book-reader"></i> About </a></h4></li>
                <li class="mt-5"><h4> <a href="Blog.php"><i class="fas fa-align-center"></i> Blog </a></h4></li>
                <li class="mt-5"><h4> <a href="Contact.php"><i class="fa fa-envelope-open"></i> Contact</a></h4></li>
            </ul>
        </div>
    </div>
</div>

 <?php } ?>