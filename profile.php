<html>
<?php
    require 'config.php';
    if(isset($_POST["Delete"]))
    {
        
        $connect = mysqli_connect("localhost","root","","car_rental_agency");
        $SSN = $_POST["SSN1"];
        $duplicate = mysqli_query($connect, "SELECT * FROM car_rental_agency.`user`  WHERE  SSN = '$SSN';");
        if(mysqli_fetch_row($duplicate) > 0){
          $query = " DELETE FROM car_rental_agency.`user` WHERE SSN = '$SSN' ";
            mysqli_query($connect, $query);
            echo "<script> alert('User Has been deleted successfully'); </script>";
            exit();
        }
      else 
      {
          echo "<script> alert('User Not found '); </script>";  
          exit();
      }
      
    }
    ?>
    <?php
      // session_start();
      $email= $_REQUEST['email'];
      $password = $_REQUEST['password'];
      $encryptedpassword = md5($password);
      $connect = mysqli_connect("localhost","root","","car_rental_agency");
      $myQuery = "SELECT * FROM car_rental_agency.`user` WHERE  email = '$email' and password='$encryptedpassword'";
      $result = $connect->query($myQuery);
      $rows=mysqli_fetch_row($result);
      if(is_null($rows))
      {
        echo "<script> alert('User does not exist'); </script>";
        exit();
      }
      if($rows[8] == 1)
      {
        header("Location: Add_car.php", true, 301);
        exit();
      }
    ?>

 
    <head>

      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="style.css" />
    <script language="JavaScript" type="text/javascript">
    function checkDelete(){
    return confirm('Are you sure?');
    }
    </script>
        <style>
            body{
        background-image: url("car.jpg");
        /* Full height */
        height: 100%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

.boxes 
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
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
        <div class="container">
            <div class="main-body">
            

              <nav class="navbar">
    
  <!-- LOGO -->
  <div class="logo">Car reservation</div>
  
  <!-- NAVIGATION MENU -->
  <ul class="nav-links">
  <!-- NAVIGATION MENUS -->
  <div class="menu">
  
    <li class="breadcrumb-item"><a href="home.php">log out</a></li>
    <li class="breadcrumb-item"><a href='reserve.php?SSN1=<?php echo $rows[0]; ?>&mail=<?php echo $rows[3];?>&pass=<?php echo $password;?>'>Reserve car</a></li>
    <li class="breadcrumb-item"><a href="reservations.php?SSN1=<?php echo $rows[0]; ?>&mail=<?php echo $rows[3];?>&pass=<?php echo $password;?>">View your reservations</a></li>
  </div>
  </ul>
  </nav>

                  <form name="profile" method="post" onsubmit="return checkDelete()">
                    <div class="row gutters-sm">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="fname1"  value="<?php echo $rows[1]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="lname1"  value="<?php echo $rows[2]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="email1"  value="<?php echo $rows[3]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">SSN</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="SSN1" readonly value="<?php echo $rows[0]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="phone1"  value="<?php echo $rows[4]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">Nationality</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="nationailty1"  value="<?php echo $rows[5]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">Birthdate</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="birthdate1" readonly  value="<?php echo $rows[7]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">gender</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                              <input type="text" name="gender1" readonly  value="<?php echo $rows[9]; ?>" style="
                              border-style: none;
                              box-sizing: border-box;
                              width: 100%;"
                              >
                              </div>
                            </div>
                            <hr>
                            <input type="submit" value="Delete account" name="Delete">
                    </form>
                          <hr>
                          <div class="row">
                          </div>
                          </div>
                        </div>
                      </div>
                  </div>
        
                </div>
            </div>
    </body>
</html>