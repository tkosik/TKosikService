<?php
            session_start();
            if(((!$_SESSION['zalogowany']==true)))
            {
                header('Location: indexLogIn.php');
                exit();
            }
            
            if(isset($_POST['email']))
            {
                //Udana walidacja
                $allOK = true;

                //Check registerLogin
                $registerLogin = $_POST['registerLogin'];
                $firstName = $_POST['firstName'];
                $surrname = $_POST['surrname'];
                //check length
                if((strlen($registerLogin) < 3) || (strlen($registerLogin) > 12))
                {
                    $allOK = false;
                    $_SESSION['e_login']="Login musi posiadać od 3 do 12 znaków";
                }

                if(ctype_alnum($registerLogin)==false)
                {
                    $allOK = false;
                    $_SESSION['e_login']="Login może składać się tylko z liter i liczb (bez polskich znaków).";
                }
                
                $email = $_POST['email'];
                $emailSafe = filter_var($email, FILTER_SANITIZE_EMAIL);


                if((filter_var($emailSafe, FILTER_VALIDATE_EMAIL)==false) || ($emailSafe != $email))
                {
                    $allOK = false;
                    $_SESSION['e_email']="Nieprawidłowy e-mail";
                }

                //check password
                $registerpassword = $_POST['registerpassword'];
                $registerpassword2 = $_POST['registerpassword2'];

                if((strlen($registerpassword) < 5) || (strlen($registerpassword) > 15))
                {
                    $allOK = false;
                    $_SESSION['e_registerpassword']="Hasło musi posiadać od 5 do 15 znaków";
                }

                if($registerpassword!=$registerpassword2)
                {
                    $allOK = false;
                    $_SESSION['e_registerpassword2']="Hasła muszą być identyczne";
   
                }

                $hashPassword = password_hash($registerpassword, PASSWORD_DEFAULT);
                

                if((!isset($_POST['Regulamin']) || !isset($_POST['Rodo'])))
                {
                    $allOK = false;
                    $_SESSION['e_regulamin']="Należy zaakceptować regulamin oraz zgodę na przetwarzanie danych";
                }

                //Robot

                $secretKey = "6Le4nsQaAAAAABngmcrYQxzU_MLh2U_Wy7lj1A1W";

                $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);

                $response = json_decode($check);

                if($response->success==false)
                {
                    $allOK = false;
                    $_SESSION['e_bot']="Potwierdź, że jesteś człowiekiem";
                }

                //add to sql
                require_once "connect.php";
                mysqli_report(MYSQLI_REPORT_STRICT);
                try{

                    $connection = new mysqli($host, $db_user, $db_password, $db_name);
                    if($connection -> connect_errno!=0) {
                        throw new Exception(mysqli_connect_errno());
                    }else{
                        //mail exist

                        $result = $connection->query("SELECT id FROM uzytkownicy where email='$email'");
                        if(!$result) throw new Exception($connection->error);

                        $ammountMails = $result->num_rows;
                        if($ammountMails>0)
                        {
                            $allOK = false;
                            $_SESSION['e_email']="Istnieje już taki e-mail";
                        }
                        //login exist
                        $result = $connection->query("SELECT id FROM uzytkownicy where user='$registerLogin'");
                        if(!$result) throw new Exception($connection->error);
                        $ammountLogin = $result ->num_rows;
                        if($ammountLogin>0)
                        {
                            $allOK = false;
                            $_SESSION['e_login']="Istnieje już taki użytkownik";
                        }

                        if($allOK == true)
                        {
                            //append user
                            if($connection->query("INSERT INTO uzytkownicy VALUES (NULL,'$registerLogin','$hashPassword','$email',NULL,'$firstName','$surrname')")){
                            $_SESSION['successRegister']=true;
                            header('Location: loginAfterRegister.php');
                            }else{
                            throw new Exception($connection->error);
                        }
                        

                        $connection->close();
                    }
                    }
                }catch(Exception $e){
                    echo '<span style="color:red;">Błąd serwera! Przepraszamy.</span>';
                    echo '<br />Informacja dev: '.$e;
                }
                
            }

            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<style>
