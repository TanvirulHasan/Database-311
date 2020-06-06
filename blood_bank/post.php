<?php
 

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  session_start();


 include "connection.php";
  
  $name = $_POST["name"];
  $bg = $_POST["bg"];
  $addr = $_POST["area"];
  $hospital = $_POST["hospital"];
  $disease = $_POST["disease"];
  $description = $_POST["description"];
  $contact = $_POST["contact"];
  $patient_id =$_SESSION['patient_id'] ;
  // echo $name;
  // echo $age;
  // echo $bg;
  // echo $lastdonate;
  // echo $phone;
  // echo $area;
  // echo $pass;
  // echo $email;
  // echo $confpass;

  

   
  

  $sql = " INSERT INTO blood_req(patient_name,disease,blood_gp,area,hospital,description,patient_id) VALUES('$name','$disease','$bg','$addr','$hospital','$description', '$patient_id') ";  

 mysqli_query($conn, $sql);

 mysqli_close($conn);
 include "connection.php";
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

  $sql2 = "SELECT post_id FROM blood_req";
   $result = mysqli_query($conn,$sql2);

   if(mysqli_num_rows($result) != 0)
      {
        $max = -1;
        while($row = mysqli_fetch_array($result)){
          $pid = $row['post_id'];
          if($pid>$max)
            $max = $pid;

        }
      }

      $post_id = $max  ;
  
    


  $sql3 = "INSERT INTO blood_req_contact(contact,post_id) VALUES('$contact','$post_id') " ;


 
 
if (mysqli_query($conn, $sql3)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}


?>




<html>
<head>
</head>


<body>
<form action="post.php" method="post">
Name : <input type="text" name="name" required> <br>
Contact : <input type="number" name="contact"> <br>
Disease : <input type="text" name="disease" required>  <br>
Blood group : <input type="text" name="bg" required><br>

Address : <input type="text" name="area" required><br>
Hospital: <input type="text" name="hospital" required> <br>
Description : <input type="text" name="description" required><br>

<input type="submit" value="Done">






</form>

</body>

</html>
