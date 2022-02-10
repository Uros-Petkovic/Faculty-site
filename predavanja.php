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
        require('divmenu.php'); //div menu sa opcijama za linkove
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevoprofa.php'); //levi side menu za profesora
            ?>
            <div id="predmetdesno">
                <br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom
                echo"Materijali predavanja predmeta<br/>";
                ?>  <p id="menupredmet">
                        <a href="opredmetu.php?sifra=<?php echo $_GET['sifra']; ?>" target="">O predmetu</a> &nbsp;|&nbsp;
                        <a href="predavanja.php?sifra=<?php echo $_GET['sifra']; ?>" target="">Predavanja</a>&nbsp;|&nbsp;
                        <a href="vezbe.php?sifra=<?php echo $_GET['sifra']; ?>" target="">Vezbe</a>&nbsp;|&nbsp;
                        <a href="ispitnapitanja.php?sifra=<?php echo $_GET['sifra']; ?>" target="">Ispitna pitanja</a>
                    </p>  <br/><?php
                $result= mysqli_query($con, "select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Predavanja'");
                if(mysqli_num_rows($result)>0){
                    ?>
                    <form method="post" action="">
                        <table>
                            <tr>
                                <td>
                                    Prikaz fajlova i azuriranje redosleda po:
                                </td>
                                <td>
                                    <select name="sortiranje">
                                        <option value="">Izaberi tip sortiranja</option>
                                        <option value="naziv_opadajuce">Nazivu opadajuce</option>
                                        <option value="naziv_rastuce">Nazivu rastuce</option>
                                        <option value="datum_opadajuce">Datumu opadajuce</option>
                                        <option value="datum_rastuce">Datumu rastuce</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" id="dugme" name="prikazi" value="Prikazi i azuriraj redosled fajlova">
                                </td>
                            </tr>
                        </table>
                    </form><br/>
                    <?php
                
                    mysqli_free_result($result); //Oslobadjanje resurasa
                }else{
                    echo"<span style='color:red'>Nema materijala predavanja za ovaj predmet!</span>";
                }
                if(isset($_POST['prikazi'])){ //Po sortiranju se prikazuju materijali za predavanja
                if($_POST['sortiranje']=='naziv_opadajuce'){
                        $sort='naziv_opadajuce';
                        $result= mysqli_query($con, "select * from materijal join korisnik on materijal.id_nastavnik=korisnik.email where materijal.sifra_predmet='".$_GET['sifra']."' and materijal.tip_materijala='Predavanja' ORDER BY naslov DESC");
                    }elseif($_POST['sortiranje']=='naziv_rastuce'){
                        $sort='naziv_rastuce';
                        $result= mysqli_query($con, "select * from materijal join korisnik on materijal.id_nastavnik=korisnik.email where materijal.sifra_predmet='".$_GET['sifra']."' and materijal.tip_materijala='Predavanja' ORDER BY naslov ASC");
                    }elseif($_POST['sortiranje']=='datum_opadajuce'){
                        $sort='datum_opadajuce';
                        $result= mysqli_query($con, "select * from materijal join korisnik on materijal.id_nastavnik=korisnik.email where materijal.sifra_predmet='".$_GET['sifra']."' and materijal.tip_materijala='Predavanja' ORDER BY datum_objave DESC");
                    }elseif($_POST['sortiranje']=='datum_rastuce'){
                        $sort='datum_rastuce';
                        $result= mysqli_query($con, "select * from materijal join korisnik on materijal.id_nastavnik=korisnik.email where materijal.sifra_predmet='".$_GET['sifra']."' and materijal.tip_materijala='Predavanja' ORDER BY datum_objave ASC");
                    }else{
                        $sort='';
                        $result= mysqli_query($con, "select * from materijal join korisnik on materijal.id_nastavnik=korisnik.email where materijal.sifra_predmet='".$_GET['sifra']."' and materijal.tip_materijala='Predavanja'");
                    }
                    ?>
                <table>
                    <tr style="background-color: royalblue;color: white;">
                        <td>
                            Naslov fajla
                        </td>
                        <td>
                            Nastavnik koji je objavio fajl
                        </td>
                        <td>
                            Datum objave
                        </td>
                        <td>
                            Tip fajla
                        </td>
                        <td>
                            Velicina
                        </td>
                        <td>
                            Obrisi fajl
                        </td>
                    </tr>
                    <?php
                    while($row= mysqli_fetch_assoc($result)){
                        $result1= mysqli_query($con, "update materijal set sortiranje='$sort' where id_materijal=".$row['id_materijal']);
                        ?>
                    <tr style="border: 1px solid royalblue; border-collapse: collapse;">
                        <td style="border: 1px solid royalblue; border-collapse: collapse;">
                            <a href="<?php echo$row['fajl_putanja']; ?>" target="self"><?php echo$row['naslov']; ?></a>
                        </td>
                        <td style="border: 1px solid royalblue; border-collapse: collapse;">
                            <?php echo$row['ime']." ".$row['prezime']; ?>
                        </td>
                        <td style="border: 1px solid royalblue; border-collapse: collapse;">
                            <?php echo$row['datum_objave']; ?>
                        </td>
                        <td style="border: 1px solid royalblue; border-collapse: collapse;">
                            <?php echo$row['tip_fajla']; ?>
                        </td>
                        <td style="border: 1px solid royalblue; border-collapse: collapse;">
                            <?php echo$row['velicina']."KB"; ?>
                        </td>
                        <td style="border: 1px solid royalblue; border-collapse: collapse;">
                            <form method="post" action="">
                                <input type="submit" id="dugme" name="<?php echo$row['id_materijal'] ?>" value="Obrisi fajl">
                            </form>
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                </table>    
                    <?php
                
                    mysqli_free_result($result); //Oslobadjanje resurasa
                }
                $result= mysqli_query($con, "select * from materijal where sifra_predmet='".$_GET['sifra']."' and tip_materijala='Predavanja'");
                while($row= mysqli_fetch_assoc($result)){
                    $id=$row['id_materijal'];
                    if(isset($_POST[$id])){
                        $result1= mysqli_query($con, "DELETE FROM materijal where id_materijal=$id");
                        if(!$result1){
                            echo"<span style='color:red'>Neuspesno brisanje fajla!</span>";
                        }else{
                            $s1='Location:predavanja.php?sifra=';
                            $s2=$_GET['sifra'];
                            $s=$s1.$s2;
                            header($s);
                        }
                    }
                }
                mysqli_free_result($result); //Oslobadjanje resurasa
                mysqli_close($con); //Zatvaranje konekcije sa bazom
                ?>
            </div>            
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
/** * TO DO:
*
* Ovde je moguce uraditi i dodavanje i azuriranje postojecih fajlova
* posto je trenutno podrzano samo brisanje i to je trazeno u projektu
*/
