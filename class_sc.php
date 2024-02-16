<?php 

  class shoping_cart{

    public function dodaj(){
      if(!isset($_SESSION['koszyk'])){
        $_SESSION['koszyk'] = array();
      }
      for($i = 0; $i < count($_SESSION['koszyk']); $i++){
        if($_SESSION['koszyk'][$i] == $_GET['id_d']){
          exit();
        }
      }
      array_push($_SESSION['koszyk'], $_GET['id_d']);
      echo '<script>';
        echo 'location.href="zarezerwuj.php"';
      echo '</script>';
    }

    public function usun(){
      for($i = 0; $i < count($_SESSION['koszyk']); $i++){
        if($_SESSION['koszyk'][$i] == $_GET['id_u']){
          unset($_SESSION['koszyk'][$i]);
          $_SESSION['koszyk'] = array_values($_SESSION['koszyk']);
          break;
        }
      }
      echo '<script>';
        echo 'location.href="koszyk.php"';
      echo '</script>';
    }

    public function zamow(){
      $baza = mysqli_connect('localhost', 'root', '', 'cargomatic');
      $date2 = date("Y-m-d", time() + 2*86400);
      $date1 = date("Y-m-d", time() + 86400);
      $a = $_SESSION['id_konta'];
      for($i = 0; $i < count($_SESSION['koszyk']); $i++){
        $b = $_SESSION['koszyk'][$i];
        mysqli_query($baza, "INSERT INTO rezerwacje VALUES (null, '$date1', '$date2', '$a', '$b')");
      }
      unset($_SESSION['koszyk']);
      mysqli_close($baza);
      echo '<script>location.href="zaloguj.php"</script>';
    }

  }

?>