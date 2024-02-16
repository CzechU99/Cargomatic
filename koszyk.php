<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylekoszyk.css?v1">
        <title>CARGOMATIC</title>
        <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
        <link rel="icon" type="image/x-icon" href="images/logo6.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>

        <div id="container">

            <?php

              require_once('class_sc.php');

            ?>

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
                
                <div id="info">KOSZYK</div>

                <div id="zakupy">

                  <?php

                    $cena = 0;
                    if(!empty($_SESSION['koszyk']) && $_SESSION['zalogowany'] == true){

                      $con2 = @new mysqli('localhost', 'root', '', 'cargomatic');

                      for($i = 0; $i < count($_SESSION['koszyk']); $i++){

                          $stmt = mysqli_query($con2, "SELECT * FROM samochody WHERE id_samochodu = '".$_SESSION['koszyk'][$i]."'");
                          $tabela = mysqli_fetch_row($stmt);


                          echo '<div class="zakup">';
                            echo '<div class="all">';
                              echo '<div class="zdj_auto">';
                                echo '<img src="'.$tabela[9].'" width="100%">';
                              echo '</div>';
                              echo '<div class="hr"></div>';
                              echo '<div class="info_auto">';
                                echo '<span class="marka">'.$tabela[1].'</span>';
                                echo '<span class="model">'.$tabela[2].'</span>';
                                echo '<span class="cena">'.$tabela[11].'zł</span>';
                              echo '</div>';
                              echo '<div class="hr"></div>';
                              echo '<div class="usun">';
                                echo "<a href='?id_u=$tabela[0]'><img src='images/kosz.png' width='50px'></a>";
                              echo '</div>';

                              echo '</div>';

                            echo '</div>';

                          echo '<div class="ln"></div>';

                          $cena += $tabela[11];
                          
                      }

                      if(isset($_GET['id_u'])){
                        $_SESSION['zakupy']->usun();
                      }

                    }

                    if(!isset($_SESSION['koszyk']) || count($_SESSION['koszyk']) == 0){
                      echo '<div class="ln"></div>';
                    }

                  ?>

                  <div id="suma">

                    <?php
                      if(isset($_SESSION['koszyk']) && count($_SESSION['koszyk']) > 0 && $_SESSION['zalogowany'] == true){
                        echo '<a href="?zamow" id="non"><div id="zloz">ZAMÓW</div></a>';
                      }else{
                        echo '<div id="zloz">ZAMÓW</div>';
                      }

                      if(isset($_GET['zamow'])){
                        $_SESSION['zakupy']->zamow();
                      }

                    ?>
                    <span>RAZEM: <span><?php echo $cena;?></span>zł</span>

                  </div>

                  

                </div>

            </div>

            <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>
        </div>

    </body>
</html>