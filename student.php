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
            <h1><b>Osnovne informacije o studentu</b></h1>
            <?php
            require('spanlogout.php'); //Ovo je span sa dugmetom za logout
            ?>
            <br/><br/>
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            $result= mysqli_query($con, "select * from korisnik join student on korisnik.email=student.email where korisnik.email='".$_SESSION['email']."'");
            if(mysqli_num_rows($result)>0){
                $row= mysqli_fetch_assoc($result);
                echo"Zdravo, ".$row['ime']." ".$row['prezime'].", dobro dosli na Vasu stranicu!<br/><br/><b>Vasi osnovni podaci</b><br/><br/>";
                echo"Ime: <b>".$row['ime']."</b><br/>";
                echo"Prezime: <b>".$row['prezime']."</b><br/>";
                if($row['status']==1)echo"Status: <b>Aktivan</b><br/>";else echo"Status: <b>Neaktivan</b><br/>";
                echo"Broj indeksa: <b>".$row['indeks']."</b><br/>";
                if($row['tipstudija']=='d')echo"Tip studija: <b>Osnovne studije</b>";
                if($row['tipstudija']=='m')echo"Tip studija: <b>Master studije</b>";
                if($row['tipstudija']=='p')echo"Tip studija: <b>Doktorske studije</b>";
                mysqli_free_result($result);
            }else{
                echo"<span style='color:red'>Nemate informacije o sebi!</span>";
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            ?>
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>