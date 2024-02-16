<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css" />
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

            <div id="content"></div>

            <div class="linia2"></div>
            
            <div id="opis">
                <b>WYPOŻYCZALNIA SAMOCHODÓW <span style="color: rgb(194, 233, 0);">SPORTOWYCH</span> I LUKSUSOWYCH.</b>
            </div>

            <div id="info">
                <div id="tekst"><b>JAK TO DZIAŁA?</b></div>
                <div id="info2">
                    <div id="box1">
                        <div id="jedenn"></div>
                        <div id="dwa">
                            <span class="dwaa">Zarezerwuj swój samochód w Panelu Rezerwacyjnym, zadzwoń, napisz maila lub skontaktuj się z nami poprzez social media – zależnie, która metoda jest dla Ciebie najwygodniejsza. Złożenie rezerwacji zajmie Ci najwyżej kilka minut.</span>
                        </div>
                    </div>
                    <div id="box2">
                        <div id="trzy"></div>
                        <div id="cztery">
                            <span class="dwaa">Teraz potwierdzamy rezerwację. Daj nam chwilę – właśnie dokładamy wszelkich starań, aby każdy detal zachwycał Cię swoją perfekcją przez całą podróż. Powinieneś otrzymać wiadomość e-mail z informacją o zatwierdzeniu rezerwacji.</span>
                        </div>
                    </div>
                    <div id="box3">
                        <div id="piec"></div>
                        <div id="szesc">
                            <span class="dwaa">Odbierz auto i ruszaj w drogę. Wszystko gotowe. Wsiadaj i jedź, dokąd tylko pragniesz. Delektuj się tym doświadczeniem – jest niepowtarzalne.</span>
                        </div>
                    </div>
                </div>

            </div>

            <div id="ajax">

                <div id="load" onclick="loadDoc()"></div>
                <div id="ajax_text"></div>

            </div>

            <script>

                function loadDoc() {
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        document.getElementById("ajax_text").innerHTML = this.responseText;
                    }
                    xhttp.open("GET", "ajax.txt");
                    xhttp.send();
                    $("#load").hide();
                    $("#ajax_text").show();
                    $('html,body').animate({scrollTop: $('#container').prop("scrollHeight")}, "fast");
                }

            </script>

            <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>
        </div>

    </body>
</html>