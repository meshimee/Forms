<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   </head>
<body>
          <?php 
          include 'dbcon.php';
          
          if(isset($_POST['submit'])){

              $name = mysqli_real_escape_string($con, $_POST['name']);
              $email = mysqli_real_escape_string($con, $_POST['email']);
              $password = mysqli_real_escape_string($con, $_POST['password']);
              $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);    

              $pass = password_hash($password, PASSWORD_BCRYPT);
              $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
              
              $emailquery = " select * from registration where email = '$email' ";
              $query = mysqli_query($con, $emailquery);

              $emailcount = mysqli_num_rows($query);

              if($emailcount > 0){
                echo "email already exist";
              }
              else{
                if($password === $cpassword){

                  $insertquery = "insert into registration( name, email, password, cpassword) 
                  values('$name', '$email', '$pass','$cpass')";

                  $iquery = mysqli_query($con, $insertquery);

                  if($iquery){
                    ?>
                    <script>
                              alert("Inserted Sucessfull");
                    </script>
                    <?php
                    }
                    else{
                              ?>
                              <script>
                                        alert("No Connection");
                              </script>
                              <?php
                    }
                }
                else{
                  ?>
                              <script>
                                        alert("Password is not matching");
                              </script>
                              <?php
                }
              }
          } 
          ?>

  <div class="wrapper">
    <h2>Registration</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);
    ?>" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name = "name"required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name = "email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name = "password" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name = "cpassword" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Submit" name = "submit">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="#">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
