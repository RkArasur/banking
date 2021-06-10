<?php  
    include "./php/init.php";
    $accno = 0;
    if(isset($_GET["number"])){
        global $accno;
        $accno = intval($_GET["number"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- styles -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body style="background-image:linear-gradient(orange,red)">

<?php include "./templates/header.html" ?>
<main>
        
        <div class="table table-success table-striped" style="background-image:linear-gradient(orange,red)">
            <table>
                <thead>
                    <tr><th colspan=4>Transactions</th></tr>
                    <tr>
                        <th>To Account</th>
                        <th>Date</th>
                        <th>message</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                        $query ="SELECT * FROM transactions where from_account_no = $accno";
                        $res = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($res)){
                    ?>

                    <tr>
                        <td><?php echo $row["to_account_no"] ?></td>
                        <td><?php echo $row["date_time"] ?></td>
                        <td><?php echo $row["message"] ?></td>
                        <td><?php echo $row["amount_sent"] ?></td>
                    </tr>
                    <?php
                            }
                            ?>
                    <tr>
                        <td colspan=4><a href="./landing.php" class="transfet-page-btn">Go Back</a></td>
                    </tr>
    
                </tbody>
            </table>
        </div>

    </main>
    
</body>
</html>