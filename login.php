<?php
$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");

    $errors=array('email'=>'','password'=>'');
$id=0;
$men='SELECT * FROM customers';
$men_result=mysqli_query($db,$men);
$men_products=mysqli_fetch_all($men_result,MYSQLI_ASSOC);
$sql_id=123;
    if(isset($_POST['login'])){
      
        if(empty($_POST['email'])){
            $errors['email']= "Email is required";
        } 
        else{
            $login_email=($_POST['email']);
            if(!filter_var($login_email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "Enter a valid email";
            }
        }


        if(empty($_POST['password'])){
            $errors['password'] = "Password is required";
        } 
        else{
            $password=$_POST['password'];
            if(!preg_match('/[a-zA-Z]/',$password)){
                $errors['password']="Enter a valid password";
            }
            
        }
        foreach($men_products as $a){
            if($a['email']==$_POST['email']&& $a['password']==$_POST['password']){
                $sql_email=mysqli_real_escape_string($db,$_POST['email']);
                $sql='SELECT * FROM CUSTOMERS WHERE email=$sql_email';
                $id=mysqli_query($db,$sql);
                $id=mysqli_fetch_assoc($id);
                header("Location:mainpage.php");   
            }
        }  

    }
    // print_r($sql_id);
    $error=array('name'=>'','mobile'=>'','card'=>'','address'=>'','email'=>'','password'=>'');
    $value='';
    $success="Welcome to Online Shopping";
    if(isset($_POST['register'])){
        if(empty($_POST['name'])){
            $error['name']="enter the name";
        }
        else{
            $name=$_POST['name'];
        }

        if(empty($_POST['mobile'])){
            $error['mobile']="enter the name";
        }
        else{
            $mobile=$_POST['mobile'];
        }

        //card details
        if(empty($_POST['card'])){
            $error['card']="enter the valid card number";
        }
        else{
            $card=$_POST['card'];
        }

        if(empty($_POST['address'])){
            $error['address']="enter the name";
        }
        else{
            $address=$_POST['address'];
        }


        if(empty($_POST['email'])){
            $error['email']="enter the name";
        }
        else{
            $email=$_POST['email'];
        }

        if(empty($_POST['password'])){
            $error['password']="enter the name";
        }
        else{
            $password=$_POST['password'];
        }
        if(array_filter($error)){
    
        }
        else{
            foreach($men_products as $a){
                if($a['email']==$email){
                    $value="True";
                }
            }
            if($value=="True"){
                $success="Your email already used";
            }
            else{
                $sql="INSERT INTO CUSTOMERS (customer_name,mobile,card_details,address,email,password) VALUES('$name','$mobile','$card','$address','$email','$password')";
                if(mysqli_query($db,$sql)){
                    $success="Yah! Your account created";
                }
                else{
                    $value="True";
                    $success="Oops! your account is not created";
                }
            }
           
        }
    }

   
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Center Align Bootstrap Modal Vertically</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            function alignModal() {
                var modalDialog = $(this).find(".modal-dialog");
                // Applying the top margin on modal to align it vertically center
                modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
            }
            // Align modal when it is displayed
            $(".modal").on("shown.bs.modal", alignModal);

            // Align modal when user resize the window
            $(window).on("resize", function () {
                $(".modal:visible").each(alignModal);
            });
        });
    </script>
    <style>
        .bs-example {
            margin: 20px;
        }
        /* .card{
            width:400px;
            margin:5px;
        } */

        h1 {
            font-weight: 1000;
            left: 160px;

            color: rgb(107, 230, 118);
        }

        .card:hover {
            background-color: rgb(255, 255, 255);
        }

        .card {
            margin: 1px;
            padding: 1px;
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

</head>

<body>
      <div class="topnav">
        <a class="navbar-brand" href="#">Online Shopping</a>
       <!-- Button HTML (to Trigger Modal) -->
        <a href="#myModal" class="float-right" data-toggle="modal">Login</a>
   
        <!-- Modal HTML -->
        <div id="myModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body"> 
                        <div class="card m-4 p-5">
                        <form action="mainpage.php" method="GET">
                        <h1>Login</h1>
                        <label for="email">
                            <h4>Email: </h4>
                        </label>
                        <input type="text" name="email" id="" class="form-control">
                        <div class="text-danger"><?php echo htmlspecialchars($errors['email'])?></div>
                        <label for="">
                            <h4>Password: </h4>
                        </label>
                        <input type="password" name="password" id="" class="form-control">
                        <div class="text-danger"><?php echo htmlspecialchars($errors['password'])?></div>
                        <input type="submit" name="login" class="btn btn-success mt-4 mb-4"></input>
                        <button type="button" class="btn btn-danger float-right mt-4"
                            data-dismiss="modal">Close</button>

                        </form>
                        </div>
                        

                    </div>

                </div>
            </div>
        </div>
        
        
        <!-- Button HTML (to Trigger Modal) -->
        <a href="#myModal1" class="float-right" data-toggle="modal">SignUp</a>

        <!-- Modal HTML -->
        <div id="myModal1" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1 class="text-center">Register Here</h1>
                        <form action="login.php" method="POST">
                            <label for="">
                                <h4>Name: </h4>
                            </label>
                            <input type="text" name="name" id="" class="form-control">
                            <label for="">
                                <h4>Mobile: </h4>
                            </label>
                            <input type="number" name="mobile" id="" class="form-control">
                            <label for="">
                                <h4>Card details: </h4>
                            </label>
                            <input type="number" name="card" id="" class="form-control">
                            <label for="">
                                <h4>Address: </h4>
                            </label>
                            <input type="text" name="address" id="" class="form-control">
                            <label for="">
                                <h4>Email: </h4>
                            </label>
                            <input type="text" name="email" id="" class="form-control">
    
                            <label for="">
                                <h4>Password: </h4>
                            </label>
                            
                                <input type="password" name="password" id="" class="form-control">
                                <div class="text-center">
                                <button type="submit" name="register" class="btn btn-success mt-4 mb-4">Register</button>
                            </div>
                            
    
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php if($value=="True") {?>
<h5 class="text-danger text-center mt-1"><?php echo $success; ?></h5>
<?php } else{?>
<h2 class="text-success text-center mt-4"><?php echo $success; ?></h2>
<?php } ?>

        <div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>Men's Offers</h4>
                </div> -->
                <div class="card-body">
                    <img src="mens_offers.jpg" width="300px" height="300px" alt="" srcset="">
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>Women's Offers</h4>
                </div> -->
                <div class="card-body">
                    <img src="women_offers.png" width="300px" height="300px" alt="" srcset="">
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
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
<!-- 
<div class="text-primary text-center"><?php echo htmlspecialchars($success); ?></div> -->


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


