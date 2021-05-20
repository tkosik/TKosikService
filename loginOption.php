<?php

            session_start();
            
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginOption</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<STYLE>A {text-decoration: none;} </STYLE>
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
                    <a href="http://localhost/projekt/#sing-up" class="button" id="signup">Wyloguj</a>
                </li>
            </ul>
        </div>
    </nav>
	
	    <div class="main" id="shop">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card2"><i class="fas fa-users-cog fa-10x"></i></div>
            </div>
            <div class="main__content">
			
            <?php

            session_start();
            require_once "connect.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            
            if($connection -> connect_errno!=0)
            {
                echo "Error".$connection->connect_errno;
            }else{
                $login = $_POST['login'];
                $password = $_POST['password'];
                
                $sql = "SELECT * FROM uzytkownicy where user='%s'";

                if($result = @$connection->query(sprintf(($sql),mysqli_real_escape_string($connection, $login))))
                {
                    $ammountUsers = $result->num_rows;
                    if($ammountUsers>0)
                    {
                        $row=$result->fetch_assoc();
                        if(password_verify($password, $row['pass']))
                        {
                            $_SESSION['zalogowany'] = true;
                            $_SESSION['user']=$row['user'];
                            $_SESSION['id']=$row['id'];
                            $result->free_result();
                            unset($_SESSION['blad']);
                            header('Location: indexLogIn.php');
                        }else{
                            $_SESSION['blad'] = '<span style="color:red"> Nieprawidłowy login lub hasło!</span>';
                             header('Location: login.php');
                        }
                    }else{
                    
                        $_SESSION['blad'] = '<span style="color:red"> Nieprawidłowy login lub hasło!</span>';
                        header('Location: login.php');
                        // echo '<h2>Błędny login lub hasło!</h2>';
                        // echo '<button class="main__btn"><a href="index.php">Powrót do strony głównej</a></button>';
                    }

                }

                $connection->close();
            }





            ?>

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