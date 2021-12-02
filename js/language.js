$(document).ready(function(){
  $("#language .dropdown-item").on("click", function(){
  	$('#navbarDropdown').removeClass('show');
    setLanguageData();
	$.extend($.validator, {
		messages: {
		required: languageData.form_error,
		remote: "Please fix this field.",
		email: "Wrong email",
		url: "Please enter a valid URL.",
		date: "Please enter a valid date.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Please enter a valid number.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Please enter the same value again.",
		maxlength: $.validator.format("Please enter no more than {0} characters."),
		minlength: $.validator.format("Please enter at least {0} characters."),
		rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
		range: $.validator.format("Please enter a value between {0} and {1}."),
		max: $.validator.format("Please enter a value less than or equal to {0}."),
		min: $.validator.format("Please enter a value greater than or equal to {0}.")
		}
	});
  });
  $(".language-bar a").on("click", function(){
    setLanguageData();
	$.extend($.validator, {
		messages: {
		required: languageData.form_error,
		remote: "Please fix this field.",
		email: "Wrong email",
		url: "Please enter a valid URL.",
		date: "Please enter a valid date.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Please enter a valid number.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Please enter the same value again.",
		maxlength: $.validator.format("Please enter no more than {0} characters."),
		minlength: $.validator.format("Please enter at least {0} characters."),
		rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
		range: $.validator.format("Please enter a value between {0} and {1}."),
		max: $.validator.format("Please enter a value less than or equal to {0}."),
		min: $.validator.format("Please enter a value greater than or equal to {0}.")
		}
	});
  });
});

