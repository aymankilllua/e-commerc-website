<?php
 session_start();
  if(isset($_SESSION["username"])){
      include "phpfunction/header.php";
      include "phpfunction/navbar.php";
     ?>


   <div class="container mt-5 p-5">
       <div class="row">
           <div class="col-md-4 col-sm-12 ">
               <div class="field text-dark pt-5 color1">
                   <!-- field name -->
                   <a href="post.php?posts=men"> <h1 class="text-center pt-1">Men</h1></a>
               </div>
           </div>
           <div class="col-md-4 col-sm-12">
               <div class="field text-dark pt-5 color2">
                   <!-- field name -->
                   <a href="post.php?posts=women"> <h1 class="text-center pt-1">Women</h1></a>

               </div>
           </div>
           <div class="col-md-4 col-sm-12">
               <div class="field text-dark pt-5 color3">
                   <!-- field name -->
                   <a href="post.php?posts=child"> <h1 class="text-center pt-1">Child</h1></a>

               </div>
           </div>
       </div>
   </div>

   <div class="container-fluid Controll ">
    <div class="controll" >
        <div class="row">
            <div class="col-md-6 d-none d-md-block d-lg-block"><?php echo" "; ?></div>
            <div class="col-md-6 color  text-light">
                <div class="row">
                    <div class="col-4"><h2 class="text-center"><a href="post.php?post=add">Add Post</a></h1></div>
                    <div class="col-4"><h2 class="text-center"><a href="post.php?post=edit">Edit Post</a></h1></div>
                    <div class="col-4"><h2 class="text-center"><a href="post.php?post=delete">Delet Post</a></h1></div>
                </div>
            </div>
        </div>
    </div>
</div>

   
    <?php
  }else{
      header("admin.php");
  }
?>