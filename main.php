<?php
header("Access-Control-Allow-Origin: https://wearcomposer.site");
require_once "layout/header.php";
?>
<?php
if(isset($_COOKIE["user"])) {
		//print_r($_COOKIE["user"]);
}else {
	$url = "index.php";
	if(headers_sent())
	{
		echo "<script>document.location.href='".$url."'</script>";
	}
	else
	{
		header("location: ".$url);
	}
}
?>
<main>
	<div class="container">
		<div id="wizard_container">
			<form name="main-form" id="wrapped" method="POST" action="final.php" target="_blank">
				<input type="hidden" class="mailer_language" name="language" value="it" />
				<input id="website" name="website" type="text" value="">
				<!-- Leave for security protection, read docs for details -->
				<div id="loader_product">
					<div data-loader="circle-side-product"></div>
				</div>
				<div id="middle-wizard">
					<!-- step to select sport and gender, typology -->
					<div class="step">
						<div class="question_title">
							<h3 class="sport_title">Seleziona lo Sport</h3>
						</div>
						<input type="hidden" name="selected_sport_type" id="selected_sport_type">
						<input type="hidden" name="selected_sport_type_name" id="selected_sport_type_name">
						
						<h5 id="first_error_msg" class="error_msg"></h5>
						<div class="row justify-content-center">
							<div class="col-6 col-md-4 ">
								<div class="item">
									<input data-label="Calcio" id="answer_1_group_1" type="radio" name="sport_type" value="207">
									<label for="answer_1_group_1"><img src="img/sport/soccer.png" alt="" class="img-fluid"><strong class="sport_207">Calcio</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 ">
								<div class="item">
									<input data-label="Basket" id="answer_2_group_1" name="sport_type" type="radio" value="209">
									<label for="answer_2_group_1"><img src="img/sport/basket.png" alt="" class="img-fluid"><strong class="sport_209">Basket</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 ">
								<div class="item">
									<input data-label="Tennis" id="answer_3_group_1" name="sport_type" type="radio" value="208">
									<label for="answer_3_group_1"><img src="img/sport/tennis.png" alt="" class="img-fluid"><strong class='sport_208'>Tennis</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 ">
								<div class="item">
									<input data-label="Volley" id="answer_4_group_1" name="sport_type" type="radio" value="210">
									<label for="answer_4_group_1"><img src="img/sport/volley.png" alt="" class="img-fluid"><strong class="sport_210">Volley</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 ">
								<div class="item">
									<input data-label="Running" id="answer_5_group_1" name="sport_type" type="radio" value="212">
									<label for="answer_5_group_1"><img src="img/sport/running.png" alt="" class="img-fluid"><strong class="sport_212">Running</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 ">
								<div class="item">
									<input data-label="Fitness" id="answer_6_group_1" name="sport_type" type="radio" value="211">
									<label for="answer_6_group_1"><img src="img/sport/fitness.png" alt="" class="img-fluid"><strong class="sport_211">Fitness</strong></label>
								</div>
							</div>
						</div>

						<div class="question_title">
							<h3 class="gender_title">Seleziona Tipologia</h3>
							<h5 class="gender_breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_gender_type" id="selected_gender_type">
						<input type="hidden" name="selected_gender_type_name" id="selected_gender_type_name">
						<div class="row justify-content-center">
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-label="male" id="answer_1_group_2" type="radio" name="gender_type" value="213">
									<label for="answer_1_group_2"><img src="img/sport/man.png" alt="" class="img-fluid"><strong class="gender_213">Uomo</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-label="female"  id="answer_2_group_2" name="gender_type" type="radio" value="214">
									<label for="answer_2_group_2"><img src="img/sport/woman.png" alt="" class="img-fluid"><strong class="gender_214">Donna</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-label="kid"  id="answer_3_group_2" name="gender_type" type="radio" value="215">
									<label for="answer_3_group_2"><img src="img/sport/kid.png" alt="" class="img-fluid"><strong class="gender_215">Bambino</strong></label>
								</div>
							</div>
						</div>

						<div class="question_title">
							<h3 class="brand_title">Seleziona il Brand</h3>
							<h5 class="brand_breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_brand_type" id="selected_brand_type">
						<input type="hidden" name="selected_brand_type_name" id="selected_brand_type_name">
						<div class="row justify-content-center">
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="adidas" id="answer_1_group_3" type="radio" name="brand_type" value="196">
									<label for="answer_1_group_3"><img src="img/brand/adidas.jpg" class="img-fluid"><strong class="brand_196">ADIDAS</strong></label>
								</div>
							</div>
							<!--<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="gems"  id="answer_2_group_3" name="brand_type" type="radio" value="198">
									<label for="answer_2_group_3"><img src="img/brand/gems.jpg" alt="" class="img-fluid"><strong class="brand_198">GEMS</strong></label>
								</div>
							</div>-->
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="jako" id="answer_3_group_3" name="brand_type" type="radio" value="199">
									<label for="answer_3_group_3"><img src="img/brand/jako.jpg" alt="" class="img-fluid"><strong class="brand_199">JAKO</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="joma" id="answer_4_group_3" name="brand_type" type="radio" value="200">
									<label for="answer_4_group_3"><img src="img/brand/joma.jpg" alt="" class="img-fluid"><strong class="brand_200">JOMA</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="kappa" id="answer_5_group_3" name="brand_type" type="radio" value="201">
									<label for="answer_5_group_3"><img src="img/brand/kappa.jpg" alt="" class="img-fluid"><strong class="brand_201">KAPPA</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="lotto" id="answer_6_group_3" name="brand_type" type="radio" value="202">
									<label for="answer_6_group_3"><img src="img/brand/lotto.jpg" alt="" class="img-fluid"><strong class="brand_202">LOTTO</strong></label>
								</div>
							</div>
							<!-- <div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="mizuno" id="answer_7_group_3" name="brand_type" type="radio" value="203">
									<label for="answer_7_group_3"><img src="img/brand/mizuno.jpg" alt="" class="img-fluid"><strong>MIZUNO</strong></label>
								</div>
							</div> -->
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="nike" id="answer_8_group_3" name="brand_type" type="radio" value="204">
									<label for="answer_8_group_3"><img src="img/brand/nike.jpg" alt="" class="img-fluid"><strong class="brand_204">NIKE</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="puma" id="answer_9_group_3" name="brand_type" type="radio" value="205">
									<label for="answer_9_group_3"><img src="img/brand/puma.jpg" alt="" class="img-fluid"><strong class="brand_205">PUMA</strong></label>
								</div>
							</div>
							<!--<div class="col-6 col-md-4 col-lg-3">
								<div class="item">
									<input data-label="sixtus" id="answer_10_group_3" name="brand_type" type="radio" value="206">
									<label for="answer_10_group_3"><img src="img/brand/sixtus.jpg" alt="" class="img-fluid"><strong class="brand_206">SIXTUS</strong></label>
								</div>
							</div>-->
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to select typology -->
					<div class="step">
						<div class="question_title">
							<h3 class="tipology_title">Scegli la Tipologia </h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<div style="padding-top: 15px;justify-content: center;display: inline;display: none; text-align: center;" id="unavailable_typology">
							<p class="mb-2 if_no_products_available" style="font-size:22px;">Siamo spiacenti, non ci sono abbastanza prodotti per configurare un <b>Kit:</b></p>
							<p style="font-size:22px;" id="unavailable_typology_name">TIPOLOGY NAMES</p>
						</div>
						<input type="" name="total_order_count" id="total_order_count" value="0">
						<input type="hidden" name="selected_typology_type_1" id="selected_typology_type_1">
						<input type="hidden" name="selected_typology_type_name_1" id="selected_typology_type_name_1">
						<input type="hidden" name="selected_typology_type_2" id="selected_typology_type_2">
						<input type="hidden" name="selected_typology_type_name_2" id="selected_typology_type_name_2">
						<input type="hidden" name="selected_typology_type_3" id="selected_typology_type_3">
						<input type="hidden" name="selected_typology_type_name_3" id="selected_typology_type_name_3">
						<h5 id="second_error_msg" class="error_msg"></h5>
						<div class="row justify-content-center">
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="rapp" type="radio" name="typology_type" value="262">
									<label for="rapp" id="label_rapp"><img src="img/sport/1.png" alt="" class="img-fluid"><strong class="tag_262">Rappresentanza</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="camp" type="radio" name="typology_type" value="263">
									<label for="camp" id="label_camp"><img src="img/sport/2.png" alt="" class="img-fluid"><strong class="tag_263">Gara</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="alle" type="radio" name="typology_type" value="264">
									<label for="alle" id="label_alle"><img src="img/sport/3.png" alt="" class="img-fluid"><strong class="tag_264">Allenamento</strong></label>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to select product type-->
					<div class="step">
						<div class="question_title">
							<h3 class="category_title">Scegli la Tipologia </h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_clothes_type_1" id="selected_clothes_type_1">
						<input type="hidden" name="selected_clothes_type_name_1" id="selected_clothes_type_name_1">
						<input type="hidden" name="selected_clothes_type_2" id="selected_clothes_type_2">
						<input type="hidden" name="selected_clothes_type_name_2" id="selected_clothes_type_name_2">
						<input type="hidden" name="selected_clothes_type_3" id="selected_clothes_type_3">
						<input type="hidden" name="selected_clothes_type_name_3" id="selected_clothes_type_name_3">
						<h5 id="third_error_msg" class="error_msg"></h5>
						<div class="row justify-content-center">
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="shirt_clothes" type="radio" name="clothes_type" value="157" class="required">
									<label for="shirt_clothes" id="label_shirt_clothes"><img src="img/sport/shirt.png" alt="" class="img-fluid"><strong class="cat_1">Maglie a maniche corte</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="sleeve_clothes" type="radio" name="clothes_type" value="1791" class="required">
									<label for="sleeve_clothes" id="label_sleeve_clothes"><img src="img/sport/sleeveshirts.png" alt="" class="img-fluid"><strong class="cat_2">Maglie a maniche lunghe</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="sweat_clothes" type="radio" name="clothes_type" value="1792" class="required">
									<label for="sweat_clothes" id="label_sweat_clothes"><img src="img/sport/sweat.png" alt="" class="img-fluid"><strong class="cat_3">Felpe</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="pants_clothes" type="radio" name="clothes_type" value="161" class="required">
									<label for="pants_clothes" id="label_pants_clothes"><img src="img/sport/pants.png" alt="" class="img-fluid"><strong class="cat_4">Pantaloncini</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="longpants_clothes" type="radio" name="clothes_type" value="1795" class="required">
									<label for="longpants_clothes" id="label_longpants_clothes"><img src="img/sport/longpants.png" alt="" class="img-fluid"><strong class="cat_5">Pantaloni</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="socks_clothes" type="radio" name="clothes_type" value="162" class="required">
									<label for="socks_clothes" id="label_socks_clothes"><img src="img/sport/socks.png" alt="" class="img-fluid"><strong class="cat_6">Calze</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="ball_clothes" type="radio" name="clothes_type" value="163" class="required">
									<label for="ball_clothes" id="label_ball_clothes"><img src="img/sport/ball.png" alt="" class="img-fluid"><strong class="cat_7">Palloni e Accessori</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="bags_clothes" type="radio" name="clothes_type" value="185" class="required">
									<label for="bags_clothes" id="label_bags_clothes"><img src="img/sport/bags.png" alt="" class="img-fluid"><strong class="cat_8">Zaini e Borse</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="kits_clothes" type="radio" name="clothes_type" value="265" class="required">
									<label for="kits_clothes" id="label_kits_clothes"><img src="img/sport/kit.png" alt="" class="img-fluid"><strong class="cat_9">Tute</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="rainjacket_clothes" type="radio" name="clothes_type" value="1793" class="required">
									<label for="rainjacket_clothes" id="label_rainjacket_clothes"><img src="img/sport/rainjacket.png" alt="" class="img-fluid"><strong class="cat_10">Rain Jacket</strong></label>
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="item">
									<input data-price="" data-label="" id="jacket_clothes" type="radio" name="clothes_type" value="1794" class="required">
									<label for="jacket_clothes" id="label_jacket_clothes"><img src="img/sport/jacket.png" alt="" class="img-fluid"><strong class="cat_11">Giubbotto</strong></label>
								</div>
							</div>
							
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to select t_shirt-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_1">Maglie a maniche corte</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="shirt_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_shirts(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_shirts(1)" class="reset_button">Reset</button>
							</div>
						</div>
						
						<input type="hidden" name="selected_t_shirt_type_1" id="selected_t_shirt_type_1">
						<input type="hidden" name="selected_t_shirt_type_name_1" id="selected_t_shirt_type_name_1">
						<input type="hidden" name="selected_t_shirt_price_1" id="selected_t_shirt_price_1">
						<input type="hidden" name="selected_t_shirt_type_2" id="selected_t_shirt_type_2">
						<input type="hidden" name="selected_t_shirt_type_name_2" id="selected_t_shirt_type_name_2">
						<input type="hidden" name="selected_t_shirt_price_2" id="selected_t_shirt_price_2">
						<input type="hidden" name="selected_t_shirt_type_3" id="selected_t_shirt_type_3">
						<input type="hidden" name="selected_t_shirt_type_name_3" id="selected_t_shirt_type_name_3">
						<input type="hidden" name="selected_t_shirt_price_3" id="selected_t_shirt_price_3">
						<div class="row" id="select_t_shirt">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="shirt_current_page" id="shirt_current_page" value="0">
							<button type="button" name="shirt_loadmore" id="shirt_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_shirts_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere Maglie a maniche corte</label>
							<label style="font-size: 24px;display: none;" id="no_search_shirts_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to show product detail page of t_shirt -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_1">Maglie a maniche corte</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_shirts_img_1" id="selected_shirts_img_1">
						<input type="hidden" name="selected_shirts_name_1" id="selected_shirts_name_1">
						<input type="hidden" name="selected_shirts_img_2" id="selected_shirts_img_2">
						<input type="hidden" name="selected_shirts_name_2" id="selected_shirts_name_2">
						<input type="hidden" name="selected_shirts_img_3" id="selected_shirts_img_3">
						<input type="hidden" name="selected_shirts_name_3" id="selected_shirts_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_t_shirt">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="shirts_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div>
											<br><br>
											<div class="col-md-6 text-left detail-shirts-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="t_shirt_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to select pants-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_4">Pantaloni e Pantaloncini</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="pants_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_pants(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_pants(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_pants_type_1" id="selected_pants_type_1">
						<input type="hidden" name="selected_pants_type_name_1" id="selected_pants_type_name_1">
						<input type="hidden" name="selected_pants_price_1" id="selected_pants_price_1">
						<input type="hidden" name="selected_pants_type_2" id="selected_pants_type_2">
						<input type="hidden" name="selected_pants_type_name_2" id="selected_pants_type_name_2">
						<input type="hidden" name="selected_pants_price_2" id="selected_pants_price_2">
						<input type="hidden" name="selected_pants_type_3" id="selected_pants_type_3">
						<input type="hidden" name="selected_pants_type_name_3" id="selected_pants_type_name_3">
						<input type="hidden" name="selected_pants_price_3" id="selected_pants_price_3">
						<div class="row" id="select_pants">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="pants_current_page" id="pants_current_page" value="0">
							<button type="button" name="pants_loadmore" id="pants_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_pants_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere i Pantaloncini</label>
							<label style="font-size: 24px;display: none;" id="no_search_pants_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to show product detail page of pants-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_4">Pantaloni e Pantaloncini</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_pants_img_1" id="selected_pants_img_1">
						<input type="hidden" name="selected_pants_name_1" id="selected_pants_name_1">
						<input type="hidden" name="selected_pants_long_1" id="selected_pants_long_1">
						<input type="hidden" name="selected_pants_img_2" id="selected_pants_img_2">
						<input type="hidden" name="selected_pants_name_2" id="selected_pants_name_2">
						<input type="hidden" name="selected_pants_long_2" id="selected_pants_long_2">
						<input type="hidden" name="selected_pants_img_3" id="selected_pants_img_3">
						<input type="hidden" name="selected_pants_name_3" id="selected_pants_name_3">
						<input type="hidden" name="selected_pants_long_3" id="selected_pants_long_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_pants">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="pants_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div>
											<br><br>
											<div class="col-md-6 text-left detail-pants-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="pants_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- /step -->
					<!-- step to select socks -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_6">Calze</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="socks_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_socks(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_socks(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_socks_type_1" id="selected_socks_type_1">
						<input type="hidden" name="selected_socks_type_name_1" id="selected_socks_type_name_1">
						<input type="hidden" name="selected_socks_price_1" id="selected_socks_price_1">
						<input type="hidden" name="selected_socks_type_2" id="selected_socks_type_2">
						<input type="hidden" name="selected_socks_type_name_2" id="selected_socks_type_name_2">
						<input type="hidden" name="selected_socks_price_2" id="selected_socks_price_2">
						<input type="hidden" name="selected_socks_type_3" id="selected_socks_type_3">
						<input type="hidden" name="selected_socks_type_name_3" id="selected_socks_type_name_3">
						<input type="hidden" name="selected_socks_price_3" id="selected_socks_price_3">
						<div class="row" id="select_socks">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="socks_current_page" id="socks_current_page" value="0">
							<button type="button" name="socks_loadmore" id="socks_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_socks_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere le Calze</label>
							<label style="font-size: 24px;display: none;" id="no_search_socks_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>

					<!-- /step -->
					<!-- step to show product detail page of socks-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_6">Calze</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_socks_img_1" id="selected_socks_img_1">
						<input type="hidden" name="selected_socks_name_1" id="selected_socks_name_1">
						<input type="hidden" name="selected_socks_img_2" id="selected_socks_img_2">
						<input type="hidden" name="selected_socks_name_2" id="selected_socks_name_2">
						<input type="hidden" name="selected_socks_img_3" id="selected_socks_img_3">
						<input type="hidden" name="selected_socks_name_3" id="selected_socks_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_socks">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="socks_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div>
											<br><br>
											<div class="col-md-6 text-left detail-socks-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="socks_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select ball -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_7">Palloni e Accessori</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="ball_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_ball(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_ball(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_ball_type_1" id="selected_ball_type_1">
						<input type="hidden" name="selected_ball_type_name_1" id="selected_ball_type_name_1">
						<input type="hidden" name="selected_ball_price_1" id="selected_ball_price_1">
						<input type="hidden" name="selected_ball_type_2" id="selected_ball_type_2">
						<input type="hidden" name="selected_ball_type_name_2" id="selected_ball_type_name_2">
						<input type="hidden" name="selected_ball_price_2" id="selected_ball_price_2">
						<input type="hidden" name="selected_ball_type_3" id="selected_ball_type_3">
						<input type="hidden" name="selected_ball_type_name_3" id="selected_ball_type_name_3">
						<input type="hidden" name="selected_ball_price_3" id="selected_ball_price_3">
						<div class="row" id="select_ball">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="ball_current_page" id="ball_current_page" value="0">
							<button type="button" name="ball_loadmore" id="ball_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_ball_label" class="no_products_found">Nessun prodotto trovato. Per favore completa la configurazione senza includere Palloni e Accessori</label>
							<label style="font-size: 24px;display: none;" id="no_search_ball_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of socks-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_7">Palloni e Accessori</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_ball_img_1" id="selected_ball_img_1">
						<input type="hidden" name="selected_ball_name_1" id="selected_ball_name_1">
						<input type="hidden" name="selected_ball_img_2" id="selected_ball_img_2">
						<input type="hidden" name="selected_ball_name_2" id="selected_ball_name_2">
						<input type="hidden" name="selected_ball_img_3" id="selected_ball_img_3">
						<input type="hidden" name="selected_ball_name_3" id="selected_ball_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_ball">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="ball_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-ball-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="ball_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select bags -->
					<!-- /step -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_8">Zaini e Borse</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="bags_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_bags(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_bags(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_bags_type_1" id="selected_bags_type_1">
						<input type="hidden" name="selected_bags_type_name_1" id="selected_bags_type_name_1">
						<input type="hidden" name="selected_bags_price_1" id="selected_bags_price_1">
						<input type="hidden" name="selected_bags_type_2" id="selected_bags_type_2">
						<input type="hidden" name="selected_bags_type_name_2" id="selected_bags_type_name_2">
						<input type="hidden" name="selected_bags_price_2" id="selected_bags_price_2">
						<input type="hidden" name="selected_bags_type_3" id="selected_bags_type_3">
						<input type="hidden" name="selected_bags_type_name_3" id="selected_bags_type_name_3">
						<input type="hidden" name="selected_bags_price_3" id="selected_bags_price_3">
						<div class="row" id="select_bags">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="bags_current_page" id="bags_current_page" value="0">
							<button type="button" name="bags_loadmore" id="bags_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_bags_label" class="no_products_found">Nessun prodotto trovato. Per favore completa la configurazione senza includere Zaini e Borse</label>
							<label style="font-size: 24px;display: none;" id="no_search_bags_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of bags-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_8">Zaini e Borse</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_bags_img_1" id="selected_bags_img_1">
						<input type="hidden" name="selected_bags_name_1" id="selected_bags_name_1">
						<input type="hidden" name="selected_bags_img_2" id="selected_bags_img_2">
						<input type="hidden" name="selected_bags_name_2" id="selected_bags_name_2">
						<input type="hidden" name="selected_bags_img_3" id="selected_bags_img_3">
						<input type="hidden" name="selected_bags_name_3" id="selected_bags_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_bags">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="bags_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-bags-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="bags_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select kits -->
					<!-- /step -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_9">Tute</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="kits_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_kits(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_kits(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_kits_type_1" id="selected_kits_type_1">
						<input type="hidden" name="selected_kits_type_name_1" id="selected_kits_type_name_1">
						<input type="hidden" name="selected_kits_price_1" id="selected_kits_price_1">
						<input type="hidden" name="selected_kits_type_2" id="selected_kits_type_2">
						<input type="hidden" name="selected_kits_type_name_2" id="selected_kits_type_name_2">
						<input type="hidden" name="selected_kits_price_2" id="selected_kits_price_2">
						<input type="hidden" name="selected_kits_type_3" id="selected_kits_type_3">
						<input type="hidden" name="selected_kits_type_name_3" id="selected_kits_type_name_3">
						<input type="hidden" name="selected_kits_price_3" id="selected_kits_price_3">
						<div class="row" id="select_kits">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="kits_current_page" id="kits_current_page" value="0">
							<button type="button" name="kits_loadmore" id="kits_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_kits_label" class="no_products_found">Nessun prodotto trovato. Per favore completa la configurazione senza includere Tute</label>
							<label style="font-size: 24px;display: none;" id="no_search_kits_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of kits-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_9">Tute</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_kits_img_1" id="selected_kits_img_1">
						<input type="hidden" name="selected_kits_name_1" id="selected_kits_name_1">
						<input type="hidden" name="selected_kits_img_2" id="selected_kits_img_2">
						<input type="hidden" name="selected_kits_name_2" id="selected_kits_name_2">
						<input type="hidden" name="selected_kits_img_3" id="selected_kits_img_3">
						<input type="hidden" name="selected_kits_name_3" id="selected_kits_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_kits">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="kits_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-kits-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="kits_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select sleeve shirts -->
					<!-- Sleeve Shirts -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_2">Maglie a maniche lunghe</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="sleeve_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_sleeve(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_sleeve(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_sleeve_type_1" id="selected_sleeve_type_1">
						<input type="hidden" name="selected_sleeve_type_name_1" id="selected_sleeve_type_name_1">
						<input type="hidden" name="selected_sleeve_price_1" id="selected_sleeve_price_1">
						<input type="hidden" name="selected_sleeve_type_2" id="selected_sleeve_type_2">
						<input type="hidden" name="selected_sleeve_type_name_2" id="selected_sleeve_type_name_2">
						<input type="hidden" name="selected_sleeve_price_2" id="selected_sleeve_price_2">
						<input type="hidden" name="selected_sleeve_type_3" id="selected_sleeve_type_3">
						<input type="hidden" name="selected_sleeve_type_name_3" id="selected_sleeve_type_name_3">
						<input type="hidden" name="selected_sleeve_price_3" id="selected_sleeve_price_3">
						<div class="row" id="select_sleeve">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="sleeve_current_page" id="sleeve_current_page" value="0">
							<button type="button" name="sleeve_loadmore" id="sleeve_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_sleeve_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere Maglie a maniche lunghe</label>
							<label style="font-size: 24px;display: none;" id="no_search_sleeve_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of sleeve shirts-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_2">Maglie a maniche lunghe</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_sleeve_img_1" id="selected_sleeve_img_1">
						<input type="hidden" name="selected_sleeve_name_1" id="selected_sleeve_name_1">
						<input type="hidden" name="selected_sleeve_img_2" id="selected_sleeve_img_2">
						<input type="hidden" name="selected_sleeve_name_2" id="selected_sleeve_name_2">
						<input type="hidden" name="selected_sleeve_img_3" id="selected_sleeve_img_3">
						<input type="hidden" name="selected_sleeve_name_3" id="selected_sleeve_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_sleeve">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="sleeve_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-sleeve-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="sleeve_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select sweat shirts -->
					<!-- Sweat Shirts -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_3">Felpe</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="sweat_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_sweat(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_sweat(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_sweat_type_1" id="selected_sweat_type_1">
						<input type="hidden" name="selected_sweat_type_name_1" id="selected_sweat_type_name_1">
						<input type="hidden" name="selected_sweat_price_1" id="selected_sweat_price_1">
						<input type="hidden" name="selected_sweat_type_2" id="selected_sweat_type_2">
						<input type="hidden" name="selected_sweat_type_name_2" id="selected_sweat_type_name_2">
						<input type="hidden" name="selected_sweat_price_2" id="selected_sweat_price_2">
						<input type="hidden" name="selected_sweat_type_3" id="selected_sweat_type_3">
						<input type="hidden" name="selected_sweat_type_name_3" id="selected_sweat_type_name_3">
						<input type="hidden" name="selected_sweat_price_3" id="selected_sweat_price_3">
						<div class="row" id="select_sweat">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="sweat_current_page" id="sweat_current_page" value="0">
							<button type="button" name="sweat_loadmore" id="sweat_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_sweat_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere le Felpe</label>
							<label style="font-size: 24px;display: none;" id="no_search_sweat_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of sweat shirts-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_3">Felpe</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_sweat_img_1" id="selected_sweat_img_1">
						<input type="hidden" name="selected_sweat_name_1" id="selected_sweat_name_1">
						<input type="hidden" name="selected_sweat_img_2" id="selected_sweat_img_2">
						<input type="hidden" name="selected_sweat_name_2" id="selected_sweat_name_2">
						<input type="hidden" name="selected_sweat_img_3" id="selected_sweat_img_3">
						<input type="hidden" name="selected_sweat_name_3" id="selected_sweat_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_sweat">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="sweat_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-sweat-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="sweat_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select rain jacket -->
					<!-- Rain Jacket -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_10">Rain Jacket</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="rainjacket_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_rainjacket(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_rainjacket(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_rainjacket_type_1" id="selected_rainjacket_type_1">
						<input type="hidden" name="selected_rainjacket_type_name_1" id="selected_rainjacket_type_name_1">
						<input type="hidden" name="selected_rainjacket_price_1" id="selected_rainjacket_price_1">
						<input type="hidden" name="selected_rainjacket_type_2" id="selected_rainjacket_type_2">
						<input type="hidden" name="selected_rainjacket_type_name_2" id="selected_rainjacket_type_name_2">
						<input type="hidden" name="selected_rainjacket_price_2" id="selected_rainjacket_price_2">
						<input type="hidden" name="selected_rainjacket_type_3" id="selected_rainjacket_type_3">
						<input type="hidden" name="selected_rainjacket_type_name_3" id="selected_rainjacket_type_name_3">
						<input type="hidden" name="selected_rainjacket_price_3" id="selected_rainjacket_price_3">
						<div class="row" id="select_rainjacket">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="rainjacket_current_page" id="rainjacket_current_page" value="0">
							<button type="button" name="rainjacket_loadmore" id="rainjacket_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_rainjacket_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere Rain Jacket</label>
							<label style="font-size: 24px;display: none;" id="no_search_rainjacket_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of rain jacket-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_10">Rain Jacket</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_rainjacket_img_1" id="selected_rainjacket_img_1">
						<input type="hidden" name="selected_rainjacket_name_1" id="selected_rainjacket_name_1">
						<input type="hidden" name="selected_rainjacket_img_2" id="selected_rainjacket_img_2">
						<input type="hidden" name="selected_rainjacket_name_2" id="selected_rainjacket_name_2">
						<input type="hidden" name="selected_rainjacket_img_3" id="selected_rainjacket_img_3">
						<input type="hidden" name="selected_rainjacket_name_3" id="selected_rainjacket_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_rainjacket">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="rainjacket_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-rainjacket-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="rainjacket_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select jacket -->
					<!-- Simple Jacket -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_11">Giubbotto </h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="jacket_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_jacket(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_jacket(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_jacket_type_1" id="selected_jacket_type_1">
						<input type="hidden" name="selected_jacket_type_name_1" id="selected_jacket_type_name_1">
						<input type="hidden" name="selected_jacket_price_1" id="selected_jacket_price_1">
						<input type="hidden" name="selected_jacket_type_2" id="selected_jacket_type_2">
						<input type="hidden" name="selected_jacket_type_name_2" id="selected_jacket_type_name_2">
						<input type="hidden" name="selected_jacket_price_2" id="selected_jacket_price_2">
						<input type="hidden" name="selected_jacket_type_3" id="selected_jacket_type_3">
						<input type="hidden" name="selected_jacket_type_name_3" id="selected_jacket_type_name_3">
						<input type="hidden" name="selected_jacket_price_3" id="selected_jacket_price_3">
						<div class="row" id="select_jacket">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="jacket_current_page" id="jacket_current_page" value="0">
							<button type="button" name="jacket_loadmore" id="jacket_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_jacket_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere il Giubbotto</label>
							<label style="font-size: 24px;display: none;" id="no_search_jacket_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of jacket-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_11">Giubbotto </h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_jacket_img_1" id="selected_jacket_img_1">
						<input type="hidden" name="selected_jacket_name_1" id="selected_jacket_name_1">
						<input type="hidden" name="selected_jacket_img_2" id="selected_jacket_img_2">
						<input type="hidden" name="selected_jacket_name_2" id="selected_jacket_name_2">
						<input type="hidden" name="selected_jacket_img_3" id="selected_jacket_img_3">
						<input type="hidden" name="selected_jacket_name_3" id="selected_jacket_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_jacket">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="jacket_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-jacket-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="jacket_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>
					<!-- step to select longpants -->
					<!-- Long Pants -->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_5">Pantaloni</h3>
							<h5 class="breadcrumb_text"></h5>
							<div class="question_title search_box_header form-group">
								<input type="search" class="form-control search_word" id="longpants_search_word" placeholder="Cerca per Nome o codice prodotto">
								<button type="button" class="search_button" onclick="search_longpants(0)">Cerca</button>
								<button type="button" class="search_reset" onclick="search_longpants(1)" class="reset_button">Reset</button>
							</div>
						</div>
						<input type="hidden" name="selected_longpants_type_1" id="selected_longpants_type_1">
						<input type="hidden" name="selected_longpants_type_name_1" id="selected_longpants_type_name_1">
						<input type="hidden" name="selected_longpants_price_1" id="selected_longpants_price_1">
						<input type="hidden" name="selected_longpants_type_2" id="selected_longpants_type_2">
						<input type="hidden" name="selected_longpants_type_name_2" id="selected_longpants_type_name_2">
						<input type="hidden" name="selected_longpants_price_2" id="selected_longpants_price_2">
						<input type="hidden" name="selected_longpants_type_3" id="selected_longpants_type_3">
						<input type="hidden" name="selected_longpants_type_name_3" id="selected_longpants_type_name_3">
						<input type="hidden" name="selected_longpants_price_3" id="selected_longpants_price_3">
						<div class="row" id="select_longpants">
						</div>
						<div class="load_more" style="text-align: center;">
							<input type="hidden" name="longpants_current_page" id="longpants_current_page" value="0">
							<button type="button" name="longpants_loadmore" id="longpants_loadmore" class="button_default show_more" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
							<label style="font-size: 24px;" id="no_longpants_label" class="no_products_found">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere i Pantaloni</label>
							<label style="font-size: 24px;display: none;" id="no_search_longpants_label" class="no_products_search">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
						</div>
						<!-- /row-->
					</div>
					<!-- step to show product detail page of longpants-->
					<div class="step">
						<div class="question_title">
							<h3 class="cat_5">Pantaloni</h3>
							<h5 class="breadcrumb_text"></h5>
						</div>
						<input type="hidden" name="selected_longpants_img_1" id="selected_longpants_img_1">
						<input type="hidden" name="selected_longpants_name_1" id="selected_longpants_name_1">
						<input type="hidden" name="selected_longpants_img_2" id="selected_longpants_img_2">
						<input type="hidden" name="selected_longpants_name_2" id="selected_longpants_name_2">
						<input type="hidden" name="selected_longpants_img_3" id="selected_longpants_img_3">
						<input type="hidden" name="selected_longpants_name_3" id="selected_longpants_name_3">
						<div class="row justify-content-center">
							<div class="col-md-6" id="selected_longpants">
							</div>
							<div class="col-md-6 mt-4">
								<div class="box_general">
									<div class="question_title mt-4">
										<h4>Info</h4>
										<img id="longpants_brand_img" class="img-fluid mb-5" style="max-width:100px">
										<div class="row">
											<div class="col-md-6 text-left detail-common-info" style="padding-top: 20px;">
											</div><br><br>
											<div class="col-md-6 text-left detail-longpants-info" style="padding-top: 20px;">
											</div>
										</div>
									</div>
									<div class="question_title mt-4">
										<h4 class="personal_discount">Termina la configurazione e scopri lo sconto a te dedicato!</h4>
										<h4 class="description">Descrizione</h4>
										<p style="color:#000000;" id="longpants_description"></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /row-->
					</div>

					<!-- /step -->
					<!-- Last step ============================== -->
					<!-- Product checkout page-->
					<div class="submit step">
						<div class="question_title">
							<h3>Checkout</h3>
						</div>
						<input type="hidden" name="selected_main_canvas_file_name_1" id="selected_main_canvas_file_name_1">
						<input type="hidden" name="selected_main_canvas_file_name_2" id="selected_main_canvas_file_name_2">
						<input type="hidden" name="selected_main_canvas_file_name_3" id="selected_main_canvas_file_name_3">
						<div class="row" style="background: white;">
							<div class="col-lg-6">
								<div class="box_general" style="text-align:center;" id="final_image">
									<canvas style="background: white;" id="canvas_element"></canvas>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="box_general">
									<div class="question_title">
										<h4 class="checkout_h4_subtitle">Riepilogo Configurazione</h4>
									</div>
									<div id="order_summary">
									</div>
									<div id="totale_ordine">
										<h4 class="text-center checkout_h4_subtitle_2">Invia la configurazione e <b>scopri lo sconto</b> a te dedicato!</h4>
									</div>
									<div style="text-align: center;padding-top: 20px;">
										<button type="submit" class="start_wizard preview_button" id="gotoFinalPage">VISUALIZZA L'ANTEPRIMA DELLE TUE CONFIGURAZIONI</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /Last step ============================== -->
					<!-- step to show cart page-->
					<div class="cart_step step">
						<div class="question_title">
							<h3 class="cart_h3_title">Carrello</h3>
						</div>
						<div style="text-align: center; display: none;" id="nothing_product">
							<h4 class="no_products_cart">Nessun prodotto nel carrello</h4>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="box_general" id="order_product_list">
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
				</div>
				<!-- /middle-wizard -->
				<div id="bottom-wizard">
					<div class="float-right clearfix">
						<button type="button" name="tootherorder" id="tootherorder" class="tootherorder" style="display: none;">CONTINUA CONFIGURAZIONE</button>
						<button type="button" name="tocanvas" id="tocanvas" class="tocanvas" style="display: none;">Termina Configurazione</button>
						<button type="button" name="backward" id="backward" class="backward">Precedente</button>
						<button type="button" name="forward" id="forward" class="forward">Successivo</button>
						<a href="#" data-toggle="modal" data-target="#final-modal" class="tofinalmodal" style="display: none;" id="gofinal">Invia Configurazione</a>
					</div>
				</div>
				<!-- /bottom-wizard -->
				<input type="hidden" id="hidden_total" name="hidden_total">
				<!-- /Hidden total input -->
			</form>
		</div>
		<!-- /Wizard container -->
	</div>
	<!-- /Container -->
</main>
<!-- /main -->

<div class="cd-overlay-nav">
	<span></span>
</div>
<!-- /cd-overlay-nav -->

<div class="cd-overlay-content">
	<span></span>
</div>
<!-- /cd-overlay-content -->

<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
<!-- /cd-nav-trigger -->

<!-- Modal terms -->
<div class="modal fade" id="final-modal" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal_user_title">Conferma o modifica i tuoi dati prima di continuare</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="example-1" id="wrapped" method="POST" action="mailer_final.php">
					<input type="hidden" class="mailer_language" name="language" value="it" />
					<div class="box_general box-form" style="margin-top: 0;">
						<input type="hidden" name="selected_order_sport" id="selected_order_sport">
						<input type="hidden" name="selected_order_gender" id="selected_order_gender">
						<input type="hidden" name="selected_order_brand" id="selected_order_brand">
						<input type="hidden" name="selected_order_typology_1" id="selected_order_typology_1">
						<input type="hidden" name="selected_order_typology_2" id="selected_order_typology_2">
						<input type="hidden" name="selected_order_typology_3" id="selected_order_typology_3">
						<input type="hidden" name="selected_order_shirt_1" id="selected_order_shirt_1">
						<input type="hidden" name="selected_order_shirt_2" id="selected_order_shirt_2">
						<input type="hidden" name="selected_order_shirt_3" id="selected_order_shirt_3">
						<input type="hidden" name="selected_order_pants_1" id="selected_order_pants_1">
						<input type="hidden" name="selected_order_pants_2" id="selected_order_pants_2">
						<input type="hidden" name="selected_order_pants_3" id="selected_order_pants_3">
						<input type="hidden" name="selected_order_socks_1" id="selected_order_socks_1">
						<input type="hidden" name="selected_order_socks_2" id="selected_order_socks_2">
						<input type="hidden" name="selected_order_socks_3" id="selected_order_socks_3">
						<input type="hidden" name="selected_order_ball_1" id="selected_order_ball_1">
						<input type="hidden" name="selected_order_ball_2" id="selected_order_ball_2">
						<input type="hidden" name="selected_order_ball_3" id="selected_order_ball_3">
						<input type="hidden" name="selected_order_bags_1" id="selected_order_bags_1">
						<input type="hidden" name="selected_order_bags_2" id="selected_order_bags_2">
						<input type="hidden" name="selected_order_bags_3" id="selected_order_bags_3">
						<input type="hidden" name="selected_order_kits_1" id="selected_order_kits_1">
						<input type="hidden" name="selected_order_kits_2" id="selected_order_kits_2">
						<input type="hidden" name="selected_order_kits_3" id="selected_order_kits_3">
						<input type="hidden" name="selected_order_sleeve_1" id="selected_order_sleeve_1">
						<input type="hidden" name="selected_order_sleeve_2" id="selected_order_sleeve_2">
						<input type="hidden" name="selected_order_sleeve_3" id="selected_order_sleeve_3">
						<input type="hidden" name="selected_order_sweat_1" id="selected_order_sweat_1">
						<input type="hidden" name="selected_order_sweat_2" id="selected_order_sweat_2">
						<input type="hidden" name="selected_order_sweat_3" id="selected_order_sweat_3">
						<input type="hidden" name="selected_order_rainjacket_1" id="selected_order_rainjacket_1">
						<input type="hidden" name="selected_order_rainjacket_2" id="selected_order_rainjacket_2">
						<input type="hidden" name="selected_order_rainjacket_3" id="selected_order_rainjacket_3">
						<input type="hidden" name="selected_order_jacket_1" id="selected_order_jacket_1">
						<input type="hidden" name="selected_order_jacket_2" id="selected_order_jacket_2">
						<input type="hidden" name="selected_order_jacket_3" id="selected_order_jacket_3">
						<input type="hidden" name="selected_order_longpants_1" id="selected_order_longpants_1">
						<input type="hidden" name="selected_order_longpants_2" id="selected_order_longpants_2">
						<input type="hidden" name="selected_order_longpants_3" id="selected_order_longpants_3">

						<input type="hidden" name="merge_all_canvas_file" id="merge_all_canvas_file">
						<div class="form-group">
							<input type="text" id="company_name" name="company_name" class="required form-control" placeholder="Ragione Sociale" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['company']):'' ?>" required>
						</div>
						<div class="form-group">
							<input type="number" id="cap_number" name="cap_number" class="required form-control" placeholder="CAP" min="0" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['cap']):'' ?>" required>
						</div>
						<div class="form-group">
							<input type="number" id="team_person" name="team_person" class="required form-control" placeholder="Numero Atleti" min="0" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['people']):'' ?>" required>
						</div>
						<p class="owner">Struttura di Proprietà?</p>
						<div class="form-group">
							<input type="radio" id="owner-yes" name="owner" class="required form-control"  value="si" checked required>
							<label class="owner-yes-label" style="margin-right: 15px;" for="owner-yes">Sì</label>
							<input type="radio" id="owner-no" name="owner" class="required form-control"  value="no" required>
							<label for="owner-no">No</label>
						</div>
						<div class="form-group">
							<input type="email" id="email" name="email" class="required form-control" placeholder="Inserisci la tua E-mail" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['email']):'' ?>" required>
						</div>
						<div class="form-group">
							<input type="number" id="telephone" name="telephone" class="form-control" placeholder="Insersci un recapito telefonico" min="0" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['telephone']):'' ?>">
						</div>
						<button type="submit" class="start_wizard" id="btn_finish">CONFERMA DATI</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Modal terms -->

<?php
require_once "layout/footer.php";
?>
<script>
	language = "<?php echo $_POST['language']; ?>";
	$(document).ready(function(){
	  if (language == 'it')
	    language = 'en';
	  else
	    language = 'it';
	  setLanguageData();
	});
</script>