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
            require('divpredmetlevoadmin.php'); //levi side menu
            ?>
            <div id="predmetdesno"><br/>
                <h1><b>Izmenite ili dodajte kategoriju obavestenja</b></h1>
                <br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom i ispitivanje
                echo"<b>Izmeni postojece kategorije</b><br/>";
                $result= mysqli_query($con, "select * from kategorija_obav");
                if(mysqli_num_rows($result)>0){
                    ?>
                <form method="post" name="mojaforma" action="" onsubmit="return(izmenakategorije())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Izaberi kategoriju obavestenja:
                            </td>
                            <td id="kolona">
                                <select name="kategorija" onchange="this.form.submit()">
                                    <option value="" <?php if(!isset($_POST['kategorija']) || $_POST['kategorija']=='')echo"selected"; ?>>Izaberi kategoriju</option>
                                    <?php
                                    while($row= mysqli_fetch_assoc($result)){ //Biramo kategoriju obavestenja
                                        ?>
                                    <option value="<?php echo$row['id'] ?>" <?php if(isset($_POST['kategorija']) && $_POST['kategorija']==$row['id'])echo"selected"; ?>><?php echo$row['naziv']; ?></option>    
                                        <?php
                                    }
                                    ?>
                                </select>
                                <?php mysqli_free_result($result); ?>
                            </td>
                        </tr>
                        <?php
                        if(isset($_POST['kategorija'])){ //Ako je izabrana kategorija, pojavljuje se polje za promenu naziva kategorije
                            ?>
                        <tr>
                            <td id="kolona">
                                Izmeni naziv kategorije:
                            </td>
                            <td id="kolona">
                                <?php
                                $result= mysqli_query($con, "select * from kategorija_obav where id=".$_POST['kategorija']);
                                $row= mysqli_fetch_assoc($result);
                                ?>
                                <input type="text" maxlength="30" name="naziv" value="<?php echo$row['naziv']; ?>">
                                <?php
                                mysqli_free_result($result);
                                ?>
                            </td>
                        </tr> 
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="izmeni" id="dugme" value="Izmeni kategoriju">
                            </td>
                        </tr>
                            <?php
                        }
                        ?>
                    </table>
                </form>
                    <?php
                    if(isset($_POST['naziv'])){ //Menjamo naziv kategorije
                        $result= mysqli_query($con, "update kategorija_obav set naziv='".$_POST['naziv']."' where id=".$_POST['kategorija']);
                        if(!$result){
                            echo"<span style='color:red'>Neuspesna izmena kategorije!</span>";
                        }else{
                            header('Location:izmenakategorija.php');
                        }
                    }
                    ?>
                <br/><br/>
                <b>Dodavanje nove kategorije</b><br/>
                <form method="post" name="mojaforma1" action="" onsubmit="return(dodajkategoriju())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Naziv nove kategorije:
                            </td>
                            <td id="kolona">
                                <input type="text" maxlength="30" name="novakategorija">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="unesi" value="Unesi novu kategoriju" id="dugme">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                if(isset($_POST['novakategorija'])){ //Dodavanje nove kategorije medju vec postojece uz provere u JS
                    $result= mysqli_query($con, "insert into kategorija_obav (naziv) values ('".$_POST['novakategorija']."')");
                    if(!$result){
                        echo"<span style='color:red'>Neuspesan unos nove kategorije!</span>";
                    }else{
                        header('Location:izmenakategorija.php'); //Posle uspesnog dodavanja povratak na pocetnu stranicu za dodavanja
                    }
                }
                ?>
                    <?php
                }else{
                    echo"<span style='color:red'>Nema kategorija obavestenja!</span>";
                }
                mysqli_close($con);
                ?>
            </div>            
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
