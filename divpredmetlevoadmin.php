            <div id="predmetlevo">
                <ul type="disc">
                    <li><a href="administrator.php" target="">Pocetna strana</a></li>
                </ul>
                    <span style="float: left;">Korisnici</span><br/>
                    <ul>
                    <li><a href="dodajkorisnika.php" target="">Dodaj novog korisnika</a></li>
                    <li><a href="azurirajkorisnika.php" target="">Azuriraj/obrisi korisnika</a></li>
                    </ul>
                    <span style="float: left;">Obavestenja</span><br/>
                    <ul>
                        <li><a href="izmenakategorija.php" target="">Izmena kategorija</a></li>
                        <li><a href="dodajobavestenjesajt.php" target="">Dodaj novo obavestenje</a></li>
                </ul>
                    <span style="float: left;">Plan angazovanja</span><br/>
                <ul>
                    <li><a href="planangazovanja.php" target="">Plan angazovanja</a></li>
                    <li><a href="dodajstudenta.php" target="">Dodavanje/brisanje studenata na predmetima</a></li>
                </ul>
                    <br/>
                <span style="float: left;">Izloguj se</span><br/>
                <form method='post' action=''>
                    <input type='submit' id="dugme" name='logout' value='Logout' style="float: left;">
                </form>        
                <?php
                if (isset($_POST['logout'])) {
                    unset($_SESSION['email']);
                    unset($_SESSION['password']);
                    unset($_SESSION['tip_korisnika']);
                    unset($_SESSION['prvi_pristup']);
                    session_destroy();
                    header('Location:index.php');
                }
                ?>
            </div>
