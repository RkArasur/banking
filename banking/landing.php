<?php include "./php/init.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- styles -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        table{
            background-image: linear-gradient(cyan,blue);
        }
        th,td{
            border: solid 1px black;
            border-color: black;
            border-radius: 20px;
            font-weight: 500;
        }
        th{font-weight:700;}
        .new-btn{
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            background: white;
            color: black;
            font-weight: 600;
            -webkit-transition: .2s;
            transition: .2s;
        }
    </style>
</head>
<body style="background-image:linear-gradient(orange,red)">

<?php include "./templates/header.html" ?>

    <main>
        <table>
        <?php $user = $_SESSION['username'];
                $stmt = $con->prepare("SELECT * FROM `customers` WHERE name = ?");
                $stmt->bind_param("s",$user);
                if($stmt->execute()){
                    $result = $stmt->get_result();  
                    if($result->num_rows == 1){
                        $row = $result->fetch_assoc();
        ?>
            <thead>
                <tr>
                    <th>Headers</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>  
                 <tr>
                    <td>Account No.</td></td><td><?php echo $row["account_number"] ?></td>
                </tr>
                <tr>
                    <td>Account Holder</td><td><?php echo $row["name"] ?></td>
                </tr>
                <tr>    
                    <td>E-mail</td><td><?php echo $row["email"] ?></td>
                </tr>
                <tr>    
                    <td>MObile.NO</td><td><?php echo $row["phno"] ?></td>
                </tr>
                <tr>    
                    <td>Available Balance</td><td><?php echo $row["cur_balance"] ?></td>
                </tr>
                <tr>    
                    <td>Address</td><td><?php echo $row["address"]; ?></td>
                </tr>
                <tr>
                    <td><a href="./deposit.php?number=<?php echo $row["account_number"]; ?>" class="new-btn">Deposit</a><br></td>
                    <td><a href="./allCustomers.php?number=<?php echo $row["account_number"];?>" class="new-btn">Transfer</a><br></td>
                </tr>
                <tr>"
                    <td colspan=2><a href="./transactions.php?number=<?php echo $row["account_number"]; }} ?>" class="new-btn">View Transactions</a></td>
                </tr>
            </tbody>
        </table>
    </main>

</body>
</html>