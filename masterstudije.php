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
            <h1><b>Master studije</b></h1>
            <?php
            require('spanlogout.php'); //ovo je span gde se nalazi logout dugme
            ?>
            <br/>
            <b><h2>Osnovne informacije o studijama</h2></b>
            <br/>
            <p style="margin-left: 300px;margin-right: 300px;">
              Master akademske studije na Elektrotehničkom fakultetu Univerziteta u Beogradu
              traju dva semestra i nose 60 ESPB bodova. Ukupan broj bodova potreban za sticanje
              akademskog naziva master inženjer  je 300 ESPB, pa se na ove studije mogu upisati
              samo kandidati koji su na osnovnim akademskim studijama stekli 240 ESPB i to na
              Elektrotehničkom ili nekom drugom srodnom fakultetu.Po završetku master akademskih
              studija na Elektrotehničkom fakultetu u Beogradu, na studijskom programu Elektrotehnika
              i računarstvo stiče se akademski naziv <b><i>master inženjer elektrotehnike i računarstva</i></b>.
              U okviru master akademskih studija polažu se predmeti koji nose ukupno 30 ESPB. Ukoliko
              pravilima modula nije drugačije određeno, predmeti nose po 6 ESPB i imaju po 5 časova
              nedeljno. Preostalih 30 ESPB odnosi se na stručnu praksu (3 ESPB), studijski istraživački
              rad  (14 ESPB) i master rad (13 ESPB).U okviru svakog modula data je lista predmeta, od
              kojih student upisan na taj modul mora da odabere najmanje tri, ukoliko pravilima modula
              nije drugačije određeno.Ukoliko pravilima modula nije drugačije određeno, preostala dva
              predmeta mogu se birati sa liste istog ili bilo kog drugog modula. Pri tome, ukoliko rukovodilac
              modula to odobri, jedan od ta dva predmeta može se zameniti sa dva kursa iz grupe
              opšteobrazovnih predmeta, koji nose po 3 ESPB.  
            </p>
            <br/>
            <b><h2>Predmeti na master studijama</h2></b>
            <?php
            require('konekcija.php'); //Konekcija sa bazom i prikaz predmeta po semestrima
            $niz=['deveti','deseti'];
            $niz1=['Prvi semestar','Drugi semestar'];
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
                }else{
                    echo"Nema predmeta u ovom semestru.<br/>";
                }
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            ?>           
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
