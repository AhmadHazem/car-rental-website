 <?php
  session_start();
  $connect = mysqli_connect("localhost","root","","car_rental_agency");
  if(isset($_POST['sss']))
  {
    
    $connect = mysqli_connect("localhost","root","","car_rental_agency");
    $ToDate = $_POST["To"];
   
    $myQuery1 = "SELECT *
    FROM car
    WHERE car.state = 'out of service'";
    $result1 = $connect->query($myQuery1);
    $myQuery2 = "SELECT *
    FROM reservation NATURAL JOIN car
    WHERE ('$ToDate' BETWEEN PickupDate AND ReturnDate)";
    $result2 = $connect->query($myQuery2);
    $myQuery3 = "SELECT * FROM car 
    WHERE plateID NOT IN (
    SELECT plateID
    FROM reservation
    WHERE ('$ToDate' BETWEEN PickupDate AND ReturnDate)
    ) AND state!='out of service'";
    $result3 = $connect->query($myQuery3);
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

button {
      width: 14%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background:  teal; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background:  teal;
      }
      input {
      width: 10%;
      
      }
</style>
</head>
<body>


<nav>
  <body>
    <div class="main-block">
    <form action="" method="post" name="A" class="" autocomplete="off" onsubmit= "">
      
      <nav class="navbar">

        <!-- LOGO -->
        <div class="logo">Car status</div>
        
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
   
</ol>
</nav>
<br>
<hr>
<form method="post">

  <label for="">day</label> <input type="date" name="To">
  <input type="submit" name="sss" value="view">
</form>
<br><br>
<table id="car_status">
  <tr>
    <th>plate ID</th>
    <th>Car Manfactuerer</th>
    <th>Car Model</th>
    <th>State</th>
  </tr>
   <?php
   if (isset($_POST['sss']))
   {
    while($rows = $result1->fetch_assoc())
    {
  ?>
  <tr>
    <td><?php echo $rows['plateID']; ?> </td>
    <td><?php echo $rows['manufacturer']; ?> </td>
    <td><?php echo $rows['model']; ?> </td>
    <td>out of service </td>
  </tr>
  <?php   
    }
    while($row1 = $result2->fetch_assoc())
    {
      ?>
      <tr>
    <td><?php echo $row1['plateID']; ?> </td>
    <td><?php echo $row1['manufacturer']; ?> </td>
    <td><?php echo $row1['model']; ?> </td>
    <td>rented</td>
  </tr>
  <?php
    }
    while($row2 = $result3->fetch_assoc())
    {
      ?>
    <tr>
    <td><?php echo $row2['plateID']; ?> </td>
    <td><?php echo $row2['manufacturer']; ?> </td>
    <td><?php echo $row2['model']; ?> </td>
    <td>available</td>
  </tr>
<?php
    }
  }
  ?>
  
</table>

</body>
</html>


