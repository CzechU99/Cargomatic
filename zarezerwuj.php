<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylezarezerwuj.css?v1">
        <title>CARGOMATIC</title>
        <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
        <link rel="icon" type="image/x-icon" href="images/logo6.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>

        <?php
        
          require_once('class_sc.php');
        
        ?>

        <div id="container">

            <div id="menu">
              <a href="https://pl.wikipedia.org" target="_blank"><div id="logo"><img src="images/logo5.png" id="ikona" alt=""></div></a>
                <div id="linki">
                    <a href="index.php"><b>HOME</b></a> 
                    <a href="wspolpraca.php"><b>WSPÓŁPRACA</b></a>
                    <a href="zarezerwuj.php" class="rez" style="text-decoration: none;"><b>ZAREZERWUJ</b></a>
                    <a href="kontakt.php"><b>KONTAKT</b></a>
                    <a href="onas.php"><b>O NAS</b></a>
                    <a href="zaloguj.php"><div style="width: 50px; height: 50px; float: right; margin-top: 15px;">
                    <?php
                      session_start();
                      if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
                          echo '<img src="images/user_click.png" width="50px">';
                      }else{
                          echo '<img src="images/user.png" width="50px">';
                      }
                    ?>
                    </div></a>
                    <?php
                      if(isset($_SESSION['koszyk']) && count($_SESSION['koszyk']) > 0){
                        echo '<a href="koszyk.php"><div style="width: 50px; height: 50px; float: right; margin-top: 15px; margin-right: 15px;"><img src="images/cart_click.png"></div></a>';
                      }else{
                        echo '<a href="koszyk.php"><div style="width: 50px; height: 50px; float: right; margin-top: 15px; margin-right: 15px;"><img src="images/cart.png"></div></a>';
                      }
                    ?>
                </div>
                <div id="nic">

                    <div class="wrapper-menu" id="znikaj">
                      <div class="line-menu half start"></div>
                      <div class="line-menu"></div>
                      <div class="line-menu half end"></div>
                    </div>
  
                    <script>
                      
                      var wrapperMenu = document.querySelector('.wrapper-menu');
                      wrapperMenu.addEventListener('click', function(){
                        wrapperMenu.classList.toggle('open');
                        if(wrapperMenu.classList.contains('open')){
                          document.getElementById('menu2').style.display = 'inline';
                        }else{
                          document.getElementById('menu2').style.display = 'none';
                        }
                      })
  
                      $(window).resize(function () {
                          if($(window).width()>1180){
                              $('#znikaj').removeClass('open');
                              document.getElementById('menu2').style.display = 'none';
                          }
                      });
                    </script>
  
                  </div>
              </div>
  
              <div id="menu2">
                <div id="linki2">
                  <a href="index.php"><b>HOME</b></a><br>
                  <a href="wspolpraca.php"><b>WSPÓŁPRACA</b></a><br>
                  <a href="zarezerwuj.php" class="rez" style="text-decoration: none;"><b>ZAREZERWUJ</b></a>
                  <a href="kontakt.php"><b>KONTAKT</b></a><br>
                  <a href="onas.php"><b>O NAS</b></a><br>
                  <a href="zaloguj.php"><div style="width: 50px; height: 50px; float: right; margin-top: 15px; 
                  <?php 
                    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){ 
                      echo 'margin-right: 55px;';
                    }else{
                      echo 'margin-right: 85px;';
                    }
                  ?>
                  ">
                  <?php 
                        if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
                            echo '<img src="images/user_click.png" width="50px">';
                        }else{
                            echo '<img src="images/user.png" width="50px">';
                        }
                  ?></div></a>
                  <?php 
                    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
                      echo '<a href="destroy.php"><div style="width: 50px; float: right; margin-top: 15px; margin-right: 10px;"><img src="images/logout.png" width="50px"></div></a>';
                    }
                  ?>
                  <br>
                  <?php
                      if(isset($_SESSION['koszyk']) && count($_SESSION['koszyk']) > 0){
                        echo '<a href="koszyk.php"><div id="kosz" style="width: 50px; height: 50px; float: right; margin-top: 5px; margin-right: 85px;"><img src="images/cart_click.png"></div></a>';
                      }else{
                        echo '<a href="koszyk.php"><div style="width: 50px; height: 50px; float: right; margin-top: 5px; margin-right: 85px;"><img src="images/cart.png"></div></a>';
                      }
                    ?>
              </div>
              </div>
  
              <script>
                  window.onscroll = function (event) {
                      var scroll = window.pageYOffset;
                      if(scroll < 1){
                          document.getElementById('menu').style.backgroundColor = 'rgba(0, 0, 0, 0)';
                      }else{
                          document.getElementById('menu').style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
                      }
                  }
              </script>

            <div id="content">
                
                <div id="info">NASZA FLOTA</div>

                <div id="szukaj">

                  <input type="text" id="search" placeholder="Search...">

                </div>

                <script>

                  $(document).ready(function(){
                    $("#search").on("keyup", function() {
                      var value = $(this).val().toLowerCase();
                      $(".car").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                      });
                    });
                  });

                </script>

                  <?php

                    $_SESSION['zakupy'] = new shoping_cart();

                    $con = @new mysqli('localhost', 'root', '', 'cargomatic');
                    $stmt = mysqli_query($con, "SELECT * FROM samochody");
                    if($con->connect_errno != 0){
                      echo "Error: ".$con->connect_errno;
                    }else{                   
                      while($tabela = mysqli_fetch_row($stmt)){
                        echo '<div class="car">';
                        echo '<div class="zdjecie" aria-label="Brak zdjęcia!" style="background-image: url('.$tabela[9].');"></div>';
                        echo '<div class="tech">';
                        echo '<span class="nazwa">'.$tabela[1].' '.$tabela[2].'</span><br>';
                          echo '<ul>';
                            echo '<li style="background-image: url(images/ic_body.png);">'.$tabela[4].'</li>';
                            echo '<li style="background-image: url(images/ic_paliwo.png);">'.$tabela[5].'</li>';
                            echo '<li style="background-image: url(images/ic_skrzynia.png);">'.$tabela[6].'</li>';
                            echo '<li style="background-image: url(images/ic_power.png);">'.$tabela[3].'KM</li>';
                            echo '<li style="background-image: url(images/ic_acc.png);">'.$tabela[7].'s</li>';
                            echo '<li style="background-image: url(images/ic_silnik.png);">'.$tabela[8].'</li>';
                          echo '</ul>';
                        echo '</div>';
                        echo '<div class="rezerwacja">';
                          echo '<div class="gora">';
                              echo '<span><b>CENA ZA DZIEŃ:</b></span><br>';
                              echo '<span">'.$tabela[11].' zł<span>';
                            echo '</div>';
                            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
                              echo "<a href='?id_d=$tabela[0]'><div class='bott'>WYBIERZ</div></a>";
                            }else{
                              echo "<a href=''><div class='bott nie'>WYBIERZ</div></a>";
                              unset($_SESSION['koszyk']);
                            }
                          echo '</div>';
                        echo '</div>';
                      }      
                      
                      if(isset($_GET['id_d'])){
                        $_SESSION['zakupy']->dodaj();
                      }

                    } 

                  ?>

            </div>

            <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>
        </div>

    </body>
</html>