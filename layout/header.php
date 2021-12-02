<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="GGTEAMWEAR Configuratore B2B">
    <title>GGTEAMWEAR | Configuratore B2B</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300,400,400i,700" rel="stylesheet">

    <!-- BASE CSS -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/vendors.min.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/skins/square/grey.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <link href="css/custom/wizard.css" rel="stylesheet">
	
    <script src="js/jquery-2.2.4.min.js"></script>
    
	<script src="js/modernizr.js"></script>
    <!-- Modernizr -->
    <link rel="stylesheet" href="css/custom/jquery.fs.zoomer.css" type="text/css"/>

</head>

<body id="background_2">
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /Loader_form -->
	
	<header>
		<div class="container-fluid">
		    <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <h1><a href="index.php">GGTEAMWEAR | Configuratore B2B</a></h1>
                    </div>
                </div>
                <div class="col-9">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=393453311652&text=Ciao!%20Avrei%20bisogno%20di%20alcune%20informazioni%20" class="button_header" id="button_contattaci">Contattaci</a>
                    <!-- <a class="tocartpage"><i class="fa fa-shopping-cart" style="font-size: 28px;color: white;"></i><label id="cart_alarm" style="display: none;">0</label><span class="cd-icon"></span></a> -->
                    <button type="button" name="tocartpage" id="tocartpage" class="tocartpage" style="display: none;"><i class="fa fa-shopping-cart" style="font-size: 28px;color: white;"></i><label id="cart_alarm">0</label></button>
                    
                    <!-- <div id="language">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" >
                                <img src="img/it.png">
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"><img src="img/uk.png">English</a>
                            </div>
                        </div>
                    </div> -->
                    <div id="language">
                        <div class="nav-item dropdown show">
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <img src="img/it.png" style="max-width:30px">
                            </button>
                            <div id="navbarDropdown" class="dropdown-menu collapse" role="menu" aria-labelledby="navbarDropdown" style="">
                                <a class="dropdown-item"><img src="img/uk.png" style="max-width:26px; margin-right:15px; cursor:pointer;">English</a>
                            </div>
                        </div>
                    </div>
    
                    <div id="social">
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/GGTeamwear/"><i class="icon-facebook"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/gg_teamwear/"><i class="icon-instagram"></i></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/company/gg-teamwear/"><i class="icon-linkedin"></i></a></li>
                            <li><a target="_blank" href="https://www.youtube.com/channel/UCQKZEx6JErGzGrtdb1S9QRg"><i class="icon-youtube"></i></a></li>
                        </ul>
                    </div>
                    <!-- /social -->
                    <nav>
                        <ul class="cd-primary-nav">
							<div class="row justify-content-center mb-3">
								<img style="max-width:250px;" src="img/ggteamwear-gif-logo.gif"/>
							</div>
							<div class="row justify-content-center language-bar">
                                <li><a href="#"><img src="img/it.png" style="max-width:30px; margin-right: 10px;"></a></li>
                                <li><a href="#"><img src="img/uk.png" style="max-width:30px; margin-right: 10px;"></a></li>
                            </div>
                            <li class="mobile-menu"><a target="_blank" href="https://www.ggteamwear.com/chi-siamo/" class="animated_link">Chi Siamo</a></li>
							<li class="mobile-menu"><a target="_blank" href="https://www.ggteamwear.com/rete-commerciale/" class="animated_link">Partner</a></li>
							<li class="mobile-menu"><a target="_blank" href="https://www.ggteamwear.com/showroom/" class="animated_link">Showroom</a></li>
							<li class="mobile-menu"><a target="_blank" href="https://www.ggteamwear.com/contatti/" class="animated_link">Contatti</a></li>
                            <div class="row justify-content-center">
                                <li><a target="_blank" href="https://www.instagram.com/gg_teamwear/"><i class="icon-instagram"></i></a></li>
                                <li><a target="_blank" href="https://www.linkedin.com/company/gg-teamwear/"><i class="icon-linkedin"></i></a></li>
                                <li><a target="_blank" href="https://www.youtube.com/channel/UCQKZEx6JErGzGrtdb1S9QRg"><i class="icon-youtube"></i></a></li>
                                <li><a target="_blank" href="https://www.facebook.com/GGTeamwear/"><i class="icon-facebook"></i></a></li>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
		</div>
		<!-- /container -->
	</header>
	<!-- /Header -->