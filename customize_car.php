 <?php

require 'config.php';
$clicked = 0;
if (isset($_GET['search'])) {
  $connect = mysqli_connect("localhost", "root", "", "car_rental_agency");
  $plateID = $_GET['plateID'];
  $_SESSION['ID'] = $plateID;
  $sql = "SELECT * FROM car WHERE '$plateID' = plateID";
  $result = $connect->query($sql);
  $row = mysqli_fetch_row($result);
}
if(isset($_GET['Edit']))
{
  $connect = mysqli_connect("localhost", "root", "", "car_rental_agency");
  $plate = $_GET['plate'];
  $ID = $_SESSION['ID'];
  $carManfactuerer = $_GET['Car_Manfactuerer'];
  $carModel = $_GET['Car_Model'];
  $YearModel = $_GET['Year_Model'];
  $color = $_GET['Color'];
  $mode = $_GET['mode'];
  if ($mode == "yes")
  {
    $mode = 1;
  }
  else
  {
    $mode = 0;
  }
  $status = $_GET['status'];
  $img = $_GET['Imglink'];
  $priceperday = $_GET['priceperday'];
  $branch = $_GET['branch'];
  $test="UPDATE `car` SET `plateID`='$plate' WHERE `plateID`='$ID'";
  $result2=$connect->query($test);
  $sql2 = "UPDATE `car` SET `plateID`='$plate',`model`='$carModel',`color`='$color',`manufacturer`='$carManfactuerer',
  `modelYear`='$YearModel',`priceperday`='$priceperday',`automatic`=$mode,`imglink`='$img',`state`='$status',
  `branchID`='$branch' WHERE plateID='$plate'";
  $result2 = $connect->query($sql2);
  if ($result2 == false)
  {
    echo "<script> alert('plate ID exists'); </script>";
  }
  else
  {
    echo "<script> alert('Car information changed successfully'); </script>";
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
  <title>Car Customization</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <style>
    html,
    body {
      min-height: 100%;
      background-image: url('car3.jpg');
      background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    body,
    div,
    form,
    input,
    select,
    p {

      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: rgb(0, 0, 0);
    }

    h1 {
      margin: 0;
      font-weight: 400;
    }

    h3 {
      margin: 12px 0;
      color: #000000;
    }

    .main-block {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
    }

    form {
      width: 100%;
      padding: 100px;
            background-image: url('car3.jpg');
      background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;

    }

    fieldset {
      border: none;
      border-top: 1px solid #4B56D2;
    }

    .account-details,
    .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .account-details>div,
    .personal-details>div>div {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .account-details>div,
    .personal-details>div,
    input,
   

    label {
      padding: 0 5px;
      text-align: middle;
      vertical-align: middle;
    }

    input {
      padding: 5px;
      vertical-align: middle;
    }

    .checkbox {
      margin-bottom: 10px;
    }

    select,
    .children,
    .gender,
    .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
    }



    .gender input {
      width: auto;
    }

    .gender label {
      padding: 0 5px 0 0;
    }

    .bdate-block {
      display: flex;
      justify-content: space-between;
    }

    .birthdate select.day {
      width: 35px;
    }

    .birthdate select.mounth {
      width: calc(100% - 94px);
    }

    .birthdate input {
      width: 38px;
      vertical-align: unset;
    }

    .checkbox input,
    .children input {
      width: auto;
      margin: -2px 10px 0 0;
    }

    .checkbox a {
      color: #4B56D2;
    }

    .checkbox a:hover {
      color: #4B56D2;
    }

    button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px;
      border: none;
      background: teal;
      font-size: 14px;
      font-weight: 600;
      color: rgb(255, 255, 255);
    }

    button:hover {
      background: teal;
    }
    body {
font-family: cursive;
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

    @media (min-width: 568px) {

      .account-details>div,
      .personal-details>div {
        width: 50%;
      }

      label {
        width: 40%;
      }

      input {
        width: 60%;
      }

      select,
      .children,
      .gender,
      .bdate-block {
        width: calc(60% + 16px);
      }
    }
  </style>
</head>

<body>

<nav class="navbar">

        <!-- LOGO -->
        <div class="logo">Car customization</div>
        
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

  <div>
    <form method="get" name="searcher">
       <input type="text" placeholder="Search.. by plateID" name="plateID">
      <input type="submit" name="search" value="search" style="width: 100px;">
    </form>
  </div>
   <?php
  if (isset($_GET['search']) and mysqli_num_rows($result) > 0) 
  {
    $clicked = 1;
  ?> 
    <div class="main-block">
      <form name="Editform" method="get">
        <fieldset>
          <legend>
            <h3>Car Details</h3>
          </legend>
          <div class="personal-details">
            <div>
              <div><label>Car Manfactuerer</label><input type="text" name="Car_Manfactuerer" value="<?php echo $row[3]; ?>"></div>
              <div><label>Car Model</label><input type="text" name="Car_Model" value="<?php echo $row[1]; ?>"></div>
              <div><label> Year Model</label><input type="text" name="Year_Model" value="<?php echo $row[4]; ?>"></div>
              <div><label> Color</label><input type="text" name="Color" value="<?php echo $row[2]; ?>"></div>
              <div>
                <label>automatic*</label>
                <div class="gender">
                   <?php if ($row[6] == 1) {
                  ?> 
                    <input type="radio" value="yes" id="yes" name="mode" required checked />
                    <label for="yes" class="radio">Yes</label>
                    <input type="radio" value="no" id="no" name="mode" required />
                    <label for="no" class="radio">no</label>
                   <?php
                  } else {
                  ?> 
                  <input type="radio" value="yes" id="yes" name="mode" required />
                  <label for="yes" class="radio">Yes</label>
                  <input type="radio" value="no" id="no" name="mode" required checked />
                  <label for="no" class="radio">no</label>
                   <?php
                  }
                  ?> 
                </div>
              </div>

            </div>
            <div>

              <div><label>plate ID</label><input type="text" name="plate" value="<?php echo $row[0]; ?>"></div>
              <div>
                <label> Status </label>
                 <?php
                if ($row[8] == "active") {
                ?>
                  <select name="status">
                    <option value="active">active </option>
                    <option value="out of service">out of service</option>
                  </select>
                <?php
                } else {
                ?>
                  <select name="status">
                    <option value="out of service">out of service</option>
                    <option value="active">active </option>
                  </select>
                  <?php
                  
                }
                  ?> 

              </div>
              <div><label>Image Link</label><input type="text" name="Imglink" value="<?php echo $row[7]; ?>"></div>
              <div><label>Price per Day</label><input type="text" name="priceperday" value="<?php echo $row[5]; ?>"></div>

               <?php
              $connect = mysqli_connect("localhost", "root", "", "car_rental_agency");
              $query = "SELECT * FROM branch WHERE 1;";
              $res = $connect->query($query);
              ?> 
              <div>
              <label>Branch name</label>
                <select name="branch">
                  <?php
                  while ($r = $res->fetch_assoc()) {
                    if ($r['branchID'] == $row[9])
                    {
                    echo "<option value=".$r['branchID']." selected>" . $r['City'] . " in " . $r['Country'] . "</option>";
                    }
                    else
                    {
                    echo "<option value=".$r['branchID'].">" . $r['City'] . " in " . $r['Country'] . "</option>";
                    }
                  }
                  ?> 
                </select>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset>
        </fieldset>
        <button type="submit" name="Edit">Apply Your Changes</button>
      </form>
    </div>
   <?php
  } else if($clicked == 1)
   {
    echo "<script> alert('Car does not exist'); </script>";
  }
  ?> 
</body>

</html>