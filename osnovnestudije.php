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
        <?php
        require('divheader.php'); //div za header
        ?>
        <?php 
        require('divmenu.php'); //div za menu
        ?>
        <div id="sadrzaj">
            <h1><b>Osnovne studije</b></h1>
            <?php 
            require('spanlogout.php'); //Ovo je span u kome se nalazi logout dugme
            ?>
            <br/>
            <h2>Osnovne informacije o studijama</h2>
            <br/>
            <p style="margin-left: 300px;margin-right: 300px;">
                Od 2003. godine na Elektrotehničkom fakultetu je uveden novi nastavni plan i program,
                po kome osnovne studije traju četiri godine, odnosno osam semestara. To znači da se fakultet
                opredelio za šemu 4+1, po kojoj se posle četiri godine studija stiče titula <b><i>diplomirani inženjer
                elektrotehnike i računarstva</i></b>, a posle još jedne dodatne godine titula <b><i>diplomirani inženjer - master
                elektrotehnike i računarstva</i></b> u skladu sa novim Zakonom o visokom obrazovanju i principima Bolonjske
                deklaracije. Sve aktivnosti studenta boduju se po ECTS sistemu kredita, tako da svaki semestar nosi
                30 ECTS bodova. U poslednjem, osmom semestru, student je obavezan da uradi stručnu praksu koja nosi
                2 ECTS bodova i završni rad, koji nosi 10 ECTS bodova. Dva semestra čine jednu školsku godinu. Svaki
                semestar traje 15 nedelja, u koje je uključena nastava i termini za održavanje kolokvijuma. Školska godina
                počinje 1. oktobra a završava se 30. septembra naredne godine.
            </p>
            <br/>
            <b><h2>Predmeti na osnovnim studijama</h2></b>
            <div id="divlevo">
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            $niz=['prvi','treci','peti','sedmi']; //Niz za prikaz predmeta po semestrima
            $niz1=['Prvi semestar','Treci semestar','Peti semestar','Sedmi semestar'];
            for($i=0;$i<sizeof($niz);$i++){
                echo"<h3><b>".$niz1[$i]."</h3></b><br/>";
                $result= mysqli_query($con, "select DISTINCT sifra,naziv from predmet join nastavni_plan on predmet.sifra=nastavni_plan.sifra_predmet where nastavni_plan.semestar='".$niz[$i]."'");
                if(mysqli_num_rows($result)>0){
                    while($row= mysqli_fetch_assoc($result)){
                        if(empty($_SESSION['tip_korisnika'])){
                            echo $row['naziv']." (".$row['sifra'].")<br/>";                          
                        }elseif($_SESSION['tip_korisnika']=='A' || $_SESSION['tip_korisnika']=='Z'){
                            ?><a href="predmet.php?sifra=<?php echo $row['sifra']?>"><?php echo $row['naziv']." (".$row['sifra'].")<br/>"; ?></a><?php
                        }else{
                            $result1= mysqli_query($con, "select * from prati_predmet where id_student='".$_SESSION['email']."' and sifra_predmet='".$row['sifra']."'");
                            if(mysqli_num_rows($result1)>0){
                                ?><a href="predmet.php?sifra=<?php echo $row['sifra']?>"><?php echo $row['naziv']." (".$row['sifra'].")<br/>"; ?></a><?php
                            }else{
                                echo $row['naziv']." (".$row['sifra'].")<br/>";
                            }
                        }
                    }
                    mysqli_free_result($result);  //Oslobadjanje resurasa                 
                    }else{
                    echo"Nema predmeta u ovom semestru.<br/>";
                }
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            ?>                
            </div>
            <div id="divdesno">
            <?php
            require('konekcija.php');
            $niz=['drugi','cetvrti','sesti','osmi'];
            $niz1=['Drugi semestar','Cetvrti semestar','Sesti semestar','Osmi semestar'];
            for($i=0;$i<sizeof($niz);$i++){
                echo"<h3><b>".$niz1[$i]."</h3></b><br/>";
                $result= mysqli_query($con, "select DISTINCT sifra,naziv from predmet join nastavni_plan on predmet.sifra=nastavni_plan.sifra_predmet where nastavni_plan.semestar='".$niz[$i]."'");
                if(mysqli_num_rows($result)>0){
                    while($row= mysqli_fetch_assoc($result)){
                        if(empty($_SESSION['tip_korisnika'])){
                            echo $row['naziv']." (".$row['sifra'].")<br/>";                          
                        }elseif($_SESSION['tip_korisnika']=='A' || $_SESSION['tip_korisnika']=='Z'){
                            ?><a href="predmet.php?sifra=<?php echo $row['sifra']?>"><?php echo $row['naziv']." (".$row['sifra'].")<br/>"; ?></a><?php
                        }else{
                            $result1= mysqli_query($con, "select * from prati_predmet where id_student='".$_SESSION['email']."' and sifra_predmet='".$row['sifra']."'");
                            if(mysqli_num_rows($result1)>0){
                                ?><a href="predmet.php?sifra=<?php echo $row['sifra']?>"><?php echo $row['naziv']." (".$row['sifra'].")<br/>"; ?></a><?php
                            }else{
                                echo $row['naziv']." (".$row['sifra'].")<br/>";
                            }
                        }
                    }
                    mysqli_free_result($result);                   
                    }else{
                    echo"Nema predmeta u ovom semestru.<br/>";
                }
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            ?>                 
            </div>           
        </div>
        <?php 
        require('divfooter.php');//div za footer
        ?>
    </body>
</html>
