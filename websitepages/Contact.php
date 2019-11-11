<?php

include "navbar.php";

navbar("Contact","#ff5252");
?>


<div class="container-fluid contact">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
             <div class="col-md-6 col-sm-12 p-5 coninfo">
                    <div class="form-group mb-5">
                           <h1 class="text-light text-center">
                               Write us
                           </h1>
                           <hr class="bg-danger w-50 " />
                          </div>
                        <div class="form-group">
                          <label for="email" class="text-light">Name</label>
                          <input type="text" class="form-control" id="email" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                                <label for="email" class="text-light">Number</label>
                                <input type="text" class="form-control" id="email" name="Number" placeholder="Number" required>
                        </div>
                        <div class="form-group">
                                <label for="email" class="text-light">Email</label>
                                <input type="email" class="form-control" id="email" name="Email" placeholder="Email" required>
                        </div>
                        
                
        </div>
        <div class="col-md-6 col-sm-12 p-5 conmasseg">
            <div class="row">
                
                <div class="form-group col-12 mt-5 ">
                        <label for="email" class="text-light">Massege</label>
                        <textarea height=500px type="text" class="form-control" id="email" name="massege" placeholder="Write your massage here"  required></textarea>
                </div>
                <div class="form-group col-12 ">
                        <button type="submit" class="btn">Send massge</button>
                </div>
            </div>
        </div>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
</div>


<?php
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     $name = $_POST["name"];
     $number = $_POST["Number"];
     $email = $_POST["Email"];
     $message = $_POST["massege"];

     $stmt = $con->prepare("INSERT INTO message(messagename , messagenumber , messageemail , message)
                                VALUE(:zmessagename,:zmessagenumber,:zmessageemail,:zmessage)");
     $stmt->execute(array(
        ":zmessagename" => $name ,
        ":zmessagenumber" => $number,
        ":zmessageemail" => $email ,
        ":zmessage" => $message

     ));

     ?>
     <div class="alert alert-success">
            <strong>Success!</strong> your message has been sent , have a good day.
          </div>
     <?php
 } 

?>