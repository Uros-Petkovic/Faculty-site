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
            <?php
            require('divpredmetlevoprofa.php'); //div za levi side menu za profesora
            ?>
            <div id="predmetdesno">
                <h1><b>Uredjivanje predmeta</b></h1>
                <br/>
                <br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom i provera ispravnosti
                $result = mysqli_query($con, "select * from predmet join drzi_predmet on predmet.sifra=drzi_predmet.sifra_predmet where drzi_predmet.id_nastavnik='" . $_SESSION['email'] . "'");
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <form method="get" action="">
                        <select name="predmet" onchange="this.form.submit()">
                            <option value="" <?php if(!isset($_GET['predmet']) || $_GET['predmet']=='') echo"selected"; ?>>Izaberi predmet</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo$row['sifra'] ?>" <?php if(isset($_GET['predmet']) && $_GET['predmet']==$row['sifra']) echo"selected"; ?>>
                                    <?php echo$row['naziv'] . " - " . $row['sifra']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </form>    
                    <?php
                    mysqli_free_result($result); //Oslobadjanj resurasa
                } else {
                    echo"<span style='color:red'>Trenutno ne drzite nijedan predmet!</span>";
                }
                ?>
                <?php
                if (isset($_GET['predmet'])) { //Ako je izabran predmet, prikazuje se meni o predmetu
                    ?> 
                    <p id="menupredmet">
                        <a href="opredmetu.php?sifra=<?php echo $_GET['predmet']; ?>" target="">O predmetu</a> &nbsp;|&nbsp;
                        <a href="predavanja.php?sifra=<?php echo $_GET['predmet']; ?>" target="">Predavanja</a>&nbsp;|&nbsp;
                        <a href="vezbe.php?sifra=<?php echo $_GET['predmet']; ?>" target="">Vezbe</a>&nbsp;|&nbsp;
                        <a href="ispitnapitanja.php?sifra=<?php echo $_GET['predmet']; ?>" target="">Ispitna pitanja</a>
                    </p>  
                    <?php
                }
                mysqli_close($con); //Zatvaranje konekcije sa bazom
                ?>
            </div>            
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>