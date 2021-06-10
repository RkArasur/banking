<?php

include "./init.php";


if(isset($_POST["transfer"]) && isset($_POST["toaccount"]) && isset($_POST["message"]) && isset($_POST["amount"]) && isset($_POST["myaccount"])){

    $myaccnumber = intval($_POST["myaccount"]);
    $toaccno = intval($_POST["toaccount"]);
    $amount = intval($_POST["amount"]);
    $message =$_POST["message"];
    echo $myaccnumber;
    echo $toaccno;
    echo $amount;
    echo $message;
    $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $myaccnumber");
    $fromAccountDetails = mysqli_fetch_assoc($res);

    $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $toaccno");
    $toAccountDetails = mysqli_fetch_assoc($res);
    if($amount <0){
        echo "<script> alert('Enter valid amount') ; window.location = '../allCustomers.php?number=<?php echo $myaccnumber; ?>' </script>";
    }
    else if($fromAccountDetails["cur_balance"] - $amount <0){
        echo "<script> alert('Insufficient Balance') ; window.location = '../allCustomers.php?number=<?php echo $myaccnumber; ?>' </script>";
    }else{
        $fromNewBalance = $fromAccountDetails["cur_balance"] - $amount;
        $toNewBalance = $toAccountDetails["cur_balance"] + $amount;

        $res = mysqli_query($con, "UPDATE customers SET cur_balance = $fromNewBalance WHERE account_number = $myaccnumber");
        $res = mysqli_query($con, "UPDATE customers SET cur_balance = $toNewBalance WHERE account_number = $toaccno");

        $date_time = date("Y/m/d H:i:s");

        $res = mysqli_query($con, "INSERT INTO `transactions`(`from_account_no`, `to_account_no`, `date_time`, `message`, `amount_sent`) VALUES ($myaccnumber,$toaccno,'$date_time','$message',$amount)");

        echo mysqli_error($con);

        echo "<script> alert('Transaction Successfull') ; window.location = '../allCustomers.php?number=<?php echo $myaccnumber; ?>' </script>";
    }

}else{
    echo "NOT RIGHT";
}
?>