.error
{
    color: red;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
<body>

    <!---Nagłowek
    klasa u góry - pasek-->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="#home" id="navbar__logo">Tomasz Kosik</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/#home" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/#about" class="navbar__links" id="about-page">O mnie</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/#cooperation" class="navbar__links" id="about-page">Współpraca</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/#services" class="navbar__links" id="services-page">Kontakt</a>
                </li>
				  <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/#shop" class="navbar__links" id="shop-page">Cennik</a>
                </li>
				<li class="navbar__btn">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="login.php" class="button" id="signup">Zaloguj  się</a>
                </li>
            </ul>
        </div>
    </nav>
	
	    <div class="main" id="shop">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card4"><i class="fas fa-users-cog fa-10x"></i></div>
            </div>
            <div class="main__content">
			
            <form action="" method="post">

            <h2>Imię:</h2>  <input type="text" name="firstName" /> <br/>
            <br></br>
            <h2>Nazwisko:</h2>  <input type="text" name="surrname" /> <br/>
            <br></br>
            <h2>Login:</h2>  <input type="text" name="registerLogin" /> <br/>

            <?php

            if(isset($_SESSION['e_login']))
            {
                echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                unset($_SESSION['e_login']);
            }

            ?>
            <br></br>
            <!-- <br></br> -->
            <h2>Adres e-mail:</h2>  <input type="text" name="email" /> <br/>
            <?php

                 if(isset($_SESSION['e_email']))
                    {
                      echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                      unset($_SESSION['e_email']);
                     }

            ?>
            <br></br>
            <h2>Hasło:</h2> <input type="password" name="registerpassword"/>
            <?php
            if(isset($_SESSION['e_registerpassword']))
            {
                echo '<div class="error">'.$_SESSION['e_registerpassword'].'</div>';
                unset($_SESSION['e_registerpassword']);
            }
            ?>
            <br></br>
            <h2>Powtórz hasło:</h2> <input type="password" name="registerpassword2"/>
            <?php
            if(isset($_SESSION['e_registerpassword2']))
            {
                echo '<div class="error">'.$_SESSION['e_registerpassword2'].'</div>';
                unset($_SESSION['e_registerpassword2']);
            }
            ?>

            <br></br>
            <h2>Wskaż wielkość firmy:</h2>
            </br>
            <label class="container">Niewielka firma
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Średnia firma
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Większa firma
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Korporacja
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>


            </br>
            <h2>Wymagania:</h2>
            </br>
            <label class="container">Akceptuje regulamin
                <input type="checkbox" name="Regulamin" />
                <span class="checkmark"></span>
            </label>
            <label class="container">Zgoda na przetwarzanie danych osobowych
                <input type="checkbox" name="Rodo" />
                <span class="checkmark"></span>
            </label>


            <!-- <label>
            <input type="checkbox" name="Regulamin" /> Akceptuje regulami
            </label>
            <br></br>
        
            <label>
                <input type="checkbox" name="Rodo" /> Zgoda na przetwarzanie danych osobowych
            </label> -->

            <?php
            if(isset($_SESSION['e_regulamin']))
            {
                echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                unset($_SESSION['e_regulamin']);
            }
            ?>
            <br></br>
            
            <div class="g-recaptcha" data-sitekey="6Le4nsQaAAAAAHcxtAGkwXPRNTYgRVN5HjLnA941"></div>
            <?php
            if(isset($_SESSION['e_bot']))
            {
                echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                unset($_SESSION['e_bot']);
            }
            ?>
            <br></br>

            <button class="main__btn" type="submit">Zarejestruj się</button>



            </form>

            <!-- <?php
            
            if(isset($_SESSION['blad'])){
                echo $_SESSION['blad'];
            }
            ?> -->
            <br></br>



            </div>
        </div>
    </div>

    <!--Stopka-->

    <div class="footer__container">
        <div class="footer__links">
            <div class="footer__link--wrapper">
                <div class="footer__link--items">
                    <h2>O firmie</h2>
                    <a href="/sign-up" style="color:white">Jak działamy </a>
                    <a href="/sign-up" style="color:white">Parterzy</a>
                    <a href="/sign-up" style="color:white">Szkolenia</a>
                    <a href="/sign-up" style="color:white">Tutoriale</a>
                </div>
                <div class="footer__link--items">
                    <h2>Media</h2>
                    <a href="https://www.facebook.com/WhyySoSerioouss/" style="color:white" class="social__icon--link" target="_blank"><i class="fab fa-facebook"></i></a>
                   <a href="/" class="social__icon--link" style="color:white"><i class="fab fa-instagram"></i></a>
                   <a href="/" class="social__icon--link" style="color:white"><i class="fab fa-linkedin"></i></a>
                   <a href="/" class="social__icon--link" style="color:white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer__link--wrapper">
                <div class="footer__link--items">
                    <h2>O firmie</h2>
                    <a href="/sign-up" style="color:white">Jak działamy</a>
                    <a href="/sign-up" style="color:white">Parterzy</a>
                    <a href="/sign-up" style="color:white">Szkolenia</a>
                    <a href="/sign-up" style="color:white">Tutoriale</a>
                </div>
                <div class="footer__link--items">
                    <h2>O firmie</h2>
                    <a href="/sign-up" style="color:white">Jak działamy</a>
                    <a href="/sign-up" style="color:white">Parterzy</a>
                    <a href="/sign-up" style="color:white">Szkolenia</a>
                    <a href="/sign-up" style="color:white">Tutoriale</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
	
</body>
</html>

</body>
</html>