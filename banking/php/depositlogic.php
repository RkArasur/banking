<?php

include "./init.php";

if(isset($_POST["deposit"]) && isset($_POST["amount"]) && isset($_POST["myaccount"])){
    $acc_no = intval($_POST["myaccount"]);
    $amount = intval($_POST["amount"]);
    echo $acc_no;
    $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $acc_no");
    $toAccountDetails = mysqli_fetch_assoc($res);
    if($amount <0){
        echo "<script> alert('Enter valid amount') ; window.location = '../landing.php' </script>";
    }else{
        $toNewBalance = $toAccountDetails["cur_balance"] + $amount;
        $res = mysqli_query($con, "UPDATE customers SET cur_balance = $toNewBalance WHERE account_number = $acc_no");
        $date_time = date("Y/m/d H:i:s");
        $res = mysqli_query($con, "INSERT INTO `transactions`(`from_account_no`, `to_account_no`, `date_time`, `message`, `amount_sent`) VALUES ($acc_no,$acc_no,'$date_time','Deposit',$amount)");
        echo "<script> alert('Transaction Successfull'); window.location = '../landing.php'; 
        </script>";
    }
}
