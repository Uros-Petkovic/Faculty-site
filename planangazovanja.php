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
        require('divmenu.php'); //div menu
        ?>
        <div id="sadrzaj">
            <?php
            require('divpredmetlevoadmin.php'); //div za levi side menu administratora
            ?>
            <div id="predmetdesno"><br/>
                <h1><b>Plan angazovanja</b></h1><br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom i provera
                $result= mysqli_query($con, "select * from predmet");
                if(mysqli_num_rows($result)>0){
                    ?>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td id="kolona">
                                Izaberite predmet:
                            </td>
                            <td id="kolona">
                                <select name="predmet" onchange="this.form.submit()">
                                    <option value="" <?php if(!isset($_POST['predmet']) || $_POST['predmet']=='') echo"selected"; ?>>Izaberi predmet</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo$row['sifra'] ?>" <?php if(isset($_POST['predmet']) && $_POST['predmet']==$row['sifra']) echo"selected"; ?>>
                                        <?php echo$row['naziv'] . " - " . $row['sifra']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                        <?php
                            mysqli_free_result($result);
                        if(isset($_POST['predmet'])){
                            $_SESSION['predmet']=$_POST['predmet']; //Cuvamo u sesiji izabrani predmet
                            ?>
                    <table>
                        <tr>
                            <td id="kolona">
                                Izaberi grupu koju zelis da dodas:
                            </td>
                            <td id="kolona">
                                <select name="grupa" onchange="this.form.submit()">
                                    <option value="" <?php if(!isset($_POST['grupa']) || $_POST['grupa']=='') echo"selected"; ?>>Izaberi grupu</option>
                                    <option value="P1" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='P1') echo"selected"; ?>>P1</option>
                                    <option value="P2" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='P2') echo"selected"; ?>>P2</option>
                                    <option value="P3" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='P3') echo"selected"; ?>>P3</option>
                                    <option value="V1" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='V1') echo"selected"; ?>>V1</option>
                                    <option value="V2" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='V2') echo"selected"; ?>>V2</option>
                                    <option value="V3" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='V3') echo"selected"; ?>>V3</option>
                                    <option value="V4" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='V4') echo"selected"; ?>>V4</option>
                                    <option value="V5" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='V5') echo"selected"; ?>>V5</option>
                                    <option value="V6" <?php if(isset($_POST['grupa']) && $_POST['grupa']=='V6') echo"selected"; ?>>V6</option>
                                </select>
                                P&nbsp;-&nbsp;predavanja&nbsp;&nbsp;V&nbsp;-&nbsp;vezbe
                            </td>
                        </tr>
                    </table>
                </form>
                        <?php
                        if(isset($_POST['grupa'])){
                            $_SESSION['grupa']=$_POST['grupa']; //Cuvamo u sesiji izabranu grupu koju zelimo da menjamo
                            if($_POST['grupa'][0]=='V'){ //Ako su vezbe u pitanju
                                $result= mysqli_query($con, "select * from drzi_predmet where sifra_predmet='".$_POST['predmet']."' and grupa='".$_POST['grupa']."'");
                                if(mysqli_num_rows($result)>0){ //Ako postoje vec vezbe
                                    $row= mysqli_fetch_assoc($result);
                                    echo"<span style='color:red'>Vec postoji ".$row['grupa']." grupa za vezbe!Izaberite novu grupu ili izmenite postojecu.</span>";
                                    ?>
                <form method="post" action="" name="mojaforma1" onsubmit="return(planangazovanja1())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Nastavnik:
                            </td>
                            <td id="kolona">
                                <?php
                                $result1= mysqli_query($con, "select * from zaposleni join korisnik on zaposleni.email=korisnik.email where zaposleni.zvanje='docent' or zaposleni.zvanje='asistent' or zaposleni.zvanje='saradnik u nastavi'");
                                if(mysqli_num_rows($result1)>0){
                                    ?>
                                <select name="nastavnik1">
                                    <option value="">Izaberite nastavnika</option>
                                    <?php
                                    while($row1= mysqli_fetch_assoc($result1)){
                                        ?>
                                    <option value="<?php echo$row1['email']; ?>" <?php if($row['id_nastavnik']==$row1['email'])echo"selected"; ?>><?php echo$row1['ime']." ".$row1['prezime']." - Zvanje:".$row1['zvanje']; ?></option>    
                                        <?php
                                    }
                                    ?>
                                </select>  
                                    <?php
                                    mysqli_free_result($result1); //Oslobadjanje resurasa
                                }   
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sifra predmeta:
                            </td>
                            <td id="kolona">
                                <input type="text" maxlength="15" name="sifra1" value="<?php echo$row['sifra_predmet'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            $niz=explode(' ',$row['termin']); //Ovde razbijam string na delove kako bih uzeo pocetno i krajnje vreme termina
                            $niz1=explode('-',$niz[1]);
                            $niz2= substr($niz1[1],0,5);
                            ?>
                            <td id="kolona">
                                Dan u nedelji:
                            </td>
                            <td id="kolona">
                                <select name="dan1">
                                    <option value="">Izaberite dan</option>
                                    <option value="Ponedeljak" <?php if($niz[0]=='Ponedeljak')echo"selected"; ?>>Ponedeljak</option>
                                    <option value="Utorak" <?php if($niz[0]=='Utorak')echo"selected"; ?>>Utorak</option>
                                    <option value="Sreda" <?php if($niz[0]=='Sreda')echo"selected"; ?>>Sreda</option>
                                    <option value="Cetvrtak" <?php if($niz[0]=='Cetvrtak')echo"selected"; ?>>Cetvrtak</option>
                                    <option value="Petak" <?php if($niz[0]=='Petak')echo"selected"; ?>>Petak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin pocetka:
                            </td>
                            <td id="kolona">
                                <input type="time" name="pocetak1" value="<?php echo$niz1[0]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin kraja:
                            </td>
                            <td id="kolona">
                                <input type="time" name="kraj1" value="<?php echo$niz2; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sala:
                            </td>
                            <td id="kolona">
                                <input type="text" name="sala1" maxlength="32" value="<?php echo$row['sala']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="izmeni1" id="dugme" value="Izmeni angazovanje">
                            </td>
                        </tr>
                    </table>
                </form>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>
                                <input type="submit" name="obrisi1" id="dugme" value="Obrisi angazovanje">
                            </td>
                        </tr>
                    </table>
                </form>
                                    <?php
                                    mysqli_free_result($result); //Oslobadjanje resurasa
                                }else{
                                    ?>
                <form method="post" action="" name="mojaforma2" onsubmit="return(planangazovanja2())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Nastavnik:
                            </td>
                            <td id="kolona">
                                <?php
                                $result1= mysqli_query($con, "select * from zaposleni join korisnik on zaposleni.email=korisnik.email where zaposleni.zvanje='docent' or zaposleni.zvanje='asistent' or zaposleni.zvanje='saradnik u nastavi'");
                                if(mysqli_num_rows($result1)>0){
                                    ?>
                                <select name="nastavnik2">
                                    <option value="">Izaberite nastavnika</option>
                                    <?php
                                    while($row1= mysqli_fetch_assoc($result1)){
                                        ?>
                                    <option value="<?php echo$row1['email']; ?>"><?php echo$row1['ime']." ".$row1['prezime']." - Zvanje:".$row1['zvanje']; ?></option>    
                                        <?php
                                    }
                                    ?>
                                </select>  
                                    <?php
                                    mysqli_free_result($result1); //Oslobadjanje resurasa
                                }   
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sifra predmeta:
                            </td>
                            <td id="kolona">
                                <input type="text" maxlength="15" name="sifra2" value="<?php echo$_POST['predmet']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Dan u nedelji:
                            </td>
                            <td id="kolona">
                                <select name="dan2">
                                    <option value="">Izaberite dan</option>
                                    <option value="Ponedeljak">Ponedeljak</option>
                                    <option value="Utorak">Utorak</option>
                                    <option value="Sreda">Sreda</option>
                                    <option value="Cetvrtak">Cetvrtak</option>
                                    <option value="Petak">Petak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin pocetka:
                            </td>
                            <td id="kolona">
                                <input type="time" name="pocetak2">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin kraja:
                            </td>
                            <td id="kolona">
                                <input type="time" name="kraj2">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sala:
                            </td>
                            <td id="kolona">
                                <input type="text" name="sala2" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="unesi2" id="dugme" value="Unesi angazovanje">
                            </td>
                        </tr>
                    </table>
                </form>
                            <?php

                                }
                            }else{
                                //
                                $result= mysqli_query($con, "select * from drzi_predmet where sifra_predmet='".$_POST['predmet']."' and grupa='".$_POST['grupa']."'");
                                if(mysqli_num_rows($result)>0){
                                    $row= mysqli_fetch_assoc($result);
                                    echo"<span style='color:red'>Vec postoji ".$row['grupa']." grupa za predavanja!Izaberite novu grupu ili izmenite postojecu.</span>";
                                    ?>
                <form method="post" action="" name="mojaforma3" onsubmit="return(planangazovanja3())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Nastavnik:
                            </td>
                            <td id="kolona">
                                <?php
                                $result1= mysqli_query($con, "select * from zaposleni join korisnik on zaposleni.email=korisnik.email where zaposleni.zvanje='redovni profesor' or zaposleni.zvanje='docent' or zaposleni.zvanje='vanredni profesor'");
                                if(mysqli_num_rows($result1)>0){
                                    ?>
                                <select name="nastavnik3">
                                    <option value="">Izaberite nastavnika</option>
                                    <?php
                                    while($row1= mysqli_fetch_assoc($result1)){
                                        ?>
                                    <option value="<?php echo$row1['email']; ?>" <?php if($row['id_nastavnik']==$row1['email'])echo"selected"; ?>><?php echo$row1['ime']." ".$row1['prezime']." - Zvanje:".$row1['zvanje']; ?></option>    
                                        <?php
                                    }
                                    ?>
                                </select>  
                                    <?php
                                    mysqli_free_result($result1);
                                } 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sifra predmeta:
                            </td>
                            <td id="kolona">
                                <input type="text" maxlength="15" name="sifra3" value="<?php echo$row['sifra_predmet'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            $niz=explode(' ',$row['termin']); //Isto delim string na delove za pocetak i kraj termina
                            $niz1=explode('-',$niz[1]);
                            $niz2= substr($niz1[1],0,5);
                            ?>
                            <td id="kolona">
                                Dan u nedelji:
                            </td>
                            <td id="kolona">
                                <select name="dan3">
                                    <option value="">Izaberite dan</option>
                                    <option value="Ponedeljak" <?php if($niz[0]=='Ponedeljak')echo"selected"; ?>>Ponedeljak</option>
                                    <option value="Utorak" <?php if($niz[0]=='Utorak')echo"selected"; ?>>Utorak</option>
                                    <option value="Sreda" <?php if($niz[0]=='Sreda')echo"selected"; ?>>Sreda</option>
                                    <option value="Cetvrtak" <?php if($niz[0]=='Cetvrtak')echo"selected"; ?>>Cetvrtak</option>
                                    <option value="Petak" <?php if($niz[0]=='Petak')echo"selected"; ?>>Petak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin pocetka:
                            </td>
                            <td id="kolona">
                                <input type="time" name="pocetak3" value="<?php echo$niz1[0]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin kraja:
                            </td>
                            <td id="kolona">
                                <input type="time" name="kraj3" value="<?php echo$niz2; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sala:
                            </td>
                            <td id="kolona">
                                <input type="text" name="sala3" maxlength="32" value="<?php echo$row['sala']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="izmeni3" id="dugme" value="Izmeni angazovanje">
                            </td>
                        </tr>
                    </table>
                </form>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>
                                <input type="submit" name="obrisi3" id="dugme" value="Obrisi angazovanje">
                            </td>
                        </tr>
                    </table>
                </form>
                                    <?php
                                    mysqli_free_result($result);
                                }else{
                                    ?>
                <form method="post" action="" name="mojaforma4" onsubmit="return(planangazovanja4())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Nastavnik:
                            </td>
                            <td id="kolona">
                                <?php
                                $result1= mysqli_query($con, "select * from zaposleni join korisnik on zaposleni.email=korisnik.email where zaposleni.zvanje='redovni profesor' or zaposleni.zvanje='docent' or zaposleni.zvanje='docent'");
                                if(mysqli_num_rows($result1)>0){
                                    ?>
                                <select name="nastavnik4">
                                    <option value="">Izaberite nastavnika</option>
                                    <?php
                                    while($row1= mysqli_fetch_assoc($result1)){
                                        ?>
                                    <option value="<?php echo$row1['email']; ?>"><?php echo$row1['ime']." ".$row1['prezime']." - Zvanje:".$row1['zvanje']; ?></option>    
                                        <?php
                                    }
                                    ?>
                                </select>  
                                    <?php
                                    mysqli_free_result($result1);
                                }   
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sifra predmeta:
                            </td>
                            <td id="kolona">
                                <input type="text" maxlength="15" name="sifra4" value="<?php echo$_POST['predmet']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Dan u nedelji:
                            </td>
                            <td id="kolona">
                                <select name="dan4">
                                    <option value="">Izaberite dan</option>
                                    <option value="Ponedeljak">Ponedeljak</option>
                                    <option value="Utorak">Utorak</option>
                                    <option value="Sreda">Sreda</option>
                                    <option value="Cetvrtak">Cetvrtak</option>
                                    <option value="Petak">Petak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin pocetka:
                            </td>
                            <td id="kolona">
                                <input type="time" name="pocetak4">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Termin kraja:
                            </td>
                            <td id="kolona">
                                <input type="time" name="kraj4">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sala:
                            </td>
                            <td id="kolona">
                                <input type="text" name="sala4" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="unesi14" id="dugme" value="Unesi angazovanje">
                            </td>
                        </tr>
                    </table>
                </form>
                            <?php

                                }
                            }
                        }
                        ?>
                            <?php
                        }
                        ?>   
                    <?php
                }else{
                    echo"<span style='color:red'>Nema predmeta!</span>";
                }
                
                mysqli_close($con); //Zatvaranje konekcije sa bazom
                ?>
                <?php
                require('konekcija.php'); //Konekcija sa bazom
                if(isset($_POST['sala1'])){ //Ako je forma prosla, izmenimo angazovanje
                    $string1=$_POST['dan1']." ".$_POST['pocetak1']."-".$_POST['kraj1']."h";
                    $result= mysqli_query($con, "update drzi_predmet set id_nastavnik='".$_POST['nastavnik1']."',sala='".$_POST['sala1']."',termin='$string1' where sifra_predmet='".$_SESSION['predmet']."' and grupa='".$_SESSION['grupa']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesna izmena angazovanja!</span>";
                    }else{
                        unset($_SESSION['predmet']);
                        unset($_SESSION['grupa']);
                        header('Location:planangazovanja.php'); //Posle uspesne izmene povratak na pocetnu
                    }
                }
                if(isset($_POST['sala2'])){ //Nakon uspesne forme unosi se novo angazovanje
                    $string2=$_POST['dan2']." ".$_POST['pocetak2']."-".$_POST['kraj2']."h";
                    $result= mysqli_query($con, "insert into drzi_predmet (id_nastavnik,sifra_predmet,grupa,termin,sala,nastava) values "
                            ."('".$_POST['nastavnik2']."','".$_SESSION['predmet']."','".$_SESSION['grupa']."','$string2','".$_POST['sala2']."','vezbe')");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesan unos angazovanja!</span>";
                    }else{
                        unset($_SESSION['predmet']);
                        unset($_SESSION['grupa']);
                        header('Location:planangazovanja.php'); //Posle uspesnog unosa povratak na pocetnu
                    }
                }
                if(isset($_POST['sala3'])){
                    $string3=$_POST['dan3']." ".$_POST['pocetak3']."-".$_POST['kraj3']."h";
                    $result= mysqli_query($con, "update drzi_predmet set id_nastavnik='".$_POST['nastavnik3']."',sala='".$_POST['sala3']."',termin='$string3' where sifra_predmet='".$_SESSION['predmet']."' and grupa='".$_SESSION['grupa']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesna izmena angazovanja!</span>";
                    }else{
                        unset($_SESSION['predmet']);
                        unset($_SESSION['grupa']);
                        header('Location:planangazovanja.php'); //Posle uspene izmene povratak na pocetnu
                    }
                }
                if(isset($_POST['sala4'])){
                    $string4=$_POST['dan4']." ".$_POST['pocetak4']."-".$_POST['kraj4']."h";
                    $result= mysqli_query($con, "insert into drzi_predmet (id_nastavnik,sifra_predmet,grupa,termin,sala,nastava) values "
                            ."('".$_POST['nastavnik4']."','".$_SESSION['predmet']."','".$_SESSION['grupa']."','$string4','".$_POST['sala4']."','predavanje')");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesan unos angazovanja!</span>";
                    }else{
                        unset($_SESSION['predmet']);
                        unset($_SESSION['grupa']);
                        header('Location:planangazovanja.php'); //Posle uspesnog unosa povratak na pocetnu
                    }
                }
                if(isset($_POST['obrisi1'])){
                    $result= mysqli_query($con, "DELETE FROM drzi_predmet where sifra_predmet='".$_SESSION['predmet']."' and grupa='".$_SESSION['grupa']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno brisanje angazovanja!</span>";
                    }else{
                        unset($_SESSION['predmet']);
                        unset($_SESSION['grupa']);
                        header('Location:planangazovanja.php'); //Posle uspesnog brisanja povratak na pocetnu
                    }
                }
                if(isset($_POST['obrisi3'])){
                    $result= mysqli_query($con, "DELETE FROM drzi_predmet where sifra_predmet='".$_SESSION['predmet']."' and grupa='".$_SESSION['grupa']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno brisanje angazovanja!</span>";
                    }else{
                        unset($_SESSION['predmet']);
                        unset($_SESSION['grupa']);
                        header('Location:planangazovanja.php'); //Posle uspesnog brisanja povratak na pocetnu
                    }
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