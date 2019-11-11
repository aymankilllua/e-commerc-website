<?php
include "navbar.php";



$fieldname = "";

if(isset($_GET["fieldname"])){
$fieldname = $_GET["fieldname"];
}else{
    $fieldname = "";
}

if($fieldname ==  $fieldname  ){
navbar("store for"." ".$fieldname,"#ffff03");
    $stmt = $con->prepare("SELECT * FROM post WHERE fieldname = ? ");
    $stmt->execute(array($fieldname));
    $rows = $stmt->fetchAll();
  ?>
<div class="container mt-2 mb-3">
        <div class="row">
            <h2 class="col-12 text-dark text-center mb-5v mt-5"> Posts <?php echo $fieldname; ?></h2>
            <br/>
            <br/>
            <div class="col-12 mt-5">
                <div class="row">
                    <!-- items from database  which recent added-->
                    <?php
                     foreach ($rows as $row) {
                     ?>
                    <div class="col-md-6 col-sm-12 itemcard mt-5">
                        <a href="<?php  echo 'ordering.php?postid='.$row['postid']; ?>">
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
                            <p><h5 class="text-dark d-inline">Price : </h5>
                            <span class="text-success"> $<?php echo $row["postprice"] ?> </span>
                            </p>
                        </div>
                <a>
                    </div>
                     <?php }?>
                    <!-- items from database  which recent added-->                   
                </div>
            </div>
        </div>
    </div>
<?php
}