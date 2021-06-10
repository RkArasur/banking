<?php  
    include "./php/init.php";
    if(isset($_GET["to"]) && isset($_GET["from"])){
        $to = intval($_GET["to"]);
        $from = intval($_GET["from"]);
        $res = mysqli_query($con, "SELECT * FROM customers WHERE account_number = $to");
        if(mysqli_num_rows($res) != 1){
            echo "<script> alert('error finding your account') ; window.location = './allCustomers.php' </script>";
        }else{
        
        $rows = mysqli_fetch_assoc($res);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- styles -->
    <link rel="stylesheet" href="./assets/css/main.css">

</head>

<body style="background-image:linear-gradient(purple,blue)">

<?php include "./templates/header.html" ?>


    <main>
        <div class="transfer-form">
            <form action="./php/transferlogic.php" method="POST">
                <h3>Transfer Amount</h3>

                <input type="hidden" name="myaccount" required value="<?php echo $from;  ?>" id="">

                <div class="field">
                <input type="hidden" name="toaccount" id="toaccount" value="<?php echo $rows["account_number"];?>">
                </div>

                <div class="field">
                    <label for="amount">Amount: </label>
                    <input type="number" placeholder="Amount to transfer" required name="amount" id="amount">
                </div>

                <div class="field">
                    <label for="message">Message (Optional):</label>
                    <input type="text" name="message" id="message" placeholder="Small Message">
                </div>

                <div class="field">
                    <input type="submit" value="Transfer Amount" name="transfer">
                </div>

            </form>
        </div>
    </main>

</body>

</html>

<?php
        }
    }

?>