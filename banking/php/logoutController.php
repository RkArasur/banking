<?php
    include "./init.php";
    session_unset();
    session_destroy();
    echo "<script>window.alert('You have logged out');
        window.location='../index.php';
        </script>";
?>