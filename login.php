<?php 

  session_start();
    
  $con = @new mysqli('localhost', 'root', '', 'cargomatic');

  if($con->connect_errno != 0){
    echo "Error: ".$con->connect_errno;
  }else{

    if(isset($_POST['login']) && isset($_POST['passw'])){

      $email = $_POST['login'];
      $passw = $_POST['passw'];

      $email = htmlentities($email, ENT_QUOTES, "UTF-8");
      $passw = htmlentities($passw, ENT_QUOTES, "UTF-8");

      $sql = "SELECT * FROM konta WHERE email='$email' AND haslo='$passw'";

      if($result = @$con->query($sql)){

        $users = $result->num_rows;
        if($users>0){

          $row = $result->fetch_assoc();
          $_SESSION['zalogowany'] = true;
          $_SESSION['email'] = $row['email'];
          $_SESSION['admin'] = $row['czy_admin'];
          $_SESSION['id_konta'] = $row['id_konta'];
          header('Location: zaloguj.php');
          $result->free_result();

        }else{
          $_SESSION['zalogowany'] = false;
          header('Location: zaloguj.php');
        }

      }

    }

  }    
  
  $con->close();

?>