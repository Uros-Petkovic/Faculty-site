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
        require('stilovi.css'); //U ovom delu se poziva css fajl za dizajn projekta
        ?>
        </style>
        <?php
        session_start();  //U ovom delu se pokrece sesija i omogucava output buffering
        ob_start();
        ?>
        <?php 
        require('divheader.php'); //Ovaj deo pozira header div koji je isti za svaku stranicu
        ?>
        <?php
        require('divmenu.php');  //Ovaj deo poziva div za menu koji je isti za svaku stranicu
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevoadmin.php'); //Ovde se poziva levi deo sadrzaja administratora koji je isti za svaku stranicu
            ?>
            <div id="predmetdesno"><br/>
                <h1><b>Stranica administratora</b></h1>
                <br/><br/>
                <?php
                require('konekcija.php');  //Konekcija sa bazom i provera ispravnosti
                $result= mysqli_query($con, "select * from korisnik where email='".$_SESSION['email']."'"); //Query za administratora
                if(mysqli_num_rows($result)>0){
                    $row= mysqli_fetch_assoc($result); // Ispisivanje administratorovih informacija
                    echo"Zdravo, <b>".$row['ime']." ".$row['prezime']."</b>, dobro dosli na Vasu stranicu!<br/><br/>Sve Vase funkcionalnosti prikazane su u meniju sa leve strane.";
                }else{
                    echo"<span style='color:red'>Nemate informacije o sebi!</span>";
                }
                ?>
            </div>            
        </div>
        <?php 
        require('divfooter.php'); // Pozivanje dela koda za footer koji je isti za svaku stranicu
        ?>
    </body>
</html>
