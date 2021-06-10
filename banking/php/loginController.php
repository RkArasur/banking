<?php

include "./init.php";

if(isset($_POST['login']) && isset($_POST['user']) && isset($_POST['pwd'])){
    $username = $_POST['user'];
    $password = $_POST['pwd'];

    $stmt = $con->prepare("SELECT * FROM `customers` WHERE name = ?");

    $stmt->bind_param("s",$username);

    if($stmt->execute()){
        $result = $stmt->get_result();  
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if($row['name'] == $username && $row['phno'] == $password){
                $_SESSION['login'] = 'true';
                $_SESSION['username'] = $row['name'];
                echo "<script>window.alert('You have logged in');
                    window.location='../landing.php';
                </script>";
            }
        }else{
            echo "<script>window.alert('wrong username/ Password');
            window.location='../templates/login.html';
        </script>";
        }
        
    
        
    }else{
        echo "<script>window.alert('Sorry you are not registered. Please try registring after some time ');
            window.location='../templates/register.html';
        </script>";

    }
}else{
    echo "<script>window.alert('Not Authorised');
        window.location='../templates/login.html';
    </script>";

}