<?php
include "navbar.php";


$order = "";

if(isset($_GET["postid"])){
$order = $_GET["postid"];
}else{
    $order = "";
}

if($order ==  $order  ){
    $stmt = $con->prepare("SELECT * FROM post WHERE postid = ?  LIMIT 1");
    $stmt->execute(array($order));
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
        
    
?>
        <div class="container w-50 w-sm-100 mt-4">
         <form action="<?php echo $_SERVER['PHP_SELF']."?postid=".$order; ?>" method="POST">
            <div class="form-group">
              <label for="email">cleint  FullName:</label>
              <input type="text" class="form-control" id="email" name="fullname" required>
            </div>
            <div class="form-group">
                    <label for="pwd">Identycard number :</label>
                    <input type="text" class="form-control" id="pwd" name="identycard" required>
                    
        </div>
        <div class="form-group">
                    <label for="pwd">Phone number:</label>
                    <input type="text" class="form-control" id="pwd" name="phonenumber" required>
        </div>
            <div class="form-group">
                <label for="sel12">How many:</label>
                <input type="number" class="form-control" id="sel12" name="number">

            </div>

            <div class="form-group">
              <label for="pwd">Price:</label>
              <input type="text" class="form-control" id="price" name="price" value="<?php echo $row["postprice"] ?>" required>
              <input type="text" class="form-control d-none" id="mainprice"  value="<?php echo $row["postprice"] ?>">
            </div>
            
            <div class="form-group">
              <label for="pwd">Item Code:</label>
              <input type="text" class="form-control" id="pwd" name="postcode" value="<?php echo $row["postcode"]; 
              ?>" required>
            </div>
            <div class="form-group">
              <label for="pwd">Address:</label>
              <input type="text" class="form-control" id="pwd" name="location" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
      <?php }
      if($_SERVER["REQUEST_METHOD"] == "POST"){
           $orderclientname = $_POST["fullname"];
           $ordercard = $_POST["identycard"];
           $ordermobil=$_POST["phonenumber"];
           $ordernumbers = $_POST["number"];
           $orderprice =$_POST["price"];
           $ordercode =$_POST["postcode"];
           $orderlocation = $_POST["location"];
            $PLUSEONE =""; 
           
           $stmt = $con->prepare("INSERT INTO orders(orderclientname,ordercard,ordermobil,ordernumbers,orderprice,ordercode,orderlocation , orderdate)
                                                VALUE(:zorderclientname,:zordercard,:zordermobil,:zordernumbers,:zorderprice,:zordercode,:zorderlocation ,Now())");
           $stmt->execute(array(
            ":zorderclientname" =>$orderclientname,
            ":zordercard"=>$ordercard ,
            ":zordermobil"=> $ordermobil,
            ":zordernumbers"=>$ordernumbers,
            ":zorderprice"=> $orderprice ,
            ":zordercode"=> $ordercode ,
            ":zorderlocation"=> $orderlocation ,
           )); 

          
           
           
           header("location:Home.php");
           


      }

}
?>