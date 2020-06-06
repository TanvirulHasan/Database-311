<?php

  session_start();
 // echo $_POST["email"];
 // echo $_POST["pass"];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $email = $_POST["email"];
   $pass = $_POST["pass"];
   
   include 'connection.php';

   $sql = " SELECT * FROM patient WHERE email='$email' AND password = '$pass' ";



    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) != 0){
    	echo "Login Successful";
        
       $_SESSION['test'] = 'OK';  
      $_SESSION['patient'] ='OK';

        $row = mysqli_fetch_array($result);
        $_SESSION['patient_id'] = $row[1];

         
      header('Location: after_patient.php');
    }
    else
    	echo "No account found";


   


}

?>






<!DOCTYPE html>
<html>
<head>
	<title>Patient login</title>
</head>
<body>
  <h1>  Patient Login</h1>
 <form action="patient_login.php" method="post">

Email : <input type="Email" name="email" required> <br>
Password : <input type="Password" name="pass" required> <br>

<input type="submit" value="Log in">

 	
 </form>

</body>
</html>