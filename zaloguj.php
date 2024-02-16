<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylezaloguj.css" type="text/css" />
    <title>CARGOMATIC</title>
    <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/logo6.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>

    <?php 

      session_start();

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
          <?php 
            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
              echo '<a href="zaloguj.php"><div style="width: 50px; float: right; margin-top: 15px;"><img src="images/user_click.png" width="50px"></div></a>';
              echo '<a href="destroy.php"><div style="width: 50px; float: right; margin-top: 15px; margin-right: 10px;"><img src="images/logout.png" width="50px"></div></a>';
            }else{
              echo '<a href="zaloguj.php"><div style="width: 50px; float: right; margin-top: 15px;"><img src="images/user.png" width="50px"></div></a>';
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
          <a href="zarezerwuj.php" class="rez" style="text-decoration: none;"><b>ZAREZERWUJ</b></a><br>
          <a href="kontakt.php"><b>KONTAKT</b></a><br>
          <a href="onas.php"><b>O NAS</b></a><br>
          <a href="zaloguj.php"><div style="width: 50px; float: right; margin-top: 15px; 
          <?php 
            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){ 
              echo 'margin-right: 55px;';
            }else{
              echo 'margin-right: 85px;';
            }
          ?>
          "><img src="images/user_click.png" width="50px"></div></a>
          <?php 
            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
              echo '<a href="destroy.php"><div style="width: 50px; float: right; margin-top: 15px; margin-right: 10px;"><img src="images/logout.png" width="50px"></div></a>';
            }
          ?>
        </div>
      </div>

      <?php 

        if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){

          if($_SESSION['admin'] == 0){

            echo '<div id="user">';

              echo '<div id="witaj">Witaj '. $_SESSION['email'] .'!</div>';
              echo '<div id="kreska"></div>';
              echo '<div id="historia_rez">';
                echo '<div id="op1">Historia rezerwacji:</div>';
                echo '<div id="kreska"></div>';
                echo '<div id="tab_rez">';
                       
                $con2 = @new mysqli('localhost', 'root', '', 'cargomatic');
                if($con2->connect_errno != 0){
                  echo "Error: ".$con2->connect_errno;
                }else{

                  $id_konta = $_SESSION['id_konta'];
                
                  $sql = "SELECT id_rezerwacji, od, do, id_samochodu, marka, model, moc, nadwozie, paliwo, skrzynia, setka, silnik, zdjecie_link, kolor, id_konta, email, haslo, plec, data_urodzenia, telefon, miasto FROM rezerwacje JOIN samochody ON samochody_id = id_samochodu JOIN konta ON kontakt_id = id_konta WHERE id_konta = '$id_konta'";

                  $zapytanie = mysqli_query($con2, $sql);

                  if($result = @$con2->query($sql)){           
            
                      $row = $result->fetch_assoc();
                      
                      echo "<table id='tab1'>";
                      echo "<tr>";
                        echo "<td><b> ID_REZER </b></td>";
                        echo "<td><b> OD </b></td>";
                        echo "<td><b> DO </b></td>";
                        echo "<td><b> ID_AUTA </b></td>";
                        echo "<td><b> MARKA </b></td>";
                        echo "<td><b> MODEL </b></td>";
                        echo "<td><b> MOC </b></td>";
                        echo "<td><b> NADWOZIE </b></td>";
                        echo "<td><b> PALIWO </b></td>";
                        echo "<td><b> SKRZYNIA </b></td>";
                        echo "<td><b> SETKA </b></td>";
                        echo "<td><b> SILNIK </b></td>";
                        echo "<td><b> ZDJECIE </b></td>";
                        echo "<td><b> KOLOR </b></td>";
                        echo "<td><b> ID_KONTA </b></td>";
                        echo "<td><b> EMAIL </b></td>";
                        echo "<td><b> HASLO </b></td>";
                        echo "<td><b> PLEC </b></td>";
                        echo "<td><b> DATA_URO </b></td>";
                        echo "<td><b> TEL </b></td>";
                        echo "<td><b> MIASTO </b></td>";
                      echo "</tr>";
                      $i = 0;
                      while($table = mysqli_fetch_row($zapytanie)){
                        echo "<tr>";
                        foreach($table as $el){
                          echo "<td>";
                            if($i == 12){
                              echo "<img src='$el' width='50px'>";
                            }else{
                              echo $el;
                            }
                          echo "</td>";
                          $i++;
                        }
                        $i = 0;
                        echo "</tr>";
                      }
                      echo "</table>";

                      $result->free_result();
            
                  }
          
                }                                  

                echo '</div>';
              echo '</div>';
              echo '<div id="kreska2"></div>';

              echo '<div id="historia_wiad">';

                echo '<div id="op1">Historia wiadomosci:</div>';
                echo '<div id="kreska"></div>';
                echo '<div id="tab_wiad">';

                if($con2->connect_errno != 0){
                  echo "Error: ".$con2->connect_errno;
                }else{
                
                  $sql = "SELECT id_konta, email, haslo, plec, data_urodzenia, telefon, miasto, id_wiadomosci, wiadomosc FROM konta JOIN kontakt ON id_konta = kontakt_id WHERE id_konta = '$id_konta'";

                  $zapytanie = mysqli_query($con2, $sql);

                  if($result = @$con2->query($sql)){           
            
                      $row = $result->fetch_assoc();
                      
                      echo "<table id='tab1'>";
                      echo "<tr>";
                        echo "<td><b> ID_KONTA </b></td>";
                        echo "<td><b> EMAIL </b></td>";
                        echo "<td><b> HASLO </b></td>";
                        echo "<td><b> PLEC </b></td>";
                        echo "<td><b> DATA_URO </b></td>";
                        echo "<td><b> TELE </b></td>";
                        echo "<td><b> MIASTO </b></td>";
                        echo "<td><b> ID_WIADO </b></td>";
                        echo "<td id='max'><b> WIADOMOSC </b></td>";
                      echo "</tr>";
                      while($table = mysqli_fetch_row($zapytanie)){
                        echo "<tr>";
                        foreach($table as $el){
                          echo "<td>";
                            echo $el;
                          echo "</td>";
                        }
                        echo "</tr>";
                      }
                      echo "</table>";

                      $result->free_result();
            
                  }

                  $con2->close();
          
                }
              
              echo '</div>';
          
              echo '</div>';

            echo '</div>';

          }else if($_SESSION['admin'] == 1){

            echo '<div id="user2">';

              echo '<div id="witaj">Witaj w panelu administracyjnym!</div>';
              echo '<div id="kreska"></div>';
              echo '<div id="op2">PODGLĄD BAZY DANYCH:</div>';
              echo '<div id="kreska"></div>';

              echo '<div id="all_tab">';

              $con2 = @new mysqli('localhost', 'root', '', 'cargomatic');
              $stmt = mysqli_query($con2, "SELECT * FROM konta");

                echo '<div id="all_tab1">';
                echo "<table id='tab1'>";
                  echo "<caption style='font-weight: bold; font-size: 25px; text-align: left;'>KONTA:</caption>";
                  echo "<tr>";
                    echo "<td><b> ID_KONTA </b></td>";
                    echo "<td><b> EMAIL </b></td>";
                    echo "<td><b> HASLO </b></td>";
                    echo "<td><b> PLEC </b></td>";
                    echo "<td><b> DATA_URO </b></td>";
                    echo "<td><b> TELE </b></td>";
                    echo "<td><b> MIASTO </b></td>";
                    echo "<td><b> ADMIN </b></td>";
                    echo "<td style='color: red;'><b> USUŃ! </b></td>";
                  echo "</tr>";
                    while($tabela = mysqli_fetch_row($stmt)){
                        echo "<tr>";
                            foreach($tabela as $el){
                                echo "<td>";
                                    echo $el;
                                echo "</td>";
                            }
                            echo "<td><a href='usuwanie.php?id=$tabela[0]&tabelan=konta&nazwa=id_konta'><b> X </b></a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo '</div>';

                echo '<br>';


                $stmt2 = mysqli_query($con2, "SELECT * FROM kontakt");

                echo '<div id="all_tab1">';
                echo "<table id='tab1'>";
                  echo "<caption style='font-weight: bold; font-size: 25px; text-align: left;'>KONTAKT:</caption>";
                  echo "<tr>";
                    echo "<td><b> ID_WIAD </b></td>";
                    echo "<td><b> EMAIL </b></td>";
                    echo "<td id='max'><b> WIADOMOSC </b></td>";
                    echo "<td><b> KONTAKT_ID </b></td>";
                    echo "<td style='color: red;'><b> USUŃ! </b></td>";
                  echo "</tr>";
                    while($tabela = mysqli_fetch_row($stmt2)){
                        echo "<tr>";
                            foreach($tabela as $el){
                                echo "<td>";
                                    echo $el;
                                echo "</td>";
                            }
                            echo "<td><a href='usuwanie.php?id=$tabela[0]&tabelan=kontakt&nazwa=id_wiadomosci'><b> X </b></a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo '</div>';

                echo '<br>';

                $stmt3 = mysqli_query($con2, "SELECT * FROM rezerwacje");
                echo '<div id="all_tab1">';
                echo "<table id='tab1'>";
                  echo "<caption style='font-weight: bold; font-size: 25px; text-align: left;'>REZERWACJE:</caption>";
                  echo "<tr>";
                    echo "<td><b> ID_REZER </b></td>";
                    echo "<td><b> OD </b></td>";
                    echo "<td><b> DO </b></td>";
                    echo "<td><b> KONTAKT_ID </b></td>";
                    echo "<td><b> SAMOCHODY_ID </b></td>";
                    echo "<td style='color: red;'><b> USUŃ! </b></td>";
                  echo "</tr>";
                    while($tabela = mysqli_fetch_row($stmt3)){
                        echo "<tr>";
                            foreach($tabela as $el){
                                echo "<td>";
                                    echo $el;
                                echo "</td>";
                            }
                            echo "<td><a href='usuwanie.php?id=$tabela[0]&tabelan=rezerwacje&nazwa=id_rezerwacji'><b> X </b></a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo '</div>';

                echo '<br>';

                $stmt4 = mysqli_query($con2, "SELECT * FROM samochody");
                echo '<div id="all_tab1">';
                echo "<table id='tab1'>";
                  echo "<caption style='font-weight: bold; font-size: 25px; text-align: left;'>SAMOCHODY:</caption>";
                  echo "<tr>";
                    echo "<td><b> ID_SAMOCHODU </b></td>";
                    echo "<td><b> MARKA </b></td>";
                    echo "<td><b> MODEL </b></td>";
                    echo "<td><b> MOC </b></td>";
                    echo "<td><b> NADWOZIE </b></td>";
                    echo "<td><b> PALIWO </b></td>";
                    echo "<td><b> SKRZYNIA </b></td>";
                    echo "<td><b> SETKA </b></td>";
                    echo "<td><b> SILNIK </b></td>";
                    echo "<td><b> ZDJECIE </b></td>";
                    echo "<td><b> KOLOR </b></td>";
                    echo "<td><b> CENA </b></td>";
                    echo "<td style='color: red;'><b> USUŃ! </b></td>";
                  echo "</tr>";
                    while($tabela = mysqli_fetch_row($stmt4)){
                        echo "<tr>";
                        $i = 0;
                          foreach($tabela as $el){                          
                            echo "<td>";
                              echo $el;
                            echo "</td>";
                            $i++;
                          }
                          echo "<td><a href='usuwanie.php?id=$tabela[0]&tabelan=samochody&nazwa=id_samochodu'><b> X </b></a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo '</div>';


              echo '</div>';

              echo '<div id="kreska3"></div>';
              echo '<div id="op2">ZARZĄDZANIE BAZĄ DANYCH:</div>';
              echo '<div id="kreska"></div>';

              echo '<div id="dzialania">';

                echo '<h3>Dodawanie do bazy danych:</h3>';

                echo '<form method="post" class="f">';
                  echo '<p class="j">Wybierz tabelę:&nbsp;&nbsp;&nbsp;';
            
                    echo '<select name="tabele" class="s">';
                      echo '<option value="konta">KONTA</option>';
                      echo '<option value="samochody">SAMOCHODY</option>';
                      echo '<option value="kontakt">KONTAKT</option>';
                      echo '<option value="rezerwacje">REZERWACJE</option>';
                    echo '</select>';
                    echo '&nbsp;&nbsp;&nbsp;<input type="submit" name="wyslij" value="WYBIERZ" class="w"/>';
          
                  echo '</p>';
                  echo '</form>';

                  if(isset($_POST['wyslij'])){
                    echo '<script>';
                      echo "$('html,body').animate({scrollTop: $('#container').prop('scrollHeight')}, 'fast');";
                    echo '</script>';
                  }
    
                    if(isset($_POST['wyslij']) && $_POST['tabele'] == 'konta'){

                        echo '<h4>Wybrana tabela: KONTA</h4>';

                        echo "<form method='post' class='lef'>";
                            echo "<input type='text' class='i' name='eemail' placeholder='Wpisz email...' /><br>";
                            echo "<input type='password' class='i' name='pas' placeholder='Wpisz haslo...' /><br>";
                            echo "PLEC: ";
                            echo "<input type='radio' class='r' name='plec' value='mężczyzna' checked /> M&nbsp;&nbsp;";
                            echo "<input type='radio' class='r' name='plec' value='kobieta' /> K<br>";
                            echo "<input type='date' class='i' name='uro' placeholder='Wpisz date urodzenia...' /><br>";
                            echo "<input type='number' class='i' name='tele' placeholder='Wpisz telefon...' /><br>";
                            echo "<input type='text' class='i' name='miasto' placeholder='Wpisz miasto...' /><br>";
                            echo "<span class='mar'>ADMIN: ";
                            echo "<input type='radio' class='r' name='admin' value='1' /> 1&nbsp;&nbsp;";
                            echo "<input type='radio' class='r' name='admin' value='0' checked /> 0</span><br>";
                            echo "<input type='submit' class='w mar' name='done_g' value='WYSLIJ' />";
                        echo "</form>";
            
                    }else if(isset($_POST['wyslij']) && $_POST['tabele'] == 'samochody'){
                      echo '<h4>Wybrana tabela: SAMOCHODY</h4>';
                        echo "<form method='post' class='lef' enctype='multipart/form-data'>";
                            echo "<input type='text' class='i' name='marka' placeholder='Wpisz marke...' /><br>";
                            echo "<input type='text' class='i' name='model' placeholder='Wpisz model...' /><br>";
                            echo "<input type='number' class='i' name='moc' placeholder='Wpisz moc...' /><br>";
                            echo "<input type='number' class='i' name='cena' step='0.01' placeholder='Wpisz cene...' /><br>";
                            echo "<input type='text' class='i' name='nadwozie' placeholder='Wpisz nadwozie...' /><br>";
                            echo '<select name="paliwo" class="s2">';
                              echo '<option value="ELEKTRYCZNE">ELEKTRYCZNE</option>';
                              echo '<option value="BENZYNA">BENZYNA</option>';
                              echo '<option value="DIESEL">DIESEL</option>';
                              echo '<option value="HYBRYDA">HYBRYDA</option>';
                            echo '</select><br>';
                            echo "<span class='mar'>SKRZYNIA: ";
                            echo "<input type='radio' class='r' name='skrzynia' value='AUTOMATYCZNA' checked /> AUTO&nbsp;&nbsp;";
                            echo "<input type='radio' class='r' name='skrzynia' value='MANUALNA' /> MANUAL<br></span>";
                            echo "<input type='number' class='i' name='setka' step='0.1' placeholder='Wpisz do setki...' /><br>";
                            echo "<input type='text' class='i' name='silnik' placeholder='Wpisz rodzaj silnika...' /><br>";
                            //echo "<input type='hidden' name='MAX_FILE_SIZE' value='30000' />";
                            echo "<input type='file' id='zdjecie' class='g' name='zdjecie' /><br>";
                            echo "<input type='color' class='g' name='color' /><br>";
                            echo "<input type='submit' class='w mar' name='done_auto' value='WYSLIJ' />";
                        echo "</form>";
            
                    }else if(isset($_POST['wyslij']) && $_POST['tabele'] == 'kontakt'){
                      echo '<h4>Wybrana tabela: KONTAKT</h4>';
                        echo "<form method='post' class='lef'>";
                            echo "<input type='text' class='i' name='eemail' placeholder='Wpisz email...' /><br>";
                            echo '<textarea class="i" placeholder="Wpisz wiadomosc..." name="mes"></textarea><br>';
                            echo "<input type='number' class='i' name='kontakt' placeholder='Wpisz id kontaktu...' /><br>";
                            echo "<input type='submit' class='w mar' name='done_s' value='WYSLIJ' />";
                        echo "</form>";
            
                    }else if(isset($_POST['wyslij']) && $_POST['tabele'] == 'rezerwacje'){
                      echo '<h4>Wybrana tabela: REZERWACJE</h4>';
                      echo "<form method='post' class='lef'>";
                        echo "<input type='date' class='i' name='od' /><br>";
                        echo "<input type='date' class='i' name='do' /><br>";
                        echo "<input type='number' class='i' name='kontakt' placeholder='Wpisz id kontaktu...' /><br>";
                        echo "<input type='number' class='i' name='auto' placeholder='Wpisz id samochodu...' /><br>";
                        echo "<input type='submit' class='w mar' name='done_rez' value='WYSLIJ' />";
                      echo "</form>";

                    }
            
                    if(isset($_POST['done_g'])){
            
                        if(isset($_POST['eemail']) && isset($_POST['pas']) && isset($_POST['plec']) && isset($_POST['uro']) && isset($_POST['tele']) && isset($_POST['miasto']) && isset($_POST['admin'])){
            
                            $a = $_POST['eemail'];
                            $b = $_POST['pas'];
                            $c = $_POST['plec'];
                            $d = $_POST['uro'];
                            $e = $_POST['tele'];
                            $f = $_POST['miasto'];
                            $g = $_POST['admin'];
            
                            $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                            mysqli_query($baza, "INSERT INTO konta VALUES (null, '$a', '$b', '$c', '$d', '$e', '$f', '$g')");
                            mysqli_close($baza);
            
                            echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                        
                        }
            
                    }
                    if(isset($_POST['done_auto'])){
            
                        if(isset($_POST['marka']) && isset($_POST['cena']) && isset($_POST['model']) && isset($_POST['moc']) && isset($_POST['nadwozie']) && isset($_POST['paliwo']) && isset($_POST['skrzynia']) && isset($_POST['setka']) && isset($_POST['silnik']) && isset($_FILES['zdjecie']) && isset($_POST['color'])){
            
                            $a = $_POST['marka'];
                            $b = $_POST['model'];
                            $c = $_POST['moc'];
                            $d = $_POST['nadwozie'];
                            $e = $_POST['paliwo'];
                            $f = $_POST['skrzynia'];
                            $g = $_POST['setka'];
                            $h = $_POST['silnik'];
                            $i = $_FILES['zdjecie']['name'];
                            $k = $_POST['color'];
                            $j = $_POST['cena'];                         

                            move_uploaded_file($_FILES['zdjecie']['tmp_name'], 'images/' . $_FILES['zdjecie']['name']);
            
                            $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                            mysqli_query($baza, "INSERT INTO samochody VALUES (null, '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', 'images/$i', '$k', '$j')");

                            mysqli_close($baza);
            
                            echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                        
                        } 
            
                    }
                    if(isset($_POST['done_s'])){
            
                        if(isset($_POST['eemail']) && isset($_POST['mes']) && isset($_POST['kontakt'])){
            
                            $a = $_POST['eemail'];
                            $b = $_POST['mes'];
                            $c = $_POST['kontakt'];
            
                            $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                            mysqli_query($baza, "INSERT INTO kontakt VALUES (null, '$a', '$b', '$c')");
                            mysqli_close($baza);
            
                            echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                        
                        } 
            
                    }
                    if(isset($_POST['done_rez'])){
            
                      if(isset($_POST['od']) && isset($_POST['do']) && isset($_POST['kontakt']) && isset($_POST['auto'])){
          
                          $a = $_POST['od'];
                          $b = $_POST['do'];
                          $c = $_POST['kontakt'];
                          $d = $_POST['auto'];
          
                          $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                          mysqli_query($baza, "INSERT INTO rezerwacje VALUES (null, '$a', '$b', '$c', '$d')");
                          mysqli_close($baza);
          
                          echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                      
                      } 
          
                    }

                echo '<h3>Edytowanie w bazie danych:</h3>';

                echo '<form method="post" class="f">';
                echo '<p class="j">Wybierz tabelę: &nbsp;&nbsp;&nbsp;';

                echo '<select name="tabele" class="s">';
                  echo '<option value="konta">KONTA</option>';
                  echo '<option value="samochody">SAMOCHODY</option>';
                  echo '<option value="kontakt">KONTAKT</option>';
                  echo '<option value="rezerwacje">REZERWACJE</option>';
                echo '</select>';
                echo '&nbsp;&nbsp;&nbsp;<input type="submit" name="wyslij_e" value="WYBIERZ" class="w"/>';

                echo '</p>';
                echo '</form>';

                if(isset($_POST['wyslij_e'])){
                  echo '<script>';
                    echo "$('html,body').animate({scrollTop: $('#container').prop('scrollHeight')}, 'fast');";
                  echo '</script>';
                }

            if(isset($_POST['wyslij_e']) && $_POST['tabele'] == 'konta'){

                $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                $stmt = mysqli_query($baza, "SELECT id_konta FROM konta ORDER BY id_konta");
                echo '<h4>Wybrana tabela: KONTA</h4>';
                echo "<form method='post' class='lef'>";
                    echo "<b class='l'>ID WIERSZA:</b>&nbsp;<select name='edytowanie' class='s3'>";
                        while($dane = mysqli_fetch_row($stmt)){
                            foreach($dane as $el){
                                echo "<option value='$el'>".$el."</option>";
                            }
                        }
                    echo "</select><br>";
                    echo "<input type='text' name='eemail' class='i' placeholder='Wpisz email...' /><br>";
                    echo "<input type='password' class='i' name='pas' placeholder='Wpisz haslo...' /><br>";
                    echo "PLEC: ";
                    echo "<input type='radio' class='r' name='plec' value='mężczyzna' checked /> M&nbsp;&nbsp;";
                    echo "<input type='radio' class='r' name='plec' value='kobieta' /> K<br>";
                    echo "<input type='date' class='i' name='uro' placeholder='Wpisz date urodzenia...' /><br>";
                    echo "<input type='number' class='i' name='tele' placeholder='Wpisz telefon...' /><br>";
                    echo "<input type='text' class='i' name='miasto' placeholder='Wpisz miasto...' /><br>";
                    echo "ADMIN: ";
                    echo "<input type='radio' class='r' name='admin' value='1' /> 1&nbsp;&nbsp;";
                    echo "<input type='radio' class='r' name='admin' value='0' checked/> 0<br>";
                    echo "<input type='submit' class='w mar' name='done_konta' value='WYSLIJ' />";
                echo "</form>";

                mysqli_close($baza);

            }else if(isset($_POST['wyslij_e']) && $_POST['tabele'] == 'samochody'){

                $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                $stmt = mysqli_query($baza, "SELECT id_samochodu FROM samochody ORDER BY id_samochodu");
                echo '<h4>Wybrana tabela: SAMOCHODY</h4>';
                echo "<form method='post' class='lef' enctype='multipart/form-data'>";
                    echo "<b class='l'>ID WIERSZA:</b>&nbsp;<select name='edytowanie' class='s3'>";
                        while($dane = mysqli_fetch_row($stmt)){
                            foreach($dane as $el){
                                echo "<option value='$el'>".$el."</option>";
                            }
                        }
                    echo "</select><br>";
                    echo "<input type='text' class='i' name='marka' placeholder='Wpisz marke...' /><br>";
                    echo "<input type='text' class='i' name='model' placeholder='Wpisz model...' /><br>";
                    echo "<input type='number' class='i' name='moc' placeholder='Wpisz moc...' /><br>";
                    echo "<input type='number' class='i' name='cena' step='0.01' placeholder='Wpisz cene...' /><br>";
                    echo "<input type='text' class='i' name='nadwozie' placeholder='Wpisz nadwozie...' /><br>";
                    echo '<select class="s2" name="paliwo">';
                      echo '<option value="ELEKTRYCZNE">ELEKTRYCZNE</option>';
                      echo '<option value="BENZYNA">BENZYNA</option>';
                      echo '<option value="DIESEL">DIESEL</option>';
                      echo '<option value="HYBRYDA">HYBRYDA</option>';
                    echo '</select><br>';
                    echo "SKRZYNIA: ";
                    echo "<input type='radio' class='r' name='skrzynia' value='AUTOMATYCZNA' checked /> AUTO&nbsp;&nbsp;";
                    echo "<input type='radio' class='r' name='skrzynia' value='MANUALNA' /> MANUAL<br>";
                    echo "<input type='number' class='i' name='setka' step='0.1' placeholder='Wpisz do setki...' /><br>";
                    echo "<input type='text' class='i' name='silnik' placeholder='Wpisz rodzaj silnika...' /><br>";
                    echo "<input type='file' id='zdjecie' class='g' name='zdjecie' /><br>";
                    echo "<input type='color' class='g' name='color' /><br>";
                    echo "<input type='submit' class='w mar' name='done_woz' value='WYSLIJ' />";
                echo "</form>";

                mysqli_close($baza);

            }else if(isset($_POST['wyslij_e']) && $_POST['tabele'] == 'kontakt'){

                $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                $stmt = mysqli_query($baza, "SELECT id_wiadomosci FROM kontakt ORDER BY id_wiadomosci");
                echo '<h4>Wybrana tabela: KONTAKT</h4>';
                echo "<form method='post' class='lef'>";
                    echo "<b class='l'>ID:</b>&nbsp;<select name='edytowanie' class='s3 o'>";
                        while($dane = mysqli_fetch_row($stmt)){
                            foreach($dane as $el){
                                echo "<option value='$el'>".$el."</option>";
                            }
                        }
                    echo "</select><br>";
                    echo "<input type='text' class='i' name='eemail' placeholder='Wpisz email...' /><br>";
                    echo '<textarea placeholder="Wpisz wiadomosc..." class="i" name="mes"></textarea><br>';
                    echo "<input type='number' class='i' name='kontakt' placeholder='Wpisz id kontaktu...' /><br>";
                    echo "<input type='submit' class='w mar' name='done_kon' value='WYSLIJ' />";
                echo "</form>";

                mysqli_close($baza);
                
            }else if(isset($_POST['wyslij_e']) && $_POST['tabele'] == 'rezerwacje'){

              $baza = mysqli_connect("localhost", "root", "", "cargomatic");
              $stmt = mysqli_query($baza, "SELECT id_rezerwacji FROM rezerwacje ORDER BY id_rezerwacji");
              echo '<h4>Wybrana tabela: REZERWACJE</h4>';
              echo "<form method='post' class='lef'>";
                  echo "<b class='l'>ID:</b>&nbsp;<select name='edytowanie' class='s3'>";
                      while($dane = mysqli_fetch_row($stmt)){
                          foreach($dane as $el){
                              echo "<option value='$el'>".$el."</option>";
                          }
                      }
                  echo "</select><br>";
                  echo "<input type='date' class='i' name='od' /><br>";
                  echo "<input type='date' class='i' name='do' /><br>";
                  echo "<input type='number' class='i' name='kontakt' placeholder='Wpisz id kontaktu...' /><br>";
                  echo "<input type='number' class='i' name='auto' placeholder='Wpisz id samochodu...' /><br>";
                  echo "<input type='submit' class='w mar' name='done_reze' value='WYSLIJ' />";
              echo "</form>";

              mysqli_close($baza);
              
          }

            if(isset($_POST['done_konta'])){

                if(isset($_POST['eemail']) && isset($_POST['pas']) && isset($_POST['plec']) && isset($_POST['uro']) && isset($_POST['tele']) && isset($_POST['miasto']) && isset($_POST['admin'])){

                    $a = $_POST['eemail'];
                    $b = $_POST['pas'];
                    $c = $_POST['plec'];
                    $d = $_POST['uro'];
                    $e = $_POST['tele'];
                    $f = $_POST['miasto'];
                    $g = $_POST['admin'];
                    $h = $_POST['edytowanie'];

                    $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                    mysqli_query($baza, "UPDATE konta SET email='$a', haslo='$b', plec='$c', data_urodzenia='$d', telefon='$e', miasto='$f', czy_admin='$g' WHERE id_konta='$h'");
                    mysqli_close($baza);

                    echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                
                } 

            }
            if(isset($_POST['done_woz'])){

                if(isset($_POST['marka']) && isset($_POST['model']) && isset($_POST['moc']) && isset($_POST['nadwozie']) && isset($_POST['paliwo']) && isset($_POST['skrzynia']) && isset($_POST['cena']) && isset($_POST['setka']) && isset($_POST['silnik']) && isset($_FILES['zdjecie']) && isset($_POST['color'])){

                    $a = $_POST['marka'];
                    $b = $_POST['model'];
                    $c = $_POST['moc'];
                    $d = $_POST['nadwozie'];
                    $e = $_POST['paliwo'];
                    $f = $_POST['skrzynia'];
                    $g = $_POST['setka'];
                    $h = $_POST['silnik'];
                    $i = $_FILES['zdjecie']['name'];
                    $k = $_POST['color'];
                    $l = $_POST['edytowanie'];
                    $m = $_POST['cena'];

                    move_uploaded_file($_FILES['zdjecie']['tmp_name'], 'images/' . $_FILES['zdjecie']['name']);

                    $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                    mysqli_query($baza, "UPDATE samochody SET marka='$a', model='$b', moc='$c', nadwozie='$d', paliwo='$e', skrzynia='$f', setka='$g', silnik='$h', zdjecie_link='images/$i', kolor='$k', cena='$m' WHERE id_samochodu='$l'");
                    mysqli_close($baza);

                    echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                
                } 

            }
            if(isset($_POST['done_kon'])){

                if(isset($_POST['eemail']) && isset($_POST['mes']) && isset($_POST['kontakt'])){

                    $a = $_POST['eemail'];
                    $b = $_POST['mes'];
                    $c = $_POST['kontakt'];
                    $d = $_POST['edytowanie'];

                    $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                    mysqli_query($baza, "UPDATE kontakt SET email_kontakt='$a', wiadomosc='$b', kontakt_id='$c' WHERE id_wiadomosci='$d'");
                    mysqli_close($baza);

                    echo "<script type='text/javascript'>window.location=document.location.href;</script>";
                
                } 

            }     
            if(isset($_POST['done_reze'])){

              if(isset($_POST['od']) && isset($_POST['do']) && isset($_POST['kontakt']) && isset($_POST['auto'])){

                  $a = $_POST['od'];
                  $b = $_POST['do'];
                  $c = $_POST['kontakt'];
                  $d = $_POST['auto'];
                  $e = $_POST['edytowanie'];

                  $baza = mysqli_connect("localhost", "root", "", "cargomatic");
                  mysqli_query($baza, "UPDATE rezerwacje SET od='$a', do='$b', kontakt_id='$c', samochody_id='$d' WHERE id_rezerwacji='$e'");
                  mysqli_close($baza);

                  echo "<script type='text/javascript'>window.location=document.location.href;</script>";
              
              } 

          }       

              echo '</div>';

            echo '</div>';

          } 
        
        }else{
          echo '<div id="rejestracja">';
            echo '<div id="name">ZAREJESTRUJ SIĘ</div>';
            echo '<form method="post">';
              echo '<div id="email">';
                echo '<div id="mail">E-MAIL:</div>';
                echo '<input type="text" id="in_mail" name="email">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">HASLO:</span></br>';
                echo '<input type="password" id="in_pass" name="password">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">POWTORZ HASLO:</span></br>';
                echo '<input type="password" id="in_pass" name="password2">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">PLEC:</span></br>';
                echo 'MEZCZYZNA';
                echo '<input type="radio" id="sex" name="sex" value="mężczyzna" checked>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                echo 'KOBIETA';
                echo '<input type="radio" id="sex" name="sex" value="kobieta">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">DATA URODZENIA:</span></br>';
                echo '<input type="date" id="data" name="date">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">NUMER TELEFONU:</span></br>';
                echo '<input type="text" id="phone" name="phone">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">MIASTO:</span></br>';
                echo '<input type="text" id="phone" name="city">';
              echo '</div>';
              echo '<input type="submit" id="kk" value="ZAREJESTRUJ">';
            echo '</form>';
          echo '</div>';

          if(isset($_POST['email'])){

            $test = true;
            $email = $_POST['email'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $sex = $_POST['sex'];
            $date = $_POST['date'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            if((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)){
              $test = false;
              $_SESSION['e_email'] = "<span style='color: red'>Niepoprawny adres email!</span><br>";
            }
            if((strlen($password)<8) || (strlen($password)>20)){
              $test = false;
              $_SESSION['e_password'] = "<span style='color: red'>Hasło musi posiadać od 8 do 20 znaków!</span><br>";
            }
            if($password != $password2){
              $test = false;
              $_SESSION['e_passwords'] = "<span style='color: red'>Podane hasła nie są identyczne!</span><br>";
            }
            if($date == ''){
              $test = false;
              $_SESSION['e_date'] = "<span style='color: red'>Podaj datę urodzenia!</span><br>";
            }
            if(strlen($phone) != 9){
              $test = false;
              $_SESSION['e_phone'] = "<span style='color: red'>Podaj numer telefonu!</span><br>";
            }
            if(strlen($city)<3 || strlen($city) > 20){
              $test = false;
              $_SESSION['e_city'] = "<span style='color: red'>Podaj miasto!</span><br>";
            }

            $con = @new mysqli('localhost', 'root', '', 'cargomatic');
            if($con->connect_errno != 0){
              echo "Error: ".$con->connect_errno;
            }else{
          
              $res = $con->query("SELECT id_konta FROM konta WHERE email='$email'");
              $mails = $res->num_rows;
              if($mails > 0){
                $test = false;
                $_SESSION['e_email'] = "<span style='color: red'>Podany email jest już zajęty!</span><br>";
              }

              $res2 = $con->query("SELECT id_konta FROM konta WHERE haslo='$password'");
              $pass = $res2->num_rows;
              if($pass > 0){
                $test = false;
                $_SESSION['e_password'] = "<span style='color: red'>Podane haslo jest już zajęte!</span><br>";
              }

              if($test == true){

                if($con->query("INSERT INTO konta VALUES (NULL, '$email', '$password', '$sex', '$date', '$phone', '$city', 0)")){
                  $_SESSION['udanarejestracja'] = true;
                  header('Location: zaloguj.php');
                }else{
                  throw new Exception($con->error);
                }

              }

              $con->close();

            }

          }

          echo '<div id="login">';
            echo '<form method="post" action="login.php">';
              echo '<div id="name">ZALOGUJ SIĘ</div>';
                echo '<div id="email">';
                echo '<span id="mail">E-MAIL:</span></br>';
                echo '<input type="text" id="in_mail" name="login">';
              echo '</div>';
              echo '<div id="haslo">';
                echo '<span id="pass">HASLO:</span></br>';
                echo '<input type="password" id="in_pass" name="passw">';
              echo '</div>';
              echo '<input type="submit" id="ok" value="ZALOGUJ">';
            echo '</form>';
            echo '<div id="reje">ZAREJESTRUJ SIĘ</div>';

            if(isset($_SESSION['e_email'])){
              echo $_SESSION['e_email'];
              unset($_SESSION['e_email']);
            }
            if(isset($_SESSION['e_password'])){
              echo $_SESSION['e_password'];
              unset($_SESSION['e_password']);
            }
            if(isset($_SESSION['e_passwords'])){
              echo $_SESSION['e_passwords'];
              unset($_SESSION['e_passwords']);
            }
            if(isset($_SESSION['e_date'])){
              echo $_SESSION['e_date'];
              unset($_SESSION['e_date']);
            }
            if(isset($_SESSION['e_city'])){
              echo $_SESSION['e_city'];
              unset($_SESSION['e_city']);
            }
            if(isset($_SESSION['e_phone'])){
              echo $_SESSION['e_phone'];
              unset($_SESSION['e_phone']);
            }  
            if(isset($_SESSION['udanarejestracja']) && $_SESSION['udanarejestracja'] == true){
              echo "<span style='color: green'>Utworzono nowe konto!</span><br>";
              unset($_SESSION['udanarejestracja']);
            }

          echo '</div>';

        }
      
      ?>

        <script>
          var reje = document.querySelector('#reje');
          reje.addEventListener('click', function(){
            document.getElementById('login').style.display = 'none';
            document.getElementById('rejestracja').style.display = 'block';
          })
        </script>

      <div id="stopka"><b>ALL RIGHTS RESERVED &copy;</b></div>

    </div>

  </body>
</html>