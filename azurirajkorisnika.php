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
        require('stilovi.css'); //Poziv css fajla
        ?>
        </style>
        <?php
        session_start(); //Pokretanje sesije i output buffering
        ob_start();
        ?>
        <script src="jsfajl.js"></script>
        <?php
        require('divheader.php'); //div za header
        ?>
        <?php 
        require('divmenu.php'); //div za menu
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevoadmin.php'); //div za levi side menu administratora
            ?>
            <div id="predmetdesno"><br/>
                <h1><b>Azurirajte/obrisite korisnika</b></h1><br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom i provera
                $result= mysqli_query($con, "select * from korisnik where tip_korisnika='S' or tip_korisnika='Z'");
                if(mysqli_num_rows($result)>0){
                    ?>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td id="kolona">
                                Izaberite korisnika:
                            </td>
                            <td id="kolona">
                                <select name="korisnik" onchange="this.form.submit()">
                                    <option value="" <?php if(!isset($_POST['korisnik']) || $_POST['korisnik']=='')echo"selected"; ?> > Izaberite korisnika </option>
                                    <?php  // Biramo korisnika kojeg zelimo da azuriramo
                                    while($row= mysqli_fetch_assoc($result)){
                                        ?>
                                    <option value="<?php echo$row['email']; ?>" <?php if(isset($_POST['korisnik']) && $_POST['korisnik']==$row['email'])echo"selected"; ?> >
                                        <?php
                                        if($row['tip_korisnika']=='S'){
                                            $result1= mysqli_query($con, "select * from student where email='".$row['email']."'");
                                            $row1= mysqli_fetch_assoc($result1);
                                            echo"<b>Student</b> - ".$row['ime']." ".$row['prezime'].", Indeks - ".$row1['indeks'];
                                            if($row1['tipstudija']=='d')echo", Osnovne studije";  // Ispisujemo informacije o tom korisniku
                                            if($row1['tipstudija']=='m')echo", Master studije";
                                            if($row1['tipstudija']=='p')echo", Doktorske studije";
                                            mysqli_free_result($result1);
                                        }else{
                                            $result1= mysqli_query($con, "select * from zaposleni where email='".$row['email']."'");
                                            $row1= mysqli_fetch_assoc($result1);
                                            echo"Zaposleni - ".$row['ime']." ".$row['prezime'].", Zvanje - ".$row1['zvanje'];
                                            mysqli_free_result($result1);
                                        }
                                        ?>
                                    </option>    
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
                        <?php
                        mysqli_free_result($result);
                        if(isset($_POST['korisnik'])){
                            $_SESSION['korisnik']=$_POST['korisnik'];
                            $result= mysqli_query($con, "select * from korisnik where email='".$_POST['korisnik']."'");
                            if(mysqli_num_rows($result)>0){
                                $row= mysqli_fetch_assoc($result);
                                if($row['tip_korisnika']=='S'){
                                    mysqli_free_result($result);
                                    $result= mysqli_query($con,"select * from student join korisnik on korisnik.email=student.email where student.email='".$_POST['korisnik']."'");
                                    if(mysqli_num_rows($result)>0){
                                        $row= mysqli_fetch_assoc($result); //Pravi se tabela i forma u kojoj se mogu raditi izmene korisnika
                                        ?>
                <form method="post" action="" name="mojaforma" onsubmit="return(azurirajkorisnika())">
                    <table>
                                            <tr>
                                                <td id="kolona">
                                                    Ime:
                                                </td>
                                                <td id="kolona">
                                                    <input type="text" name="ime" maxlength="15" value="<?php echo$row['ime']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="kolona">
                                                    Prezime:
                                                </td>
                                                <td id="kolona">
                                                    <input type="text" name="prezime" maxlength="32" value="<?php echo$row['prezime']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="kolona">
                                                    Tip studija:
                                                </td>
                                                <td id="kolona">
                                                    <input type="text" name="tipstudija" maxlength="32" value="<?php if($row['tipstudija']=='d')echo"Osnovne studije";if($row['tipstudija']=='m')echo"Master studije";if($row['tipstudija']=='p')echo"Doktorske studije"; ?>" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="kolona">
                                                    Broj indeksa:
                                                </td>
                                                <td id="kolona">
                                                    <input type="text" name="indeks" maxlength="10" placeholder="GGGG/BBBB" value="<?php echo$row['indeks']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="kolona">
                                                    Korisnicko ime(email):
                                                </td>
                                                <td id="kolona">
                                                    <input type="text" name="email" maxlength="32" value="<?php echo$row['email']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="kolona">
                                                    Lozinka:
                                                </td>
                                                <td id="kolona">
                                                    <input type="password" name="password" maxlength="32" value="<?php echo$row['password']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="kolona">
                                                    Status:
                                                </td>
                                                <td id="kolona">
                                                    <input type="radio" name="status" value="1" <?php if ($row['status'] == 1) echo"checked"; ?> >Aktivan
                                                    <input type="radio" name="status" value="0" <?php if ($row['status'] == 0) echo"checked"; ?> >Neaktivan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="submit" name="izmeni" value="Izmeni korisnika" id="dugme">
                                                </td>
                                            </tr>
                    </table>
                </form>
                <form method="post" action="">
                    <table>
                        <tr>
                                                <td>
                                                    <input type="submit" name="obrisi" value="Obrisi korisnika" id="dugme">
                                                </td>
                                            </tr> 
                    </table>
                </form>
                                        <?php
                                        mysqli_free_result($result); //Oslobadjanje resurasa 
                                    }else{
                                        echo"<span style='color:red'>Nemate informacije o sebi!</span>";
                                    }
                                }else{
                                    mysqli_free_result($result); //Oslobadjanje resurasa
                                    $result= mysqli_query($con,"select * from zaposleni join korisnik on korisnik.email=zaposleni.email where zaposleni.email='".$_POST['korisnik']."'");
                                    if(mysqli_num_rows($result)>0){
                                        $row= mysqli_fetch_assoc($result);
                                        ?>
                <form method="post" action="" name="mojaformaz" enctype="multipart/form-data" onsubmit="return(azurirajkorisnikaz())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Ime:
                            </td>
                            <td id="kolona">
                                <input type="text" name="imez" maxlength="15" value="<?php echo$row['ime']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Prezime:
                            </td>
                            <td id="kolona">
                                <input type="text" name="prezimez" max="32" value="<?php echo$row['prezime']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Status:
                            </td>
                            <td id="kolona">
                                <input type="radio" name="statusz" value="1" <?php if ($row['status'] == 1) echo"checked"; ?>>Aktivan
                                <input type="radio" name="statusz" value="0" <?php if ($row['status'] == 0) echo"checked"; ?>>Neaktivan
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Korisnicko ime(email):
                            </td>
                            <td id="kolona">
                                <input type="text" name="emailz" maxlength="32" value="<?php echo$row['email']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Lozinka:
                            </td>
                            <td id="kolona">
                                <input type="password" name="passwordz" maxlength="32" value="<?php echo$row['password']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Adresa:
                            </td>
                            <td id="kolona">
                                <input type="text" name="adresa" maxlength="32" value="<?php echo$row['adresa']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Mobilni telefon:
                            </td>
                            <td id="kolona">
                                <input type="text" name="mobilni" maxlength="20" value="<?php echo$row['mobilni']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Licni web sajt:
                            </td>
                            <td id="kolona">
                                <input type="text" name="licniweb" maxlength="100" value="<?php echo$row['licniweb']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Biografija:
                            </td>
                            <td id="kolona">
                                <textarea name="biografija" cols="80" rows="7" maxlength="350" value="<?php echo$row['biografija']; ?>"><?php echo$row['biografija']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Zvanje:
                            </td>
                            <td id="kolona">
                                <input type="text" name="zvanje" maxlength="32" value="<?php echo$row['zvanje']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Kabinet:
                            </td>
                            <td id="kolona">
                                <input type="text" name="kabinet" maxlength="20" value="<?php echo$row['kabinet']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Profilna slika:
                            </td>
                            <td id="kolona">
                                <?php
                                if(isset($row['profilna_slika'])){  // Moze azurirati sliku zaposlenog, staviti neku novu sliku
                                    ?><img src="<?php echo$row['profilna_slika'] ?>" width="170px" height="200px"><?php
                                }else{
                                    echo"<span style='color:red'>Nema profilne slike!</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Dodajte novu profilnu sliku:
                            </td>
                            <td id="kolona">
                                <input type="file" name="mojfajl">(Podrzava formate slike manje od 300x300px)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="izmeniz" value="Izmeni korisnika" id="dugme">
                            </td>
                        </tr>
                    </table>
                </form>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>
                                <input type="submit" name="obrisiz" value="Obrisi korisnika" id="dugme">
                            </td>
                        </tr>
                    </table>
                </form>
                                        <?php
                                        mysqli_free_result($result); //Oslobadjanje resurasa
                                    }else{
                                        echo"<span style='color:red'>Nemate informacije o sebi!</span>";
                                    }
                                }
                            }else{
                                echo"<span style='color:red'>Niste izabrali korisnika!</span>";  //Neuspeli izbor korisnika
                            }
                        }
                        ?>   
                    <?php
                }else{
                    echo"<span style='color:red'>Ne postoji nijedan korisnik u bazi!</span>";  //Slucaj kada ne postoji nijedan
                }
                mysqli_close($con);
                ?>
                <?php
                require('konekcija.php'); //Uspostavljanje konekcije sa bazom
                if(isset($_POST['status'])){ //U zavisnosti od setovanog dugmeta azuriramo ili brisemo korisnika
                    $result= mysqli_query($con,"update korisnik set email='".$_POST['email']."',password='".$_POST['password']."',ime='".$_POST['ime']."',prezime='".$_POST['prezime']."',status=".$_POST['status']." where email='".$_POST['email']."'");
                    $result1= mysqli_query($con, "update student set email='".$_POST['email']."',indeks='".$_POST['indeks']."' where email='".$_POST['email']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesan unos u bazu <b>korisnik</b>!</span>";
                    }
                    if(!$result1){
                        echo"<span style='color:red'>Neuspesan unos u bazu <b>student</b>!</span>";
                    }
                    if($result && $result1){
                        unset($_SESSION['korisnik']);
                        header('Location:azurirajkorisnika.php');
                    }
                }
                if(isset($_POST['obrisi'])){
                    $result= mysqli_query($con, "DELETE FROM korisnik where email='".$_SESSION['korisnik']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno brisanje korisnika!</span>";
                    }else{
                        unset($_SESSION['korisnik']);
                        header('Location:azurirajkorisnika.php');
                    }
                }
                if(isset($_POST['statusz'])){
                    if(!empty($_FILES['mojfajl']['name'])){ // U slucaju da smo dodali sliku, proveravamo ispravnost slike i upisujemo je
                        $ime = basename($_FILES['mojfajl']['name']);
                        $ekstenzija = $_FILES['mojfajl']['type'];
                        $temp = $_FILES['mojfajl']['tmp_name'];
	
                        $fleg = true;  //Proveravaju se ekstenzije koje se podrzavaju
                        $tipovi=array('image/jpeg', 'image/png','image/gif','application/pdf','application/zip','application/ppt','image/jpg');
                        if(!in_array($ekstenzija, $tipovi)){
                                echo "<span style='color:red'>Nije podrzan file za upload!</span>";
                                $fleg = false;
                        }
	
                        $putanja = "Slike/".$ime;
	
                        list($sirina, $visina, $tip) = getimagesize($temp);
                        define("MAX_SIRINA", 300); //Maksimalna sirina slike
                        define("MAX_VISINA", 300); //Maksimalna visina slike
                        if($sirina > MAX_SIRINA || $visina > MAX_VISINA){ //Provera parametara slike
                            echo"<span style='color:red'>Uneta je slika veca od dimenzija 300x300px!Pokusajte ponovo koristeci drugu sliku!</span>";
                            $fleg = false;
                        }
                        if($fleg){ //Ubacivanje slike u folder i bazu
                                if(move_uploaded_file($temp, $putanja)){
                                    $result= mysqli_query($con,"update korisnik set email='".$_POST['emailz']."',password='".$_POST['passwordz']."',ime='".$_POST['imez']."',prezime='".$_POST['prezimez']."',status=".$_POST['statusz']." where email='".$_POST['emailz']."'");
                                    $result1= mysqli_query($con, "update zaposleni set email='".$_POST['emailz']."',adresa='".$_POST['adresa']."',mobilni='".$_POST['mobilni']."',licniweb='".$_POST['licniweb']."',biografija='".$_POST['biografija']."',zvanje='".$_POST['zvanje']."',kabinet='".$_POST['kabinet']."',profilna_slika='$putanja' where email='".$_POST['emailz']."'");
                                    if(!$result){
                                        echo"<span style='color:red'>Neuspesan unos u bazu <b>korisnik</b>!</span>";
                                    }
                                    if(!$result1){
                                        echo"<span style='color:red'>Neuspesan unos u bazu <b>zaposleni</b>!</span>";
                                    }
                                    if($result && $result1){
                                        unset($_SESSION['korisnik']);
                                        header('Location:azurirajkorisnika.php');
                                    } 
                                } else {
                                        echo "<span style='color:red'>Neuspesan upload file-a!</span>";
                                }
                        }
                    }else{
                        $result= mysqli_query($con,"update korisnik set email='".$_POST['emailz']."',password='".$_POST['passwordz']."',ime='".$_POST['imez']."',prezime='".$_POST['prezimez']."',status=".$_POST['statusz']." where email='".$_POST['emailz']."'");
                        $result1= mysqli_query($con, "update zaposleni set email='".$_POST['emailz']."',adresa='".$_POST['adresa']."',mobilni='".$_POST['mobilni']."',licniweb='".$_POST['licniweb']."',biografija='".$_POST['biografija']."',zvanje='".$_POST['zvanje']."',kabinet='".$_POST['kabinet']."' where email='".$_POST['emailz']."'");
                        if(!$result){
                            echo"<span style='color:red'>Neuspesan unos u bazu <b>korisnik</b>!</span>";
                        }
                        if(!$result1){
                            echo"<span style='color:red'>Neuspesan unos u bazu <b>zaposleni</b>!</span>";
                        }
                        if($result && $result1){
                            unset($_SESSION['korisnik']);
                            header('Location:azurirajkorisnika.php');
                        }  
                    }
                }
                if(isset($_POST['obrisiz'])){  //Brisanje korisnika
                    $result= mysqli_query($con, "DELETE FROM korisnik where email='".$_SESSION['korisnik']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno brisanje korisnika!</span>";
                    }else{
                        unset($_SESSION['korisnik']);
                        header('Location:azurirajkorisnika.php');
                    }
                }
                mysqli_close($con);
                ?>
            </div>            
        </div>
        <?php require('divfooter.php'); ?>
    </body>
</html>
