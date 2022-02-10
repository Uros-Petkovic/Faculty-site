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
        require('stilovi.css'); //CSS za dizajn
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
            require('divpredmetlevoadmin.php'); //div za levi side menu profesora
            ?>
            <div id="predmetdesno"><br/>
                <h1><b>Unesite novo obavestenje na sajt</b></h1><br/><br/>
                <?php
                require('konekcija.php'); //Konekcija sa bazom
                $result= mysqli_query($con, "select * from kategorija_obav");
                if(mysqli_num_rows($result)>0){
                    ?>
                <form method="post" action="" name="mojaforma" onsubmit="return(dodajobavestenjesajt())">
                    <table>
                        <tr>
                            <td id="kolona">
                                Izaberite kategoriju obavestenja:
                            </td>
                            <td id="kolona">
                                <select name="kategorija">
                                    <option value="">Izaberite kategoriju</option>
                                    <?php
                                    while($row= mysqli_fetch_assoc($result)){  //Bira se kategorija obavestenja
                                        ?>
                                    <option value="<?php echo$row['id']; ?>"><?php echo$row['naziv']; ?></option>    
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="kolona">
                               Naslov: 
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
                                <textarea name="sadrzaj" cols="80" rows="7" maxlength="250"></textarea>
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
                            <td colspan="2">
                                <input type="submit" name="unesi" value="Unesi obavestenje" id="dugme">
                            </td>
                        </tr>
                    </table>
                </form>    
                    <?php
                    mysqli_free_result($result); //Oslobadjanje resurasa
                }else{
                    echo"<span style='color:red'>Nema kategorija obavestenja za koju biste uneli novo obavestenje!</span>";
                }
                mysqli_close($con);
                ?>
                <?php
                if(isset($_POST['sadrzaj'])){
                    require('konekcija.php');
                    $result= mysqli_query($con, "insert into obavestenje_sajt (id_kat,naslov,sadrzaj,datum_objave,autor) values "
                            ."(".$_POST['kategorija'].",'".$_POST['naslov']."','".$_POST['sadrzaj']."','".$_POST['datum_objave']."','".$_SESSION['email']."')"); 
                    if(!$result){
                        echo"<span style='color:red'>Neuspesno dodavanje novog obavestenja!</span>";
                    }else{
                        header('dodajobavestenjesajt.php'); //Povratak nakon uspesne provere
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
