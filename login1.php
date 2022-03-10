<?php
$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");

    $errors=array('email'=>'','password'=>'');

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
    }

    if(isset($_POST['register'])){
      
        if(empty($_POST['email'])){
            echo "Email is required <br/>";
        } 
        else{
            echo htmlspecialchars($_POST['email']);
        }
        if(empty($_POST['password'])){
            echo "Email is required <br/>";
        } 
        else{
            echo htmlspecialchars($_POST['password']);
        }
    }
    



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
                        <form action="login.php" method="POST">
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
                        <button type="submit" name="login" class="btn btn-success mt-4 mb-4">Login</input>


                        <button type="button" class="btn btn-danger float-right mt-4"
                            data-dismiss="modal">Close</button>

                        </form>
                       
                        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                            crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                            crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                            crossorigin="anonymous"></script>

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
                            <input type="text" name="" id="" class="form-control">
                            <label for="">
                                <h4>Mobile: </h4>
                            </label>
                            <input type="number" name="" id="" class="form-control">
                            <label for="">
                                <h4>Card details: </h4>
                            </label>
                            <input type="number" name="" id="" class="form-control">
                            <label for="">
                                <h4>Address: </h4>
                            </label>
                            <input type="text" name="" id="" class="form-control">
                            <label for="">
                                <h4>Email: </h4>
                            </label>
                            <input type="text" name="" id="" class="form-control">
    
                            <label for="">
                                <h4>Password: </h4>
                            </label>
                            <div class="text-center">
                                <input type="password" name="" id="" class="form-control">
                                <button type="button" name="register" class="btn btn-success mt-4 mb-4">Register</button>
                            </div>
                            
    
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>









   





</body>

</html>