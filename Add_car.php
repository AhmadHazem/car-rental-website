<?php
  require 'config.php';
  //Fsession_start();
  $connect = mysqli_connect("localhost","root","","car_rental_agency");
  $sql = "SELECT * FROM `branch` WHERE 1;";
  $res = $connect->query($sql);
  if(isset($_POST["add"]))
  {
    
    $connect = mysqli_connect("localhost","root","","car_rental_agency");
    $plate = $_POST["plate"];
    $Car_Manfactuerer = $_POST["Car_Manfactuerer"];
    $Car_Model = $_POST["Car_Model"];
    $Year_Model= $_POST["Year_Model"];
    $Colour =$_POST["Colour"];
    $mode =$_POST["mode"];
    if ($mode == "yes")
    {
      $mode = 1;
    }
    else
    {
      $mode = 0;
    }
    $Status = $_POST["Status"];
    $img = $_POST['imglink'];
    $price_per_day = $_POST["price_per_day"];
    $branch = $_POST["branch"];
    $duplicate = mysqli_query($connect, "SELECT * FROM car_rental_agency.`car`  WHERE  plateID = '$plate'");
    if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('Car already exist'); </script>";
    }
    else
    {
      $query = "INSERT INTO car_rental_agency.`car` VALUES('$plate','$Car_Model','$Colour','$Car_Manfactuerer','$Year_Model','$price_per_day', $mode,'$img','$Status','$branch')";
      mysqli_query($connect, $query);
      echo "<script> alert('Car Has been added succefully'); </script>";
    }
  }
  ?>
<html>
 
  <head>

    
  <meta charset="UTF-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="style.css" />

      

    <title>Add Car</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: rgb(0, 0, 0);
      }

      * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
}
/* ........................................................................ */
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



/* ......................................................................................................... */
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
      padding: 160px;
      background-image: url('car3.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      fieldset {
      border: none;
      border-top: 1px solid #3346d4;
      }
      .account-details, .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .account-details >div, .personal-details >div >div {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      }
      .account-details >div, .personal-details >div, input, label {
      width: 100%;
      }
      label {
      padding: 0 10px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 8px;
      vertical-align: middle;
      }
      .checkbox {
      margin-bottom: 10px;
      }
      select, .children, .gender, .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
      }
      select {
      background:white ;
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
      .checkbox input, .children input {
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
      padding: 20px 0;
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
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 100%;
      
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
    <form action="" method="post" name="A" class="" autocomplete="off" onsubmit= "">
      
      <nav class="navbar">

        <!-- LOGO -->
        <div class="logo">Add Car</div>
        
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

        
      <!-- <nav aria-label="breadcrumb" class="main-breadcrumb" style="font-size: medium;">
        <ol class="breadcrumb">
        </ol>
      </nav> -->
      

      <fieldset>
        <legend>
          <h3>Car Details</h3>
        </legend>
        <div  class="personal-details">
          <div>
            <div><label>plate ID</label><input type="text" name="plate"></div><br>
             <div>
                <label> Car Manfactuerer </label>
                <input type="text" name="Car_Manfactuerer" required>
            </div>
            <div>
                <label> CarModel  </label>
                <input type="text" name="Car_Model" required>
                
            </div>
            <div>
                <label> Year Model  </label>
                <input type="text" name="Year_Model" required>
                    </div>
                    
                    <div>
                      <label>Colour </label>
                      <input type="text" name="Colour" required>
                          </div>
            <div>
                <label>automatic</label>
                <div class="gender">
                  <input type="radio" value="yes" id="yes" name="mode" required/>
                  <label for="yes" class="radio">Yes</label>
                  <input type="radio" value="no" id="no" name="mode" required/>
                  <label for="no" class="radio">no</label>
                </div> 
              </div> 

              <div>
                <label> Status  </label>
                    <select name="Status" required>
                    <option value="active">active </option>
                    <option value="out of service">out of service</option>
                    </select>
                
            </div>

              <div><label>price per day</label><input type="text" name="price_per_day" required></div>
              <div><label>Image</label><input type="text" name="imglink" required></div>
              <div><label>Branch Name </label>
              <select name="branch" required>

              <?php
              while($r = $res->fetch_assoc())
              {
              echo "<option value=".$r['branchID'].">" . $r['City'] . " in " . $r['Country'] . "</option>";
              }
              ?>
              </select>
            </div><br>
 
          
          <div>

          </div>
        </div>
      </fieldset>
      <fieldset>
      </fieldset>
      <button type="submit" name="add" class="btn">Add Car </button>
    </form>
    </div> 
  </body>
</html>