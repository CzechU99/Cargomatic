<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylekontakt.css">
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
                
              <div id="info">KONTAKT</div>

              <div id="dane">
                <div id="inf">
                  <p class="a">Skontaktuj się z nami</p><br>
                  <span>kontakt@cargomatic.pl <br> +48 531 002 001</span><br><br>
                  <span>Infolinia czynna 24/7. Godziny pracy biura: <br> Poniedziałek - Piątek, 8:00 - 21:00</span><br><br>
                  <span>Odbiór/zwrot poza godzinami pracy oraz w weekendy <br> to dodatkowy koszt 50 zł netto</span><br><br><br>
                  <p class="b">Adres wypożyczlani:</p><br>
                  <span>Towarowa 33 <br> 00-869 Opole</span><br><br><br>
                  <p class="b">Adres rejestrowy:</p><br>
                  <span>Cargomatic sp. z o.o. <br> Plac Bankowy 2 <br> 00-095 Opole</span>
                </div>
              </div>

              <div id="napisz">

                <div id="form">
                  <p class="a">Napisz do nas</p><br>
                  <?php 

                  if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
                    $emailses = $_SESSION['email'];
                    echo '<form method="post" >';
                      echo '<span><b>Twój adres e-mail</b><span style="color: red;">*</span></span><br>';
                      echo '<input type="text" id="mail" name="mail" placeholder="Twój adres e-mail" onchange="emailValid()"><br><br>';
                      echo '<span><b>Treść wiadomości</b><span style="color: red;">*</span></span><br>';
                      echo '<textarea placeholder="W czym Ci pomóc?" id="mess" name="mess" onchange="mintextlenght()"></textarea><br><br>';
                      echo '<input type="checkbox" id="yes" name="yes" value="yes">';
                      echo '<span><span style="color: red;">*</span>Oświadczam, że zapoznałem się z <span style="color: rgb(194, 233, 0);">regulaminem.</span></span><br><br><br>';
                      echo '<input type="submit" value="Wyślij wiadomość" id="sub" onclick="check()">';
                    echo '</form>';

                    if(isset($_POST['mail']) && $_POST['mail'] != '' && $_POST['mess'] != '' && $_POST['mail'] == $_SESSION['email']){

                      $test = true;
                      $email = $_POST['mail'];
                      $message = $_POST['mess'];
                      $id_konta = $_SESSION['id_konta'];
          
                      $con = @new mysqli('localhost', 'root', '', 'cargomatic');
                      if($con->connect_errno != 0){
                        echo "Error: ".$con->connect_errno;
                      }else{
          
                        if($test == true){
          
                          if($con->query("INSERT INTO kontakt VALUES (NULL, '$email', '$message', '$id_konta')")){
                            $_SESSION['udanykontakt'] = true;
                          }else{
                            throw new Exception($con->error);
                          }
          
                        }
          
                        $con->close();
          
                      }
                    }

                  }else{
                    echo '<span>Musisz być <a href="zaloguj.php" id="log">zalogowany</a>, aby wysłać wiadomość!</span>';
                  }
                
                  ?>
                </div>

                <!-- <span id="error">Nie wypełniono wszystkiego!</span> -->

              </div>

            </div>

            <script>

              function mintextlenght(){
                var text = document.getElementById('mess').value;
                if(text.length < 10){
                  document.getElementById('sub').disabled = true;
                  document.getElementById('mess').style.border = '1px solid red';
                }else{
                  document.getElementById('sub').disabled = false;
                  document.getElementById('mess').style.border = '1px solid rgb(194, 233, 0)';
                }
              }

              function emailValid(){
                var mail = document.getElementById('mail').value;
                var at = mail.indexOf('@');
                var dot = mail.lastIndexOf('.');
                if(at < 1 || dot < at + 2 || dot + 2 >= mail.length){
                  document.getElementById('mail').style.border = '1px solid red';
                  document.getElementById('sub').disabled = true;
                }else{
                  document.getElementById('mail').style.border = '1px solid rgb(194, 233, 0)';
                  document.getElementById('sub').disabled = false;
                }
              }

              function check(){
                var mail = document.getElementById('mail').value;
                var mess = document.getElementById('mess').value;
                var yes = document.getElementById('yes').checked;
                if(mail == "" || mess == "" || yes == false){
                  document.getElementById('error').style.display = 'inline';
                }else{
                  document.getElementById('error').style.display = 'none';
                  document.location.reload(true);
                }
              }

            </script>

            <div id="linia2"></div>

            <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>
        </div>

    </body>
</html>