<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylezwspolpraca.css">
        <title>CARGOMATIC</title>
        <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
        <link rel="icon" type="image/x-icon" href="images/logo6.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>

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
                    <a href="koszyk.php"><div style="width: 50px; height: 50px; float: right; margin-top: 15px; margin-right: 15px;"><img src="images/cart.png"></div></a>
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
                  <a href="koszyk.php"><div style="width: 50px; float: right; margin-top: 5px; margin-right: 85px;"><img src="images/cart.png"></div></a>
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

            <div id="content" class="end">
                
              <div id="start">
                <div id="nap">WSTAW SWÓJ SAMOCHÓD DO NASZEJ WYPOŻYCZALNI</div>
              </div>

              

              <div id="kolor">

                <div id="dalej">
                  <div class="wspol wys">
                    <div class="lef img wyss" style="background-image: url('images/office.png');"></div>
                    <div class="rig">
                      <div class="roz">Co zapewniamy?<br><br></div>
                      <ul>
                        <li>samochód pod stałym monitoringiem GPS</li>
                        <li>limity km przy wynajmach</li>
                        <li>marketing</li>
                        <li>obsługa serwisowa</li>
                        <li>selekcja klientów</li>
                      </ul>
                    </div>
                  </div>

                  <div class="wspol zmiana">
                    <div class="lef lass">
                      <div class="roz">Nawiązanie współpracy<br><br></div>
                      <ul>
                        <li>kontakt</li>
                        <li>wstępne rozpoznanie możliwości</li>
                        <li>spotkanie z omówieniem szczegółów</li>
                        <li>podpisanie umowy – początek współpracy</li>
                      </ul>
                    </div>
                    <div class="rig img" style="background-image: url('images/stairs.webp');"></div>
                  </div>

                  <div class="wspol">
                    <div class="lef img" style="background-image: url('images/contract.jpg');"></div>
                    <div class="rig las">
                      <div class="roz">W trakcie trwania umowy<br><br></div>
                      <ul>
                        <li>szczegółowe rozliczenia</li>
                        <li>dostęp do GPS pojazdu</li>
                        <li>pomoc w późniejszej sprzedaży pojazdu</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div id="inf">Nie wykluczamy żadnych modeli, napisz do nas i porozmawiajmy</div>

                <div id="poka">

                  <div id="po">Interesujace nas samochody</div>

                </div>

                <div id="tabelka">

                  <table>
                    <tr>
                      <td>Mercedes G63</td>
                      <td class="c14">Porsche 911 Cabrio (992)</td>
                    </tr>
                    <tr>
                      <td class="c14">Toyota Supra</td>
                      <td>Ferrari 296 GTB</td>
                    </tr>
                    <tr>
                      <td>Aston Martin DBX</td>
                      <td class="c14">Audi TT RS</td>
                    </tr>
                    <tr>
                      <td class="c14">BMW X5M Competition</td>
                      <td>Range Rover Vouge</td>
                    </tr>
                    <tr>
                      <td>Volkswagen Golf R</td>
                      <td class="c14">Jaguar F-Type</td>
                    </tr>
                  </table>

                </div>

                <script>

                  $(document).ready(function(){
                    $("#po").click(function(){
                      $("#tabelka").toggle();
                      $('html,body').animate({scrollTop: $('#container').prop("scrollHeight")}, "slow");
                    });
                  });

                </script>

              </div>

            </div>

            <div id="linia2"></div>

            <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>
        </div>

    </body>
</html>