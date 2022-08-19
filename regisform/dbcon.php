 <?php
   
 $server = "localhost";
 $user = "root";
 $password = "";
 $db = "form";

 $con = mysqli_connect($server,$user,$password,$db);
 
 if($con){
          ?>
          <script>
                    alert("Connection Sucessfull");
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
 
 ?> 