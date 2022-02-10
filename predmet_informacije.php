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
            require('divpredmetlevopredmet.php');
            ?>
            <div id="predmetdesno" style="text-align: left;font-size: 20px;">
            <h1><b>Informacije o predmetu</b></h1>
            <br/>
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            //$result1= mysqli_query($con, "select * from predmet join nastavni_plan on predmet.sifra=nastavni_plan.sifra_predmet join drzi_predmet on predmet.sifra=drzi_predmet.sifra_predmet");
            $result= mysqli_query($con,"select * from predmet join nastavni_plan on predmet.sifra=nastavni_plan.sifra_predmet where predmet.sifra='".$_GET['sifra']."'");
            if(mysqli_num_rows($result)>0){
                $row= mysqli_fetch_assoc($result);
                ?>
            <table width="60%" style="text-align: left;margin-left: 0;margin-right: 0;" >
                <tr style="border-top: 1px solid royalblue;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-top: 1px solid royalblue;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Sifra predmeta
                    </td>
                    <td style="border-top: 1px solid royalblue;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['sifra']; ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Naziv
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['naziv']; ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Fond casova
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['fond']; ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Broj espb bodova
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['espb'];?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Cilj predmeta
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['cilj_predmeta'];?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Ishod predmeta
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['ishod_predmeta'];?>
                    </td>
                </tr>
                <?php
                if(!empty($row['komentar'])){
                    ?>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Komentar
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['komentar']; ?>
                    </td>
                </tr>    
                    <?php
                }
                ?>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Status predmeta
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php if($row['aktivan']==1) echo"Predmet se drzi u ovoj skolskoj godini";else echo"<span style='color:red'>Predmet se ne drzi u ovoj skolskoj godini!</span>"; ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Tip predmeta
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['tip_predmeta']; ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Godina studija
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['godina_studija'] ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Semestar
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php echo $row['semestar'] ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Odseci na kojima se odrzava predmet:
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php
                        $result1= mysqli_query($con, "select * from nastavni_plan join odsek on nastavni_plan.id_odsek=odsek.id_odsek where nastavni_plan.sifra_predmet='".$_GET['sifra']."'");
                        if(mysqli_num_rows($result1)>0){
                            while($row1= mysqli_fetch_assoc($result1)){
                                echo $row1['naziv_odseka']."<br/>";
                            }
                            mysqli_free_result($result1);                          
                            }else{
                            echo"<span style='color:red'>Predmet se ne odrzava ni na jednom odseku!</span>";
                        }
                        ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Termini predavanja
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php
                        $result1= mysqli_query($con, "select * from drzi_predmet join zaposleni on drzi_predmet.id_nastavnik=zaposleni.email join korisnik on zaposleni.email=korisnik.email where sifra_predmet='".$_GET['sifra']."' and nastava='predavanje'");
                        if(mysqli_num_rows($result1)>0){
                            while($row1= mysqli_fetch_assoc($result1)){
                                echo"Nastavnik: ";
                                ?><a href="infoprofa.php?id_zaposleni=<?php echo $row1['id_zaposleni'] ?>"  target="blank"><?php echo $row1['ime']." ".$row1['prezime']; ?></a><br/><?php
                                echo"Tip nastave: ".$row1['nastava']." Grupa: ".$row1['grupa']."<br/>Termin predavanja: ".$row1['termin']." Sala: ".$row1['sala']."<br/><br/>";
                            }
                        
                        mysqli_free_result($result1);   
                        }else{
                            echo"<span style='color:red'>Nema termina predavanja za ovaj predmet!</span>";
                        }
                        ?>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                    <td style="background-color: royalblue;color: white;border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        Termini vezbi
                    </td>
                    <td style="border-bottom: 1px solid royalblue; border-collapse: collapse;">
                        <?php
                        $result1= mysqli_query($con, "select * from drzi_predmet join zaposleni on drzi_predmet.id_nastavnik=zaposleni.email join korisnik on zaposleni.email=korisnik.email where sifra_predmet='".$_GET['sifra']."' and nastava='vezbe'");
                        if(mysqli_num_rows($result1)>0){
                            while($row1= mysqli_fetch_assoc($result1)){
                                echo"Nastavnik: ";
                                ?><a href="infoprofa.php?id_zaposleni=<?php echo $row1['id_zaposleni'] ?>" target="blank"><?php echo $row1['ime']." ".$row1['prezime']; ?></a><br/><?php
                                echo"Tip nastave: ".$row1['nastava']." Grupa: ".$row1['grupa']."<br/>Termin vezbi: ".$row1['termin']." Sala: ".$row1['sala']."<br/><br/>";
                            }                       
                        mysqli_free_result($result1); //Oslobadjanje resurasa  
                        }else{
                            echo"<span style='color:red'>Nema termina predavanja za ovaj predmet!</span>";
                        }
                        ?>
                    </td>
                </tr>
            </table>    
                <?php
                mysqli_free_result($result); //Oslobadjanje resurasa                      
            }else{
                echo"<span style='color:red'>Nema informacija o ovom predmetu!</span>";
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