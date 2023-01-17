<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "car_rental_agency");
if(isset($_GET["SSN1"]))
  {
    $SSN = $_GET["SSN1"];
    $_SESSION["hiddenSSN"] = $SSN;
    $_SESSION['email'] = $_GET['mail'];
    $_SESSION['password'] = $_GET['pass'];
  }
if (isset($_GET['delete'])) {
  $reservationID = $_GET['reservationID'];
  $sql2 = "SELECT * FROM `reservation` WHERE '$reservationID' = reservationID ;";
  $result2 =mysqli_query($connect, $sql2);
  if(mysqli_num_rows($result2) == 0)
  {
    echo "<script> alert('Reservation ID doesnot exist'); </script>";
  }
  else
  {
  $sql = "DELETE FROM `reservation` WHERE '$reservationID' = reservationID ;";
  $result = $connect->query($sql);
  echo "<script> alert('User Has been deleted successfully'); </script>";
  }
}

  $SSN = $_SESSION["hiddenSSN"];
  $myQuery = "SELECT * FROM reservation NATURAL JOIN car WHERE '$SSN' = SSN";
  $result = $connect->query($myQuery);

?>
<!DOCTYPE html>
<html>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />

<head>
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
color: #fff;
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
  </style>
</head>

<body>

  <h1 style="font-family: Arial, Helvetica, sans-serif;"></h1>
  <nav class="navbar">

        <!-- LOGO -->
        <div class="logo">View Your reservations</div>
        
        <!-- NAVIGATION MENU -->
        
        <ul class="nav-links">
        
        <!-- NAVIGATION MENUS -->
        
        <div class="menu">
        
               <li class="breadcrumb-item"><a href="profile.php?email=<?php echo $_SESSION['email']; ?>&password=<?php echo $_SESSION['password']; ?>">Back To Profile</a> 

        
        </div>
        
        </ul>
        
        </nav>

  
  <br>
  <table id="reservations">
    <tr>
      <th>reservation date</th>
      <th>reservation ID</th>
      <th>plate ID</th>
      <th>Car Manfactuerer</th>
      <th>Car Model</th>
      <th>Color</th>
      <th>pickup date</th>
      <th>return date</th>
    </tr>
    <form action="" method="get" onsubmit="checkDelete()" name="formdelete">
      <label for="" style="padding-right: 6px;">Enter Reservation ID you want to delete:</label>
      <input type="text" name="reservationID" style="padding-right: 5px;">
      <input type="submit" name="delete" value="delete" style="padding-left: 5px;">
    </form>
    <br><br>
    <?php
    while ($rows = $result->fetch_assoc()) {
    ?>
      <tr>
        <td><?php echo $rows['reservationDate']; ?> </td>
        <td><?php echo $rows['reservationID']; ?> </td>
        <td><?php echo $rows['plateID']; ?> </td>
        <td><?php echo $rows['manufacturer']; ?> </td>
        <td><?php echo $rows['model']; ?> </td>
        <td><?php echo $rows['color']; ?> </td>
        <td><?php echo $rows['PickupDate']; ?> </td>
        <td><?php echo $rows['ReturnDate']; ?> </td>
      </tr>
    <?php
    }
    ?>
  </table>

</body>

</html>