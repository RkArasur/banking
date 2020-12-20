<?php

include "./init.php";

if(isset($_POST["transfer"]) && isset($_POST["toAccountNumber"]) && isset($_POST["amount"]) && isset($_POST["myaccount"])){

    $myaccnumber = $_POST["myaccount"];
    $toaccno = $_POST["toAccountNumber"];
    $amount = $_POST["amount"];
    $message =$_POST["message"];

    $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $myaccnumber");
    $fromAccountDetails = mysqli_fetch_assoc($res);

    $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $toaccno");
    $toAccountDetails = mysqli_fetch_assoc($res);
    if($amount <0){
        echo "<script> alert('Enter valid amount') ; window.location = '../allCustomers.php' </script>";
    }
    else if($myaccnumber == $toaccno){
        echo "<script> alert('You cannot transfet to self') ; window.location = '../allCustomers.php' </script>";
    }else if($fromAccountDetails["cur_balance"] - $amount <0){
        echo "<script> alert('Insufficient Balance') ; window.location = '../allCustomers.php' </script>";
    }else{
        $fromNewBalance = $fromAccountDetails["cur_balance"] - $amount;
        $toNewBalance = $toAccountDetails["cur_balance"] + $amount;

        $res = mysqli_query($con, "UPDATE customers SET cur_balance = $fromNewBalance WHERE account_number = $myaccnumber");
        $res = mysqli_query($con, "UPDATE customers SET cur_balance = $toNewBalance WHERE account_number = $toaccno");

        $date_time = date("Y/m/d H:i:s");

        $res = mysqli_query($con, "INSERT INTO `transactions`(`from_account_no`, `to_account_no`, `date_time`, `message`, `amount_sent`) VALUES ($myaccnumber,$toaccno,'$date_time','$message',$amount)");

        echo mysqli_error($con);

        echo "<script> alert('Transaction Successfull') ; window.location = '../allCustomers.php' </script>";
    }

}