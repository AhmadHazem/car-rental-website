<html>
 <?php
require 'config.php';
if(isset($_POST["delete"])){

    $plate = $_POST["plate"];



$duplicate = mysqli_query($connect, "SELECT * FROM car_rental_agency.`car`  WHERE  plateID = '$plate'");
if(mysqli_fetch_row($duplicate) > 0){

    $query = " DELETE FROM car_rental_agency.`car` WHERE PlateID = '$plate' ";
      mysqli_query($connect, $query);
      echo "<script> alert('Car Has been deleted successfully'); </script>";
  }

else 
{
    echo "<script> alert('Car Not found '); </script>";  
}
}
?>

<head>

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" />

      

    <title>Delete Car</title>
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
      padding: 100px;
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
      width: 50%;
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
      width: 30%;
      
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
  </head>

  <body>
    <nav>
      <div class="main-block">
        <form action="" method="post" name="A" class="" autocomplete="off" onsubmit= "">
          
          <nav class="navbar">
    
            <!-- LOGO -->
            <div class="logo">Delete Car</div>
            
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

          </form>
            </div>
            
            </ul>
            
            </nav>
      </nav>

    
    <div class="main-block">
 
    <form action="" method="post">
       <input type="text" name="plate" placeholder="Enter plateID..."><br>
      <button type="submit" name="delete"  class="btn">Delete </button>
    </form>
    </div> 
  </body>
</html>