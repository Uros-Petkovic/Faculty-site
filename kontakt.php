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
            <h1><b>Kontakt</b></h1>
            <?php 
            require('spanlogout.php'); //Ovo je span gde se nalazi logout dugme
            ?>
            <br/>
            <h3><b>Adresa: Bulevar kralja Aleksandra 73, Beograd, Srbija</b></h3>
            <br/>
            <br/>
            <table align="center">
                <tr>
                    <td>
                        <h4><b>Dekanat</b></h4>
                        <br/>
                        (011) 324-8464
                        <br/>
                        (011) 324-8681
                        <br/>
                        <a href="mailto:dekanat@etf.bg.ac.rs">dekanat@etf.bg.ac.rs</a>&nbsp;&nbsp;
                    </td>
                    <td>
                        <h4><b>Studentski odsek</b></h4>
                        <br/>
                        Dragana Trenevski
                        <br/>
                        (011) 3226-760
                        <br/>
                        <a href="mailto:stud_sluzba@etf.bg.ac.rs">stud_sluzba@etf.bg.ac.rs</a>&nbsp;&nbsp;
                    </td>
                    <td>
                        <h4><b>Opsti odsek</b></h4>
                        <br/>
                        Milos Nalovic
                        <br/>
                        (011) 3226-992
                        <br/>
                        <a href="mailto:opsta_sluzba@etf.bg.ac.rs">opsta_sluzba@etf.bg.ac.rs</a>&nbsp;&nbsp;
                    </td>
                    <td>
                        <h4><b>Racunovodstvo</b></h4>
                        <br/>
                        Mirjana Vlajkovic
                        <br/>
                        (011) 3370-146
                        <br/>
                        (011) 3370-077
                    </td>
                    <td>
                        <h4><b>RTI katedra</b></h4>
                        <br/>
                        dr Nenad Korolija
                        <br/>
                        (011) 3218-389, Paviljon 26
                        <br/>
                        <a href="mailto:nenadko@etf.rs">nenadko@etf.rs</a>
                    </td>                     
                </tr>
            </table>           
        </div>
        <?php
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>
