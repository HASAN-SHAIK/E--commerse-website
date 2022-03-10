<?php
$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");
if(isset($_GET['id'])){
$id=mysqli_real_escape_string($db,$_GET['id']);
$result="SELECT * FROM PRODUCTS WHERE product_id=$id";
$result=mysqli_query($db,$result);
$result=mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE SHOPPING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
</head>
<body>
    <div class="row">
    <div class="col-sm-4 ml-3" style="padding:30px;padding-left:100px">
    <img src="<?php echo $result['image']?>" width=300px height=350px alt="">
    </div>
    <div class="col-sm-5 p-4 ml-4">
    <div class="mt-3"><h1><?php echo htmlspecialchars($result['NAME'])?></h1></div>
    <div class="mt-3"><?php echo htmlspecialchars($result['DESCRIPTION'])?></div>
    <div class="mt-3"><H3>COST: <?php echo htmlspecialchars($result['cost'])?></h2></div>
    
    <div class="mt-3"><h4>RATING: <?php echo htmlspecialchars($result['rating'])?></h2></div>
    <div class="mt-3"><h4>COLOR: <?php echo htmlspecialchars($result['color'])?></h2></div>
    </div>
    <div class="col-sm-2">
        <div class="card" style="margin-top:100px">
        <div><a href="payment.php" class="btn btn-success m-3" style="width:150px;margin:10px">Buy Now</a></div>
        <div><a href="#" class="btn btn-danger m-3" style="width:150px">Add to cart</a></div>
        </div>
    </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>