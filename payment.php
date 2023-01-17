<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "car_rental_agency");
if(isset($_GET['checker']))
{
  $FromDate = $_GET["from"];
  $ToDate = $_GET["to"];
  $sql = "SELECT * FROM reservation NATURAL JOIN car NATURAL JOIN user
  WHERE (reservation.PickupDate BETWEEN '$FromDate' AND '$ToDate') AND
  (reservation.ReturnDate BETWEEN '$FromDate' AND '$ToDate')";
  $res = $connect->query($sql);
  $query = "SELECT SUM(Payment) FROM reservation NATURAL JOIN car NATURAL JOIN user WHERE (PickupDate BETWEEN '$FromDate' AND '$ToDate') AND (ReturnDate BETWEEN '$FromDate' AND '$ToDate');";
  $result2 = $connect->query($query);
  $profit = mysqli_fetch_row($result2);
}
else
{
  $sql = "SELECT * FROM car NATURAL JOIN user NATURAL JOIN reservation WHERE 1";
  $res = $connect->query($sql);
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
    function checkDelete() {
      return confirm('Are you sure?');
    }
  </script>
  <style>
    #reservations {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #reservations td,
    #reservations th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #reservations tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #reservations tr:hover {
      background-color: #ddd;
    }

    #reservations th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: teal;
      color: white;
    }
    #car_status {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#car_status td, #car_status th {
  border: 1px solid #ddd;
  padding: 8px;
}

#car_status tr:nth-child(even){background-color: #f2f2f2;}

#car_status tr:hover {background-color: #ddd;}

#car_status th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  teal;
  color: white;
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
<div class="logo">Payments</div>

<!-- NAVIGATION MENU -->

<ul class="nav-links">

<!-- NAVIGATION MENUS -->

<div class="menu">


<li class="services">

<a href="#">Services</a>

<!-- DROPDOWN MENU -->

<ul class="dropdown">

  <li class="breadcrumb-item"><a href="Add_car.php">Add car</a></li>
  <li class="breadcrumb-item"><a href="delete_car.php">Delete car</a></li>
  <li class="breadcrumb-item"> <a href="customize_car.php">Customize car</a></li>
  <li class="breadcrumb-item"> <a href="add_branch.php">Add Branch </a></li>
 
</ul>

</li>



<li class="services">
  <a href="#">View</a>
  
    <ul class="dropdown">

    <li class="breadcrumb-item"><a href="view_customers.php">View customers</a></li>
      <li class="breadcrumb-item"><a href="View_reservation.php">View Car reservations</a></li>
      <li class="breadcrumb-item"><a href="View_Car.php">View car</a></li>
      <li class="breadcrumb-item"> <a href="Customer_reservation.php">Customer reservation</a></li>
      <li class="breadcrumb-item"> <a href="car_status.php">Car status</a></li>
     
    </ul>
  </li>

<li class="breadcrumb-item"><a href="payment.php">Payments</a></li>
<!-- <li class="breadcrumb-item"> <a href="login.php">Back </a><br></li> -->

<li class="breadcrumb-item"><a href="home.php">Sign Out</a></li>

</div>

</ul>

</nav>

  <br>
  <br>
  <form action="" method="get">
      <label> From</label><input type="date" name="from" id="from">
      <label> to</label><input type="date" name="to" id="to">
      <input type="submit" name="checker">
  </form>
  <label for="">Total Profit in the specified period <?php if(isset($_GET['checker'])) {echo $profit[0];} ?> EGP</label>
  <br>
  <br>
  <table id="reservations">
    <tr>
      <th>reservation date</th>
      <th>reservation ID</th>
      <th>plate ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>pickup date</th>
      <th>return date</th>
      <th>Payment</th>
    </tr>
    
      <?php
      while($rows = $res->fetch_assoc())
      {
      ?>
      <tr>
      <td><?php echo $rows['reservationDate']; ?> </td>
      <td><?php echo $rows['reservationID']; ?> </td>
      <td><?php echo $rows['plateID']; ?> </td>
      <td><?php echo $rows['fname']; ?> </td>
      <td><?php echo $rows['lname']; ?> </td>
      <td><?php echo $rows['PickupDate']; ?> </td>
      <td><?php echo $rows['ReturnDate']; ?> </td>
      <td><?php echo $rows['Payment']; ?> </td>
      <tr>
      <?php
      }
      ?>
      
  </table>

</body>

</html>