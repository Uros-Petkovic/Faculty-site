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
            <h1><b>Servisi</b></h1>
            <?php
            require('spanlogout.php'); //Ovo je span u kome se nalazi dugme za logout
            ?>
            <br/><br/>
            <table align="center">
                <tr>
                    <td>
                        <a href="http://www.etf.rs" target="blank">Fakultet</a>
                    </td>                   
                </tr>
                <tr>
                    <td>
                        <a href="http://student.etf.rs" target="blank">Studentski servisi</a>
                    </td>                   
                </tr>
                <tr>
                    <td>
                        <a href="http://lists.etf.rs" target="blank">Mejling liste</a>
                    </td>                   
                </tr>
                <tr>
                    <td>
                        <a href="http://rti.etf.rs/sale" target="blank">Paviljon</a>
                    </td>                   
                </tr>
            </table>          
        </div>
        <?php 
        require('divfooter.php'); //div za footer
        ?>
    </body>
</html>