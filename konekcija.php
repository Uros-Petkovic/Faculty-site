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
    </head>
    <body>
        <?php
            $con= mysqli_connect('localhost','root','','etfsajt');
            if(mysqli_connect_errno()){
                echo"<span style='color:red'>Greska pri konekciji!</span>";
                exit();
            }
        ?>
    </body>
</html>

