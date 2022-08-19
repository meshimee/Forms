<?php
          $firstName = $_POST['firstName'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $number = $_POST['number'];
         

          //DATABASE CONNECTION
          $conn = new mysqli('localhost','root','','from');
          if($conn->connect_error){
                    die('Connection Failed : '.$conn->connect_error);
          }
          else{
                    $stmt = $conn->prepare("insert into registration(firstName,email,password,number)
                    values(?, ?, ?, ?");
                    $stmt->bind_param("sssi",$firstName, $email,$password,$number);
                    $stmt->execute();
                    echo "registration successfully...";
                    $stmt->close();
                    $conn->close();
          }

?>