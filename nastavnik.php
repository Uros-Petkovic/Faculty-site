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
        require('divheader.php');  //div za header
        ?>
        <?php
        require('divmenu.php'); //div za menu
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevoprofa.php'); //div za side menu na levoj strani profesora
            ?>
            <div id="predmetdesno"><br/>
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            $result= mysqli_query($con, "select * from korisnik join zaposleni on korisnik.email=zaposleni.email where zaposleni.email='".$_SESSION['email']."'");
            if(mysqli_num_rows($result)>0){
                $row= mysqli_fetch_assoc($result);
                ?>
            Zdravo,<?php echo " <b>".$row['ime']." ".$row['prezime']."</b> , dobro dosli na Vasu stranicu!<br/><br/>" ?>
            <img src="<?php echo $row['profilna_slika']?>" width="250px" height="300px">
            <br/>
            <br/>
            <b>Vasi osnovni podaci</b><br/><br/>
            Ime i prezime:<b><?php echo " ".$row['ime']." ".$row['prezime']."<br/>";?></b>
            Status:<b><?php if($row['status']==1) echo" Aktivan<br/>";else echo" Neaktivan<br/>";?></b>
            Zvanje:<b><?php echo " ".$row['zvanje']."<br/>";?></b>
            Kabinet:<b><?php echo " ".$row['kabinet']."<br/>";?></b>
            Adresa:<b><?php echo " ".$row['adresa']."<br/>";?></b>
            <p style="margin-left: 400px;margin-right: 400px;"><?php
            if(!empty($row['biografija'])){?>
                <b>Biografija:</b><br/><?php echo " ".$row['biografija']."<br/>";?><?php //Prikazivanje osnovnih informacija profesora
            }
            ?></p>
            <?php
            if(!empty($row['mobilni'])){?>
                Mobilni telefon:<b><?php echo " ".$row['mobilni']."<br/><br/>";?></b><?php
            }
            ?>
            <?php
            if(!empty($row['licniweb'])){?>
                Licni web sajt:&nbsp;<a href="<?php echo$row['licniweb'];?>" target="self">Link ka sajtu</a><br/><?php
            }
            ?>
                <?php
            mysqli_free_result($result); //Oslobadjanje resurasa
            
            }else{
                echo"<span style='color:red'>Nemate informacije o sebi,unesite ih na stranici Profil!</span>";
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            ob_end_flush();
            ?>
            </div>            
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
