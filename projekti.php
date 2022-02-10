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
        require('divmenu.php');  //div za menu sa opcijama ka stranicama
        ?>
        <div id="sadrzaj">
            <h1><b>Projekti</b></h1>
            <?php
            require('spanlogout.php');//Ovde se nalazi logout dugme
            ?>
            <br/>
            <br/>
            <table align="center">
                <tr>
                    <td>
                        <h4><b>Partneri</b></h4>
                        <br/>
                        <a href="https://nordeus.com/" target="blank">Nordeus</a>
                        <br/>
                        <a href="https://www.endava.com/" target="blank">Endava</a>
                        <br/>
                        <a href="https://www.nvidia.com/en-eu/geforce/" target="blank">Nvidia</a>
                    </td>
                    <td>
                        <h4><b>Diplomski radovi</b></h4>
                        <br/>&nbsp;&nbsp;
                        <a href="https://rti.etf.bg.ac.rs/dokumenti/diplomski/Izbor%20mentora%20i%20teme%20diplomskog%20ili%20master%20rada.pdf" target="blank">Obavestenje o roku za izbor teme</a>
                        &nbsp;&nbsp;<br/>
                        <a href="https://rti.etf.bg.ac.rs/dokumenti/RTI_Mentori_osnovne_studije_2018.pdf" target="blank">Spisak mogucih mentora</a>
                        <br/>
                        <a href="https://rti.etf.bg.ac.rs/diplomski/index.php" target="blank">Spisak predlozenih tema</a>
                    </td>
                    <td>
                        <h4><b>Istrazivacke grupe</b></h4>
                        <br/>
                        <a href="http://rti.etf.bg.ac.rs/rti/ebi/" target="blank">EbiGroup</a>
                        <br/>
                        <a href="https://rti.etf.bg.ac.rs/rti/acm/" target="blank">ACMGroup</a>
                        <br/>
                        &nbsp;
                    </td>                    
                </tr>
            </table>          
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
