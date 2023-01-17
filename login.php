
<html>
  <?php
  require 'config.php';
  if(isset($_GET["register"]))
  {
    $email = $_GET["email"];
    $password = $_GET["password"];
    $_SESSION['mail'] = $email;
    $_SESSION['pass'] = $password;
    $encryptedpassword = md5($password);
    $query = mysqli_query($conn, "SELECT * FROM car_rental_agency.`user` WHERE  email = '$email' and password='$encryptedpassword'");
    $result = mysqli_fetch_row($query);
    if ($result)
    {
        if($result[8] == 1)
        {
          header("Location: Add_car.php", true, 301);
          exit();
        }
        header("Location: profile.php", true, 301);
        exit();
    }
    else
    {
      echo "<script> alert('Incorrect email or password'); </script>";
    }
  }
  ?>
  <head>
    <style>
      body{
        padding: 50px;
        font-family: 'Roboto', sans-serif;
        background-color: #F5F5F5;
      }
      /*Sign In Form*/
      .signin{
        position: relative;
        height: 550px;
        width: 500px;
        margin: auto;
        box-shadow: 0px 30px 125px -5px #000;}
      /*Background Img*/
      .back-img{
        position: relative;
        width: 100%;
        height: 300px;
        background: url('https://www.omnihotels.com/-/media/images/hotels/nycber/destinations/nyc-aerial-skyline.jpg?h=660&la=en&w=1170')no-repeat   center center;
      background-size: cover;
      }
      .layer {
          background-color: rgba(33,150,243,0.5);
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
      }
      .active{
        padding-left: 25px;
        color: #fff;
      }
      .nonactive {
        color: rgba(255, 255, 255, 0.6);
      }
      .sign-in-text{
        top: 175px;
        position: absolute;
        z-index: 1;
      }
      h2 {
        padding-left: 15px;
        font-size: 25px;
        text-transform: uppercase;
        display: inline-block;
        font-weight: 300;
      }
      .point{
        position: absolute;
        z-index: 1;
        color: #fff;
        top: 235px;
        padding-left: 50px;
        font-size: 20px;
      }

      /*form-section*/
      .form-section{
        padding: 70px 90px 70px 90px;
      }
      .keep-text{
        font-size: 15px;
        color: #BDBDBD;
      }
      .forgot-text{
        font-size: 12px;
        color: #BDBDBD;
        text-align: right;
      }
      /*sign-in-btn*/
      .sign-in-btn{
        width: 100px;
        background-color: #4B56D2 ;
        font-family: Arial, Helvetica, sans-serif;
        font-size: large;
        color: #F5F5F5;
        
      }
    </style>
  </head>
  <body>
    <div class="signin">
      <div class="back-img">
        <div class="sign-in-text">
          <h2 class="active">Car Rental</h2>
        </div><!--/.sign-in-text-->
        <div class="layer">
        </div><!--/.layer-->
        <p class="point">&#9650;</p>
      </div><!--/.back-img-->
      <div class="form-section">
       
        <form action="profile.php" onclick="" method="get">
          <!--Email-->
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text" name="email" required>
            <label class="mdl-textfield__label" for="sample3">Email</label>
            <!-- <span class="mdl-textfield__error">Enter a correct Email</span> -->
          </div>
          <br/>
          <br/>
          <!--Password-->
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="password" name="password" required>
            <label class="mdl-textfield__label" for="sample3">Password</label>
            <!-- <span class="mdl-textfield__error">Minimum 8 characters</span> -->
          </div>
          <br/>
        <input type="submit" class="sign-in-btn" name="register">
        <br>
        <a href="reg.php">sign up ?</a>
        </label>
        </form>
  </body>
</html>










