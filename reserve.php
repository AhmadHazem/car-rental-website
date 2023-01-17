<?php
  session_start();
  $connect = mysqli_connect("localhost","root","","car_rental_agency");
  $sql = "SELECT * FROM `branch` WHERE 1;";
  $res = $connect->query($sql);
  $sql3 = "SELECT DISTINCT car.manufacturer FROM `car` WHERE 1;";
  $output = $connect->query($sql3);
  if(isset($_GET["SSN1"]))
  {
    $SSN = $_GET["SSN1"];
    $_SESSION["hiddenSSN"] = $SSN;
    $_SESSION['email'] = $_GET['mail'];
    $_SESSION['password'] = $_GET['pass'];
    $_SESSION['clicked'] = 0;
  }
  if(isset($_GET["link"]))
  {
  $_SESSION['clicked'] = 1;
  $connect = mysqli_connect("localhost","root","","car_rental_agency");
  $FromDate = $_GET["from"];
  $ToDate = $_GET["to"];
  $branchID = $_GET["branchID"];
  $brand = $_GET['manufact'];
  if ($brand == "Any")
  {
    $brandexist = 1;
  }
  else
  {
    $brandexist="manufacturer='$brand'";
  }
  $mod = $_GET['mod'];
  if ($mod == "")
  {
    $modexist = 1;
  }
  else
  {
    $modexist="model='$mod'";
  }
  $colour = $_GET['colour'];
  if($colour == "")
  {
    $colourexist = 1;
  }
  else
  {
    $colourexist = "color='$colour'";
  }
  $cost = $_GET['cost'];
  if($cost == "")
  {
    $costexist = 1;
  }
  else
  {
    $costexist = "priceperday<='$cost'";
  }
  $_SESSION["todate"] = $ToDate;
  $_SESSION["fromdate"] = $FromDate;
  $date2 = date('Y-m-d');
  if($_SESSION['todate'] >= $date2 AND $_SESSION['fromdate'] >= $date2 AND $_SESSION['todate'] >= $_SESSION['fromdate'])
  {
  $myQuery = "SELECT car.plateID, car.manufacturer, car.model, car.modelYear,car.imglink,car.priceperday,car.color,car.automatic
  FROM car
  WHERE car.branchID ='$branchID' AND $brandexist AND $modexist AND $colourexist AND $costexist AND `state`='active' AND car.plateID not IN (
  SELECT plateID
  FROM reservation
  WHERE ('$FromDate' BETWEEN PickupDate AND ReturnDate) or ('$ToDate' BETWEEN PickupDate AND ReturnDate) 
  or ((PickupDate BETWEEN '$FromDate' AND '$ToDate') AND (ReturnDate BETWEEN '$FromDate' AND '$ToDate')))";
  $result = $connect->query($myQuery);
  $result3 = $connect->query($myQuery);
  }
  else
  {
    echo "<script> alert('Unvalid date'); </script>";
  }
  }
  if(isset($_GET["reserved"]) and $_SESSION['clicked']==1)
  {
    $date = date('Y-m-d');
    $connect = mysqli_connect("localhost","root","","car_rental_agency");
    $plateID = $_GET["plateID"];
    $sql2 = "SELECT * from car WHERE '$plateID' = plateID";
    $res2 = $connect->query($sql2);
    $row2 = mysqli_fetch_row($res2);
    $priceperday = $row2[5];
    $SSN1 = $_SESSION["hiddenSSN"];
    $ToDate1 = $_SESSION["todate"];
    $FromDate1 = $_SESSION["fromdate"];
    $date1 = new DateTime($FromDate1);
    $date2 = new DateTime($ToDate1);
    $interval = $date1->diff($date2);
    $payment = ($interval->days + 1) * $priceperday;
    $myQuery = "SELECT * FROM car WHERE '$plateID' = plateID";
    $result = $connect->query($myQuery);
    if(mysqli_num_rows($result) > 0)
    {
      echo "<script> alert('Car was rented : $payment EGP'); </script>";
      $query = "INSERT INTO car_rental_agency.reservation VALUES('','$date','$FromDate1','$ToDate1','$SSN1','$payment','$plateID')";
      mysqli_query($connect, $query);
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
<script language="JavaScript" type="text/javascript">
    function checkDelete(){
    return confirm('Total Price EGP <?php echo $payment;?>');
    }

    </script>
<style>
#reservations {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#reservations td, #reservations th {
  border: 1px solid #ddd;
  padding: 8px;
}

#reservations tr:nth-child(even){background-color: #f2f2f2;}

#reservations tr:hover {background-color: #ddd;}
input[type=text],input[type=date], select {
 
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit]
,input[type=date] {
  background-color: #4c9e9e;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit],input[type=date]:hover {
  background-color: #4c9e9e;
}
#reservations th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: teal;
  color: white;
}

.boxes
{
  text-align: center;
}

