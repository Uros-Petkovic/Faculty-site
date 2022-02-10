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
        require('divmenu.php'); //div za menu sa linkovima ka stranicama
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevopredmet.php'); //div za levi side menu na predmetu
            ?>
            <div id="predmetdesno" style="text-align: left;font-size: 20px;">
                <span style="text-align: center;color:royalblue;"><h1><?php
                require('konekcija.php');
                $result= mysqli_query($con, "select * from predmet where sifra='".$_GET['sifra']."'");
                $row= mysqli_fetch_assoc($result);
                echo$row['naziv']." - ".$_GET['sifra'];
                mysqli_free_result($result);
                mysqli_close($con);
                ?></h1></span><br/>
                <h1><b>Obavestenja predmeta</b></h1>
                <br/>
                <?php
                /**
                 * Ova funkcija sluzi za proveru da li je obavestenje starije 
                 * od 7 dana ili nije i u zavisnosti od toga se ispisuje
                 * drugacije
                 * @param type $datum String datum koji se koristi za odredjivanje
                 * @return int indikator koji govori o tome je li manje od 7 dana ili ne
                 * @author Uros Petkovic <pu203027m@student.etf.bg.ac.rs>
                 */
                function sedamdana($datum) {
                    $niz = explode('-', $datum);
                    $vreme = mktime(0, 0, 0, $niz[1], $niz[2], $niz[0]);
                    $trenutno = time();
                    $razlika = $trenutno - $vreme;
                    $dan = $razlika / (60 * 60 * 24);
                    if ($dan > 7)
                        return 1;
                    else
                        return 0;
                }

                require('konekcija.php'); //Konekcija sa bazom
                $result = mysqli_query($con, "select DISTINCT id_obav,id_predmet,naslov,sadrzaj,datum_objave from obavestenje_predmet ORDER BY obavestenje_predmet.datum_objave DESC");
                if (mysqli_num_rows($result) > 0) {
                    $k=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['id_predmet'] == $_GET['sifra']) {
                            $k=$k+1;
                            if (sedamdana($row['datum_objave'])) {
                                echo "<h3><b>" . $row['naslov'] ." Datum objave: ".$row['datum_objave']. "</b></h3><br/>" . $row['sadrzaj'] . "<br/>";
                                $result1= mysqli_query($con, "select * from fajl_uz_obavestenje where id_obav=".$row['id_obav']);
                                if(mysqli_num_rows($result1)>0){
                                    $r=1;
                                    while($row1= mysqli_fetch_assoc($result1)){
                                        ?><a href="<?php echo $row1['putanja']; ?>" target="self">Link ka fajlu <?php echo" ".$r;?> </a><br/><?php
                                        $r=$r+1;
                                    }
                                    mysqli_free_result($result1);
                                }
                            } else {
                                echo "<h3 style='color:red'><b>" . $row['naslov']." Datum objave: ".$row['datum_objave']."</b></h3><br/>" . $row['sadrzaj'] . "<br/>";
                                $result1= mysqli_query($con, "select * from fajl_uz_obavestenje where id_obav=".$row['id_obav']);
                                if(mysqli_num_rows($result1)>0){
                                    $z=1;
                                    while($row1= mysqli_fetch_assoc($result1)){
                                        ?><a href="<?php echo $row1['putanja']; ?>" target="self">Link ka fajlu <?php echo" ".$z;?> </a><br/><?php
                                        $z=$z+1;
                                    }
                                    mysqli_free_result($result1); //Oslobadjanje resurasa
                                }
                            }
                        }
                    }
                    if($k==0)echo"<span style='color:red'>Nema obavestenja na ovom predmetu!</span>";
                    mysqli_free_result($result);
                } else {
                    echo"<span style='color:red'>Nema obavestenja u bazi!</span>";
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