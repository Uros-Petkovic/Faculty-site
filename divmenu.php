        <div id="menu">
            <p>
                <?php 
                if(empty($_SESSION['tip_korisnika'])){
                    ?><a href="index.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='Z'){
                    ?><a href="nastavnik.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }elseif($_SESSION['tip_korisnika']=='A'){
                    ?><a href="administrator.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }else{
                    ?><a href="student.php" target="">Pocetna</a>&nbsp;|&nbsp;<?php
                }
                ?>
                <a href="zaposleni.php" target="">Zaposleni</a>&nbsp;|&nbsp;
                <a href="obavestenja.php" target="">Obavestenja</a>&nbsp;|&nbsp;
                <a href="osnovnestudije.php" target="">Osnovne studije</a>&nbsp;|&nbsp;
                <a href="masterstudije.php" target="">Master studije</a>&nbsp;|&nbsp;
                <a href="projekti.php" target="">Projekti</a>&nbsp;|&nbsp;
                <a href="servisi.php" target="">Servisi</a>&nbsp;|&nbsp;
                <a href="kontakt.php" target="">Kontakt</a>
            </p>
        </div>