function setLanguageData(){
	// convert language from current selection
    if (language == 'it'){
    	$("#language .dropdown-item").html('<img src="img/it.png">Italian');
    	$('#language button').html('<img src="img/uk.png">');
    	language = 'uk';
    	languageData = en;
    }else{
    	$("#language .dropdown-item").html('<img src="img/uk.png">English');
    	$('#language button').html('<img src="img/it.png">');
    	language = 'it';
    	languageData = it;
    }
    str_arr = {
			207: languageData.sport_207,
			209: languageData.sport_209,
			208: languageData.sport_208,
			210: languageData.sport_210,
			212: languageData.sport_212,
			211: languageData.sport_211,
			213: languageData.gender_213,
			214: languageData.gender_214,
			215: languageData.gender_215,
			196: languageData.brand_196,
			198: languageData.brand_198,
			199: languageData.brand_199,
			200: languageData.brand_200,
			201: languageData.brand_201,
			202: languageData.brand_202,
			203: 'Mizuno',
			204: languageData.brand_204,
			205: languageData.brand_205,
			206: languageData.brand_206,
			262: languageData.tag_262,
			263: languageData.tag_263,
			264: languageData.tag_264,
		};
	// set all data by language seletion

    $('.mailer_language').val(language);
	$('#button_contattaci').html(languageData.button_contattaci);
	$('.mobile-menu:nth-child(3) a').html(languageData.li_1);
	$('.mobile-menu:nth-child(4) a').html(languageData.li_2);
	$('.mobile-menu:nth-child(5) a').html(languageData.li_3);
	$('.mobile-menu:nth-child(6) a').html(languageData.li_4);
	$('.welcome-section h1').html(languageData.body_title);
	$('.welcome-section p:nth-child(2)').html(languageData.body_par_1);
	$('.welcome-section p:nth-child(3)').html(languageData.body_par_2);
	$('.welcome-section p:nth-child(4)').html(languageData.body_par_3);
	$('.welcome-section p:nth-child(5)').html(languageData.body_par_4);
	$('.welcome-section p:nth-child(6)').html(languageData.body_par_5);
	$('.welcome-section p:nth-child(7)').html(languageData.body_par_6);
	$('.welcome-section p:nth-child(8)').html(languageData.body_par_7);
	$('.welcome-section p:nth-child(9)').html(languageData.body_par_8);
	$('.welcome-section p:nth-child(10)').html(languageData.body_par_9);
	$('.welcome-section h2').html(languageData.body_h2);
	$('#company_name').attr('placeholder', languageData.company_name);
	$('#cap_number').attr('placeholder', languageData.cap_number);
	$('#team_person').attr('placeholder', languageData.team_person);
	$('.owner-yes-label').html(languageData.answer_owner_yes);
	$('#owner-no-label').html(languageData.answer_owner_no);
	$('#owner-yes-title').html(languageData.owner);
	$('#email').attr('placeholder', languageData.email);
	$('#telephone').attr('placeholder', languageData.telephone);
	$('#terms').html(languageData.terms);
	$('#btn_continue').html(languageData.signup_button);
	$('#termsLabel').html(languageData.modal_title);
	$('.terms-modal p:nth-child(1)').html(languageData.modal_section_title_1);
	$('.terms-modal p:nth-child(2)').html(languageData.modal_par_1);
	$('.terms-modal p:nth-child(3)').html(languageData.modal_par_2);
	$('.terms-modal p:nth-child(4)').html(languageData.modal_par_3);
	$('.terms-modal p:nth-child(5)').html(languageData.modal_par_4);
	$('.terms-modal p:nth-child(6)').html(languageData.modal_par_5);
	$('.terms-modal p:nth-child(7)').html(languageData.modal_par_6);
	$('.terms-modal p:nth-child(8)').html(languageData.modal_par_7);
	$('.terms-modal p:nth-child(9)').html(languageData.modal_par_8);
	$('.terms-modal p:nth-child(10)').html(languageData.modal_section_title_2);
	$('.terms-modal p:nth-child(11)').html(languageData.modal_par_9);
	$('.terms-modal p:nth-child(12)').html(languageData.modal_par_10);
	$('.terms-modal p:nth-child(13)').html(languageData.modal_par_11);
	$('.terms-modal p:nth-child(14)').html(languageData.modal_par_12);
	$('.terms-modal p:nth-child(15)').html(languageData.modal_par_13);
	$('.terms-modal p:nth-child(16)').html(languageData.modal_par_14);
	$('.terms-modal p:nth-child(17)').html(languageData.modal_par_15);
	$('.terms-modal p:nth-child(18)').html(languageData.modal_par_16);
	$('.terms-modal p:nth-child(19)').html(languageData.modal_par_17);
	$('.terms-modal p:nth-child(20)').html(languageData.modal_par_18);
	$('.terms-modal p:nth-child(21)').html(languageData.modal_par_19);
	$('.terms-modal p:nth-child(22)').html(languageData.modal_par_20);
	$('.thx_h1_title').html(languageData.thx_h1_title);
	$('.thx_h2_title').html(languageData.thx_h2_title);
	$('.thx_p_text').html(languageData.thx_p_text);
	$('.thx_button').html(languageData.thx_button);
	$('.sport_title').html(languageData.sport_title);
	$('.sport_207').html(languageData.sport_207);
	$('.sport_209').html(languageData.sport_209);
	$('.sport_208').html(languageData.sport_208);
	$('.sport_210').html(languageData.sport_210);
	$('.sport_212').html(languageData.sport_212);
	$('.sport_211').html(languageData.sport_211);
	$('.gender_title').html(languageData.gender_title);
	$('.gender_213').html(languageData.gender_213);
	$('.gender_214').html(languageData.gender_214);
	$('.gender_215').html(languageData.gender_215);
	$('.brand_title').html(languageData.brand_title);
	$('.brand_196').html(languageData.brand_196);
	$('.brand_198').html(languageData.brand_198);
	$('.brand_199').html(languageData.brand_199);
	$('.brand_200').html(languageData.brand_200);
	$('.brand_201').html(languageData.brand_201);
	$('.brand_202').html(languageData.brand_202);
	$('.brand_204').html(languageData.brand_204);
	$('.brand_205').html(languageData.brand_205);
	$('.brand_206').html(languageData.brand_206);
	$('.tipology_title').html(languageData.tipology_title);
	$('.if_no_products_available').html(languageData.if_no_products_available);
	$('.tag_262').html(languageData.tag_262);
	$('.tag_263').html(languageData.tag_263);
	$('.tag_264').html(languageData.tag_264);
	$('.category_title').html(languageData.category_title);
	$('.cat_1').html(languageData.cat_1);
	$('.cat_2').html(languageData.cat_2);
	$('.cat_3').html(languageData.cat_3);
	$('.cat_4').html(languageData.cat_4);
	$('.cat_5').html(languageData.cat_5);
	$('.cat_6').html(languageData.cat_6);
	$('.cat_7').html(languageData.cat_7);
	$('.cat_8').html(languageData.cat_8);
	$('.cat_9').html(languageData.cat_9);
	$('.cat_10').html(languageData.cat_10);
	$('.cat_11').html(languageData.cat_11);
	$('.show_more').html(languageData.show_more);
	$('.search_placeholder').attr('placeholder', languageData.search_placeholder);
	$('.search_word').attr('placeholder', languageData.search_placeholder);
	$('.search_button').html(languageData.search_button);
	$('.search_reset').html(languageData.search_reset);
	$('.no_products_search').html(languageData.no_products_search);
	$('.cart_h3_title').html(languageData.cart_h3_title);
	$('.no_products_cart').html(languageData.no_products_cart);
	$('.checkout_h4_subtitle').html(languageData.checkout_h4_subtitle);
	$('.checkout_h4_subtitle_2').html(languageData.checkout_h4_subtitle_2);
	$('.preview_button').html(languageData.preview_button);
	$('#btn_finish').html(languageData.modal_confirm_button);
	$('.thx2_h2_title').html(languageData.thx2_h2_title);
	$('.thx2_p_text').html(languageData.thx2_p_text);
	$('.thx3_h2_title').html(languageData.thx3_h2_title);
	$('.thx2_button').html(languageData.thx2_button);
	$('.tocanvas').html(languageData.end_configuration);
	$('.forward').html(languageData.next);
	$('.backward').html(languageData.previous);
	$('.tootherorder').html(languageData.continue_configuration);
	$('.tofinalmodal').html(languageData.send_configuration);
	$('.cart_h4_title_1').html(languageData.cart_h4_title_1);
	$('.cart_h4_title_2').html(languageData.cart_h4_title_2);
	$('.cart_h4_title_3').html(languageData.cart_h4_title_3);
	$('.delete_product').html(languageData.delete_product);
	$('.remove_order_1').html(languageData.remove_order_1);
	$('.remove_order_2').html(languageData.remove_order_2);
	$('.remove_order_3').html(languageData.remove_order_3);
	$('.product_cat').html(languageData.product_cat);
	$('.product_name').html(languageData.product_name);
	$('.product_sku').html(languageData.product_sku);
	$('.product_price').html(languageData.product_price);
	$('.product_brand').html(languageData.product_brand);
	$('.product_sport').html(languageData.product_sport);
	$('.product_tipology').html(languageData.product_tipology);
	$('.product_gender').html(languageData.product_gender);
	$('.gender_breadcrumb_text').html(str_arr[$("#selected_sport_type").val()]);
	if ($("#selected_sport_type").val()){
		if ($("#selected_gender_type").val()){
			$('.brand_breadcrumb_text').html(str_arr[$("#selected_sport_type").val()]+' > '+str_arr[$("#selected_gender_type").val()]);
		}else{
			$('.brand_breadcrumb_text').html(str_arr[$("#selected_sport_type").val()]);
		}
	}
	$('.preview').html(languageData.preview);
	$('.owner').html(languageData.owner);
	$('.modal_user_title').html(languageData.modal_user_title);
	$('.description').html(languageData.description);
	$('.no_products_found').html(languageData.no_products_found);
	$('.total').html(languageData.total);
	$('.personal_discount').html(languageData.personal_discount);

	// get title, content, price from language selection
	var categoryArray = ['t_shirt', 'pants', 'socks', 'ball', 'bags', 'kits', 'sleeve', 'sweat', 'rainjacket', 'jacket', 'longpants'];
	for (let i=1;i<=parseInt(jQuery("#total_order_count").val());i++){
		jQuery(".order_total_"+i).html("0€");
		for (let j=0;j<categoryArray.length;j++){
			if (jQuery("#selected_"+categoryArray[j]+"_type_" + i).val()){
				var param = {
					product : jQuery("#selected_"+categoryArray[j]+"_type_" + i).val(),
					language: language
				};
				$.ajax({
					type: "POST",
					url: "dbconnect/get_product_name_language.php",
					data: param,
					success: function(res){
						if (categoryArray[j] == 't_shirt'){
							jQuery("#selected_shirts_name_" + i).val(res);
							jQuery(".language_shirts_name_" + i).html(res);
						}else{
							jQuery("#selected_"+categoryArray[j]+"_name_" + i).val(res);
							jQuery(".language_"+categoryArray[j]+"_name_" + i).html(res);
						}
					}
				});
				$.ajax({
					type: "POST",
					url: "dbconnect/get_product_content.php",
					data: param,
					success: function(res){
						if (categoryArray[j] == 't_shirt'){
							jQuery(".language_shirts_description_" + i).html(res);
						}else{
							jQuery(".language_"+categoryArray[j]+"_description_" + i).html(res);
						}
					}
				});
				$.ajax({
					type: "POST",
					url: "dbconnect/get_product_price.php",
					data: param,
					success: function(res){
						if (categoryArray[j] == 't_shirt'){
							jQuery("#selected_t_shirt_price_" + i).val("€"+res);
							jQuery(".language_shirts_price_" + i).html("€"+res);
						}else{
							jQuery("#selected_"+categoryArray[j]+"_price_" + i).val("€"+res);
							jQuery(".language_"+categoryArray[j]+"_price_" + i).html("€"+res);
							var current_price = parseFloat(jQuery(".order_total_" + i).html().substring(0, jQuery(".order_total_" + i).html().length));
							jQuery(".order_total_" + i).html(parseFloat(current_price + parseFloat(res)) + "€");
						}
					}
				});
			}
		}
	}
}