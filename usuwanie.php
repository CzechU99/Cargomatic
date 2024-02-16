<?php 

    $baza = mysqli_connect("localhost", "root", "", "cargomatic");

    $a = $_GET['tabelan'];
    $b = $_GET['id'];
    $c = $_GET['nazwa'];


    mysqli_query($baza, "DELETE FROM $a WHERE $c='$b'");

    header('Location: zaloguj.php');

    mysqli_close($baza);

?>