<?php
session_start();
include 'connection.php';

$donor_id = $_SESSION['donor_id'];


$sql = "DELETE from donor WHERE donor_id = '$donor_id' ";

$sql2 = "DELETE from donor_phone_no WHERE donor_id = '$donor_id' ";

mysqli_query($conn,$sql);
mysqli_query($conn,$sql2);


header('Location: home.php');




?>