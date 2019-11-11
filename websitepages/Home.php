<?php

include "navbar.php";

navbar("Home","#ffff03");

?>

<?php  

$stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
$stmt->execute(array("men"));
$row = $stmt->fetch();


?>

<div class="container-fluid  section color">
    <div class="row home1">
        <div class="col-md-6 col-sm-12 mt-5 p-5 text-left">
         <h1>TE-commerc</h1>
         
             <h3 class="d-inline p-2"> Store </h3>
             <p class="d-inline"> is simply dummy text of the printing<br/>
             and typesetting industry.
             Lorem Ipsum has been the industry's<br/>
             standard dummy text ever since the 1500s
         </p>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="img">
                <img src="pic/home1.png"/>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid bg-light section p-5  ">
    <div class="container bg-light mt-5 section ">
    <div class="row home2">
      <div class="col-md-4 col-sm-12 p-0">
            <?php
            $stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
            $stmt->execute(array("men"));
            $men = $stmt->fetch();
            ?>
            <a class="text-dark" href="<?php echo "post.php?fieldname=".$men["fieldname"]; ?>">
          <div class="row">
              <div class="col-12 home2color"><br/></div>
          <div class="img col-12  p-5">
              <img src="pic/pngfolder/men.png" class="p-5"/>
          </div>
          <div class="text col-12 p-5">
              <h3 class="text-center">
                     <?php echo $men["fieldname"];?> 
              </h3>
          </div>
        </div>
    </a>
      </div>
      <div class="col-md-4 col-sm-12 p-0">
            <?php
            $stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
            $stmt->execute(array("women"));
            $women = $stmt->fetch();
            ?>
            <a class="text-dark" href="<?php echo "post.php?fieldname=".$women["fieldname"]; ?>">
            <div class="row">
                    <div class="col-12 home2color"><br/></div>
                <div class="img col-12  p-5">
                    <img src="pic/pngfolder/2.png" class="p-5"/>
                </div>
                <div class="text col-12 p-5">
                    <h3 class="text-center">
                            <?php echo $women["fieldname"]; ?>  
                    </h3>
                </div>
              </div>
            </a>
      </div>
      <div class="col-md-4 col-sm-12 p-0">
            <?php
            $stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
            $stmt->execute(array("child"));
            $child = $stmt->fetch();
            ?>
            <a class="text-dark" href="<?php echo "post.php?fieldname=".$child["fieldname"]; ?>">
            <div class="row">
                    <div class="col-12 home2color"><br/></div>
                <div class="img col-12  p-5">
                    <img src="pic/pngfolder/3.png" class="p-5"/>
                </div>
                <div class="text col-12 p-5">
                    <h3 class="text-center">
                             <?php echo $child["fieldname"]; ?>  
                    </h3>
                </div>
              </div>
            </a> 
      </div>
    </div>
    </div>
</div>

<div class="container-fluid section p-5 color">
        <h2 class="text-light text-center">Top Posts ordered</h2>
        <hr class="bg-warning col-3 text-left"/>
        <div class="container home3">
           <div class="row">
                <?php
                $stmt = $con->prepare("SELECT * FROM post ");
                $stmt->execute();
                $rows = $stmt->fetchAll();
                
                foreach ($rows as $row) {
                
                
                    $stmt = $con->prepare("SELECT * FROM orders WHERE ordercode = ? ");
                $stmt->execute(array($row["postcode"]));
                $orders = $stmt->fetch();
                $count = $stmt->rowCount($row["postcode"]);
                if($count > 2){
                
                    $stmt = $con->prepare("SELECT * FROM post WHERE postcode=?");
                    $stmt->execute(array($orders["ordercode"]));
                    $roms = $stmt->fetchAll();

                foreach ($roms as $rom) {
                ?>
            <div class="col-md-4 col-sm-6 p-2 item">
                <div class="img">

                        <img src=".././pic/<?php echo $rom["postimg"] ?>" />

                </div>
                <div class="text">
                    <div class="row">
                    <div class="textone">
                        <div class="row">
                            <div class="postname col-12">
                                <h2 class="text-dark"> <?php echo $rom["postname"]?> </h2></div>
                            <div class="postdec col-12">
                                <p  class="text-dark">is simply dummy text of the 
                                printing and typesetting industry. 
                                Lorem Ipsum has been the industry's 
                                standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled</p></div>
                        </div>
                    </div>
                    <hr/>
                    <div class="texttwo col-12">
                        <hr class="bg-dark"/>
                        <div class="row">
                         <div class="col-6 text-success">$<?php echo $rom["postprice"] ?></div>
                         <div class="col-6"> <a class="text-dark" href="<?php  echo 'ordering.php?postid='.$rom["postid"]; ?>">  GET</a></div>
                        </div>
                    </div>
                    </div>
                </div> 
            </div>


            <?php }
        }else{
           echo " ";
       }
       }
        ?>

           </div>
        </div>