body {
font-family: cursive;
background-image: url('car3.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
 background-size: cover;
}

a {
text-decoration: none;
}

li {
list-style: none;
}

/* NAVBAR STYLING STARTS */

.navbar {
display: flex;
align-items: center;
justify-content: space-between;
padding: 20px;
background-color: teal;
color: #fff;
}

.nav-links a {
color: #fff;
}

/* LOGO */

.logo {
font-size: 32px;
}

/* NAVBAR MENU */

.menu {
display: flex;
gap: 1em;
font-size: 18px;
}

.menu li:hover {
background-color: #4c9e9e;
border-radius: 5px;
transition: 0.3s ease;
}

.menu li {
padding: 5px 14px;
}

/* DROPDOWN MENU */

.services {
position: relative; 
}

.dropdown {
background-color: rgb(1, 139, 139);
padding: 1em 0;
position: absolute; /*WITH RESPECT TO PARENT*/
display: none;
border-radius: 8px;
top: 35px;
}

.dropdown li + li {
margin-top: 10px;
}

.dropdown li {
padding: 0.5em 1em;
width: 8em;
text-align: center;
}
.dropdown li:hover {
background-color: #4c9e9e;
}
.services:hover .dropdown {
display: block;
}

</style>
</head>
<body>
<h1 style="font-family: Arial, Helvetica, sans-serif;"></h1>

<nav class="navbar">
    
  <!-- LOGO -->
  <div class="logo">Car reservation</div>
  
  <!-- NAVIGATION MENU -->
  <ul class="nav-links">
  <!-- NAVIGATION MENUS -->
  <div class="menu">
  
     <a href="profile.php?email=<?php echo $_SESSION['email'];?>&password=<?php echo $_SESSION['password'];?>">Back To Profile</a> 

  </div>
  </ul>
  </nav>
<div class="boxes">
<form action="" method="get">
      <label> From </label><input type="date" name="from" id="from" style="width: 15%;" required>
      <label> to </label><input type="date" name="to" id="to" style="width: 15%" required>
      <br><br>
      <label> Pickup location </label>
      <select name="branchID" style="width: 10%;" required>

      <?php
      while($r = $res->fetch_assoc())
      {
        echo "<option value=".$r['branchID'].">" . $r['City'] . " in " . $r['Country'] . "</option>";
      }
      ?>
      <br>
      </select>
      <label for="manufact">Car Manufactuerer</label>
      <select name="manufact" style="width: 10%;" onclick="<?php $clicked_1=1;?>">
      <option value="Any">Any</option>
      <?php
      while($r2 = $output->fetch_assoc())
      {
        echo "<option value=".$r2['manufacturer'].">" .$r2['manufacturer'] . "</option>";
        $gg = $r2['manfacturer'];
      }
      ?>
      </select>
      <label for="mod">Car Model</label>
      <input type="text" name="mod" placeholder="Any" value="">
      <label for="colour"> color</label>
      <input type="text" name="colour" placeholder="Any" value="">
      <label for="cost">Max price per day</label>
      <input type="text" name="cost" placeholder="Any" value="">
      <br><br>
      <input type="submit" name="link" onsubmit="return confirm()" style="width: 25%;">
      <br><br>
  </form>
</div>

<hr>
<div class="boxes">
  <br>
  <form action="" method="get" onsubmit="return checkDelete()">
  <label> plateID</label>
    <select name="plateID" style="width: 100px;">
      <?php
        if (isset($_GET["link"]))
        {
          while($r = $result3->fetch_assoc())
          {
            echo "<option value=".$r['plateID'].">" . $r['plateID'] . "</option>";
          }
        }
      ?>
    </select>
  <input type="submit" value="reserve" name="reserved" onsubmit="return checkDelete()">
  </form>
</div><br>



<table id="reservations">
  <tr>
    <th>plate ID</th>
    <th>Car Manfactuerer</th>
    <th>Car Model</th>
    <th>modelYear</th>
    <th>imglink</th>
    <th>price per day</th>
    <th>color</th>
    <th>Automatic</th>
  
  </tr>
  <?php
  if (isset($_GET["link"]))
  {
    while($rows = $result->fetch_assoc())
    {
  ?>
  <tr>
  <td><?php echo $rows['plateID']; ?> </td>
  <td><?php echo $rows['manufacturer']; ?> </td>
  <td><?php echo $rows['model']; ?> </td>
  <td><?php echo $rows['modelYear']; ?> </td>
  <td><img src="<?php echo $rows['imglink']; ?>" alt="" style="height: 150px;  display: block; margin-left: auto; margin-right: auto;" ></td>
  <td><?php echo $rows['priceperday']; ?> </td>
  <td><?php echo $rows['color']; ?> </td>
  <td><?php if ($rows['automatic'] == 1) {echo 'YES';} else {echo 'NO';} ?> </td>
  </tr>
  <?php  
    }
  }
  ?>
</table>

</body>
</html>
