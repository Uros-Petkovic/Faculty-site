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
        require('divmenu.php'); //diiv za menu sa linkovima
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevopredmet.php'); //levi side menu za predmete
            ?>
            <div id="predmetdesno" style="text-align: left;">
            <h1><b>Materijali za auditorne i laboratorijske vezbe</b></h1>
            <br/>
            <br/>
            <h3>Auditorne vezbe</h3>
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1");
            if(mysqli_num_rows($result)>0){
                $result1= mysqli_query($con, "select DISTINCT sortiranje from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1");
                mysqli_free_result($result);
                $row1= mysqli_fetch_assoc($result1);
                if($row1['sortiranje']=='naziv_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1 ORDER BY naslov DESC");
                }elseif($row1['sortiranje']=='naziv_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1 ORDER BY naslov ASC");
                }elseif($row1['sortiranje']=='datum_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1 ORDER BY datum_objave DESC");
                }elseif($row1['sortiranje']=='datum_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1 ORDER BY datum_objave ASC");
                }else{
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Vezbe' and vidljiv=1");
                }
                ?>
            <ul type="disc" style="text-align: left;">
                <?php
                while($row= mysqli_fetch_assoc($result)){
                    ?>
                <li>
                    <a href="<?php echo $row['fajl_putanja'] ?>" target="blank">
                        <?php echo $row['naslov'].", datum objave:<span style='color:red'>".$row['datum_objave']."</span><br/>"; ?>
                    </a>
                </li> 
                    <?php
                }
                ?>
            </ul>
                <?php
                mysqli_free_result($result); //Oslobadjanje resurasa
                mysqli_free_result($result1);
            }else{
                echo"<span style='color:red'>Nema materijala za vezbe za ovaj predmet!</span>";
            }
            ?>
            <br/>
            <br/>
            <h3>Laboratorijske vezbe</h3>
            <?php
            require('konekcija.php');
            $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1");
            if(mysqli_num_rows($result)>0){
                $result1= mysqli_query($con, "select DISTINCT sortiranje from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1");
                mysqli_free_result($result);
                $row1= mysqli_fetch_assoc($result1);
                if($row1['sortiranje']=='naziv_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1 ORDER BY naslov DESC");
                }elseif($row1['sortiranje']=='naziv_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1 ORDER BY naslov ASC");
                }elseif($row1['sortiranje']=='datum_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1 ORDER BY datum_objave DESC");
                }elseif($row1['sortiranje']=='datum_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1 ORDER BY datum_objave ASC");
                }else{
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Laboratorijske vezbe' and vidljiv=1");
                }
                ?>
            <ul type="disc" style="text-align: left;">
                <?php
                while($row= mysqli_fetch_assoc($result)){
                    ?>
                <li>
                    <a href="<?php echo $row['fajl_putanja'] ?>" target="blank">
                        <?php echo $row['naslov'].", datum objave:<span style='color:red'>".$row['datum_objave']."</span><br/>"; ?>
                    </a>
                </li> 
                    <?php
                }
                ?>
            </ul>
                <?php
                mysqli_free_result($result);
                mysqli_free_result($result1);
            }else{
                echo"<span style='color:red'>Nema materijala za laboratorijske vezbe za ovaj predmet!</span>";
            }
            ?>
            
            <br/>
            <br/>
            <h3>Domaci zadaci</h3>
            <?php
            require('konekcija.php');
            $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1");
            if(mysqli_num_rows($result)>0){
                $result1= mysqli_query($con, "select DISTINCT sortiranje from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1");
                mysqli_free_result($result);
                $row1= mysqli_fetch_assoc($result1);
                if($row1['sortiranje']=='naziv_opadajuce'){ //Sortiranje prikazanih materijala
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1 ORDER BY naslov DESC");
                }elseif($row1['sortiranje']=='naziv_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1 ORDER BY naslov ASC");
                }elseif($row1['sortiranje']=='datum_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1 ORDER BY datum_objave DESC");
                }elseif($row1['sortiranje']=='datum_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1 ORDER BY datum_objave ASC");
                }else{
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Domaci zadaci' and vidljiv=1");
                }
                ?>
            <ul type="disc" style="text-align: left;">
                <?php
                while($row= mysqli_fetch_assoc($result)){
                    ?>
                <li>
                    <a href="<?php echo $row['fajl_putanja'] ?>" target="blank">
                        <?php echo $row['naslov'].", datum objave:<span style='color:red'>".$row['datum_objave']."</span><br/>"; ?>
                    </a>
                </li> 
                    <?php
                }
                ?>
            </ul>
                <?php
                mysqli_free_result($result);
                mysqli_free_result($result1);
            }else{
                echo"<span style='color:red'>Nema materijala za domace zadatke za ovaj predmet!</span>";
            }
            ?>           
            <br/>
            <br/>
            <h3>Projekti</h3>
            <?php
            require('konekcija.php');
            $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1");
            if(mysqli_num_rows($result)>0){
                $result1= mysqli_query($con, "select DISTINCT sortiranje from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1");
                mysqli_free_result($result);
                $row1= mysqli_fetch_assoc($result1);
                if($row1['sortiranje']=='naziv_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1 ORDER BY naslov DESC");
                }elseif($row1['sortiranje']=='naziv_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1 ORDER BY naslov ASC");
                }elseif($row1['sortiranje']=='datum_opadajuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1 ORDER BY datum_objave DESC");
                }elseif($row1['sortiranje']=='datum_rastuce'){
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1 ORDER BY datum_objave ASC");
                }else{
                    $result= mysqli_query($con,"select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Projekti' and vidljiv=1");
                }
                ?>
            <ul type="disc" style="text-align: left;">
                <?php
                while($row= mysqli_fetch_assoc($result)){
                    ?>
                <li>
                    <a href="<?php echo $row['fajl_putanja'] ?>" target="blank">
                        <?php echo $row['naslov'].", datum objave:<span style='color:red'>".$row['datum_objave']."</span><br/>"; ?>
                    </a>
                </li> 
                    <?php
                }
                ?>
            </ul>
                <?php
                mysqli_free_result($result);
                mysqli_free_result($result1);
            }else{
                echo"<span style='color:red'>Nema materijala za projekte za ovaj predmet!</span>";
            }
            mysqli_close($con);
            ?>
            </div>           
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
