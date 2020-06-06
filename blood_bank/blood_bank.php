<!DOCTYPE html>
<html>
<head>
  <title></title>

</head>

 <style type="text/css">
    /* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
<body>
<div class="topnav">
  <a href="home.php">Home</a>
  <?php
   session_start();
  
  ?>
 
  <a href="find_donor.php">Find Donor</a>
  <a href="show_post.php">See post</a>
  <a href="blood_bank.php" class="active">Blood Bank </a>
  <?php
  if($_SESSION['test']=='OK') {
  if($_SESSION['donor'] == 'OK')
   echo '<a href="after_donor.php" >Dashboard</a>';
 else if($_SESSION['patient'] == 'OK')
  echo '<a href="after_patient.php" >Dashboard</a>';


    echo '<a href="logout.php">Logout</a>';
  }
   ?>
  <!-- <a href="#contact">Patient Dashboard</a>
  <a href="#about">Donor Dashboard</a> -->

</div>

<?php
include 'connection.php';

$result = mysqli_query($conn,"SELECT name,blood_gp,stored_amt,phone_no FROM blood_bank order by name");

echo "<table border='1'>";

$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>



</body>
</html>
