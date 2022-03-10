

<?php
$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");

if(isset($_GET['id'])){
  $id=mysqli_real_escape_string($db,$_GET['id']);
  print_r($id);
  $result='SELECT * FROM PRODUCTS WHERE product_id in (select product_id from customers where customer_id=1)';
  $result=mysqli_query($db,$result);
  $result=mysqli_fetch_assoc($result);
  }


//men products
$cart='SELECT * from products where product_id IN(SELECT product_id from cart where customer_id=1)';
$cart_result=mysqli_query($db,$cart);
$cart_products=mysqli_fetch_all($cart_result,MYSQLI_ASSOC);
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
height:450px;
width:400px;
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

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.card{
  height:300px; 
  margin-top:30px;
  padding:30px
}
.card-body{
    padding:5px;
}

.card:hover{
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
            <li class="nav-item">
              <a class="nav-link" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item active">
              <a class="nav-link" href="#">My Cart</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="myorders.php">My orders</a>
                </li>
            <li class="nav-item">
              <a class="nav-link" href="account.php">Account</a>
            </li>
           

             <!-- <li class="nav-item">
              <a class="nav-link" href="#"><?php echo htmlspecialchars($names[0]['customer_name'])?></a>
            </li> -->
        
            <li class="nav-item">
              <a class="nav-link" href="login.php" tabindex="-1">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

<div class="container">
<div class="row">
<?php foreach($cart_products as $a) {?>
  <div class="col-sm-6">
  <div class="card">
    <div class="row">
      <div class="col-sm-4">
      <img src="<?php echo $a['image'];?>" height="100%" width="100%">
     </div>
      <div class="col-sm-8">
          <div class="text-success p-2"><H2><?php echo htmlspecialchars($a['NAME']) ?></H2></div>
          <div class="p-2 text-primary"><H3>COST: <?php echo htmlspecialchars($a['cost']) ?><H3></div>
          <div class="p-2 text-secondary"><H4>RATING: <?php echo htmlspecialchars($a['rating']) ?><H4></div>
          <div class="p-2 "><?php echo htmlspecialchars($a['DESCRIPTION']) ?></div>
      </div>
    </div>
    
  </div>
  </div>
 
  <?php } ?>
</div>
  
  <div class="row mt-3">
    <div class=" mt-4 col-sm-3">
      <h2 style="color:red">Total : </h2>
    </div>
    <div class="col-sm-3 mt-4">
      <h2 class="text-primary">2299</h2>
    </div>
 

  <div class="p-4"><button class="btn mb-5 btn-success btn-lg"><a href="payment.php" class="text-danger" style="text-decoration:none">Buy now</a></button></div>
  </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>