</div>
<div class="container-fluid section color">
        <h2 class="text-light text-center">Recent posts added</h2>
        <hr class="bg-warning col-3 text-left"/>
    <div class="row">
        <div class="col-12 owl-carousel">
                <?php

                $date = checkdate(date("m"),date("d"),date("y"));
                $stmt = $con->prepare("SELECT * FROM post where postdate = CURRENT_DATE() LIMIT 6");
                $stmt->execute(array());
                $rows = $stmt->fetchAll();
                
                
                 foreach ($rows as $row) {
                 
                ?>
            <div>
                    
               <section class="row">
                   <div class="col-md-6 col-sm-12 d-block d-md-none">
                        <div class="img">
                                <img src=".././pic/<?php echo $row["postimg"] ?>" />
                            </div>
                   </div>
                   <div class="col-md-6 col-sm-12 bg-light p-0">
                       <div class="row m-5">
                           <div class="col-12 p-3"><h1><?php echo $row["postname"]?></h1></div>
                           <div class="col-12 "><p class="text-secondary">is simply dummy text of the 
                                printing and typesetting industry. 
                                Lorem Ipsum has been the industry's 
                                standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled
                                is simply dummy text of the 
                                printing and typesetting industry. 
                                Lorem Ipsum has been the industry's 
                                standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled
                                is simply dummy text of the 
                                printing and typesetting industry. 
                                Lorem Ipsum has been the industry's 
                                standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled</p></div>
                           <div class="col-12 itemdata">
                               <div class="row p-0">
                                   <div class="col-6">
                                       <h4 class="text-success">$<?php echo $row["postprice"] ?></h4>
                                   </div>
                                   <div class="col-6 getlink">
                                        <h4><a class="text-dark" href="<?php  echo 'ordering.php?postid='.$rom["postid"]; ?>">GET</a></h4>
                                       <div class="color"><?php echo " " ?></div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6 col-sm-12 d-none d-md-block bg-danger p-0">
                        <div class="img">
                                <img src=".././pic/<?php echo $row["postimg"] ?>" />
                        </div>

                   </div>
               </section>
            </div>
            <?php } ?> 

        </div>
        <br/>
        <br/>
    </div>
</div>










<!-- <div class="container-fluid p-5 section">
    <div class="row">
    <div class="col-md-4 col-sm-12 mt-5 p-0 "> 
        <img src="pic/pngfolder/men.png" />
        <?php
        $stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
        $stmt->execute(array("men"));
        $men = $stmt->fetch();
        ?>
        <h1 class="p-5"> <a href="<?php echo "post.php?fieldname=".$men["fieldname"]; ?>"> <?php echo $men["fieldname"];?> </a> </h1></div>
    <div class="col-md-4 col-sm-12 mt-5 p-0 "> 
        <img src="pic/2.png" />
        <?php
        $stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
        $stmt->execute(array("women"));
        $women = $stmt->fetch();
        ?>
        <h1 class="p-5"> <a href="<?php echo "post.php?fieldname=".$women["fieldname"]; ?>"> <?php echo $women["fieldname"]; ?>  </a> </h1></div>
    <div class="col-md-4 col-sm-12 mt-5 p-0 "> 
        <img src="pic/3.png" />
        <?php
        $stmt = $con->prepare("SELECT fieldname FROM field WHERE fieldname = ?");
        $stmt->execute(array("child"));
        $child = $stmt->fetch();
        ?>
        <h1 class="p-5"> <a href="<?php echo "post.php?fieldname=".$child["fieldname"]; ?>"> <?php echo $child["fieldname"]; ?>  </a> </h1></div>
    </div>
