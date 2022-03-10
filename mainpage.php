

<?php
$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");
  // $email=mysqli_real_escape_string($db,$_GET['email']);
  // $sql="SELECT customer_id FROM CUSTOMERS WHERE email='$email'";
  // $result=mysqli_query($db,$sql);
  // $id=mysqli_fetch_assoc($result);
//Customer Id
$customer='SELECT CUSTOMER_ID FROM CUSTOMERS';
$customer=mysqli_query($db,$customer);
$customer=mysqli_fetch_all($customer,MYSQLI_ASSOC);
//men products
$men='SELECT NAME FROM products where cat_id in (select cat_id from category where category_name="MEN")';
$men_result=mysqli_query($db,$men);
$men_products=mysqli_fetch_all($men_result,MYSQLI_ASSOC);
//women products
$women='SELECT NAME FROM products where cat_id in (select cat_id from category where category_name="WOMEN")';
$women_result=mysqli_query($db,$women);
$women_products=mysqli_fetch_all($women_result,MYSQLI_ASSOC);
//kid products
$kid='SELECT NAME FROM products where cat_id in (select cat_id from category where category_name="KIDS")';
$kid_result=mysqli_query($db,$kid);
$kid_products=mysqli_fetch_all($kid_result,MYSQLI_ASSOC);
//appliances
$app='SELECT NAME FROM products where cat_id in (select cat_id from category where category_name="APPLIANCES")';
$app_result=mysqli_query($db,$app);
$app_products=mysqli_fetch_all($app_result,MYSQLI_ASSOC);

