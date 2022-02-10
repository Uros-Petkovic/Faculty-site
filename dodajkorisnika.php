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
                <h1><b>Unesi novog korisnika</b></h1><br/><br/>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td id="kolona">
                                Tip korisnika:
                            </td>
                            <td id="kolona">
                                <select name="tip_korisnika" onchange="this.form.submit();">
                                    <option value="" <?php if(!isset($_POST['tip_korisnika']) || $_POST['tip_korisnika']=='')echo"selected"; ?>>Izaberi tip korisnika</option>
                                    <option value="S" <?php if(isset($_POST['tip_korisnika']) && $_POST['tip_korisnika']=='S') echo"selected"; ?>>Student</option>
                                    <option value="Z" <?php if(isset($_POST['tip_korisnika']) && $_POST['tip_korisnika']=='Z') echo"selected"; ?>>Zaposleni</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
                        <?php
                        if(isset($_POST['tip_korisnika'])){
                            $_SESSION['tip_korisnikaF']=$_POST['tip_korisnika']; //Cuvamo u sesiji kako bismo kasnije mogli da to iskoristimo za upis
                            if($_POST['tip_korisnika']=='S'){ //Ovo je slucaj kada je korisnik student
                                ?>
                <form method="post" action="" name="mojaforma" onsubmit="return(dodajkorisnika())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Ime:
                            </td>
                            <td id="kolona">
                                <input type="text" name="ime" maxlength="15">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Prezime:
                            </td>
                            <td id="kolona">
                                <input type="text" name="prezime" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Tip studija:
                            </td>
                            <td id="kolona">
                               <input type="radio" name="tipstudija" value="d" >Osnovne studije 
                               <input type="radio" name="tipstudija" value="m" >Master studije 
                               <input type="radio" name="tipstudija" value="p" >Doktorske studije 
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Broj indeksa:
                            </td>
                            <td id="kolona">
                                <input type="text" name="indeks" maxlength="10" placeholder="GGGG/BBBB">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Korisnicko ime(email):
                            </td>
                            <td id="kolona">
                                <input type="text" name="email" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Lozinka:
                            </td>
                            <td id="kolona">
                                <input type="password" name="password" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Status:
                            </td>
                            <td id="kolona">
                                <input type="radio" name="status" value="1">Aktivan
                                <input type="radio" name="status" value="0">Neaktivan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="unesi" value="Unesi korisnika" id="dugme">
                            </td>
                        </tr>
                    </table>
                </form>
                                <?php //Slucaj kada je korisnik zaposleni
                            }else{
                            ?>
                <form method="post" action="" enctype="multipart/form-data" name="mojaformaz" onsubmit="return(dodajkorisnikaz())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Ime:
                            </td>
                            <td id="kolona">
                                <input type="text" name="imez" maxlength="15">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Prezime:
                            </td>
                            <td id="kolona">
                                <input type="text" name="prezimez" max="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Status:
                            </td>
                            <td id="kolona">
                                <input type="radio" name="statusz" value="1">Aktivan
                                <input type="radio" name="statusz" value="0">Neaktivan
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Korisnicko ime(email):
                            </td>
                            <td id="kolona">
                                <input type="text" name="emailz" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Lozinka:
                            </td>
                            <td id="kolona">
                                <input type="password" name="passwordz" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Adresa:
                            </td>
                            <td id="kolona">
                                <input type="text" name="adresa" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Mobilni telefon:
                            </td>
                            <td id="kolona">
                                <input type="text" name="mobilni" maxlength="20" value="">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Licni web sajt:
                            </td>
                            <td id="kolona">
                                <input type="text" name="licniweb" maxlength="100" value="">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Biografija:
                            </td>
                            <td id="kolona">
                                <textarea name="biografija" cols="80" rows="7" maxlength="350"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Zvanje:
                            </td>
                            <td id="kolona">
                                <input type="text" name="zvanje" maxlength="32">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Kabinet:
                            </td>
                            <td id="kolona">
                                <input type="text" name="kabinet" maxlength="20">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Profilna slika:
                            </td>
                            <td id="kolona">
                                <input type="file" name="mojfajl" id="mojfajl1">(Podrzava formate slike manje od 300x300px)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="unesiz" value="Unesi korisnika" id="dugme">
                            </td>
                        </tr>
                    </table>
                </form>
                            <?php
                            }
                        }
                        ?>
                <?php
                if(isset($_POST['status'])){ //Ako je sve u JS dobro, mozemo upisati korisnika,tj. studenta
                    require('konekcija.php');
                    $result= mysqli_query($con, "insert into korisnik (email,password,ime,prezime,status,tip_korisnika,prvi_pristup) values "
                            ."('".$_POST['email']."','".$_POST['password']."','".$_POST['ime']."','".$_POST['prezime']."',".$_POST['status'].",'".$_SESSION['tip_korisnikaF']."',0)");
                    $result1= mysqli_query($con, "insert into student (email,indeks,tipstudija) values ('".$_POST['email']."','".$_POST['indeks']."','".$_POST['tipstudija']."')");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesan unos u bazu <b>korisnik</b>!</span>";
                    }
                    if(!$result1){
                        echo"<span style='color:red'>Neuspesan unos u bazu <b>student</b>!</span>";
                    }
                    if($result && $result1){
                        unset($_SESSION['tip_korisnikaF']);
                        header('Location:dodajkorisnika.php');
                    }
                    mysqli_close($con);
                }
                ?>
                <?php
                if(isset($_POST['imez'])){ //Ako je u JS sve dobro, mozemo upisati zaposlenog
                    require('konekcija.php');
                    if(!empty($_FILES['mojfajl']['name'])){ //Ako smo stavili sliku, provera parametara za sliku
                        $ime = basename($_FILES['mojfajl']['name']);
                        $ekstenzija = $_FILES['mojfajl']['type'];
                        $temp = $_FILES['mojfajl']['tmp_name'];
	
                        $fleg = true;
                        $tipovi=array('image/jpeg', 'image/png','image/gif','application/pdf','application/zip','application/ppt','image/jpg');
                        if(!in_array($ekstenzija, $tipovi)){
                                echo "<span style='color:red'>Nije podrzan file za upload!</span>";
                                $fleg = false;
                        }
	
                        $putanja = "Slike/".$ime;
	
                        list($sirina, $visina, $tip) = getimagesize($temp);
                        define("MAX_SIRINA", 300);
                        define("MAX_VISINA", 300);
                        if($sirina > MAX_SIRINA || $visina > MAX_VISINA){
                            echo"<span style='color:red'>Uneta je slika veca od dimenzija 300x300px!Pokusajte ponovo koristeci drugu sliku!</span>";
                            $fleg = false;
                        }
                        if($fleg){
                                if(move_uploaded_file($temp, $putanja)){
                                    $result= mysqli_query($con, "insert into korisnik (email,password,ime,prezime,status,tip_korisnika,prvi_pristup) values "
                                        ."('".$_POST['emailz']."','".$_POST['passwordz']."','".$_POST['imez']."','".$_POST['prezimez']."',".$_POST['statusz'].",'".$_SESSION['tip_korisnikaF']."',0)");
                                    $result1= mysqli_query($con, "insert into zaposleni (email,adresa,mobilni,licniweb,biografija,zvanje,kabinet,profilna_slika) values "
                                            ."('".$_POST['emailz']."','".$_POST['adresa']."','".$_POST['mobilni']."','".$_POST['licniweb']."','".$_POST['biografija']."','".$_POST['zvanje']."','".$_POST['kabinet']."','$putanja')");
                                    if(!$result){
                                        echo"<span style='color:red'>Neuspesan unos u bazu <b>korisnik</b>!</span>";
                                    }
                                    if(!$result1){
                                        echo"<span style='color:red'>Neuspesan unos u bazu <b>zaposleni</b>!</span>";
                                    }
                                    if($result && $result1){
                                        unset($_SESSION['tip_korisnikaF']);
                                        header('Location:dodajkorisnika.php');
                                    } 
                                } else {
                                        echo "<span style='color:red'>Neuspesan upload file-a!</span>";
                                }
                            mysqli_close($con);  
                        }
                    }else{
                        $result= mysqli_query($con, "insert into korisnik (email,password,ime,prezime,status,tip_korisnika,prvi_pristup) values "
                            ."('".$_POST['emailz']."','".$_POST['passwordz']."','".$_POST['imez']."','".$_POST['prezimez']."',".$_POST['statusz'].",'".$_SESSION['tip_korisnikaF']."',0)");
                        $result1= mysqli_query($con, "insert into zaposleni (email,adresa,mobilni,licniweb,biografija,zvanje,kabinet,profilna_slika) values "
                                ."('".$_POST['emailz']."','".$_POST['adresa']."','".$_POST['mobilni']."','".$_POST['licniweb']."','".$_POST['biografija']."','".$_POST['zvanje']."','".$_POST['kabinet']."','Slike/avatar_musko.png')");
                        if(!$result){
                            echo"<span style='color:red'>Neuspesan unos u bazu <b>korisnik</b>!</span>";
                        }
                        if(!$result1){
                            echo"<span style='color:red'>Neuspesan unos u bazu <b>zaposleni</b>!</span>";
                        }
                        if($result && $result1){
                            unset($_SESSION['tip_korisnikaF']);  //Brisanje iz sesije promenljive koja vise nije potrebna
                            header('Location:dodajkorisnika.php'); //Povratak na pocetnu stranicu ako je uspesna izmena
                        }  
                    }
                    mysqli_close($con); //Zataranje konekcije sa bazom
                }
                ?>
            </div>            
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>