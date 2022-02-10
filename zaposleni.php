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
        require('divmenu.php'); //div za footer
        ?>
        <div id="sadrzaj">
            <h1><b>Zaposleni na katedri</b></h1>
            <?php 
            require('spanlogout.php');//Span gde se nalazi dugme za logout
            ?>
            <br/>
            <br/>
            <?php
            require('konekcija.php'); //Konekcija sa bazom
            $result= mysqli_query($con, "select * from zaposleni join korisnik on zaposleni.email=korisnik.email ORDER BY zaposleni.id_zaposleni ASC");
            if(mysqli_num_rows($result)>0){
                ?>
            <table width="50%">
                <tr style="background-color: royalblue;color: white;">
                    <td>Ime</td>
                    <td>Prezime</td>
                    <td>Zvanje</td>
                    <td>Predmeti koje drzi</td>
                </tr>
                <?php
                while($row= mysqli_fetch_assoc($result)){
                    ?>
                <tr id="red">
                    <td style="border: 1px solid royalblue; border-collapse: collapse;"><a href="infoprofa.php?id_zaposleni=<?php echo $row['id_zaposleni']?>"><?php echo $row['ime'] ?></a></td>
                    <td style="border: 1px solid royalblue; border-collapse: collapse;"><a href="infoprofa.php?id_zaposleni=<?php echo $row['id_zaposleni']?>"><?php echo $row['prezime'] ?></a></td>
                    <td style="border: 1px solid royalblue; border-collapse: collapse;"><?php echo $row['zvanje'] ?></td>
                    <td style="border: 1px solid royalblue; border-collapse: collapse;">
                        <?php
                        $result1= mysqli_query($con, "select * from drzi_predmet join predmet on drzi_predmet.sifra_predmet=predmet.sifra where drzi_predmet.id_nastavnik='".$row['email']."'");
                        if(mysqli_num_rows($result1)>0){
                            $flag=0; //Promenljiva koja se koristi kao indikator da postoje predmeti koje drzi trenutni profesor
                            while($row1= mysqli_fetch_assoc($result1)){
                                if($row1['aktivan']==1){
                                    $flag=$flag+1;
                                }
                            }
                            if($flag>0){ //Ako je flag veci od nula, postoje predmeti koje drzi
                                
                                $result2= mysqli_query($con, "select * from drzi_predmet join predmet on drzi_predmet.sifra_predmet=predmet.sifra where drzi_predmet.id_nastavnik='".$row['email']."'");
                                while($row2= mysqli_fetch_assoc($result2)){
                                    if($row2['aktivan']==1){
                                        echo $row2['naziv']."<br/>";
                                    }
                                }
                            
                    mysqli_free_result($result2);
                                    }else{
                                echo"Ne drzi nijedan predmet";
                            }
                        
                            mysqli_free_result($result1);
                                    }else{
                            echo"Ne drzi nijedan predmet";
                        }
                        ?>
                    </td>
                </tr>
                    <?php
                }?>
            </table>
                <?php
            
                mysqli_free_result($result); //Oslobadjanje resurasa
                                    }else{
                echo"<span style='color:red'>Nema zaposlenih!</span>";
            }
            mysqli_close($con); //Zatvaranje konekcije sa bazom
            ?>            
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
