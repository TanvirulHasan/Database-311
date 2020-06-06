<?php
 include 'connection.php';
   
    session_start();

    $patient_id = $_SESSION['patient_id'];
   


     $sql = "DELETE From patient WHERE patient_id= '$patient_id'";
     mysqli_query($conn, $sql);
     $sql2 = "DELETE From patient_phone_no WHERE patient_id= '$patient_id' ";
     mysqli_query($conn, $sql2);
     header('Location: home.php');
   
  ?>

    