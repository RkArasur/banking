<?php  
    include "./php/init.php";
   
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
            <form action="./php/depositlogic.php" method="POST">
                <h3>Deposit Amount</h3>
                <div class="field">
                <input type="hidden" name="myaccount" required value="<?php 
                if(isset($_GET["number"])){
                    $accno = intval($_GET["number"]);
                    echo $accno;  } ?>" >
                </div>
                <div class="field">
                    <label for="amount">Enter Amount:</label>
                    <input type="number" name="amount" placeholder="0" id="amount" required />
                </div>
                <div class="field">
                    <input type="submit" value="Deposit Amount" name="deposit">
                </div>
            </form>
        </div>
    </main>
</body>