//images of the men products
$men_images='SELECT * FROM PRODUCTS WHERE CAT_ID IN (SELECT CAT_ID FROM CATEGORY WHERE category_name="MEN")';
$men_images=mysqli_query($db,$men_images);
$men_images=mysqli_fetch_all($men_images,MYSQLI_ASSOC);
//Women images
$women_images='SELECT * FROM PRODUCTS WHERE CAT_ID IN (SELECT CAT_ID FROM CATEGORY WHERE category_name="WOMEN")';
$women_images=mysqli_query($db,$women_images);
$women_images=mysqli_fetch_all($women_images,MYSQLI_ASSOC);
//Kids images
$kids_images='SELECT * FROM PRODUCTS WHERE CAT_ID IN (SELECT CAT_ID FROM CATEGORY WHERE category_name="KIDS")';
$kids_images=mysqli_query($db,$kids_images);
$kids_images=mysqli_fetch_all($kids_images,MYSQLI_ASSOC);
// print_r($customer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="mainpage.css">
    <style>
        .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 14px;
  font-size: 16px;
  border: none;
  width:125%;
}
.img-card-header{
  background-color:lightpink;
}
/* .dropdown {
  position: relative;
  display: inline-block;
} */
.images{
height:600px;
width:00px;
background-color: lightblue;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  /* min-width: 300px; */
  width: 110%;
  box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.modal-dialog{
  box-shadow:2px 2px 4px lightgreen;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.card-body{
    padding:5px;
}
.card{
    width: 310px;
    margin-top: 10px;
}
.images:hover{
  box-shadow:4px 4px 4px lightgreen;
}
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Online Shopping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="cart.php">My Cart</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="myorders.php">My orders</a>
                </li>
            <li class="nav-item">
              <a class="nav-link" href="account.php">Account</a>
            </li>
           

              <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

<div class="row">
<div class="col-sm-3">
    <div class="dropdown">
        <a href="#men"><button class="dropbtn">Men's wear</button></a>
        <div class="dropdown-content">
        <?php 
         foreach($men_products as $a){
         ?>
         <a href="#"><?php echo htmlspecialchars($a['NAME']); ?></a>
        <?php  } ?>
        </div>
      </div>
</div>
<div class="col-sm-3">
    <div class="dropdown">
        <button class="dropbtn">Women's wear</button>
        <div class="dropdown-content">
        <?php 
         foreach($women_products as $a){
         ?>
         <a href="#"><?php echo htmlspecialchars($a['NAME']); ?></a>
        <?php  } ?>
        </div>
      </div>
</div>
<div class="col-sm-3">
    <div class="dropdown">
        <button class="dropbtn">Kid's wear</button>
        <div class="dropdown-content">
        <?php 
         foreach($kid_products as $a){
         ?>
         <a href="#"><?php echo htmlspecialchars($a['NAME']); ?></a>
        <?php  } ?>
        </div>
      </div>
</div>
<div class="col-sm-3">
    <div class="dropdown">
        <button class="dropbtn">Appliances</button>
        <div class="dropdown-content">
        <?php 
         foreach($app_products as $a){
         ?>
         <a href="#"><?php echo htmlspecialchars($a['NAME']); ?></a>
        <?php  } ?>
        </div>
      </div>
</div>
</div>
     
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>Men's Offers</h4>
                </div> -->
                <div class="card-body">
                    <img src="mens_offers.jpg" width="300px" height="300px" alt="" srcset="">
                </div>
                
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>Women's Offers</h4>
                </div> -->
                <div class="card-body">
                    <img src="women_offers.png" width="300px" height="300px" alt="" srcset="">
                </div>
                
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>kids's Offers</h4>
                </div> -->
                <div class="card-body">
                    <img src="kids_offers.jpg" width="300px" height="300px" alt="" srcset="">
                </div>
                
            </div>
        </div>
    </div>
</div>


<div class="container">
<div class="row">


<?php foreach($men_images as $a) {?>
  <div class="col-lg-4">
    <div class="card images">
        <div class="card-header img-card-header">
            <?php echo  htmlspecialchars($a['NAME']) ?>
        </div>
      <div class="card-body">
        <img src="<?php echo $a['image'];?>" height="100%" width="100%">
      </div>
      <a href="details.php?id=<?php echo $a['product_id']?>" class="text-center" style="text-decoration:none">Click here</a>
      <div class="card-header">
        <div><h3>Cost: <?php echo  htmlspecialchars($a['cost']);?></h3></div>
        <div><b>Rating: </b><?php echo  htmlspecialchars($a['rating']);?></div>
        <div><?php echo  htmlspecialchars($a['DESCRIPTION']); ?></div>
        <div><b>Color: </b><?php echo  htmlspecialchars($a['color']); ?></div>
        </ul>
        <div class="row mt-4">
          <div class="col-6">
          <div class="btn btn-success">Buy Now</div>
          </div>
          <div class="col-6">


          <!-- Button HTML (to Trigger Modal) -->
          <a href="#myModal" class="float-right btn btn-danger" data-toggle="modal">Add to cart</a>
   
   <!-- Modal HTML -->
   <div id="myModal" class="modal">
       <div class="modal-dialog text-center">
           <div class="modal-content ">
                   <div class="m-4 p-4"><h3><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg>Your item Added to cart</h3> </div>
               </div>

           </div>
       </div>












          <!-- <div class="btn btn-danger">Add to cart</div> -->
          </div>
        </div>
      </div>
      </div>
    </a>
     
    </div>
  <?php } ?> 




<!--Women images-->
<?php foreach($women_images as $a) {?>
    <div class="col-lg-4">
    <div class="card images">
        <div class="card-header img-card-header">
            <?php echo  htmlspecialchars($a['NAME']) ?>
        </div>
      <div class="card-body">
        <img src="<?php echo $a['image'];?>" height="100%" width="100%">
      </div>
      <a href="details.php?id=<?php echo $a['product_id']?>" class="text-center" style="text-decoration:none">Click here</a>
      <div class="card-header">
        <div><h3>Cost: <?php echo  htmlspecialchars($a['cost']);?></h3></div>
        <div><b>Rating: </b><?php echo  htmlspecialchars($a['rating']);?></div>
        <div><?php echo  htmlspecialchars($a['DESCRIPTION']); ?></div>
        <div><b>Color: </b><?php echo  htmlspecialchars($a['color']); ?></div>
        </ul>
        <div class="row mt-4">
          <div class="col-6">
          <div class="btn btn-success">Buy Now</div>
          </div>
          <div class="col-6">
          <a href="#myModal" class="float-right btn btn-danger" data-toggle="modal">Add to cart</a>
   
   <!-- Modal HTML -->
   <div id="myModal" class="modal">
       <div class="modal-dialog text-center">
           <div class="modal-content ">
                   <div class="m-4 p-4"><h3><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg>Your item Added to cart</h3> </div>
               </div>

           </div>
       </div>
          </div>
        </div>
      </div>
      </div>
    </a>
     
    </div>
  <?php } ?> 

  <!--kids images -->
  <?php foreach($kids_images as $a) {?>
    <div class="col-lg-4">
      <div class="card images">
        <div class="card-header img-card-header">
            <?php echo  htmlspecialchars($a['NAME']) ?>
        </div>
      <div class="card-body">
        <img src="<?php echo $a['image'];?>" height="100%" width="100%">
      </div>
      <a href="details.php?id=<?php echo $a['product_id']?>" class="text-center" style="text-decoration:none">Click here</a>
      <div class="card-header">
        <div><h3>Cost: <?php echo  htmlspecialchars($a['cost']);?></h3></div>
        <div><b>Rating: </b><?php echo  htmlspecialchars($a['rating']);?></div>
        <div><?php echo  htmlspecialchars($a['DESCRIPTION']); ?></div>
        <div><b>Color: </b><?php echo  htmlspecialchars($a['color']); ?></div>
        </ul>
        <div class="row mt-4">
          <div class="col-6">
          <div class="btn btn-success">Buy Now</div>
          </div>
          <div class="col-6">
          <a href="#myModal" class="float-right btn btn-danger" data-toggle="modal">Add to cart</a>
   
   <!-- Modal HTML -->
   <div id="myModal" class="modal">
       <div class="modal-dialog text-center">
           <div class="modal-content ">
                   <div class="m-4 p-4"><h3><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg>Your item Added to cart</h3> </div>
               </div>

           </div>
       </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  <?php } ?> 

  </div>       
</div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>




