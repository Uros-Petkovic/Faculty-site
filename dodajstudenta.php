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
        require('divmenu.php'); //div za menu
        ?>
        <div id="sadrzaj">
            <?php
            require('divpredmetlevoadmin.php'); //div za levi side menu
            ?>
            <div id="predmetdesno"><br/>
                <h1><b>Dodavanje studenata na predmet</b></h1>
                <br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom
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
                                    <option value="" <?php if(!isset($_POST['predmet']) || $_POST['predmet']=='') echo"selected"; ?>>Izaberite predmet</option>
                                    <?php
                                    while($row= mysqli_fetch_assoc($result)){ //Bira se predmet na kome hocemo da dodamo studenat da slusa
                                        ?>
                                        <option value="<?php echo$row['sifra'] ?>" <?php if(isset($_POST['predmet']) && $_POST['predmet']==$row['sifra']) echo"selected"; ?>><?php
                                        echo$row['naziv']." - ".$row['sifra'];
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
                    if(isset($_POST['predmet'])){ //Ako je setovan predmet, izlsitavamo sve studente koji trenutno ne slusaju predmet
                        $result= mysqli_query($con, "select * from student join korisnik on student.email=korisnik.email");
                        if(mysqli_num_rows($result)>0){
                            ?>
                    <tr>
                        <td id="kolona">
                            Izaberite studenta:
                        </td>
                        <td id="kolona">
                            <select name="student">
                                <option value="">Izaberite studenta</option>
                                <?php
                                while($row= mysqli_fetch_assoc($result)){
                                    $result1= mysqli_query($con, "select * from prati_predmet where id_student='".$row['email']."' and sifra_predmet='".$_POST['predmet']."'");
                                    if(mysqli_num_rows($result1)==0){
                                        ?>
                                <option value="<?php echo$row['email']; ?>"><?php  //Ispisujemo informacije o studentu
                                            echo$row['ime']." ".$row['prezime']." Indeks:".$row['indeks']." ";
                                            if($row['tipstudija']=='d')echo"Osnovne studije";
                                            if($row['tipstudija']=='m')echo"Master studije";
                                            if($row['tipstudija']=='p')echo"Doktorske studije";
                                        ?>
                                </option>    
                                        <?php
                                            mysqli_free_result($result1); //Oslobadjanje resurasa
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" id="dugme" name="dodaj" value="Dodaj studenta">
                        </td>
                    </tr>
                            <?php
                            mysqli_free_result($result); //Oslobadjanje resurasa
                        }else{
                            echo"<span style='color:red'>Nema studenata u bazi!</span>";
                        }
                    }
                    ?>
                    </table>
                </form>    
                    <?php
                }else{
                    echo"<span style='color:red'>Nema predmeta u bazi!</span>";
                }
                mysqli_close($con);
                ?>
                <?php
                require('konekcija.php');
                if(isset($_POST['dodaj'])){ //Ako je prosla forma, mozemo dodati studenta da slusa odredjeni predmet
                    $result= mysqli_query($con, "insert into prati_predmet (id_student,sifra_predmet) values ('".$_POST['student']."','".$_POST['predmet']."')");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno dodavanje studenta!</span>";
                    }else{
                        header('Location:dodajstudenta.php'); //Po uspesnom dodavanju vracamo se na pocetnu stranicu za dodavanje
                    }
                }
                mysqli_close($con);
                ?>
                <br/><br/>
                
                <h1><b>Brisanje studenata sa predmeta</b></h1>
                <br/><br/>
                <?php
                require('konekcija.php');
                $result= mysqli_query($con, "select * from predmet"); //Takodje, na slican nacin brisanje studenata
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
                                    <option value="" <?php if(!isset($_POST['predmet']) || $_POST['predmet']=='') echo"selected"; ?>>Izaberite predmet</option>
                                    <?php
                                    while($row= mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo$row['sifra'] ?>" <?php if(isset($_POST['predmet']) && $_POST['predmet']==$row['sifra']) echo"selected"; ?>><?php
                                        echo$row['naziv']." - ".$row['sifra'];
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
                    if(isset($_POST['predmet'])){
                        $result= mysqli_query($con, "select * from student join korisnik on student.email=korisnik.email");
                        if(mysqli_num_rows($result)>0){
                            ?>
                    <tr>
                        <td id="kolona">
                            Izaberite studenta:
                        </td>
                        <td id="kolona">
                            <select name="student">
                                <option value="">Izaberite studenta</option>
                                <?php
                                while($row= mysqli_fetch_assoc($result)){
                                    $result1= mysqli_query($con, "select * from prati_predmet where id_student='".$row['email']."' and sifra_predmet='".$_POST['predmet']."'");
                                    if(mysqli_num_rows($result1)>0){
                                        ?>
                                <option value="<?php echo$row['email']; ?>"><?php 
                                            echo$row['ime']." ".$row['prezime']." Indeks:".$row['indeks']." ";
                                            if($row['tipstudija']=='d')echo"Osnovne studije";
                                            if($row['tipstudija']=='m')echo"Master studije";
                                            if($row['tipstudija']=='p')echo"Doktorske studije";
                                        ?>
                                </option>    
                                        <?php
                                            mysqli_free_result($result1);
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" id="dugme" name="obrisi" value="Obrisi studenta">
                        </td>
                    </tr>
                            <?php
                            mysqli_free_result($result);
                        }else{
                            echo"<span style='color:red'>Nema studenata u bazi!</span>";
                        }
                    }
                    ?>
                    </table>
                </form>    
                    <?php
                }else{
                    echo"<span style='color:red'>Nema predmeta u bazi!</span>";
                }
                mysqli_close($con);
                ?>
                <?php
                require('konekcija.php');
                if(isset($_POST['obrisi'])){ //Ako je setovano, obrisemo ga
                    $result= mysqli_query($con, "DELETE FROM prati_predmet where id_student='".$_POST['student']."' and sifra_predmet='".$_POST['predmet']."'");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno brisanje studenta!</span>";
                    }else{
                        header('Location:dodajstudenta.php');
                    }
                }
                mysqli_close($con);
                ?>
            </div>            
        </div>
        <?php
        require('divfooter.php');
        ?>
    </body>
</html>
