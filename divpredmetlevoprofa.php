            <div id="predmetlevo">
                <ul type="disc">
                    <li><a href="nastavnik.php" target="">Pocetna strana</a></li>
                    <li><a href="nastavnikprofil.php" target="">Profil</a></li>
                </ul>
                    <span style="float: left;">Obavestenja</span><br/>
                    <ul>
                    <li><a href="dodajobavestenje.php" target="">Dodaj obavestenje</a></li>
                    <li><a href="azurirajobavestenje.php" target="">Azuriraj/obrisi obavestenje</a></li>
                    </ul>
                    <span style="float: left;">Predmeti</span><br/>
                    <ul>
                        <li><a href="nastavnikpredmeti.php" target="">Predmeti</a></li>
                </ul><br/>
                <span style="float: left;">Izloguj se</span><br/>
                <form method='post' action=''>
                    <input type='submit' name='logout' value='Logout' id="dugme" style="float: left;">
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