<?php

$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");



$account='SELECT * FROM CUSTOMERS';
$account=mysqli_query($db,$account);
$account=mysqli_fetch_all($account,MYSQLI_ASSOC);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <style>
        .details{
            font-size:30px
        }
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
          
            <li class="nav-item">
              <a class="nav-link" href="cart.php">My Cart</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Account</a>
            </li>
           

             <!-- <li class="nav-item">
              <a class="nav-link" href="#"><?php echo htmlspecialchars($names[2]['customer_name'])?></a>
            </li> -->
        
            <li class="nav-item">
              <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container">
                <div class="card mt-5 p-5">
                    <h1 class="text-center text-success mb-2"><u>Account Details</u></h1>
                    <div class="row text-center mt-3">
                        <div class="pt-1 col-sm-5">
                           <h2> Name: </h2> 
                        </div>
                        <div class=" details col-sm-7">
                           <?php echo htmlspecialchars($account[2]['customer_name']); ?>
                        </div>

                        <div class="pt-1 col-sm-5">
                           <h2> Mobile: </h2> 
                        </div>
                        <div class=" details col-sm-7">
                           <?php echo htmlspecialchars($account[2]['mobile']); ?>
                        </div>

                        <div class="pt-1 col-sm-5">
                           <h2> Card Details: </h2> 
                        </div>
                        <div class=" details col-sm-7" style="margin-top:40px">
                           <?php echo htmlspecialchars($account[2]['card_details']); ?>
                        </div>

                        <div class="pt-1 col-sm-5">
                           <h2> Address: </h2> 
                        </div>
                        <div class=" details col-sm-7">
                           <?php echo htmlspecialchars($account[2]['address']); ?>
                        </div>

                        <div class="pt-1 col-sm-5">
                           <h2> Email: </h2> 
                        </div>
                        <div class=" details col-sm-7">
                           <?php echo htmlspecialchars($account[2]['email']); ?>
                        </div>
                     
                    </div>
                </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>