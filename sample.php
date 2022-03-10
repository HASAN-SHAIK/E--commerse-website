<?php
$db= mysqli_connect("localhost","root","","onlineshopping") or die("Unable to connect");

    $errors=array('email'=>'','password'=>'');
    $account_created='';
$men='SELECT email,password FROM customers';
$men_result=mysqli_query($db,$men);
$men_products=mysqli_fetch_all($men_result,MYSQLI_ASSOC);
$success='';
$error=['name'=>'','number'=>''];

 if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $error['name']="Enter a name";
    }
    else{
        $name=$_POST['name'];
    }
    if(empty($_POST['number'])){
        $error['number']="Enter a phone";
    }
    else{
    $phone=$_POST['number'];
    }
}
if(array_filter($error)){
    
}
else{
    $name=$_POST['name'];
    $phone=mysqli_real_escape_string($db,$_POST['number']);
    $sql="INSERT INTO COURIER (NAME,PHONE_NUMBER) VALUES('$name','$phone')";
    if(mysqli_query($db,$sql)){
        echo 'updated';
    }
    else{
        echo 'query error';
    }
}

?>

<form action="" method="POST">
    <div><h1><?php echo htmlspecialchars($success); ?></h1></div>
    <div class="ROW">
        <div class="col-sm-6">
             Name: 
        </div>
        <div class="col-sm-6">
            <input type="text" name="name" id="">
        </div>
        <div class="col-sm-6">
             Phone:  
        </div>
        <div class="col-sm-6">
            <input type="number" name="number" id="">
        </div>
        <input type="submit" value="Update" name="submit">
    </div>
</form>