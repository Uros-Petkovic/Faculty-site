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
        session_start(); //Pokretanje sesije i output buffering
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
            require('divpredmetlevoprofa.php'); //div za levi side menu profesora
            ?>
            <div id="predmetdesno">
                <?php
                require('konekcija.php'); //Konekcija sa bazom
                echo"<h2><b>Ovde mozete azurirati obavestenja ili obrisati ono koje ste postavili na neki predmet.</b></h2>";
                $result= mysqli_query($con, "select * from drzi_predmet where id_nastavnik='".$_SESSION['email']."'");
                if(mysqli_num_rows($result)>0){
                    mysqli_free_result($result);
                    $result= mysqli_query($con, "select DISTINCT drzi_predmet.sifra_predmet from drzi_predmet join obavestenje_predmet on drzi_predmet.sifra_predmet=obavestenje_predmet.id_predmet where drzi_predmet.id_nastavnik='".$_SESSION['email']."'");
                    if(mysqli_num_rows($result)>0){
                        ?>
                <form method="post" action="" name="mojaforma" enctype="multipart/form-data" onsubmit="return(azurirajobavestenje())">
                    <table>
                        <tr>
                            <td id="kolona">
                    Izaberite predmet:
                            </td>
                            <td id="kolona">
                    <select name="predmet" onchange="this.form.submit()">
                        <option value="" <?php if(!isset($_POST['predmet']) || $_POST['predmet']=='') echo"selected"; ?>>Izaberite predmet</option>
                        <?php
                        while($row= mysqli_fetch_assoc($result)){ //Bira se predmet na kome hocemo da azuriramo obavestenje
                            ?>
                        <option value="<?php echo$row['sifra_predmet'] ?>" <?php if(isset($_POST['predmet']) && $_POST['predmet']==$row['sifra_predmet']) echo"selected"; ?>><?php
                                $result1= mysqli_query($con, "select * from predmet where sifra='".$row['sifra_predmet']."'");
                                $row1= mysqli_fetch_assoc($result1);
                                echo$row1['naziv']." - ".$row1['sifra'];
                                mysqli_free_result($result1);
                                ?>
                        </option>    
                            <?php
                        }
                        mysqli_free_result($result); //Oslobadjanje resurasa
                        
                        ?>
                    </select>
                            </td>
                    </tr>
                    <?php
                    if(isset($_POST['predmet'])){ //Ako je setovan predmet, izbaci sva obavestenja koja taj predmet ima
                        $result= mysqli_query($con,"select * from obavestenje_predmet where id_predmet='".$_POST['predmet']."'");
                        ?>
                    <tr>
                        <td id="kolona">
                            Izaberite obavestenje:
                        </td>
                        <td id="kolona">
                            <select name="obavestenje" onchange="this.form.submit()">
                                <option value="" <?php if(!isset($_POST['obavestenje']) || $_POST['obavestenje']=='') echo"selected"; ?>>Izaberi obavestenje</option>
                                <?php
                                while($row= mysqli_fetch_assoc($result)){
                                    ?>
                                <option value="<?php echo$row['id_obav'] ?>" <?php if(isset($_POST['obavestenje']) && $_POST['obavestenje']==$row['id_obav']) echo"selected"; ?>><?php echo$row['naslov']; ?></option>    
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>    
                        <?php
                    
                        mysqli_free_result($result); //Oslobadjanje resurasa
                    }
                    ?>
                    <?php
                    if(isset($_POST['obavestenje'])){ //Ako je setovano obavestenje, izbaciti formu za azuriranje
                        $result= mysqli_query($con, "select * from obavestenje_predmet where id_obav=".$_POST['obavestenje']);
                        $row= mysqli_fetch_assoc($result);
                        ?>
                    <tr>
                        <td id="kolona">
                            Naslov obavestenja:
                        </td>
                        <td id="kolona">
                            <input type="text" name="naslov" value="<?php echo$row['naslov']; ?>" maxlength="50">
                        </td>
                    </tr>
                    <tr>
                        <td id="kolona">
                            Sadrzaj:
                        </td>
                        <td id="kolona">
                            <textarea maxlength="500" cols="100" rows="10" name="sadrzaj"><?php echo$row['sadrzaj']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td id="kolona">
                            Datum objave:
                        </td>
                        <td id="kolona">
                            <input type="date" name="datum_objave" value="<?php echo$row['datum_objave']; ?>" readonly>
                        </td>
                    </tr>
                    <?php
                        mysqli_free_result($result);
                        $result= mysqli_query($con, "select * from fajl_uz_obavestenje where id_obav=".$_POST['obavestenje']);
                        $i=1;
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                ?>
                    <tr>
                        <td id="kolona">
                            <?php echo"Fajl $i:" ?>
                        </td>
                        <td id="kolona">
                            <a href="<?php echo$row['putanja'] ?>" target="self">Link ka fajlu</a>&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="brisanje[]" value="<?php echo$row['id_fajl']; ?>">&nbsp;&nbsp;&nbsp;
                            (Cekiraj za brisanje)
                        </td>
                    </tr>
                                <?php
                                $i=$i+1;  //Promenljiva za ispisivanje rednog broja obavestenja
                            }
                        
                            mysqli_free_result($result);    //Oslobadjanje resurasa
                        }else{
                            echo"<span style='color:red'>Nema fajlova uz ovo obavestenje!</span>";
                        }
                    ?>
                    <tr>
                        <td id="kolona">
                            Dodavanje novih fajlova:
                        </td>
                        <td id="kolona">
                            <input type="file" name="mojfajl[]" multiple>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="izmeni" value="Izmeni obavestenje" id="dugme">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="obrisi" value="Obrisi obavestenje" id="dugme">
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                    </table>
                </form>
                <?php
                if(isset($_POST['naslov'])){ //Ako je setovana forma i proverena i brisanje, obrisi prethodne fajlove
                    if(isset($_POST['brisanje'])){
                        echo$_POST['brisanje'];
                        for($i=0;$i<sizeof($_POST['brisanje']);$i++){ //Ako postoje fajlovi, obrisi fajlove
                            $result1= mysqli_query($con, "DELETE FROM fajl_uz_obavestenje where id_fajl=".$_POST['brisanje'][$i]);
                            if(!$result1){
                                echo"<span style='color:red'>Neuspesno brisanje fajla!</span>";
                            }
                        }
                    }
                    for($i=0;$i<sizeof($_FILES['mojfajl']['name']);$i++){  //Ako su selektovani novi fajlovi, ubaci nove fajlove u bazu
                        $ime=$_FILES['mojfajl']['name'][$i];
                        $ekstenzija=$_FILES['mojfajl']['type'][$i];
                        $temp = $_FILES['mojfajl']['tmp_name'][$i];
                        $fleg=true;
                        $tipovi=array('image/jpeg', 'image/png','image/gif','application/pdf','application/zip','application/ppt','image/jpg');
                        if(!in_array($ekstenzija, $tipovi)){
                            $k=$i+1;
                            echo "<span style='color:red'>Nije podrzan $k. fajl za upload!</span>";
                            $fleg = false;
                        }
                        $putanja = "Fajlovi/".$ime;
                        if($fleg){
                            if(move_uploaded_file($temp, $putanja)){
                                $result= mysqli_query($con, "insert into fajl_uz_obavestenje (id_obav,putanja) values (".$_POST['obavestenje'].",'$putanja')");
                                if(!$result){
                                    $j=$i+1;
                                    echo"<span style='color:red'>Neuspesan unos $j. fajla!</span>";
                                }
                            }
                        }
                        
                    }

                        $result= mysqli_query($con,"update obavestenje_predmet set naslov='".$_POST['naslov']."',sadrzaj='".$_POST['sadrzaj']."' where id_obav=".$_POST['obavestenje']);
                        if(!$result){
                            echo"<span style='color:red'>Neuspesno azuriranje obavestenja!</span>";
                        }else{
                            header('Location:azurirajobavestenje.php');
                        }
                    
                }
                if(isset($_POST['obrisi'])){ //Ako je setovano brisanje, obrisi dato obavestenje
                    $result1= mysqli_query($con,"select * from obavestenje_predmet where id_obav=".$_POST['obavestenje']);
                    $row1= mysqli_fetch_assoc($result1);
                    if($row1['id_nastavnik']==$_SESSION['email']){
                        $result= mysqli_query($con, "DELETE FROM obavestenje_predmet where id_obav=".$_POST['obavestenje']);
                        if(!$result){
                            echo"<span style='color:red'>Neuspesno brisanje obavestenja!</span>";
                        }else{
                            header('Location:azurirajobavestenje.php');
                        }
                    }else{
                        echo"<span style='color:red'>Ne mozete obrisati obavestenje koje niste Vi postavili!</span>";
                    }
                    mysqli_free_result($result1);
                }
                ?>
                        <?php
                    }else{
                        echo"<span style='color:red'>Nema nijednog obavestenja na predmetima na kojima ste angazovani!</span>";
                    }
                }else{
                    echo"<span style='color:red'>Niste angazovani ni na jednom predmetu!</span>";
                }
                mysqli_close($con);
                ?>
            </div>            
        </div>
        <?php require('divfooter.php'); ?>
    </body>
</html>