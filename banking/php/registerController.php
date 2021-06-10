<?php 
 
include "./init.php";

if(isset($_POST['register']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['atype']) && isset($_POST['address'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $atype = $_POST['atype'];
    $addr = $_POST['address'];

    $stmt = $con->prepare("INSERT INTO `customers`(`account_type`, `name`, `email`, `phno`, `address`, `cur_balance`) VALUES (?,?,?,?,?,0)");
    $stmt->bind_param("sssis",$atype,$name,$email,$phone,$addr);
    if($stmt->execute()){
            echo "<script>window.alert('You are registered. Try Loging in ');
                    window.location='../templates/login.html';
                </script>";
    }else{
            echo "<script>window.alert('Sorry you are not registered. Please try registring after some time ');
                window.location='../templates/register.html';
            </script>";
    }
}else{
    echo "<script>window.alert('Please fill all the details');
        window.location='../templates/register.html';
    </script>";
    
}