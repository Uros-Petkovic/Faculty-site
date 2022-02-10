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
        <script type="text/javascript" src="jsfajl.js"></script>
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
        <script type="text/javascript" src="jsfajl.js"></script>
        <?php 
        require('divheader.php');//div za header
        ?>
        <?php 
        require('divmenu.php');//div menu
        ?>
        <div id="sadrzaj">
            <?php
            require('divpredmetlevoprofa.php'); //div za levi side menu kod profe
            ?>
            <div id="predmetdesno">
            <?php 
            require('konekcija.php'); //Konekcija sa bazom
            $result=mysqli_query($con, "select * from korisnik join zaposleni on korisnik.email=zaposleni.email where zaposleni.email='".$_SESSION['email']."'");
            if(mysqli_num_rows($result)>0){
                $row= mysqli_fetch_assoc($result);
                $biografija=$row['biografija'];
                ?>
                <h1><b>Azurirajte svoje osnovne podatke</b></h1>
                <br/>
                <br/>
                <form method="post" action="" name="mojaforma" onsubmit="return(nastavnikprofil())">
                    <table>
                        <tr>
                            <td>
                                Ime:
                            </td>
                            <td>
                                <input type="text" name="ime" maxlength="15" value="<?php echo$row['ime']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Prezime:
                            </td>
                            <td>
                                <input type="text" name="prezime" maxlength="32" value="<?php echo$row['prezime']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                               Status: 
                            </td>
                            <td>
                                <input type="radio" name="status" value="1" checked>Aktivan
                                <input type="radio" name="status" value="0">Neaktivan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Zvanje:
                            </td>
                            <td>
                                <input type="text" name="zvanje" maxl="32" value="<?php echo$row['zvanje']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kabinet:
                            </td>
                            <td>
                                <input type="text" name="kabinet" maxl="20" value="<?php echo$row['kabinet']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Adresa:
                            </td>
                            <td>
                                <input type="text" name="adresa" maxlength="32" value="<?php echo$row['adresa']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobilni telefon:
                            </td>
                            <td>
                                <input type="text" name="mobilni" maxlength="20" value="<?php echo$row['mobilni']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Licni web:
                            </td>
                            <td>
                                <input type="text" name="licniweb" maxlength="100" value="<?php echo$row['licniweb']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Biografija:
                            </td>
                            <td>
                                <textarea cols="50" rows="7" maxlength="350" name="biografija" ><?php echo$row['biografija']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" id="dugme" name="izmeni" value="Izmeni informacije">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                    mysqli_free_result($result); //Oslobadjanje resurasa
                    
            }else{
                echo"<span style='color:red'>Nemate prethodno unete informacije o sebi!</span>";
            }
            mysqli_close($con); //Zatvaranje konekcije sa sesijom
            ?>
            <?php
            if(isset($_POST['ime'])){ //Ako je forma prosla, vrsimo izmenu informacija kod profesora
                require('konekcija.php');
                $result= mysqli_query($con, "update korisnik set ime='".$_POST['ime']."',prezime='".$_POST['prezime']."',status=".$_POST['status']." where email='".$_SESSION['email']."'");
                $result1= mysqli_query($con, "update zaposleni set adresa='".$_POST['adresa']."',biografija='".$_POST['biografija']."',mobilni='".$_POST['mobilni']."',licniweb='".$_POST['licniweb']."',zvanje='".$_POST['zvanje']."',kabinet='".$_POST['kabinet']."' where email='".$_SESSION['email']."'");
                if(!$result || !$result1){
                    echo"<span style='color:red'>Neuspesna izmena licnih podataka!</span>";
                }else{
                    echo"<span style='color:red'>Uspesna izmena licnih podataka!</span>";
                    header('Location:nastavnik.php'); //Posle uspesne provere vracamo se na pocetnu stranicu profesora
                }
            }
            ?>
            </div>            
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
