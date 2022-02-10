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
        require('divheader.php'); //div header
        ?>
        <?php
        require('divmenu.php'); //div menu sa opcijama ka stranicama
        ?>
        <div id="sadrzaj">
            <h1><b>Obavestenja</b></h1>
            <?php 
            require('spanlogout.php'); //Ovo je span gde se nalazi logout dugme
            ?>
            <br/>
            <br/>
            <?php
            /**
             * U ovoj funkciji se proverava da li je obavestenje mladje od 3
             * meseca ili nije i onda se prikazuje ili se ne prikazuje
             * @param type $datum Datum objave u string formatu
             * @author Uros Petkovic <pu203027m@student.etf.bg.ac.rs>
             * @return int Indikator o tome je li obavestenje mladje od 3 meseca
             */
            function mladje($datum){
                $niz= explode('-', $datum); //Delim string na godinu,mesec i dan
                $vreme=mktime(0,0,0,$niz[1],$niz[2],$niz[0]);
                $trenutno=time();
                $razlika=$trenutno - $vreme;//Oduzimam od trenutnog vremena
                $mesec=$razlika/(60*60*24*30); //Racunam koliko meseci ima
                if($mesec<=3) return 1; else return 0; //Manje od 3 sledi 1
            }
            require('konekcija.php'); //Konekcija sa bazom
            $result= mysqli_query($con, "select * from obavestenje_sajt join kategorija_obav on obavestenje_sajt.id_kat=kategorija_obav.id");
            if(mysqli_num_rows($result)==0){
                echo"Nema obavestenja na sajtu";
            }else{
            mysqli_free_result($result);
            $result= mysqli_query($con, "select MAX(id) FROM kategorija_obav"); //Uzimamo maksimalni id kategorije za obavestenja
            $row3= mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            for($i=1;$i<($row3['MAX(id)']+1);$i++){ //Stampamo sva obavestenja iz svih kategorija koja ispunjavaju uslove
                $result= mysqli_query($con, "select * from kategorija_obav where id=".$i);
                $row= mysqli_fetch_assoc($result);
                $result2= mysqli_query($con, "select * from obavestenje_sajt join kategorija_obav on obavestenje_sajt.id_kat=kategorija_obav.id ORDER BY obavestenje_sajt.datum_objave DESC");
                ?><h3><b><?php echo $row['naziv']."<br/>";?></b></h3><?php
                $k=0;
                while($row2= mysqli_fetch_assoc($result2)){
                    if($i==$row2['id']){
                        if(mladje($row2['datum_objave'])){
                        ?>
                <h4 style="color:red"><b><?php echo $row2['naslov']." - ".$row2['datum_objave']."<br/>";?></b></h4>
                <p style="margin-left: 300px;margin-right: 300px;"><?php echo $row2['sadrzaj']."<br/>"; ?></p>
                        <?php
                        $k=$k+1;
                        }
                    }
                }
                if($k==0) echo"Trenutno nema obavestenja ove kategorije.<br/>";
                mysqli_free_result($result); //Oslobadjanje resurasa
                mysqli_free_result($result2);
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            }
            ?>
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>