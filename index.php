<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="stilovi.css"/>
        <script src="jsfajl.js"></script>
    </head>
    <body>
        <style>
        <?php 
        require('stilovi.css'); //CSS fajl za dizajn
        ?>
        </style>
        <script src="jsfajl.js"></script>
        <?php
        session_start(); //Pokretanje sesije
        ob_start();
        if(isset($_SESSION['email'])){   //Ako je prethodno postojala sesija i podaci, ocisti sve da ne bi ostajao ulogovan
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            unset($_SESSION['tip_korisnika']);
            unset($_SESSION['prvi_pristup']);
            session_destroy();
        }
        ?>
        <?php 
        require('divheader.php'); //div header
        ?>
        <?php 
        require('divmenu.php'); //div za menu sa opcijama
        ?>
        <div id="sadrzaj">
            <br/>
            <div id="levo">
                <div class="slider">
                    <span id="slide-1"></span>
                    <span id="slide-2"></span>
                    <span id="slide-3"></span>
                    <div class="image-container">
                        <img src="Slike\etf3.png" class="slide" width="1100" height="600" />
                        <img src="Slike\etf1.png" class="slide" width="1100" height="600" />
                        <img src="Slike\etf2.png" class="slide" width="1100" height="600" />
                    </div>
                    <div class="buttons">
                        <a href="#slide-1"></a>
                        <a href="#slide-2"></a>
                        <a href="#slide-3"></a>
                    </div>
                </div>
                <br/>
                <p>
                    Katedra za racunarsku tehniku i informatiku edukacijom, naucno-istrazivackim i projektantskim radom
                    u oblasti racunarskih hardvera, softvera i racunarskih mreza. Kako je u novoj eri doslo do naglog 
                    razvitka tehnologije koji ne jenjava, postoji potreba za sto vecim brojem dobrih inzenjera iz ove oblasti, 
                    stoga se trudimo da nase studente izvedemo na pravi put i pruzimo im sve potrebno znanje koje ce im pomoci u izgradnji njihove karijere
                    u buducnosti.
                    <br/>
                    <br/>
                    <a href="http://rti.etf.bg.ac.rs/" target="self">Zvanicni sajt katedre</a>
                    <br/>
                    <br/>
                    Sef katedre: prof. dr Jelica Protic
                    <br/>
                    <br/>
                    Zamenik: prof. dr Igor Tartalja
                </p>
            </div>
            <div id="desno">
                <?php
                if(!empty($_SESSION['email'])){
                    echo"Ulogovani ste,izlogujte se sa prethodnog naloga!<br/>";  //Ako si ulogovan, ne pojavljuje se forma
                ?>
                <form method='post' action=''>
                    <input type='submit' id="dugme" name='logout' value='Logout'>
                </form>        
                <?php
                if (isset($_POST['logout'])) {
                    unset($_SESSION['email']);
                    unset($_SESSION['password']);
                    unset($_SESSION['tip_korisnika']); //Dugme za izlogovanje
                    session_destroy();
                    header('Location:index.php');
                }                   
                }else{
                    ?>
                <b>Prijava korisnika:</b>
                <br/>
                <br/>
                <form method="post" action="" name="mojaforma" onsubmit="return(logovanje())">
                    <table>
                        <tr>
                            <td>
                                Email(Korisnicko ime):
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo(isset($_POST['username'])) ? $_POST['username'] : ''; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Lozinka:
                            </td>
                            <td>
                                <input type="password" name="password">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" id="dugme" name="prijava" value="Prijavi se">
                            </td>
                        </tr>
                    </table>
            </form>
                <br/>             
                <?php
                if(isset($_POST['username'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    if(empty($username) && empty($password)){
                        echo"<span style='color:red'>Niste uneli email(korisnicko ime) i lozinku!</span>"; //Provera korisnickog imena i lozinke
                        exit();
                    }
                    if(!empty($username) && empty($password)){
                        echo"<span style='color:red'>Niste uneli lozinku!</span>";
                        exit();
                    }
                    if(empty($username) && !empty($password)){
                        echo"<span style='color:red'>Niste uneli email(korisnicko ime)!</span>";
                        exit();
                    }
                    require('konekcija.php'); //Konekcija sa bazom
                    $result= mysqli_query($con, "select * from korisnik where email='$username' and password='$password'");
                    if(mysqli_num_rows($result)>0){
                        $row= mysqli_fetch_assoc($result);
                        if($row['status']==1){
                            $_SESSION['email']=$username;
                            $_SESSION['password']=$password;  //Cuvamo u sesiji potrebne promenljive
                            $_SESSION['tip_korisnika']=$row['tip_korisnika'];
                            $_SESSION['prvi_pristup']=$row['prvi_pristup'];
                            header('Location:promenalozinke.php');
                        }else{
                            echo"<span style='color:red'>Vas nalog je neaktivan, ne mozete pristupiti prijavi!</span>";
                        }
                    }else{
                        echo"<span style='color:red'>Pogresno uneti korisnicko ime i/ili lozinka!</span>";
                        exit();
                    }
                    mysqli_free_result($result); //Oslobadjanje resurasa
                    mysqli_close($con); //Zatvaranje baze
                    }
                ?>
                <?php               
                }
                ?>
            </div>
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
