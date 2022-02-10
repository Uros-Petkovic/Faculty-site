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
        <script type="text/javascript" src="jsfajl.js"></script>
        <?php
        require('divheader.php'); //div za header
        ?>
        <?php 
        require('divmenu.php'); //div za menu sa opcijama ka stranicama
        ?>
        <div id="sadrzaj">
            <?php
            require('divpredmetlevoprofa.php'); //div za levi side menu za profesora
            ?>
            <div id="predmetdesno">
                <br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom
                $result = mysqli_query($con, "select * from predmet where sifra='" . $_GET['sifra'] . "'");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row['naziv']." - ".$row['sifra']."<br/>";
                    ?><p id="menupredmet">
                        <a href="opredmetu.php?sifra=<?php echo $_GET['sifra']; ?>" target="">O predmetu</a> &nbsp;|&nbsp;
                        <a href="predavanja.php?sifra=<?php echo $_GET['sifra']; ?>" target="">Predavanja</a>&nbsp;|&nbsp;
                        <a href="vezbe.php?sifra=<?php echo $_GET['sifra']; ?>" target="">Vezbe</a>&nbsp;|&nbsp;
                        <a href="ispitnapitanja.php?sifra=<?php echo $_GET['sifra']; ?>" target="">Ispitna pitanja</a>
                    </p><br/><?php                     
                    ?>
                    <form method="get" action="" name="mojaforma" onsubmit="return(opredmetu())">
                        <table>
                            <tr>
                                <td>
                                    Sifra predmeta:
                                </td>
                                <td>
                                    <input type="text" name="sifra" value="<?php echo$row['sifra'] ?>" readonly maxlength="15" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Naziv predmeta:
                                </td>
                                <td>
                                    <input type="text" name="naziv" value="<?php echo$row['naziv'] ?>" maxlength="50" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fond casova:
                                </td>
                                <td>
                                    <input type="text" name="fond" value="<?php echo$row['fond'] ?>" maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ESPB bodovi:
                                </td>
                                <td>
                                    <input type="text" name="espb" value="<?php echo$row['espb'] ?>" maxlength="11">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cilj predmeta:
                                </td>
                                <td>
                                    <textarea cols="60" rows="8" maxlength="350" name="cilj" required><?php echo$row['cilj_predmeta'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ishod predmeta:
                                </td>
                                <td>
                                    <textarea cols="60" rows="8" maxlength="350" name="ishod" required><?php echo$row['ishod_predmeta'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dodatne informacije:
                                </td>
                                <td>
                                    <textarea cols="60" rows="7" maxlength="250" name="komentar"><?php echo$row['komentar'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Status predmeta:
                                </td>
                                <td>
                                    <input type="text" name="aktivan" value="<?php if($row['aktivan']==1)echo"Aktivan";else echo"Neaktivan"; ?>" readonly required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tip predmeta:
                                </td>
                                <td>
                                    <input type="text" name="tip_predmeta" value="<?php echo$row['tip_predmeta'] ?>" readonly required><br/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Termini predavanja:
                                </td>
                                <td style="text-align: left;">
                                    <?php
                                    $result1= mysqli_query($con, "select * from drzi_predmet join zaposleni on drzi_predmet.id_nastavnik=zaposleni.email join korisnik on zaposleni.email=korisnik.email where sifra_predmet='".$_GET['sifra']."' and nastava='predavanje'");
                                    if(mysqli_num_rows($result1)>0){
                                        while($row1= mysqli_fetch_assoc($result1)){
                                            echo"Nastavnik: <span style='color:red'>".$row1['ime']." ".$row1['prezime']."</span> Grupa: <span style='color:red'>".$row1['grupa']."</span> Termin: <span style='color:red'>".$row1['termin']."</span> Sala: <span style='color:red'>".$row1['sala']."</span><br/>";
                                        }
                                    }else{
                                        echo"<span style='color:red'>Nema termina predavanja za ovaj predmet!</span>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Termini vezbi:
                                </td>
                                <td style="text-align: left;">
                                    <?php
                                    $result1= mysqli_query($con, "select * from drzi_predmet join zaposleni on drzi_predmet.id_nastavnik=zaposleni.email join korisnik on zaposleni.email=korisnik.email where sifra_predmet='".$_GET['sifra']."' and nastava='vezbe'");
                                    if(mysqli_num_rows($result1)>0){
                                        while($row1= mysqli_fetch_assoc($result1)){
                                            echo"Nastavnik: <span style='color:red'>".$row1['ime']." ".$row1['prezime']."</span> Grupa: <span style='color:red'>".$row1['grupa']."</span> Termin: <span style='color:red'>".$row1['termin']."</span> Sala: <span style='color:red'>".$row1['sala']."</span><br/>";
                                        }
                                    
                                        mysqli_free_result($result1);    
                                    }else{
                                        echo"<span style='color:red'>Nema termina vezbi za ovaj predmet!</span>";
                                    }
                                    ?>
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
                                    
                } else {
                    echo"<span style='color:red'>Nemate informacije o ovom predmetu!</span>";
                }
                mysqli_close($con); //Zatvaranje konekcije
                ?>
                <?php
                if(isset($_GET['espb'])){
                    require('konekcija.php');
                    $result= mysqli_query($con, "update predmet set naziv='".$_GET['naziv']."',fond='".$_GET['fond']."',espb=".$_GET['espb'].",cilj_predmeta='".$_GET['cilj']."',ishod_predmeta='".$_GET['ishod']."',komentar='".$_GET['komentar']."' where sifra='".$_GET['sifra']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesna izmena informacija o predmetu!</span>";
                    }else{
                        $s1='Location:opredmetu.php?sifra='; //Povratak na stranicu po uspesnoj izmeni
                        $s2=$_GET['sifra'];
                        $s=$s1.$s2;
                        header($s);
                    }
                    mysqli_close($con); //Zatvaranje konekcije
                }
                ?>
            </div>            
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>