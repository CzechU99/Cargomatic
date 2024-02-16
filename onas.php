<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleonas.css">
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

            <div id="content">
                
              <div id="info"><div id="opa"><div id="napis">O NAS</div></div></div>

              <div id="next">

                <div id="kafle">
                  <div class="kaf">
                    <span class="big">4,6</span><br>
                    Średnia ocena na Google
                  </div>
                  <div class="kaf">
                    <span class="big">2,9</span><br>
                    Średni czas samochodów potrzebny do setki
                  </div>
                  <div class="kaf">
                    <span class="big">24/7</span><br>
                    Dostępność naszych usług
                  </div>
                </div>

                <div id="text">

                  <div id="pasja">

                    <span class="nag">Wspólna pasja</span><br>
                    Działamy szybko jak Nissan GT-R. Mamy tyle energii, co Dodge Challenger. A o swoich usługach myślimy nowocześnie niczym Porsche o wyposażeniu 911. Jesteśmy ekspertami motoryzacji premium, którzy każdego dnia zachwycają się jej wyjątkowością.

                    Pragniemy podarować Ci niezapomniane doświadczenie. Właśnie dlatego zapraszamy Cię do świata pełnego adrenaliny, zachwytu i szampańskiej zabawy. Ten świat tworzą najszybsze i najpotężniejsze samochody: teraz dostępne na kilka Twoich kliknięć. To co – ruszasz z nami?

                  </div>

                  <div id="flota">

                    <span class="nag">Nasz zespół</span><br>
                    Nasz zespół tworzy dwunastu motopasjonatów: każdy z nas codziennie daje z siebie 100%, aby zapewnić Ci usługę na najwyższym poziomie. Znamy się na tym, co robimy i przede wszystkim lubimy to robić: zaczynaliśmy z dwoma(!) samochodami w ofercie, aby dzisiaj dać Ci dostęp do 50 najbardziej pożądanych modeli na świecie!

                    Dbamy o to, aby trafiło do Ciebie auto premium, w całym tego słowa znaczeniu. Zapewniamy Ci pojazdy o pierwszorzędnej sprawności technicznej – dokładnie sprawdzanej przez naszych ekspertów. Służymy również poradą na każdym etapie współpracy. Jesteśmy do Twojej dyspozycji 24/7.

                  </div>

                  <div id="marki"><img src="images/marki.webp" alt=""></div>

                </div>

                <div id="marki2"><img src="images/marki.webp" alt=""></div>

              </div>

              <div id="insta">

                <div id="nap_ins">

                  <span class="int">Instagram</span><br>
                  <span class="int2">@CARGOMATIC</span>

                </div>

                <div id="zdj_ins">

                  <div class="zdj"><img src="images/insta8.jpg" alt=""></div>
                  <div class="zdj"><img src="images/insta2.jpg" alt=""></div>
                  <div class="zdj"><img src="images/insta3.jpg" alt=""></div>
                  <div class="zdj"><img src="images/insta4.jpg" alt=""></div>
                  <div class="zdj"><img src="images/insta5.jpg" alt=""></div>
                  <div class="zdj"><img src="images/insta6.jpg" alt=""></div>

                </div>

              </div>

              <script>

                var zdj = document.getElementsByClassName('zdj');

                for(var i=0; i<zdj.length; i++){
                  zdj[i].addEventListener('mouseover', function(){
                    this.style.transform = 'scale(1.2)';
                    this.style.transition = '0.5s';
                  })
                  zdj[i].addEventListener('mouseout', function(){
                    this.style.transform = 'scale(1)';
                  })
                }

              </script>

              
                

              



            </div>

            <div id="linia2"></div>

            <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>
        </div>

    </body>
</html>