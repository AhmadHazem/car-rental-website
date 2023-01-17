<html>
<?php
  require 'config.php';
  if(isset($_POST["register"]))
  {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encryptedpassword = md5($password);
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $nationality =$_POST["nationality"];
    $SSN = $_POST["SSN"];
    $gender =$_POST["gender"];
    $birthday = $_POST["birthday"];
    $duplicate = mysqli_query($connect, "SELECT * FROM car_rental_agency.`user`  WHERE  SSN = '$SSN' OR email='$email' OR phone='$phone'");
    if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('Email or SSN or Has Already Taken'); </script>";
    }
    else
    {
      $query = "INSERT INTO car_rental_agency.`user` VALUES('$SSN','$fname','$lname','$email','$phone', '$nationality','$encryptedpassword','$birthday',0,'$gender')";
      mysqli_query($connect, $query);
      echo "<script> alert('Email Has been added succefully'); </script>";
    }
  }
  ?>
   <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

    <title>Account registration form</title>
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
      padding: 20px;
      background-image: url('car3.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      }
      fieldset {
      border: none;
      border-top: 1px solid #4B56D2;
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
      padding: 0 5px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 5px;
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
      background: transparent;
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
      .btn {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: teal; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      .btn:hover {
      background:teal; 
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 60%;
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
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
    <script>
    function registrationvalidation(){
        var fname= document.forms["A"]["fname"].value;
        var lname= document.forms["A"]["lname"].value;
        var email= document.forms["A"]["email"].value;
        var password= document.forms["A"]["password"].value;
        var phone= document.forms["A"]["phone"].value;
        var ssn= document.forms["A"]["SSN"].value; 
        var nationality= document.forms["A"]["nationality"].value;

        var emailx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailx)==-1){
          alert("Please Insert a valid email");
          return false;
        }
        if (isNaN(phone))
        {
          alert("Please insert valid phone number");
          return false;
        }
        if (isNaN(ssn))
        {
          alert("Please insert valid ssn");
          return false;
        }
        if (!isNaN(fname))
        {
          alert("Please Insert a valid name");
          return false;
        }
        if (!isNaN(lname))
        {
          alert("Please Insert a valid name");
          return false;
        }
        if (!isNaN(nationality))
        {
          alert("Please Insert a valid nationality");
          return false;
        }
        return true;
}


    </script>
  </head>
  <body>
    <div class="main-block">
    <form action="" method="post" name="A" class="" autocomplete="off" onsubmit= "return registrationvalidation();">
      

       <nav class="navbar">

        <!-- LOGO -->
        <div class="logo">Create a free account</div>
        
        <!-- NAVIGATION MENU -->
        
        <ul class="nav-links">
        
        <!-- NAVIGATION MENUS -->
        
        <div class="menu">
        
               <li class="breadcrumb-item"><a href="login.php">Back To login page</a> 

        
        </div>
        
        </ul>
        
        </nav>
      <fieldset>
        <legend>
          <h3>Account Details</h3>
        </legend>
        <div  class="account-details">
          <div><label>Email*</label><input type="email" name="email" value="" required></div>
          <div><label>Password*</label><input type="password" name="password" value="" required></div>
        </div>
      </fieldset>
      <fieldset>
        <legend>
          <h3>Personal Details</h3>
        </legend>
        <div  class="personal-details">
          <div>
            <div><label>First Name*</label><input type="text" name="fname" value="" required></div>
            <div><label>Last Name*</label><input type="text" name="lname" value="" required></div>
            <div><label>Phone*</label><input type="text" name="phone" value="" required></div>
            <div><label>Nationality*</label><input type="text" name="nationality" value=""></div>
            <div><label>Social Security Number*</label><input type="text" name="SSN" value="" required></div>
          </div>
          <div >
            <div>
              <label>Gender*</label>
              <div class="genders">
                <input type="radio" id="gender" name="gender" value="Male" required/>
                <label for="male" class="radio">Male</label>
              </div>
              <div>
              <input type="radio" id="gender" name="gender" value="female" required/>
                <label for="female" class="radio">Female</label>
              </div>
            </div>
            <div>
            <label for="">Birthdate</label>
            <input type="date" name="birthday" id="birthday" required>
          </div>
          </div>
        </div>
      </fieldset>
      <input type="submit" name="register" class="btn">
    </form>
    </div> 
  </body>
</html>