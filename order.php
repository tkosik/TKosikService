<?php

            
            if(!isset($_SESSION['zalogowany']) || !$_SESSION['zalogowany']==true )
            {
                // header('Location: login.php');
                // exit();
            }
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamowienie</title>
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
                    <a href="http://localhost/projekt/indexLogIn.php#home" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/indexLogIn.php#about" class="navbar__links" id="about-page">O mnie</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/indexLogIn.php#cooperation" class="navbar__links" id="about-page">Współpraca</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/indexLogIn.php#services" class="navbar__links" id="services-page">Kontakt</a>
                </li>
				  <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="http://localhost/projekt/indexLogIn.php#shop" class="navbar__links" id="shop-page">Cennik</a>
                </li>
				<li class="navbar__btn">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="login.php" class="button" id="signup">Wyloguj</a>
                </li>
            </ul>
        </div>
    </nav>
	
	    <div class="main" id="shop">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card2"><i class="fas fa-shopping-cart fa-10x"></i></div>
            </div>
            <div class="main__content">
			
			<?php
		
                    $projectTime = $_POST['projectTime'];
                    $amountPersons = $_POST['amountPersons'];
                    
                    $suma = $_POST['projectTime'] * 900 * $amountPersons;
					
echo<<<END

               
					<h2>Podsumowanie zamówienia</h2>
					<table border="1" cellpadding="10" cellspacing="1">
					<tr>
						<td><h1>Czas trwania projektu (900zł/dzień)</h2></td><td><h1>$time</h1></td>
					</tr>
					
					<tr>
						<td><h1>Ilość osób w zespole</h1></td><td><h1>$persons</h1></td>
					</tr>
					
					<tr>
						<td><h2>Suma (PLN)</h2></td><td><h2>$suma</h2></td>
					</tr>
					
                    <br></br>
                    </table>

                    <h2><a href= "index.php"></a></h2>
					<button class="main__btn"><a href="http://localhost/projekt/indexLogIn.php">Powrót do strony głównej</a></button>
					
					
END;
		
				?>
 <!--               <button class="main__btn"><a href="#"></a>Zadzwoń</button> -->
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