</div> 
<br/>
<br/>
<br/>
<?php



    
        ?>

<div class="container-fluid">
        <div class="row">
            <h2 class="col-12 text-dark mb-5">The orders Added <i class="fas fa-arrow-right"></i></h2>
            <br/>
            <br/>
            <div class="col-12 ">
                <div class="row">
                    items from database  which recent added
                    <?php
                     $stmt = $con->prepare("SELECT * FROM post ");
                     $stmt->execute();
                     $rows = $stmt->fetchAll();
                     
                     foreach ($rows as $row) {
                     
                     
                         $stmt = $con->prepare("SELECT * FROM orders WHERE ordercode = ? ");
                     $stmt->execute(array($row["postcode"]));
                     $orders = $stmt->fetch();
                     $count = $stmt->rowCount($row["postcode"]);
                     if($count > 2){
                     
                         $stmt = $con->prepare("SELECT * FROM post WHERE postcode=?");
                         $stmt->execute(array($orders["ordercode"]));
                         $roms = $stmt->fetchAll();

                     foreach ($roms as $rom) {
                     ?>
                    <div class="col-md-4 col-sm-12 itemcard mt-5">
                        <div class="itemimg">
                            <img src=".././pic/<?php echo $rom["postimg"] ?>" />
                        </div>
                        <div class="itemtext">
                            <p><h3 class="d-inline">Name : <?php echo $rom["postname"]?> </h3>
                               
                            </p>
                            <p><h4 class="d-inline">description : </h4>
                                is simply dummy text of
                             the printing and typesetting industry.
                             Lorem Ipsum has been the industry's
                             standard dummy text ever since
                             the 1500s, when an unknown printer 
                             took a galley of type and scrambled.
                            </p>
                            <p><h5 class="text-light d-inline">Price : </h5>
                            <span class="text-success"> $<?php echo $rom["postprice"] ?> </span>
                            </p>
                        </div>
                    </div>
                     <?php }
                     }else{
                        echo " ";
                    }
                    }
                     ?>
                    <!-- items from database  which recent added                 
                </div>
            </div>
        </div>
    </div>


    <?php
    
        





?>


<br/>
<br/>
<br/>
<br/>

<?php


$stmt = $con->prepare("SELECT * FROM post where postdate = ? LIMIT 6");
$stmt->execute(array(date("d")));
$rows = $stmt->fetchAll();


?>

<div class="container-fluid">
        <div class="row">
            <h2 class="col-12 text-dark mb-5">The Recent Added <i class="fas fa-arrow-right"></i></h2>
            <br/>
            <br/>
            <div class="col-12 ">
                <div class="row">
                    <!-- items from database  which recent added
                    <?php
                     foreach ($rows as $row) {
                     ?>
                    <div class="col-md-4 col-sm-12 itemcard mt-5">
                        <div class="itemimg">
                            <img src=".././pic/<?php echo $row["postimg"] ?>" />
                        </div>
                        <div class="itemtext">
                            <p><h3 class="d-inline">Name : <?php echo $row["postname"]?> </h3>
                               
                            </p>
                            <p><h4 class="d-inline">description : </h4>
                                is simply dummy text of
                             the printing and typesetting industry.
                             Lorem Ipsum has been the industry's
                             standard dummy text ever since
                             the 1500s, when an unknown printer 
                             took a galley of type and scrambled.
                            </p>
                            <p><h5 class="text-light d-inline">Price : </h5>
                            <span class="text-success"> $<?php echo $row["postprice"] ?> </span>
                            </p>
                        </div>
                    </div>
                     <?php }?>
                    <!-- items from database  which recent added                  
                </div>
            </div>
        </div>
    </div>


 -->