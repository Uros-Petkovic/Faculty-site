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
        <?php
        session_start(); //Pokretanje sesije
        ob_start();
        ?>
        <script src="jsfajl.js"></script>
        <?php 
        require('divheader.php'); //div za header
        ?>
        <div id="menu">
            <p>
                <?php //Ovo je deo koda koji govori o tome kako se linkuju linkovi u meniju u zavisnosti od tipa korisnika
                if(empty($_SESSION['tip_korisnika'])){
                    ?><a href="index.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='Z' && $_SESSION['prvi_pristup']==1){
                    ?><a href="nastavnik.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='A' && $_SESSION['prvi_pristup']==1){
                    ?><a href="administrator.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='Z' && $_SESSION['prvi_pristup']==0){
                    ?><a href="index.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='A' && $_SESSION['prvi_pristup']==0){
                    ?><a href="index.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='S' && $_SESSION['prvi_pristup']==0){
                    ?><a href="index.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }else{
                    ?><a href="student.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }
                ?>
                <a href="zaposleni.php" target="">Zaposleni</a>&nbsp;|&nbsp;
                <a href="obavestenja.php" target="">Obavestenja</a>&nbsp;|&nbsp;
                <a href="osnovnestudije.php" target="">Osnovne studije</a>&nbsp;|&nbsp;
                <a href="masterstudije.php" target="">Master studije</a>&nbsp;|&nbsp;
                <a href="projekti.php" target="">Projekti</a>&nbsp;|&nbsp;
                <a href="servisi.php" target="">Servisi</a>&nbsp;|&nbsp;
                <a href="kontakt.php" target="">Kontakt</a>
            </p>
        </div>
        <div id="sadrzaj">
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            $result = mysqli_query($con, "select * from korisnik where email='" . $_SESSION['email'] . "' and password='" . $_SESSION['password'] . "'");
            $row = mysqli_fetch_assoc($result);
            if ($row['prvi_pristup'] == 0) {
                echo"<br/><span style='color:red'>Morate promeniti lozinku!</span><br/>";
                ?>
            <form method="post" action="" name="mojaforma" onsubmit="return(promenalozinke())">
                        <table>
                            <tr>
                                <td>
                                    Email/korisnicko ime:
                                </td>
                                <td>
                                    <input type="text" name="username">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Stara lozinka:
                                </td>
                                <td>
                                    <input type="password" name="staripassword">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nova lozinka:
                                </td>
                                <td>
                                    <input type="password" name="novipassword">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" id="dugme" name="promena" value="Promeni lozinku">
                                </td>
                            </tr>
                        </table>
                </form><?php
            } else {
                echo"<br/><span style='color:red'>Promenite lozinku ako zelite.</span><br/>";
                ?>
            <form method="post" action="">
                        <table>
                            <tr>
                                <td>
                                    Nastavak bez promene:
                                </td>
                                <td>
                                    <input type="submit" id="dugme" name="nastavak" value="Nastavak">
                                </td>
                            </tr>
                        </table>
            </form>
            <form method="post" action="" name="mojaforma1" onsubmit="return(promenalozinke1())">
                <table>
                            <tr>
                                <td>
                                    Email/korisnicko ime:
                                </td>
                                <td>
                                    <input type="text" name="username1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Stara lozinka:
                                </td>
                                <td>
                                    <input type="password" name="staripassword1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nova lozinka:
                                </td>
                                <td>
                                    <input type="password" name="novipassword1">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" id="dugme" name="promena1" value="Promeni lozinku">
                                </td>
                            </tr>
                        </table>
                </form><?php
            }
            mysqli_free_result($result); //Oslobadjanje rezultata
            ?>
        <?php
        if(isset($_POST['novipassword'])){ //Ako je forma prosla, ispitaj username i password i promeni lozinku
            if(empty($_POST['username']) || empty($_POST['staripassword']) || empty($_POST['novipassword'])){
                echo"<span style='color:red'>Niste uneli sva polja u formi!</span>";
                exit();
            }
            if($_POST['username']!=$row['email']){
                echo"<span style='color:red'>Niste uneli ispravan email!</span>";
                exit();
            }
            if($_POST['staripassword']!=$row['password']){
                echo"<span style='color:red'>Niste uneli ispravnu staru lozinku!</span>";
                exit();
            }
            if($_POST['staripassword']==$_POST['novipassword']){
                echo"<span style='color:red'>Morate uneti drugaciju lozinku u polje za novu lozinku!</span>";
                exit();
            }
            $result= mysqli_query($con, "update korisnik set password='".$_POST['novipassword']."', prvi_pristup=1 where email='".$_SESSION['email']."'");
            if(!$result){
                echo"<span style='color:red'>Neuspesna promena lozinke!</span>";
            }else{
                echo"<span style='color:red'>Uspesna promena lozinke!<br/>Povratak.</span><br/>";
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['tip_korisnika']); //Brisanje svih promenljivih iz sesije i gasenje sesije
                unset($_SESSION['prvi_pristup']);
                unset($_SESSION['prvi_pristup']);
                session_destroy();
                header('Location:index.php'); //Povratak na pocetnu stranicu
            }
            }
        if(isset($_POST['novipassword1'])){ //isti postupak
            if(empty($_POST['username1']) || empty($_POST['staripassword1']) || empty($_POST['novipassword1'])){
                echo"<span style='color:red'>Niste uneli sva polja u formi!</span>";
                exit();
            }
            if($_POST['username1']!=$row['email']){
                echo"<span style='color:red'>Niste uneli ispravan email!</span>";
                exit();
            }
            if($_POST['staripassword1']!=$row['password']){
                echo"<span style='color:red'>Niste uneli ispravnu staru lozinku!</span>";
                exit();
            }
            if($_POST['staripassword1']==$_POST['novipassword1']){
                echo"<span style='color:red'>Morate uneti drugaciju lozinku u polje za novu lozinku!</span>";
                exit();
            }
            $result= mysqli_query($con, "update korisnik set password='".$_POST['novipassword1']."' where email='".$_SESSION['email']."'");
            if(!$result){
                echo"<span style='color:red'>Neuspesna promena lozinke!</span>";
            }else{
                echo"<span style='color:red'>Uspesna promena lozinke!<br/>Povratak.</span><br/>";
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['tip_korisnika']);
                unset($_SESSION['prvi_pristup']);
                session_destroy();
                header('Location:index.php');
            }
            }
        mysqli_close($con);
        ?>
        <?php
        if(isset($_POST['nastavak'])){ //Ako ne zelimo da menjamo lozinku, samo nastavljamo dalje ka nasoj pocetnoj stranici u zavisnosti od tipa korisnika
            require('konekcija.php');
            $result= mysqli_query($con, "select * from korisnik where email='" . $_SESSION['email'] . "' and password='" . $_SESSION['password'] . "'");
            $row= mysqli_fetch_assoc($result);
            if($row['tip_korisnika']=='A'){
                header('Location:administrator.php');
            } elseif($row['tip_korisnika']=='Z'){
                header('Location:nastavnik.php');
            }else{
                header('Location:student.php');
            }
        
        mysqli_free_result($result); //Oslobadjanje resurasa
        mysqli_close($con); //Zatvaranje konekcije sa bazom
        }
        ?> 
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
