
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
                    <tr><th colspan=3>Choose Account</th></tr>
                    <tr>
                        <th>Account Number</th>
                        <th>Name</th>
                        <th>select</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                        $query ="SELECT * FROM customers";
                        $res = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($res)){
                            if($row["name"] != $_SESSION['username']){
                    ?>

                    <tr>
                        <td><?php echo $row["account_number"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><a href="./viewCustomer.php?number=<?php echo $row["account_number"]; ?>&from=<?php echo $accno; ?>" class="plain-btn">Transfer</a></td>
                    </tr>
                    <?php
                            }}
                            ?>
                    <tr>
                        <td colspan=3><a href="./landing.php" class="transfet-page-btn">Go Back</a></td>
                    </tr>
    
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>