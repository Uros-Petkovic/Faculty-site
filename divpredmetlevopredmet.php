            <div id="predmetlevo">
                <ul type="disc">
                    <li><a href="predmet.php?sifra=<?php echo $_GET['sifra'] ?>" target="">Pocetna strana</a></li>
                    <li><a href="predmet_informacije.php?sifra=<?php echo $_GET['sifra'] ?>" target="">Informacije o predmetu</a></li>
                    <li><a href="predmet_predavanja.php?sifra=<?php echo $_GET['sifra'] ?>" target="">Predavanja</a></li>
                    <li><a href="predmet_vezbe.php?sifra=<?php echo $_GET['sifra'] ?>" target="">Vezbe</a></li>
                    <li><a href="predmet_ispiti.php?sifra=<?php echo $_GET['sifra'] ?>" target="">Ispitna pitanja</a></li>
                    <?php 
                    require('konekcija.php');
                    if($_SESSION['tip_korisnika']=='S'){
                        ?> 
                    <li>
                        <?php
                        $result= mysqli_query($con, "select * from zaprati where sifra_predmet='".$_GET['sifra']."' and id_student='".$_SESSION['email']."'");
                        if(mysqli_num_rows($result)>0){
                            ?><form method="post" action=""><input type="submit" id="dugme" name="otprati" value="OTPRATI PREDMET"></form>
                            <br/>
                            <span style="color:red">Pratite obavestenja o ovom predmetu!</span> 
                            <?php
                            mysqli_free_result($result);
                        }else{
                            ?><form method="post" action=""><input type="submit" id="dugme" name="zaprati" value="ZAPRATI PREDMET"></form>
                                <br/>
                                <span style="color:red">Ne pratite obavestenja o ovom predmetu!</span>   
                            <?php
                        }
                        ?>
                    </li> 
                        <?php
                    }
                    if(isset($_POST['zaprati'])){
                        $result= mysqli_query($con, "insert into zaprati (sifra_predmet,id_student) values ('".$_GET['sifra']."','".$_SESSION['email']."')");
                        $s1='Location:predmet.php?sifra=';
                        $s2=$_GET['sifra'];
                        $s=$s1.$s2;
                        header($s);            
                    }
                    if(isset($_POST['otprati'])){
                        $result= mysqli_query($con, "DELETE from zaprati where sifra_predmet='".$_GET['sifra']."' and id_student='".$_SESSION['email']."'");
                        $s1='Location:predmet.php?sifra=';
                        $s2=$_GET['sifra'];
                        $s=$s1.$s2;
                        header($s);            
                    }
                    mysqli_close($con);
                    ?>
                </ul>
            <span style="float: left;">
                 <?php
                 if(!empty($_SESSION['email'])){
                     echo"Izloguj se<br/>";
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
            </div>
