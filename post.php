<?php 
session_start(); 
if(isset($_SESSION["username"])){
    include "phpfunction/header.php";
    include "phpfunction/navbar.php";
    $username = $_SESSION["username"];


/* show the posts */

    $posts = "";
    if(isset($_GET["posts"])){
        $posts=$_GET["posts"];
    }elseif(!isset($_GET["posts"])){
        $posts = "";
    }else{
        $posts = "men";
    }

    if($posts == "men"){
        $postfield = isset($_GET["posts"]) && is_string($_GET["posts"]) ? $_GET["posts"]: null ;

        $stmt = $con->prepare("SELECT * from  post WHERE fieldname = ?");
        $stmt->execute(array($postfield));
        $rows = $stmt->fetchAll();
        
           ?>
           <div class="container-fluid p-5 ">

            <div class="row">
            <?php foreach ($rows as $row) {?>

                <div class="col-md-4 col-sm-12 mt-5">
                    <div class="item">
                    <div class="row">
                    <div class="itemimg col-12">
                        <img src=".\pic\<?php echo $row["postimg"] ?>" alt="img"/>
                    </div>
                    <div class="itemtext col-12">
                        <h3 class=""><?php echo $row['postname']?></h3>
                        <h5 class=""><?php echo $row['postcode']?></h5>
                        <p class="">Lorem Ipsum is simply dummy text of the 
                            printing and typesetting industry. Lorem Ipsum 
                            has been the industry's standard dummy text ever
                              </p>
                        <h5 class="text-success"><?php echo $row['postprice']?></h5>
                    </div>
                    </div>
            </div>
                </div>
                <?php } ?>
            </div>

           </div>
        <?php
           

    }elseif ($posts == "women") {
        $postfield = isset($_GET["posts"]) && is_string($_GET["posts"]) ? $_GET["posts"]: null ;

        $stmt = $con->prepare("SELECT * from  post WHERE fieldname = ?");
        $stmt->execute(array($postfield));
        $rows = $stmt->fetchAll();
        
           ?>
           <div class="container-fluid p-5 ">

            <div class="row">
            <?php foreach ($rows as $row) {?>

                <div class="col-md-4 col-sm-12 mt-5">
                    <div class="item">
                    <div class="row">
                    <div class="itemimg col-12">
                        <img src=".\pic\<?php echo $row["postimg"] ?>" alt="img"/>
                    </div>
                    <div class="itemtext col-12">
                        <h3 class=""><?php echo $row['postname']?></h3>
                        <h5 class=""><?php echo $row['postcode']?></h5>
                        <p class="">Lorem Ipsum is simply dummy text of the 
                            printing and typesetting industry. Lorem Ipsum 
                            has been the industry's standard dummy text ever
                              </p>
                        <h5 class="text-success"><?php echo $row['postprice']?></h5>
                    </div>
                    </div>
            </div>
                </div>
                <?php } ?>
            </div>

           </div>
        <?php
    }elseif ($posts == "child") {
        $postfield = isset($_GET["posts"]) && is_string($_GET["posts"]) ? $_GET["posts"]: null ;

        $stmt = $con->prepare("SELECT * from  post WHERE fieldname = ?");
        $stmt->execute(array($postfield));
        $rows = $stmt->fetchAll();
        
           ?>
           <div class="container-fluid p-5 ">

            <div class="row">
            <?php foreach ($rows as $row) {?>

                <div class="col-md-4 col-sm-12 mt-5">
                    <div class="item">
                    <div class="row">
                    <div class="itemimg col-12">
                        <img src=".\pic\<?php echo $row["postimg"] ?>" alt="img"/>
                    </div>
                    <div class="itemtext col-12">
                        <h3 class=""><?php echo $row['postname']?></h3>
                        <h5 class=""><?php echo $row['postcode']?></h5>
                        <p class="">Lorem Ipsum is simply dummy text of the 
                            printing and typesetting industry. Lorem Ipsum 
                            has been the industry's standard dummy text ever
                              </p>
                        <h5 class="text-success"><?php echo $row['postprice']?></h5>
                    </div>
                    </div>
            </div>
                </div>
                <?php } ?>
            </div>

           </div>
        <?php
    }






/* editing or add or delete posts */
    $post = "";
    if(isset($_GET["post"])){
        $post = $_GET["post"];
    }elseif(!isset($_GET["post"])){
        $post = "";
    }else{
        $post = "add";
    }

    if($post == "add"){


        ?>
        <div class="container w-50 w-sm-100 mt-4">
         <form action="<?php echo $_SERVER['PHP_SELF'].'?post=add'; ?>" method="POST">
            <div class="form-group">
              <label for="email">Post Name:</label>
              <input type="text" class="form-control" id="email" name="postname">
            </div>
            <div class="form-group">
                    <label for="pwd">Post image:</label>
                    <input type="file" class="form-control" id="pwd" name="postimg">
                    
        </div>
        <div class="form-group">
                    <label for="pwd">Post price:</label>
                    <input type="text" class="form-control" id="pwd" name="postprice">
        </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>
                 <select class="form-control" id="sel1" name="fieldname">
                 <option value='0'> </option>;
                     <?php
                     $stmt = $con->prepare("SELECT * from  field");
                     $stmt->execute();
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["fieldname"].">".$row["fieldname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group" id="men">
                <label for="selmen">Select list For Men:</label>
                 <select class="form-control" id="selmen" name="categoresmen">
                     <?php
                     $stmt = $con->prepare("SELECT * from  categores WHERE fieldname = ?");
                     $stmt->execute(array("men"));
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["catname"].">".$row["catname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group" id="women">
                <label for="selwomen">Select list For Women:</label>
                 <select class="form-control" id="selwomen" name="categoreswomen">
                     <?php
                     $stmt = $con->prepare("SELECT * from  categores WHERE fieldname = ?");
                     $stmt->execute(array("women"));
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["catname"].">".$row["catname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group" id="child">
                <label for="selchild">Select list For Child:</label>
                 <select class="form-control" id="selchild" name="categoreschild">
                     <?php
                     $stmt = $con->prepare("SELECT * from  categores WHERE fieldname = ?");
                     $stmt->execute(array("child"));
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["catname"].">".$row["catname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group">
              <label for="pwd">Item Code:</label>
              <input type="text" class="form-control" id="pwd" name="postcode">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $postname = $_POST["postname"];
        $postimg = $_POST["postimg"];
        $postprice = $_POST["postprice"];
        $postfield = $_POST["fieldname"];
        $postcode = $_POST['postcode'];

        $cate = "";
        if(empty($_POST["categoresmen"])){
            $cate = $_POST["categoreswomen"];
        }elseif (empty($_POST["categoreswomen"])) {
            $cate = $_POST["categoreschild"];

        }elseif(empty($_POST["categoreschild"])){
            $cate = $_POST["categoresmen"];
        }

        $stmt = $con->prepare("INSERT INTO post( postname , postimg , postprice ,fieldname,catname,postcode,username,postdate) 
                                                  VALUES(:zpostname,:zpostimg,:zpostprice,:zfieldname,:zcatname ,:zpostcode,:zusername,CURRENT_DATE() )");
               $stmt->execute(array(
                   ":zpostname" =>$postname ,
                   ":zpostimg" =>$postimg ,
                   ":zpostprice" => $postprice,
                   ":zfieldname" => $postfield,
                   ":zcatname" => $cate,
                   ":zpostcode" =>$postcode ,
                   ":zusername" =>$username ,
                   
               ));

               

   
    }

    
    }elseif ($post == "edit") {

        $stmt = $con->prepare("SELECT * FROM post");
        $stmt->execute();
        $rows = $stmt->fetchAll();

            ?>
            <div class="container-fluid p-4">
                <div class="row">
                    <?php      
                   foreach ($rows as $row) {
                    
                    ?>
            <div class="col-md-3 col-sm-12">
           <form action="<?php echo $_SERVER['PHP_SELF'].'?post=editing&postid='.$row['postid']; ?>" method="POST" onclick=submit() class="cursur">
                    <div class="item">
                    <div class="row">
                    <div class="itemimg col-12">
                        <img src=".\pic\<?php echo $row["postimg"] ?>" alt="img"/>
                    </div>
                    <div class="itemtext col-12">
                        <h3 class=""><?php echo $row['postname']?></h3>
                        <h5 class=""><?php echo $row['postcode']?></h5>
                        <p class="">Lorem Ipsum is simply dummy text of the 
                            printing and typesetting industry. Lorem Ipsum 
                            has been the industry's standard dummy text ever
                              </p>
                        <h5 class="text-success"><?php echo $row['postprice']?></h5>
                    </div>
                    </div>
            </div>
          </form>
                </div>
                   <?php }?>
        </div>
      </div>

            <?php
        














    }elseif ( $post == "editing" ) {
        $postid = isset($_GET["postid"]) && is_numeric($_GET["postid"]) ? intval($_GET["postid"]): 0 ;
        echo "hello in posts editing".$postid;

        $stmt = $con->prepare("SELECT * FROM post WHERE postid=? ");
        $stmt->execute(array($postid));
        $rom = $stmt->fetch();
?>


<div class="container w-50 w-sm-100 mt-4">
         <form action="<?php echo $_SERVER['PHP_SELF']."?post=insertupdate"; ?>" method="POST">
         <div class="form-group">
              <label for="email">Post Name:</label>
              <input class="d-none" type="text" class="form-control" id="email" name="postid" value="<?php echo $rom["postid"] ?>">
            </div>
            <div class="form-group">
              <label for="email">Post Name:</label>
              <input type="text" class="form-control" id="email" name="postname" value="<?php echo $rom["postname"] ?>">
            </div>
            <div class="form-group">
                    <label for="pwd">Post image:</label>
                    <input type="file" class="form-control" id="pwd" name="postimg" value="<?php echo $rom["postimg"] ?>">
                    
        </div>
        <div class="form-group">
                    <label for="pwd">Post price:</label>
                    <input type="text" class="form-control" id="pwd" name="postprice" value="<?php echo $rom["postprice"] ?>">
        </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>
                 <select class="form-control" id="sel1" name="fieldname" value="<?php echo $rom["fieldname"] ?>">
                 <option value='0'> </option>;
                     <?php
                     $stmt = $con->prepare("SELECT * from  field");
                     $stmt->execute();
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["fieldname"].">".$row["fieldname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group" id="men">
                <label for="selmen">Select list For Men:</label>
                 <select class="form-control" id="selmen" name="categoresmen" value="<?php echo $rom["catname"] ?>">
                     <?php
                     $stmt = $con->prepare("SELECT * from  categores WHERE fieldname = ?");
                     $stmt->execute(array("men"));
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["catname"].">".$row["catname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group" id="women">
                <label for="selwomen">Select list For Women:</label>
                 <select class="form-control" id="selwomen" name="categoreswomen" value="<?php echo $rom["catname"] ?>">
                     <?php
                     $stmt = $con->prepare("SELECT * from  categores WHERE fieldname = ?");
                     $stmt->execute(array("women"));
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["catname"].">".$row["catname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group" id="child">
                <label for="selchild">Select list For Child:</label>
                 <select class="form-control" id="selchild" name="categoreschild" value="<?php echo $rom["catname"] ?>">
                     <?php
                     $stmt = $con->prepare("SELECT * from  categores WHERE fieldname = ?");
                     $stmt->execute(array("child"));
                     $rows = $stmt->fetchAll();
                     foreach ($rows as $row) {
                  echo "<option value=".$row["catname"].">".$row["catname"]."</option>";
                     }
                     ?>
                </select>
            </div>
            <div class="form-group">
              <label for="postcode">Item Code:</label>
              <input type="text" class="form-control" id="postcode" name="postcode" value =<?php echo $rom['postcode'] ?> />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div> 





  <?php 



}elseif($post == "insertupdate"){
    if($_SERVER["REQUEST_METHOD"] === "POST" ){
        $postname = $_POST["postname"];
        $postimg = $_POST["postimg"];
        $postprice = $_POST["postprice"];
        $postfield = $_POST["fieldname"];
        $postcode = $_POST['postcode'];
        $postid = $_POST["postid"];
    
        $cate = "";
        if(empty($_POST["categoresmen"])){
            $cate = $_POST["categoreswomen"];
        }elseif (empty($_POST["categoreswomen"])) {
            $cate = $_POST["categoreschild"];
    
        }elseif(empty($_POST["categoreschild"])){
            $cate = $_POST["categoresmen"];
        }
      
        $stmt = $con->prepare("UPDATE post SET postname = ? , postimg = ?  , postprice = ? , fieldname = ? 
                                , postcode =? , catname=? WHERE postid=?");
        $stmt->execute(array(
            $postname,
            $postimg,
            $postprice,
            $postfield,
            $postcode,
            $cate,
            $postid
        ));
    
        header("location:post.php?post=edit");
    
    
    
    }
}elseif ($post == "delete") {

    $stmt = $con->prepare("SELECT * FROM post");
    $stmt->execute();
    $rows = $stmt->fetchAll();

        ?>
        <div class="container-fluid p-4">
            <div class="row">
                <?php      
               foreach ($rows as $row) {
                
                ?>
        <div class="col-md-3 col-sm-12">
       <form action="<?php echo $_SERVER['PHP_SELF'].'?post=deleting&postid='.$row['postid']; ?>" method="POST" onclick=submit() class="cursur">
                <div class="item">
                <div class="row">
                <div class="itemimg col-12">
                    <img src=".\pic\<?php echo $row["postimg"] ?>" alt="img"/>
                </div>
                <div class="itemtext col-12">
                    <h3 class=""><?php echo $row['postname']?></h3>
                    <h5 class=""><?php echo $row['postcode']?></h5>
                    <p class="">Lorem Ipsum is simply dummy text of the 
                        printing and typesetting industry. Lorem Ipsum 
                        has been the industry's standard dummy text ever
                          </p>
                    <h5 class="text-success"><?php echo $row['postprice']?></h5>
                </div>
                </div>
        </div>
      </form>
            </div>
               <?php }?>
    </div>
  </div>

        <?php
    }elseif($post == "deleting"){
        $postid = isset($_GET["postid"]) && is_numeric($_GET["postid"]) ? intval($_GET["postid"]): 0 ;

        
        $stmt = $con->prepare("SELECT * FROM post WHERE postid = ?  LIMIT 1 ");
        $stmt->execute(array($postid));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        
 
        if($stmt->rowCount() > 0){
            $stmt = $con->prepare("DELETE FROM post WHERE postid = :zpost");
            $stmt->bindParam(":zpost",$postid);
            $stmt->execute();
           
            header("location:Home.php");
 
        }
    }








?>




<?php
}else{
    echo "there is no page here";
}
?>