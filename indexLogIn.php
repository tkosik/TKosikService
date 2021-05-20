<?php

            session_start();
            
            if(!isset($_SESSION['zalogowany']) || !$_SESSION['zalogowany'] == true )
            {
                header('Location: login.php');
                exit();
            }
            
            if(isset($_POST['projectTime']))
            {
     
                    $varOk = true;
                    
                    //Check input values
                    $projectTime = $_POST['projectTime'];
                    $amountPersons = $_POST['amountPersons'];

                    $projectTime = (int)$projectTime;
                    $amountPersons = (int)$amountPersons;
                    if($projectTime == null || !is_int($projectTime))
                    {
                        $varOk = false;
                        $_SESSION['e_time'] = "Proszę wprowadzić liczbę całkowitą!";
                    }
                    //!is_int($amountPersons)
                    if($amountPersons == null || !is_int($amountPersons))
                    {
                        $varOk = false;
                        $_SESSION['e_amountPersons'] = "Proszę wprowadzić liczbę całkowitą!";
                    }

                    if($varOk == true)
                    {
                        $_POST['projectTime'] = $amountPersons;
                        $_POST['amountPersons'] =  $amountPersons;
                        try{
                            $_SESSION['zalogowany'] = true;
                            header('Location: order.php');
                        }catch(Exception $e){
                            echo '<span style="color:red;">Błąd serwera! Przepraszamy.</span>';
                            echo '<br />Informacja dev: '.$e;
                        }
                    }
             }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomasz Kosik</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
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
                    <a href="#home" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="#about" class="navbar__links" id="about-page">O mnie</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="#cooperation" class="navbar__links" id="about-page">Współpraca</a>
                </li>
                <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="#services" class="navbar__links" id="services-page">Kontakt</a>
                </li>
				  <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <a href="#shop" class="navbar__links" id="shop-page">Cennik</a>
                </li>
                </li>
				  <li class="navbar__item">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <?php
                    $user = $_SESSION["user"];
                    echo "<a href='#home' class='navbar__links' id=''>$user</a>";
                     
                    ?>
                    
                </li>
				<li class="navbar__btn">
                    <!--Tutaj dodaję pole w listowaniu-->
                    <?php
                        $_SESSION['zalogowany'] = false;
                    ?>
                    <a href="index.php" class="button" id="signup">Wyloguj</a>
                </li>
            </ul>
        </div>
    </nav>

    
    <div class="hero" id="home">
        <div class="hero__container">
            <h1 class="hero__heading">Witajcie<span> na stronie</span></h1>
            <p class="hero__description">Oferuję usługi z zakresu testowania oprogramowania.</p>
            
        </div>
    </div>

    <!-- opis sekcji-->
    <div class="main" id="about">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card1"><img src= "photo.jpg" /></div>
            </div>
            <div class="main__content">
                <br></br>
                <h1>CZYM SIĘ ZAJMUJĘ?</h1>
				
                <br></br>
                <h2>Pomagam zadbać o jakość aplikacji wytwarzanych przez Ciebie lub Twoich klientów.  </h2>
                <br></br>
                <p>Skontaktuj się ze mną aby dowiedzieć się więcej na temat świadczonych usług</p>
            </div>
        </div>
    </div>
    


    <div class="main" id="cooperation">
    <div class="main__container">
        <div class="main__img--container">
            <div class="main__img--card2"><i class="fas fa-handshake"></i></div>
        </div>
        <div class="main__content">
            <h1>JAKI RODZAJ WSPÓŁPRACY MNIE INTERESUJE?</h1>
            <br></br>
            <h2>Jestem otwarty na podjęcie współpracy na zasadzie B2B lub UoP</h2>
            <br></br>
            <p>Wykorzystywane technologie: Java, Selenium WebDriver, Postman, SoapUI, SQL, Python3, Spring.</p>
        </div>
    </div>
</div>


    <div class="main" id="services">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card2"><i class="fas fa-phone-square"></i></div>
            </div>
            <div class="main__content">
                <h1>KONTAKT</h1>
                <br></br>
                <h2>Nr telefonu: 666 572 800</h2>
                <h2>Adres e-mail: kosik12@gmail.com</h2>
                <br></br>
                <p></p>
                <button class="main__btn"><a href="#"></a>Zadzwoń</button>
            </div>
        </div>
    </div>
	
	    <div class="main" id="shop">
        <div class="main__container">
            <div class="main__img--container">
            <div class="main__img--card2"><i class="fas fa-shopping-cart fa-10x"></i></div>
            </div>
            <div class="main__content">
			
                <h1>Cennik</h1>
				<form action="" method="post">
					<h2>Czas trwania projektu (900zł/dzień):</h2>
					<input type="text" name="projectTime"/>
                    <?php
                    $_SESSION['zalogowany'] = true;
                        if(isset($_SESSION['e_time']))
                        {
                            echo '<div class="error">'.$_SESSION['e_time'].'</div>';
                            unset($_SESSION['e_time']);
                        }
                    ?>
						<br></br>

					<h2>Ilość osób w zespole:</h2>
					<input type="text" name="amountPersons"/>
                    <?php
                        if(isset($_SESSION['e_amountPersons']))
                        {
                            echo '<div class="error">'.$_SESSION['e_amountPersons'].'</div>';
                            unset($_SESSION['e_amountPersons']);
                        }
                    ?>
						<br></br>
                    
					<!-- <input type="main__btn" value = "Sprawdź"/> -->
                    <button class="main__btn" type="submit">Sprawdź cenę</button>
				</form>
                <p></p>
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