            <span style="float: left;">
                 <?php
                 if(!empty($_SESSION['email'])){
                     echo"<b>Izloguj se</b><br/>";
                     ?>
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
                 }
                 ?>               
            </span>
