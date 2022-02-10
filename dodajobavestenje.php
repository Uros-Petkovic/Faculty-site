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
        require('divmenu.php'); //div za menu
        ?>
        <div id="sadrzaj">
            <?php 
            require('divpredmetlevoprofa.php');
            ?>
            <div id="predmetdesno">
                <br/>
                <h1><b>Dodavanje novog obavestenja na predmetu</b></h1>
                <br/>
                <?php
                require('konekcija.php'); //Uspostavljanje konekcije sa bazom
                $result= mysqli_query($con, "select * from drzi_predmet where id_nastavnik='".$_SESSION['email']."'");
                if(mysqli_num_rows($result)>0){
                    ?>
                <form method="post" action="" name="mojaforma" enctype="multipart/form-data" onsubmit="return(dodajobavestenje())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Izaberite predmet:
                            </td>
                            <td id="kolona" >
                                <select name="predmet" onchange="this.form.submit()">
                                    <option value="" <?php if(!isset($_POST['predmet']) || $_POST['predmet']=='') echo"selected"; ?>>Izaberite predmet</option>
                                    <?php
                                    while($row= mysqli_fetch_assoc($result)){
                                        ?>
                                    <option value="<?php echo$row['sifra_predmet'] ?>" <?php if(isset($_POST['predmet']) && $_POST['predmet']==$row['sifra_predmet']) echo"selected"; ?>>
                                    <?php
                                    $result1= mysqli_query($con,"select * from predmet where sifra='".$row['sifra_predmet']."'");
                                    $row1= mysqli_fetch_assoc($result1);
                                    echo$row1['naziv']." - ".$row1['sifra'];
                                    mysqli_free_result($result1);
                                    ?>
                                    </option>    
                                        <?php
                                    }
                                    mysqli_free_result($result);
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <?php
                        if(isset($_POST['predmet'])){ //Ako je setovano dugme za predmet, otvara se forma za dodavanje obavestenja
                            ?>
                        <tr>
                            <td id="kolona">
                                Naslov obavestenja:
                            </td>
                            <td id="kolona">
                                <input type="text" name="naslov" maxlength="50">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Sadrzaj:
                            </td>
                            <td id="kolona">
                                <textarea maxlength="500" cols="100" rows="10" name="sadrzaj"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Datum objave:
                            </td>
                            <td id="kolona">
                                <input type="date" name="datum_objave" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                                Dodavanje fajlova:
                            </td>
                            <td id="kolona">
                                <input type="file" name="mojfajl[]" multiple>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="dodaj" value="Dodaj obavestenje" id="dugme">
                            </td>
                        </tr>
                         
                            <?php
                        }
                        ?>
                    </table>
                </form>
                <?php
                if(isset($_POST['naslov'])){ //Ako je forma ispravna, moze se uneti novo obavestenje
                    $result= mysqli_query($con, "insert into obavestenje_predmet (id_predmet,naslov,sadrzaj,datum_objave,id_nastavnik) values ('".$_POST['predmet']."','".$_POST['naslov']."','".$_POST['sadrzaj']."','".$_POST['datum_objave']."','".$_SESSION['email']."')");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesan unos obavestenja!</span>";
                    }else{
                        $r=0;
                        for($i=0;$i<sizeof($_FILES['mojfajl']['name']);$i++){ //Ako postoje fajlovi, ubacujemo fajlove
                            $ime=$_FILES['mojfajl']['name'][$i];
                            $ekstenzija=$_FILES['mojfajl']['type'][$i];
                            $temp = $_FILES['mojfajl']['tmp_name'][$i];
                            $fleg=true;
                            $tipovi=array('image/jpeg', 'image/png','image/gif','application/pdf','application/zip','application/ppt','image/jpg');
                            if(!in_array($ekstenzija, $tipovi)){
                                $k=$i+1;
                                echo "Nije podrzan $k. fajl za upload!";
                                $fleg = false;
                            }
                            $putanja = "Fajlovi/".$ime;
                            if($fleg){
                                if(move_uploaded_file($temp, $putanja)){
                                    $result1= mysqli_query($con, "select * from obavestenje_predmet order by id_obav DESC limit 1");
                                    $row1= mysqli_fetch_assoc($result1);
                                    mysqli_free_result($result1);
                                    echo$putanja;
                                    $result= mysqli_query($con, "insert into fajl_uz_obavestenje (id_obav,putanja) values (".$row1['id_obav'].",'$putanja')");
                                    if(!$result){
                                        $r=$r+1;
                                        $j=$i+1;
                                        echo"<span style='color:red'>Neuspesan unos $j. fajla!</span>";
                                    }
                                }
                            }
                        }
                        if($r==0){
                            header('Location:dodajobavestenje.php'); //Odlazak na pocetnu stranicu nakon uspesnog dodavanja
                        }
                    }
                
                }
                ?>
                    <?php
                }else{
                    echo"<span style='color:red'>Niste angazovani ni na jednom predmetu!</span>";
                }
                mysqli_close($con); //Zatvaranje konekcije
                ?>
            </div>            
        </div>
        <?php require('divfooter.php'); ?>
    </body>
</html>