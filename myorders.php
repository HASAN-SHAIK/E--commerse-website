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
        h1 {
            font-weight: bolder;
            color: greenyellow;
        }

        .card:hover {
            box-shadow:2px 2px 2px grey;
        }
    </style>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #333;
            font-size: 20px;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Online Shopping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">My cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">Account</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">My orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
    <div class="card mt-5">
    <div class="row mt-4">

<div class="col-sm-4">
<img class="" src="https://tse2.mm.bing.net/th?id=OIP.wHJMeNXOe7pg1hd33nRpZgHaHa&pid=Api&P=0&w=300&h=300" height=200px width=200px alt="">
</div>
<div class="col-sm-8 mt-5 pt-4">
<a href="arrive.php" class="text-success" style="text-decoration:none">Arriving Tommorow by 9PM</a> 
</div>

</div>
</div>

    </div>


      </div>



    </body>
    </html>