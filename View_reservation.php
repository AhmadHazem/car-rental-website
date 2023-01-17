<?php
  session_start();
  if(isset($_GET['checker']))
  {
    $connect = mysqli_connect("localhost","root","","car_rental_agency");
    $FromDate = $_GET["from"];
    $ToDate = $_GET["to"];
    $myQuery = "SELECT * FROM reservation NATURAL JOIN car WHERE reservationDate BETWEEN '$FromDate' AND '$ToDate'";
    $result = $connect->query($myQuery);
    $connect->close();
  }
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" />

  
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
        <div class="logo">View reservation</div>
        
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
<hr>
<div class="boxes">
  <form action="" method="get">
      <label> From</label><input type="date" name="from" id="from">
      <label> to</label><input type="date" name="to" id="to">
      <input type="submit" name="checker">
  </form>
</div><br>



<table id="reservations">
  <tr>
    <th>reservation date</th>
    <th>reservation ID</th>
    <th>plate ID</th>
    <th>Car Manfactuerer</th>
    <th>Car Model</th>
    <th>pickup date</th>
    <th>return date</th>
  </tr>
  <?php
  if(isset($_GET['checker']))
  {
    while($rows = $result->fetch_assoc())
    {
  ?>
  <tr>
    <td><?php echo $rows['reservationDate']; ?> </td>
    <td><?php echo $rows['reservationID']; ?> </td>
    <td><?php echo $rows['plateID']; ?> </td>
    <td><?php echo $rows['manufacturer']; ?> </td>
    <td><?php echo $rows['model']; ?> </td>
    <td><?php echo $rows['PickupDate']; ?> </td>
    <td><?php echo $rows['ReturnDate']; ?> </td>
  </tr>
  <?php  
    }
  }
  ?>
</table>

</body>
</html>
