<html>

<head>

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
 
  <a href="find_donor.php" class="active">Find Donor</a>
  <a href="show_post.php">See post</a>
  <a href="blood_bank.php">Blood Bank </a>
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

<h2><u>Donor Information </u></h2>



<form action='find_donor.php' method='post'>
<select name="bg">
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
</select>
<input type='Submit' value='Filter'name='filt'>
</form>


<?php




if(isset($_POST['filt'])){
    $selected = $_POST['bg'];
    



include 'connection.php';
$sql = "SELECT * FROM donor where blood_gp='$selected'";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result)) {
   // echo  $row['name']; echo "   " ; echo $row['blood_gp']; echo "    "; echo $row['area'];
    $donor_id = $row['donor_id'];
    $sqlin = "SELECT * FROM donor_phone_no WHERE donor_id = '$donor_id'";
    $res = mysqli_query($conn, $sqlin);
    $row2 = mysqli_fetch_array($res);
    $name = $row["name"];
    $bg = $row["blood_gp"];
    $area = $row["area"];
    $ph = $row2["phone_no"];
    echo "<b>Name : </b>$name <br>";
    echo "<b>Blood Group : </b>$bg <br>";
    echo "<b>Area : </b>$area <br>";
    echo "<b>Phone Number : </b>$ph <br>";

    echo "<br>";
    echo "<br>";
    echo "<br>";

}
}


else{

include 'connection.php';
$sql = "SELECT * FROM donor";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result)) {
   // echo  $row['name']; echo "   " ; echo $row['blood_gp']; echo "    "; echo $row['area'];
    $donor_id = $row['donor_id'];
    $sqlin = "SELECT * FROM donor_phone_no WHERE donor_id = '$donor_id'";
    $res = mysqli_query($conn, $sqlin);
    $row2 = mysqli_fetch_array($res);
    $name = $row["name"];
    $bg = $row["blood_gp"];
    $area = $row["area"];
    $ph = $row2["phone_no"];
    echo "<b>Name : </b>$name <br>";
    echo "<b>Blood Group : </b>$bg <br>";
    echo "<b>Area : </b>$area <br>";
    echo "<b>Phone Number : </b>$ph <br>";

    echo "<br>";
    echo "<br>";
    echo "<br>";

}
}

?>
   
    

</body>
</html>