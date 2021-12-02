jQuery(document).ready(function(){

    $(window).on("resize", function(e) {
        $(".zoomer_wrapper").zoomer("resize");
    });
    // update the sub breadcrumb when select sport, gender, tyology
	jQuery("input[name=sport_type]").change(function () {
		jQuery("#selected_sport_type").val(this.value);
        jQuery("#selected_sport_type_name").val(jQuery(this).parent().children().last().children().last().html());
        jQuery(".gender_breadcrumb_text").html(jQuery(this).parent().children().last().children().last().html());
        jQuery(".brand_breadcrumb_text").html(jQuery(this).parent().children().last().children().last().html());
	});
	jQuery("input[name=gender_type]").change(function () {
		jQuery("#selected_gender_type").val(this.value);
        jQuery("#selected_gender_type_name").val(jQuery(this).parent().children().last().children().last().html());
        jQuery(".brand_breadcrumb_text").html(jQuery("#selected_sport_type_name").val() + " > " + jQuery(this).parent().children().last().children().last().html());
	});
	jQuery("input[name=brand_type]").change(function () {
		jQuery("#selected_brand_type").val(this.value);
        jQuery("#selected_brand_type_name").val(jQuery(this).parent().children().last().children().last().html());
	});
	jQuery("input[name=typology_type]").change(function () {
		jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(this.value);
        jQuery("#selected_typology_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children().last().html());
	});
    jQuery("input[name=clothes_type]").change(function () {
        jQuery("#selected_clothes_type_" + jQuery("#total_order_count").val()).val(this.value);
        jQuery("#selected_clothes_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children().last().html());
    });

	// get more products when click loadmore button in product pages
    $("#shirt_loadmore").on('click', function(){
        //shirt 157 pants 161 socks 162
        var param = {
            sport : $("#selected_sport_type").val(),
            gender: $("#selected_gender_type").val(),
            brand: $("#selected_brand_type").val(),
            typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
            type : 157,
            current : parseInt($("#shirt_current_page").val()) + 1,
            search_word : $("#shirt_search_word").val()
        };
        $.ajax({
            type: "POST",
            url: "dbconnect/get_products.php",
            data: param,
            success: function(res){
                if(JSON.parse(res).html != "")
                {
                    $("#select_t_shirt").html($("#select_t_shirt").html() + JSON.parse(res).html);
                    $("#shirt_current_page").val(parseInt($("#shirt_current_page").val()) + 1);

                    $("#loader_product").fadeIn();
                    var img_loaded_count = 0;
                    $('#select_t_shirt img').load(function(){
                        img_loaded_count++;
                        if(img_loaded_count == $('#select_t_shirt img').length)
                            $("#loader_product").fadeOut();
                    });
                }
                if(JSON.parse(res).final == 1)
                    $("#shirt_loadmore").hide();
                else
                    $("#shirt_loadmore").show();
                jQuery("input[name=t_shirt_type]").change(function () {
                    jQuery("#selected_t_shirt_type_" + jQuery("#total_order_count").val()).val(this.value);
                    jQuery("#selected_t_shirt_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
                });
            }
        });
    });

    $("#pants_loadmore").on('click', function(){
        //shirt 157 pants 161 socks 162
        var param = {
            sport : $("#selected_sport_type").val(),
            gender: $("#selected_gender_type").val(),
            brand: $("#selected_brand_type").val(),
            typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
            type : 161,
            current : parseInt($("#pants_current_page").val()) + 1,
            search_word : $("#pants_search_word").val()
        };
        $.ajax({
            type: "POST",
            url: "dbconnect/get_products.php",
            data: param,
            success: function(res){
                if(JSON.parse(res).html != "")
                {
                    $("#select_pants").html($("#select_pants").html() + JSON.parse(res).html);
                    $("#pants_current_page").val(parseInt($("#pants_current_page").val()) + 1);

                    $("#loader_product").fadeIn();
                    var img_loaded_count = 0;
                    $('#select_pants img').load(function(){
                        img_loaded_count++;
                        if(img_loaded_count == $('#select_pants img').length)
                            $("#loader_product").fadeOut();
                    });
                }
                if(JSON.parse(res).final == 1)
                    $("#pants_loadmore").hide();
                else
                    $("#pants_loadmore").show();
                jQuery("input[name=pants_type]").change(function () {
                    jQuery("#selected_pants_type_" + jQuery("#total_order_count").val()).val(this.value);
                    jQuery("#selected_pants_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
                });
            }
        });
    });

    $("#socks_loadmore").on('click', function(){
        //shirt 157 pants 161 socks 162
        var param = {
            sport : $("#selected_sport_type").val(),
            gender: $("#selected_gender_type").val(),
            brand: $("#selected_brand_type").val(),
            typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
            type : 162,
            current : parseInt($("#socks_current_page").val()) + 1,
            search_word : $("#socks_search_word").val()
        };
        $.ajax({
            type: "POST",
            url: "dbconnect/get_products.php",
            data: param,
            success: function(res){
                if(JSON.parse(res).html != "")
                {
                    $("#select_socks").html($("#select_socks").html() + JSON.parse(res).html);
                    $("#socks_current_page").val(parseInt($("#socks_current_page").val()) + 1);

                    $("#loader_product").fadeIn();
                    var img_loaded_count = 0;
                    $('#select_socks img').load(function(){
                        img_loaded_count++;
                        if(img_loaded_count == $('#select_socks img').length)
                            $("#loader_product").fadeOut();
                    });
                }
                if(JSON.parse(res).final == 1)
                    $("#socks_loadmore").hide();
                else
                    $("#socks_loadmore").show();
                jQuery("input[name=socks_type]").change(function () {
                    jQuery("#selected_socks_type_" + jQuery("#total_order_count").val()).val(this.value);
                    jQuery("#selected_socks_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
                });
            }
        });
    });

    // search products with value
    $('#shirt_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_shirts(0);
        }
    });
    $('#pants_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_pants(0);
        }
    });
    $('#socks_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_socks(0);
        }
    });
    $('#ball_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_ball(0);
        }
    });
    $('#bags_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_bags(0);
        }
    });
    $('#kits_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_kits(0);
        }
    });
    $('#sleeve_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_sleeve(0);
        }
    });
    $('#sweat_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_sweat(0);
        }
    });
    $('#rainjacket_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_rainjacket(0);
        }
    });
    $('#jacket_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_jacket(0);
        }
    });
    $('#longpants_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_longpants(0);
        }
    });
});

// search shirts with search word
function search_shirts(flag_reset){
    if(flag_reset == 1)
        $("#shirt_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 157,
        current : 0,
        search_word : $("#shirt_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){
            if(JSON.parse(res).html != "")
            {
                $("#select_t_shirt").html(JSON.parse(res).html);
                $("#shirt_current_page").val(0);
                $("#no_shirts_label").hide();
                $("#no_search_shirts_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_t_shirt img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_t_shirt img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_t_shirt").html("");
                $("#shirt_loadmore").hide();
                $("#no_shirts_label").hide();
                $("#no_search_shirts_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#shirt_loadmore").hide();
            else
                $("#shirt_loadmore").show();
            jQuery("input[name=t_shirt_type]").change(function () {
                jQuery("#selected_t_shirt_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_t_shirt_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search pants with search word
function search_pants(flag_reset){
    if(flag_reset == 1)
        $("#pants_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 161,
        current : 0,
        search_word : $("#pants_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){
            if(JSON.parse(res).html != "")
            {
                $("#select_pants").html(JSON.parse(res).html);
                $("#pants_current_page").val(0);
                $("#no_pants_label").hide();
                $("#no_search_pants_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_pants img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_pants img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_pants").html("");
                $("#pants_loadmore").hide();
                $("#no_pants_label").hide();
                $("#no_search_pants_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#pants_loadmore").hide();
            else
                $("#pants_loadmore").show();
            jQuery("input[name=pants_type]").change(function () {
                jQuery("#selected_pants_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_pants_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search socks with search word
function search_socks(flag_reset){
    if(flag_reset == 1)
        $("#socks_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 162,
        current : 0,
        search_word : $("#socks_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_socks").html(JSON.parse(res).html);
                $("#socks_current_page").val(0);
                $("#no_socks_label").hide();
                $("#no_search_socks_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_socks img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_socks img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_socks").html("");
                $("#socks_loadmore").hide();
                $("#no_socks_label").hide();
                $("#no_search_socks_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#socks_loadmore").hide();
            else
                $("#socks_loadmore").show();
            jQuery("input[name=socks_type]").change(function () {
                jQuery("#selected_socks_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_socks_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search ball with search word
function search_ball(flag_reset){
    if(flag_reset == 1)
        $("#ball_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 163,
        current : 0,
        search_word : $("#ball_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_ball").html(JSON.parse(res).html);
                $("#ball_current_page").val(0);
                $("#no_ball_label").hide();
                $("#no_search_ball_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_ball img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_ball img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_ball").html("");
                $("#ball_loadmore").hide();
                $("#no_ball_label").hide();
                $("#no_search_ball_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#ball_loadmore").hide();
            else
                $("#ball_loadmore").show();
            jQuery("input[name=ball_type]").change(function () {
                jQuery("#selected_ball_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_ball_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search bags with search word
function search_bags(flag_reset){
    if(flag_reset == 1)
        $("#bags_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 185,
        current : 0,
        search_word : $("#bags_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_bags").html(JSON.parse(res).html);
                $("#bags_current_page").val(0);
                $("#no_bags_label").hide();
                $("#no_search_bags_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_bags img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_bags img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_bags").html("");
                $("#bags_loadmore").hide();
                $("#no_bags_label").hide();
                $("#no_search_bags_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#bags_loadmore").hide();
            else
                $("#bags_loadmore").show();
            jQuery("input[name=bags_type]").change(function () {
                jQuery("#selected_bags_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_bags_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search kits with search word
function search_kits(flag_reset){
    if(flag_reset == 1)
        $("#kits_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 265,
        current : 0,
        search_word : $("#kits_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_kits").html(JSON.parse(res).html);
                $("#kits_current_page").val(0);
                $("#no_kits_label").hide();
                $("#no_search_kits_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_kits img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_kits img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_kits").html("");
                $("#kits_loadmore").hide();
                $("#no_kits_label").hide();
                $("#no_search_kits_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#kits_loadmore").hide();
            else
                $("#kits_loadmore").show();
            jQuery("input[name=kits_type]").change(function () {
                jQuery("#selected_kits_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_kits_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search sleeve shirts with search word
function search_sleeve(flag_reset){
    if(flag_reset == 1)
        $("#sleeve_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 1791,
        current : 0,
        search_word : $("#sleeve_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_sleeve").html(JSON.parse(res).html);
                $("#sleeve_current_page").val(0);
                $("#no_sleeve_label").hide();
                $("#no_search_sleeve_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_sleeve img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_sleeve img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_sleeve").html("");
                $("#sleeve_loadmore").hide();
                $("#no_sleeve_label").hide();
                $("#no_search_sleeve_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#sleeve_loadmore").hide();
            else
                $("#sleeve_loadmore").show();
            jQuery("input[name=sleeve_type]").change(function () {
                jQuery("#selected_sleeve_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_sleeve_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search sweat with search word
function search_sweat(flag_reset){
    if(flag_reset == 1)
        $("#sweat_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 1792,
        current : 0,
        search_word : $("#sweat_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_sweat").html(JSON.parse(res).html);
                $("#sweat_current_page").val(0);
                $("#no_sweat_label").hide();
                $("#no_search_sweat_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_sweat img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_sweat img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_sweat").html("");
                $("#sweat_loadmore").hide();
                $("#no_sweat_label").hide();
                $("#no_search_sweat_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#sweat_loadmore").hide();
            else
                $("#sweat_loadmore").show();
            jQuery("input[name=sweat_type]").change(function () {
                jQuery("#selected_sweat_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_sweat_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search rain jacket with search word
function search_rainjacket(flag_reset){
    if(flag_reset == 1)
        $("#rainjacket_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 1793,
        current : 0,
        search_word : $("#rainjacket_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_rainjacket").html(JSON.parse(res).html);
                $("#rainjacket_current_page").val(0);
                $("#no_rainjacket_label").hide();
                $("#no_search_rainjacket_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_rainjacket img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_rainjacket img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_rainjacket").html("");
                $("#rainjacket_loadmore").hide();
                $("#no_rainjacket_label").hide();
                $("#no_search_rainjacket_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#rainjacket_loadmore").hide();
            else
                $("#rainjacket_loadmore").show();
            jQuery("input[name=rainjacket_type]").change(function () {
                jQuery("#selected_rainjacket_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_rainjacket_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search jacket with search word
function search_jacket(flag_reset){
    if(flag_reset == 1)
        $("#jacket_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 1794,
        current : 0,
        search_word : $("#jacket_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_jacket").html(JSON.parse(res).html);
                $("#jacket_current_page").val(0);
                $("#no_jacket_label").hide();
                $("#no_search_jacket_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_jacket img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_jacket img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_jacket").html("");
                $("#jacket_loadmore").hide();
                $("#no_jacket_label").hide();
                $("#no_search_jacket_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#jacket_loadmore").hide();
            else
                $("#jacket_loadmore").show();
            jQuery("input[name=jacket_type]").change(function () {
                jQuery("#selected_jacket_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_jacket_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// search longpants with search word
function search_longpants(flag_reset){
    if(flag_reset == 1)
        $("#longpants_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 1795,
        current : 0,
        search_word : $("#longpants_search_word").val(),
        language: language
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_longpants").html(JSON.parse(res).html);
                $("#longpants_current_page").val(0);
                $("#no_longpants_label").hide();
                $("#no_search_longpants_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_longpants img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_longpants img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_longpants").html("");
                $("#longpants_loadmore").hide();
                $("#no_longpants_label").hide();
                $("#no_search_longpants_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#longpants_loadmore").hide();
            else
                $("#longpants_loadmore").show();
            jQuery("input[name=longpants_type]").change(function () {
                jQuery("#selected_longpants_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_longpants_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}
// remove product order in cart page
function remove_product(order_id, product_type)
{
    let temp_order_id = order_id;
    if (order_id > 1){
        temp_order_id = jQuery(".order_title_"+order_id+" .real_order_id").val();
    }
    // remove product detail info when select the order
    var remove_price = 0;
    if(product_type == 1)
    {
        if(jQuery(".shirts_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".shirts_product_" + order_id).remove();
        jQuery("#selected_t_shirt_type_" + temp_order_id).val("");
        jQuery("#selected_t_shirt_type_name_" + temp_order_id).val("");
        jQuery("#selected_shirts_img_" + temp_order_id).val("");
        jQuery("#selected_shirts_name_" + temp_order_id).val("");
        jQuery("#selected_order_shirt_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_shirts_price_" + temp_order_id).html().substring(1, jQuery(".language_shirts_price_" + temp_order_id).html().length));
    }
    else if(product_type == 2)
    {
        if(jQuery(".pants_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".pants_product_" + order_id).remove();
        jQuery("#selected_pants_type_" + temp_order_id).val("");
        jQuery("#selected_pants_type_name_" + temp_order_id).val("");
        jQuery("#selected_pants_img_" + temp_order_id).val("");
        jQuery("#selected_pants_name_" + temp_order_id).val("");
        jQuery("#selected_order_pants_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_pants_price_" + temp_order_id).html().substring(1, jQuery(".language_pants_price_" + temp_order_id).html().length));
    }
    else if(product_type == 3)
    {
        if(jQuery(".socks_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".socks_product_" + order_id).remove();
        jQuery("#selected_socks_type_" + temp_order_id).val("");
        jQuery("#selected_socks_type_name_" + temp_order_id).val("");
        jQuery("#selected_socks_img_" + temp_order_id).val("");
        jQuery("#selected_socks_name_" + temp_order_id).val("");
        jQuery("#selected_order_socks_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_socks_price_" + temp_order_id).html().substring(1, jQuery(".language_socks_price_" + temp_order_id).html().length));
    }
    else if(product_type == 4)
    {
        if(jQuery(".ball_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".ball_product_" + order_id).remove();
        jQuery("#selected_ball_type_" + temp_order_id).val("");
        jQuery("#selected_ball_type_name_" + temp_order_id).val("");
        jQuery("#selected_ball_img_" + temp_order_id).val("");
        jQuery("#selected_ball_name_" + temp_order_id).val("");
        jQuery("#selected_order_ball_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_ball_price_" + temp_order_id).html().substring(1, jQuery(".language_ball_price_" + temp_order_id).html().length));
    }
    else if(product_type == 5)
    {
        if(jQuery(".bags_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".bags_product_" + order_id).remove();
        jQuery("#selected_bags_type_" + temp_order_id).val("");
        jQuery("#selected_bags_type_name_" + temp_order_id).val("");
        jQuery("#selected_bags_img_" + temp_order_id).val("");
        jQuery("#selected_bags_name_" + temp_order_id).val("");
        jQuery("#selected_order_bags_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_bags_price_" + temp_order_id).html().substring(1, jQuery(".language_bags_price_" + temp_order_id).html().length));
    }
    else if(product_type == 6)
    {
        if(jQuery(".kits_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".kits_product_" + order_id).remove();
        jQuery("#selected_kits_type_" + temp_order_id).val("");
        jQuery("#selected_kits_type_name_" + temp_order_id).val("");
        jQuery("#selected_kits_img_" + temp_order_id).val("");
        jQuery("#selected_kits_name_" + temp_order_id).val("");
        jQuery("#selected_order_kits_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_kits_price_" + temp_order_id).html().substring(1, jQuery(".language_kits_price_" + temp_order_id).html().length));
    }
    else if(product_type == 7)
    {
        if(jQuery(".sleeve_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".sleeve_product_" + order_id).remove();
        jQuery("#selected_sleeve_type_" + temp_order_id).val("");
        jQuery("#selected_sleeve_type_name_" + temp_order_id).val("");
        jQuery("#selected_sleeve_img_" + temp_order_id).val("");
        jQuery("#selected_sleeve_name_" + temp_order_id).val("");
        jQuery("#selected_order_sleeve_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_sleeve_price_" + temp_order_id).html().substring(1, jQuery(".language_sleeve_price_" + temp_order_id).html().length));
    }
    else if(product_type == 8)
    {
        if(jQuery(".sweat_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".sweat_product_" + order_id).remove();
        jQuery("#selected_sweat_type_" + temp_order_id).val("");
        jQuery("#selected_sweat_type_name_" + temp_order_id).val("");
        jQuery("#selected_sweat_img_" + temp_order_id).val("");
        jQuery("#selected_sweat_name_" + temp_order_id).val("");
        jQuery("#selected_order_sweat_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_sweat_price_" + temp_order_id).html().substring(1, jQuery(".language_sweat_price_" + temp_order_id).html().length));
    }
    else if(product_type == 9)
    {
        if(jQuery(".rainjacket_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".rainjacket_product_" + order_id).remove();
        jQuery("#selected_rainjacket_type_" + temp_order_id).val("");
        jQuery("#selected_rainjacket_type_name_" + temp_order_id).val("");
        jQuery("#selected_rainjacket_img_" + temp_order_id).val("");
        jQuery("#selected_rainjacket_name_" + temp_order_id).val("");
        jQuery("#selected_order_rainjacket_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_rainjacket_price_" + temp_order_id).html().substring(1, jQuery(".language_rainjacket_price_" + temp_order_id).html().length));
    }
    else if(product_type == 10)
    {
        if(jQuery(".jacket_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".jacket_product_" + order_id).remove();
        jQuery("#selected_jacket_type_" + temp_order_id).val("");
        jQuery("#selected_jacket_type_name_" + temp_order_id).val("");
        jQuery("#selected_jacket_img_" + temp_order_id).val("");
        jQuery("#selected_jacket_name_" + temp_order_id).val("");
        jQuery("#selected_order_jacket_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_jacket_price_" + temp_order_id).html().substring(1, jQuery(".language_jacket_price_" + temp_order_id).html().length));
    }
    else if(product_type == 11)
    {
        if(jQuery(".longpants_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".longpants_product_" + order_id).remove();
        jQuery("#selected_longpants_type_" + temp_order_id).val("");
        jQuery("#selected_longpants_type_name_" + temp_order_id).val("");
        jQuery("#selected_longpants_img_" + temp_order_id).val("");
        jQuery("#selected_longpants_name_" + temp_order_id).val("");
        jQuery("#selected_order_longpants_" + temp_order_id).val("");
        remove_price = parseFloat(jQuery(".language_longpants_price_" + temp_order_id).html().substring(1, jQuery(".language_longpants_price_" + temp_order_id).html().length));
    }
    var total_price = parseFloat(jQuery(".order_total_" + temp_order_id).html().substring(0, jQuery(".order_total_" + temp_order_id).html().length));
    if (total_price == remove_price){
        jQuery(".total_"+order_id).html("");
        jQuery(".personal_discount_"+order_id).html("");
    }else{
        jQuery(".order_total_" + temp_order_id).html(total_price - remove_price + "€");
    }

    if(!jQuery("#selected_t_shirt_type_" + temp_order_id).val() && !jQuery("#selected_pants_type_" + temp_order_id).val() && !jQuery("#selected_socks_type_" + temp_order_id).val() && !jQuery("#selected_ball_type_" + temp_order_id).val() && !jQuery("#selected_bags_type_" + temp_order_id).val() && !jQuery("#selected_kits_type_" + temp_order_id).val() && !jQuery("#selected_sleeve_type_" + temp_order_id).val() && !jQuery("#selected_sweat_type_" + temp_order_id).val() && !jQuery("#selected_rainjacket_type_" + temp_order_id).val() && !jQuery("#selected_jacket_type_" + temp_order_id).val() && !jQuery("#selected_longpants_type_" + temp_order_id).val())
    {
        jQuery(".btn_remove_product_" + order_id).remove();
        jQuery(".order_title_" + order_id).remove();
        jQuery("#selected_typology_type_" + order_id).val("");
        jQuery("#total_order_count").val(parseInt(jQuery("#total_order_count").val()) - 1);

        if (order_id == 1){
            jQuery(".order_title_2 .real_order_id").val(jQuery(".order_title_2 .real_order_id").val()-1);
            jQuery(".order_title_3 .real_order_id").val(jQuery(".order_title_3 .real_order_id").val()-1);
        }else if (order_id == 2){
            jQuery(".order_title_3 .real_order_id").val(jQuery(".order_title_3 .real_order_id").val()-1);
        }
        // remove all data of the order
        if(temp_order_id == 1)
        {
            jQuery("#selected_t_shirt_type_1").val(jQuery("#selected_t_shirt_type_2").val());
            jQuery("#selected_t_shirt_type_name_1").val(jQuery("#selected_t_shirt_type_name_2").val());
            jQuery("#selected_shirts_img_1").val(jQuery("#selected_shirts_img_2").val());
            jQuery("#selected_shirts_name_1").val(jQuery("#selected_shirts_name_2").val());
            jQuery("#selected_order_shirt_1").val(jQuery("#selected_order_shirt_2").val());

            jQuery("#selected_pants_type_1").val(jQuery("#selected_pants_type_2").val());
            jQuery("#selected_pants_type_name_1").val(jQuery("#selected_pants_type_name_2").val());
            jQuery("#selected_pants_img_1").val(jQuery("#selected_pants_img_2").val());
            jQuery("#selected_pants_name_1").val(jQuery("#selected_pants_name_2").val());
            jQuery("#selected_pants_long_1").val(jQuery("#selected_pants_long_2").val());
            jQuery("#selected_order_pants_1").val(jQuery("#selected_order_pants_2").val());

            jQuery("#selected_socks_type_1").val(jQuery("#selected_socks_type_2").val());
            jQuery("#selected_socks_type_name_1").val(jQuery("#selected_socks_type_name_2").val());
            jQuery("#selected_socks_img_1").val(jQuery("#selected_socks_img_2").val());
            jQuery("#selected_socks_name_1").val(jQuery("#selected_socks_name_2").val());
            jQuery("#selected_order_socks_1").val(jQuery("#selected_order_socks_2").val());

            jQuery("#selected_ball_type_1").val(jQuery("#selected_ball_type_2").val());
            jQuery("#selected_ball_type_name_1").val(jQuery("#selected_ball_type_name_2").val());
            jQuery("#selected_ball_img_1").val(jQuery("#selected_ball_img_2").val());
            jQuery("#selected_ball_name_1").val(jQuery("#selected_ball_name_2").val());
            jQuery("#selected_order_ball_1").val(jQuery("#selected_order_ball_2").val());

            jQuery("#selected_bags_type_1").val(jQuery("#selected_bags_type_2").val());
            jQuery("#selected_bags_type_name_1").val(jQuery("#selected_bags_type_name_2").val());
            jQuery("#selected_bags_img_1").val(jQuery("#selected_bags_img_2").val());
            jQuery("#selected_bags_name_1").val(jQuery("#selected_bags_name_2").val());
            jQuery("#selected_order_bags_1").val(jQuery("#selected_order_bags_2").val());

            jQuery("#selected_kits_type_1").val(jQuery("#selected_kits_type_2").val());
            jQuery("#selected_kits_type_name_1").val(jQuery("#selected_kits_type_name_2").val());
            jQuery("#selected_kits_img_1").val(jQuery("#selected_kits_img_2").val());
            jQuery("#selected_kits_name_1").val(jQuery("#selected_kits_name_2").val());
            jQuery("#selected_order_kits_1").val(jQuery("#selected_order_kits_2").val());

            jQuery("#selected_main_canvas_file_name_1").val(jQuery("#selected_main_canvas_file_name_2").val());

            jQuery("#selected_order_typology_1").val(jQuery("#selected_order_typology_2").val());

            jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
            jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
            jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
            jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
            jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

            jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
            jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
            jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
            jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
            jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
            jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

            jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
            jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
            jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
            jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
            jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

            jQuery("#selected_ball_type_2").val(jQuery("#selected_ball_type_3").val());
            jQuery("#selected_ball_type_name_2").val(jQuery("#selected_ball_type_name_3").val());
            jQuery("#selected_ball_img_2").val(jQuery("#selected_ball_img_3").val());
            jQuery("#selected_ball_name_2").val(jQuery("#selected_ball_name_3").val());
            jQuery("#selected_order_ball_2").val(jQuery("#selected_order_ball_3").val());

            jQuery("#selected_bags_type_2").val(jQuery("#selected_bags_type_3").val());
            jQuery("#selected_bags_type_name_2").val(jQuery("#selected_bags_type_name_3").val());
            jQuery("#selected_bags_img_2").val(jQuery("#selected_bags_img_3").val());
            jQuery("#selected_bags_name_2").val(jQuery("#selected_bags_name_3").val());
            jQuery("#selected_order_bags_2").val(jQuery("#selected_order_bags_3").val());

            jQuery("#selected_kits_type_2").val(jQuery("#selected_kits_type_3").val());
            jQuery("#selected_kits_type_name_2").val(jQuery("#selected_kits_type_name_3").val());
            jQuery("#selected_kits_img_2").val(jQuery("#selected_kits_img_3").val());
            jQuery("#selected_kits_name_2").val(jQuery("#selected_kits_name_3").val());
            jQuery("#selected_order_kits_2").val(jQuery("#selected_order_kits_3").val());

            jQuery("#selected_sleeve_type_1").val(jQuery("#selected_sleeve_type_2").val());
            jQuery("#selected_sleeve_type_name_1").val(jQuery("#selected_sleeve_type_name_2").val());
            jQuery("#selected_sleeve_img_1").val(jQuery("#selected_sleeve_img_2").val());
            jQuery("#selected_sleeve_name_1").val(jQuery("#selected_sleeve_name_2").val());
            jQuery("#selected_order_sleeve_1").val(jQuery("#selected_order_sleeve_2").val());

            jQuery("#selected_sweat_type_1").val(jQuery("#selected_sweat_type_2").val());
            jQuery("#selected_sweat_type_name_1").val(jQuery("#selected_sweat_type_name_2").val());
            jQuery("#selected_sweat_img_1").val(jQuery("#selected_sweat_img_2").val());
            jQuery("#selected_sweat_name_1").val(jQuery("#selected_sweat_name_2").val());
            jQuery("#selected_order_sweat_1").val(jQuery("#selected_order_sweat_2").val());

            jQuery("#selected_rainjacket_type_1").val(jQuery("#selected_rainjacket_type_2").val());
            jQuery("#selected_rainjacket_type_name_1").val(jQuery("#selected_rainjacket_type_name_2").val());
            jQuery("#selected_rainjacket_img_1").val(jQuery("#selected_rainjacket_img_2").val());
            jQuery("#selected_rainjacket_name_1").val(jQuery("#selected_rainjacket_name_2").val());
            jQuery("#selected_order_rainjacket_1").val(jQuery("#selected_order_rainjacket_2").val());

            jQuery("#selected_jacket_type_1").val(jQuery("#selected_jacket_type_2").val());
            jQuery("#selected_jacket_type_name_1").val(jQuery("#selected_jacket_type_name_2").val());
            jQuery("#selected_jacket_img_1").val(jQuery("#selected_jacket_img_2").val());
            jQuery("#selected_jacket_name_1").val(jQuery("#selected_jacket_name_2").val());
            jQuery("#selected_order_jacket_1").val(jQuery("#selected_order_jacket_2").val());

            jQuery("#selected_longpants_type_1").val(jQuery("#selected_longpants_type_2").val());
            jQuery("#selected_longpants_type_name_1").val(jQuery("#selected_longpants_type_name_2").val());
            jQuery("#selected_longpants_img_1").val(jQuery("#selected_longpants_img_2").val());
            jQuery("#selected_longpants_name_1").val(jQuery("#selected_longpants_name_2").val());
            jQuery("#selected_order_longpants_1").val(jQuery("#selected_order_longpants_2").val());

            jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

            jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

            jQuery("#selected_t_shirt_type_3").val("");
            jQuery("#selected_t_shirt_type_name_3").val("");
            jQuery("#selected_shirts_img_3").val("");
            jQuery("#selected_shirts_name_3").val("");
            jQuery("#selected_order_shirt_3").val("");

            jQuery("#selected_pants_type_3").val("");
            jQuery("#selected_pants_type_name_3").val("");
            jQuery("#selected_pants_img_3").val("");
            jQuery("#selected_pants_name_3").val("");
            jQuery("#selected_pants_long_3").val("");
            jQuery("#selected_order_pants_3").val("");

            jQuery("#selected_socks_type_3").val("");
            jQuery("#selected_socks_type_name_3").val("");
            jQuery("#selected_socks_img_3").val("");
            jQuery("#selected_socks_name_3").val("");
            jQuery("#selected_order_socks_3").val("");

            jQuery("#selected_ball_type_3").val("");
            jQuery("#selected_ball_type_name_3").val("");
            jQuery("#selected_ball_img_3").val("");
            jQuery("#selected_ball_name_3").val("");
            jQuery("#selected_order_ball_3").val("");

            jQuery("#selected_bags_type_3").val("");
            jQuery("#selected_bags_type_name_3").val("");
            jQuery("#selected_bags_img_3").val("");
            jQuery("#selected_bags_name_3").val("");
            jQuery("#selected_order_bags_3").val("");

            jQuery("#selected_kits_type_3").val("");
            jQuery("#selected_kits_type_name_3").val("");
            jQuery("#selected_kits_img_3").val("");
            jQuery("#selected_kits_name_3").val("");
            jQuery("#selected_order_kits_3").val("");

            jQuery("#selected_sleeve_type_3").val("");
            jQuery("#selected_sleeve_type_name_3").val("");
            jQuery("#selected_sleeve_img_3").val("");
            jQuery("#selected_sleeve_name_3").val("");
            jQuery("#selected_order_sleeve_3").val("");

            jQuery("#selected_sweat_type_3").val("");
            jQuery("#selected_sweat_type_name_3").val("");
            jQuery("#selected_sweat_img_3").val("");
            jQuery("#selected_sweat_name_3").val("");
            jQuery("#selected_order_sweat_3").val("");

            jQuery("#selected_rainjacket_type_3").val("");
            jQuery("#selected_rainjacket_type_name_3").val("");
            jQuery("#selected_rainjacket_img_3").val("");
            jQuery("#selected_rainjacket_name_3").val("");
            jQuery("#selected_order_rainjacket_3").val("");

            jQuery("#selected_jacket_type_3").val("");
            jQuery("#selected_jacket_type_name_3").val("");
            jQuery("#selected_jacket_img_3").val("");
            jQuery("#selected_jacket_name_3").val("");
            jQuery("#selected_order_jacket_3").val("");

            jQuery("#selected_longpants_type_3").val("");
            jQuery("#selected_longpants_type_name_3").val("");
            jQuery("#selected_longpants_img_3").val("");
            jQuery("#selected_longpants_name_3").val("");
            jQuery("#selected_order_longpants_3").val("");

            jQuery("#selected_main_canvas_file_name_3").val("");

            jQuery("#selected_order_typology_3").val("");
        }

        if(temp_order_id == 2)
        {
            jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
            jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
            jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
            jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
            jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

            jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
            jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
            jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
            jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
            jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
            jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

            jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
            jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
            jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
            jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
            jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

            jQuery("#selected_ball_type_2").val(jQuery("#selected_ball_type_3").val());
            jQuery("#selected_ball_type_name_2").val(jQuery("#selected_ball_type_name_3").val());
            jQuery("#selected_ball_img_2").val(jQuery("#selected_ball_img_3").val());
            jQuery("#selected_ball_name_2").val(jQuery("#selected_ball_name_3").val());
            jQuery("#selected_order_ball_2").val(jQuery("#selected_order_ball_3").val());

            jQuery("#selected_bags_type_2").val(jQuery("#selected_bags_type_3").val());
            jQuery("#selected_bags_type_name_2").val(jQuery("#selected_bags_type_name_3").val());
            jQuery("#selected_bags_img_2").val(jQuery("#selected_bags_img_3").val());
            jQuery("#selected_bags_name_2").val(jQuery("#selected_bags_name_3").val());
            jQuery("#selected_order_bags_2").val(jQuery("#selected_order_bags_3").val());

            jQuery("#selected_kits_type_2").val(jQuery("#selected_kits_type_3").val());
            jQuery("#selected_kits_type_name_2").val(jQuery("#selected_kits_type_name_3").val());
            jQuery("#selected_kits_img_2").val(jQuery("#selected_kits_img_3").val());
            jQuery("#selected_kits_name_2").val(jQuery("#selected_kits_name_3").val());
            jQuery("#selected_order_kits_2").val(jQuery("#selected_order_kits_3").val());

            jQuery("#selected_sleeve_type_2").val(jQuery("#selected_sleeve_type_3").val());
            jQuery("#selected_sleeve_type_name_2").val(jQuery("#selected_sleeve_type_name_3").val());
            jQuery("#selected_sleeve_img_2").val(jQuery("#selected_sleeve_img_3").val());
            jQuery("#selected_sleeve_name_2").val(jQuery("#selected_sleeve_name_3").val());
            jQuery("#selected_order_sleeve_2").val(jQuery("#selected_order_sleeve_3").val());

            jQuery("#selected_sweat_type_2").val(jQuery("#selected_sweat_type_3").val());
            jQuery("#selected_sweat_type_name_2").val(jQuery("#selected_sweat_type_name_3").val());
            jQuery("#selected_sweat_img_2").val(jQuery("#selected_sweat_img_3").val());
            jQuery("#selected_sweat_name_2").val(jQuery("#selected_sweat_name_3").val());
            jQuery("#selected_order_sweat_2").val(jQuery("#selected_order_sweat_3").val());

            jQuery("#selected_rainjacket_type_2").val(jQuery("#selected_rainjacket_type_3").val());
            jQuery("#selected_rainjacket_type_name_2").val(jQuery("#selected_rainjacket_type_name_3").val());
            jQuery("#selected_rainjacket_img_2").val(jQuery("#selected_rainjacket_img_3").val());
            jQuery("#selected_rainjacket_name_2").val(jQuery("#selected_rainjacket_name_3").val());
            jQuery("#selected_order_rainjacket_2").val(jQuery("#selected_order_rainjacket_3").val());

            jQuery("#selected_jacket_type_2").val(jQuery("#selected_jacket_type_3").val());
            jQuery("#selected_jacket_type_name_2").val(jQuery("#selected_jacket_type_name_3").val());
            jQuery("#selected_jacket_img_2").val(jQuery("#selected_jacket_img_3").val());
            jQuery("#selected_jacket_name_2").val(jQuery("#selected_jacket_name_3").val());
            jQuery("#selected_order_jacket_2").val(jQuery("#selected_order_jacket_3").val());

            jQuery("#selected_longpants_type_2").val(jQuery("#selected_longpants_type_3").val());
            jQuery("#selected_longpants_type_name_2").val(jQuery("#selected_longpants_type_name_3").val());
            jQuery("#selected_longpants_img_2").val(jQuery("#selected_longpants_img_3").val());
            jQuery("#selected_longpants_name_2").val(jQuery("#selected_longpants_name_3").val());
            jQuery("#selected_order_longpants_2").val(jQuery("#selected_order_longpants_3").val());

            jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

            jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

            jQuery("#selected_t_shirt_type_3").val("");
            jQuery("#selected_t_shirt_type_name_3").val("");
            jQuery("#selected_shirts_img_3").val("");
            jQuery("#selected_shirts_name_3").val("");
            jQuery("#selected_order_shirt_3").val("");

            jQuery("#selected_pants_type_3").val("");
            jQuery("#selected_pants_type_name_3").val("");
            jQuery("#selected_pants_img_3").val("");
            jQuery("#selected_pants_name_3").val("");
            jQuery("#selected_pants_long_3").val("");
            jQuery("#selected_order_pants_3").val("");

            jQuery("#selected_socks_type_3").val("");
            jQuery("#selected_socks_type_name_3").val("");
            jQuery("#selected_socks_img_3").val("");
            jQuery("#selected_socks_name_3").val("");
            jQuery("#selected_order_socks_3").val("");

            jQuery("#selected_ball_type_3").val("");
            jQuery("#selected_ball_type_name_3").val("");
            jQuery("#selected_ball_img_3").val("");
            jQuery("#selected_ball_name_3").val("");
            jQuery("#selected_order_ball_3").val("");

            jQuery("#selected_bags_type_3").val("");
            jQuery("#selected_bags_type_name_3").val("");
            jQuery("#selected_bags_img_3").val("");
            jQuery("#selected_bags_name_3").val("");
            jQuery("#selected_order_bags_3").val("");

            jQuery("#selected_kits_type_3").val("");
            jQuery("#selected_kits_type_name_3").val("");
            jQuery("#selected_kits_img_3").val("");
            jQuery("#selected_kits_name_3").val("");
            jQuery("#selected_order_kits_3").val("");

            jQuery("#selected_sleeve_type_3").val("");
            jQuery("#selected_sleeve_type_name_3").val("");
            jQuery("#selected_sleeve_img_3").val("");
            jQuery("#selected_sleeve_name_3").val("");
            jQuery("#selected_order_sleeve_3").val("");

            jQuery("#selected_sweat_type_3").val("");
            jQuery("#selected_sweat_type_name_3").val("");
            jQuery("#selected_sweat_img_3").val("");
            jQuery("#selected_sweat_name_3").val("");
            jQuery("#selected_order_sweat_3").val("");

            jQuery("#selected_rainjacket_type_3").val("");
            jQuery("#selected_rainjacket_type_name_3").val("");
            jQuery("#selected_rainjacket_img_3").val("");
            jQuery("#selected_rainjacket_name_3").val("");
            jQuery("#selected_order_rainjacket_3").val("");

            jQuery("#selected_jacket_type_3").val("");
            jQuery("#selected_jacket_type_name_3").val("");
            jQuery("#selected_jacket_img_3").val("");
            jQuery("#selected_jacket_name_3").val("");
            jQuery("#selected_order_jacket_3").val("");

            jQuery("#selected_longpants_type_3").val("");
            jQuery("#selected_longpants_type_name_3").val("");
            jQuery("#selected_longpants_img_3").val("");
            jQuery("#selected_longpants_name_3").val("");
            jQuery("#selected_order_longpants_3").val("");

            jQuery("#selected_main_canvas_file_name_3").val("");
            
            jQuery("#selected_order_typology_3").val("");
        }
    }
    if(parseInt(jQuery("#cart_alarm").html()) <= 0)
    {
        jQuery("#cart_alarm").html("0");
        jQuery("#tocartpage").hide();
        jQuery("#tocanvas").hide();
        jQuery("#nothing_product").show();
    }

    if(parseInt(jQuery("#total_order_count").val()) >= 3)
        jQuery("#backward").hide();
    else
        jQuery("#backward").show();
}

function remove_order(order_id)
{
    let temp_order_id = order_id;
    if (order_id > 1){
        temp_order_id = jQuery(".order_title_"+order_id+" .real_order_id").val();
    }
    // remove total price in cart
    jQuery(".total_"+order_id).html("");
    jQuery(".personal_discount_"+order_id).html("");

    if(jQuery(".shirts_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".shirts_product_" + order_id).remove();
    jQuery("#selected_t_shirt_type_" + temp_order_id).val("");
    jQuery("#selected_t_shirt_type_name_" + temp_order_id).val("");
    jQuery("#selected_shirts_img_" + temp_order_id).val("");
    jQuery("#selected_shirts_name_" + temp_order_id).val("");

    if(jQuery(".pants_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".pants_product_" + order_id).remove();
    jQuery("#selected_pants_type_" + temp_order_id).val("");
    jQuery("#selected_pants_type_name_" + temp_order_id).val("");
    jQuery("#selected_pants_img_" + temp_order_id).val("");
    jQuery("#selected_pants_name_" + temp_order_id).val("");

    if(jQuery(".socks_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".socks_product_" + order_id).remove();
    jQuery("#selected_socks_type_" + temp_order_id).val("");
    jQuery("#selected_socks_type_name_" + temp_order_id).val("");
    jQuery("#selected_socks_img_" + temp_order_id).val("");
    jQuery("#selected_socks_name_" + temp_order_id).val("");

    if(jQuery(".ball_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".ball_product_" + order_id).remove();
    jQuery("#selected_ball_type_" + temp_order_id).val("");
    jQuery("#selected_ball_type_name_" + temp_order_id).val("");
    jQuery("#selected_ball_img_" + temp_order_id).val("");
    jQuery("#selected_ball_name_" + temp_order_id).val("");

    if(jQuery(".bags_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".bags_product_" + order_id).remove();
    jQuery("#selected_bags_type_" + temp_order_id).val("");
    jQuery("#selected_bags_type_name_" + temp_order_id).val("");
    jQuery("#selected_bags_img_" + temp_order_id).val("");
    jQuery("#selected_bags_name_" + temp_order_id).val("");

    if(jQuery(".kits_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".kits_product_" + order_id).remove();
    jQuery("#selected_kits_type_" + temp_order_id).val("");
    jQuery("#selected_kits_type_name_" + temp_order_id).val("");
    jQuery("#selected_kits_img_" + temp_order_id).val("");
    jQuery("#selected_kits_name_" + temp_order_id).val("");

    if(jQuery(".sleeve_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".sleeve_product_" + order_id).remove();
    jQuery("#selected_sleeve_type_" + temp_order_id).val("");
    jQuery("#selected_sleeve_type_name_" + temp_order_id).val("");
    jQuery("#selected_sleeve_img_" + temp_order_id).val("");
    jQuery("#selected_sleeve_name_" + temp_order_id).val("");

    if(jQuery(".sweat_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".sweat_product_" + order_id).remove();
    jQuery("#selected_sweat_type_" + temp_order_id).val("");
    jQuery("#selected_sweat_type_name_" + temp_order_id).val("");
    jQuery("#selected_sweat_img_" + temp_order_id).val("");
    jQuery("#selected_sweat_name_" + temp_order_id).val("");

    if(jQuery(".rainjacket_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".rainjacket_product_" + order_id).remove();
    jQuery("#selected_rainjacket_type_" + temp_order_id).val("");
    jQuery("#selected_rainjacket_type_name_" + temp_order_id).val("");
    jQuery("#selected_rainjacket_img_" + temp_order_id).val("");
    jQuery("#selected_rainjacket_name_" + temp_order_id).val("");

    if(jQuery(".jacket_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".jacket_product_" + order_id).remove();
    jQuery("#selected_jacket_type_" + temp_order_id).val("");
    jQuery("#selected_jacket_type_name_" + temp_order_id).val("");
    jQuery("#selected_jacket_img_" + temp_order_id).val("");
    jQuery("#selected_jacket_name_" + temp_order_id).val("");

    if(jQuery(".longpants_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".longpants_product_" + order_id).remove();
    jQuery("#selected_longpants_type_" + temp_order_id).val("");
    jQuery("#selected_longpants_type_name_" + temp_order_id).val("");
    jQuery("#selected_longpants_img_" + temp_order_id).val("");
    jQuery("#selected_longpants_name_" + temp_order_id).val("");

    jQuery(".btn_remove_product_" + order_id).remove();
    jQuery(".order_title_" + order_id).remove();
    jQuery("#selected_typology_type_" + order_id).val("");
    jQuery("#total_order_count").val(parseInt(jQuery("#total_order_count").val()) - 1);

    if(parseInt(jQuery("#cart_alarm").html()) <= 0)
    {
        jQuery("#cart_alarm").html("0");
        jQuery("#tocartpage").hide();
        jQuery("#tocanvas").hide();
        jQuery("#nothing_product").show();
    }

    if(parseInt(jQuery("#total_order_count").val()) >= 3)
        jQuery("#backward").hide();
    else
        jQuery("#backward").show();

    if (order_id == 1){
        jQuery(".order_title_2 .real_order_id").val(jQuery(".order_title_2 .real_order_id").val()-1);
        jQuery(".order_title_3 .real_order_id").val(jQuery(".order_title_3 .real_order_id").val()-1);
    }else if (order_id == 2){
        jQuery(".order_title_3 .real_order_id").val(jQuery(".order_title_3 .real_order_id").val()-1);
    }
    if(temp_order_id == 1)
    {
        jQuery("#selected_t_shirt_type_1").val(jQuery("#selected_t_shirt_type_2").val());
        jQuery("#selected_t_shirt_type_name_1").val(jQuery("#selected_t_shirt_type_name_2").val());
        jQuery("#selected_shirts_img_1").val(jQuery("#selected_shirts_img_2").val());
        jQuery("#selected_shirts_name_1").val(jQuery("#selected_shirts_name_2").val());
        jQuery("#selected_order_shirt_1").val(jQuery("#selected_order_shirt_2").val());

        jQuery("#selected_pants_type_1").val(jQuery("#selected_pants_type_2").val());
        jQuery("#selected_pants_type_name_1").val(jQuery("#selected_pants_type_name_2").val());
        jQuery("#selected_pants_img_1").val(jQuery("#selected_pants_img_2").val());
        jQuery("#selected_pants_name_1").val(jQuery("#selected_pants_name_2").val());
        jQuery("#selected_pants_long_1").val(jQuery("#selected_pants_long_2").val());
        jQuery("#selected_order_pants_1").val(jQuery("#selected_order_pants_2").val());

        jQuery("#selected_socks_type_1").val(jQuery("#selected_socks_type_2").val());
        jQuery("#selected_socks_type_name_1").val(jQuery("#selected_socks_type_name_2").val());
        jQuery("#selected_socks_img_1").val(jQuery("#selected_socks_img_2").val());
        jQuery("#selected_socks_name_1").val(jQuery("#selected_socks_name_2").val());
        jQuery("#selected_order_socks_1").val(jQuery("#selected_order_socks_2").val());

        jQuery("#selected_ball_type_1").val(jQuery("#selected_ball_type_2").val());
        jQuery("#selected_ball_type_name_1").val(jQuery("#selected_ball_type_name_2").val());
        jQuery("#selected_ball_img_1").val(jQuery("#selected_ball_img_2").val());
        jQuery("#selected_ball_name_1").val(jQuery("#selected_ball_name_2").val());
        jQuery("#selected_order_ball_1").val(jQuery("#selected_order_ball_2").val());

        jQuery("#selected_bags_type_1").val(jQuery("#selected_bags_type_2").val());
        jQuery("#selected_bags_type_name_1").val(jQuery("#selected_bags_type_name_2").val());
        jQuery("#selected_bags_img_1").val(jQuery("#selected_bags_img_2").val());
        jQuery("#selected_bags_name_1").val(jQuery("#selected_bags_name_2").val());
        jQuery("#selected_order_bags_1").val(jQuery("#selected_order_bags_2").val());

        jQuery("#selected_kits_type_1").val(jQuery("#selected_kits_type_2").val());
        jQuery("#selected_kits_type_name_1").val(jQuery("#selected_kits_type_name_2").val());
        jQuery("#selected_kits_img_1").val(jQuery("#selected_kits_img_2").val());
        jQuery("#selected_kits_name_1").val(jQuery("#selected_kits_name_2").val());
        jQuery("#selected_order_kits_1").val(jQuery("#selected_order_kits_2").val());

        jQuery("#selected_sleeve_type_1").val(jQuery("#selected_sleeve_type_2").val());
        jQuery("#selected_sleeve_type_name_1").val(jQuery("#selected_sleeve_type_name_2").val());
        jQuery("#selected_sleeve_img_1").val(jQuery("#selected_sleeve_img_2").val());
        jQuery("#selected_sleeve_name_1").val(jQuery("#selected_sleeve_name_2").val());
        jQuery("#selected_order_sleeve_1").val(jQuery("#selected_order_sleeve_2").val());

        jQuery("#selected_sweat_type_1").val(jQuery("#selected_sweat_type_2").val());
        jQuery("#selected_sweat_type_name_1").val(jQuery("#selected_sweat_type_name_2").val());
        jQuery("#selected_sweat_img_1").val(jQuery("#selected_sweat_img_2").val());
        jQuery("#selected_sweat_name_1").val(jQuery("#selected_sweat_name_2").val());
        jQuery("#selected_order_sweat_1").val(jQuery("#selected_order_sweat_2").val());

        jQuery("#selected_rainjacket_type_1").val(jQuery("#selected_rainjacket_type_2").val());
        jQuery("#selected_rainjacket_type_name_1").val(jQuery("#selected_rainjacket_type_name_2").val());
        jQuery("#selected_rainjacket_img_1").val(jQuery("#selected_rainjacket_img_2").val());
        jQuery("#selected_rainjacket_name_1").val(jQuery("#selected_rainjacket_name_2").val());
        jQuery("#selected_order_rainjacket_1").val(jQuery("#selected_order_rainjacket_2").val());

        jQuery("#selected_jacket_type_1").val(jQuery("#selected_jacket_type_2").val());
        jQuery("#selected_jacket_type_name_1").val(jQuery("#selected_jacket_type_name_2").val());
        jQuery("#selected_jacket_img_1").val(jQuery("#selected_jacket_img_2").val());
        jQuery("#selected_jacket_name_1").val(jQuery("#selected_jacket_name_2").val());
        jQuery("#selected_order_jacket_1").val(jQuery("#selected_order_jacket_2").val());

        jQuery("#selected_longpants_type_1").val(jQuery("#selected_longpants_type_2").val());
        jQuery("#selected_longpants_type_name_1").val(jQuery("#selected_longpants_type_name_2").val());
        jQuery("#selected_longpants_img_1").val(jQuery("#selected_longpants_img_2").val());
        jQuery("#selected_longpants_name_1").val(jQuery("#selected_longpants_name_2").val());
        jQuery("#selected_order_longpants_1").val(jQuery("#selected_order_longpants_2").val());

        jQuery("#selected_main_canvas_file_name_1").val(jQuery("#selected_main_canvas_file_name_2").val());

        jQuery("#selected_order_typology_1").val(jQuery("#selected_order_typology_2").val());

        jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
        jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
        jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
        jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
        jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

        jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
        jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
        jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
        jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
        jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
        jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

        jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
        jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
        jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
        jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
        jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

        jQuery("#selected_ball_type_2").val(jQuery("#selected_ball_type_3").val());
        jQuery("#selected_ball_type_name_2").val(jQuery("#selected_ball_type_name_3").val());
        jQuery("#selected_ball_img_2").val(jQuery("#selected_ball_img_3").val());
        jQuery("#selected_ball_name_2").val(jQuery("#selected_ball_name_3").val());
        jQuery("#selected_order_ball_2").val(jQuery("#selected_order_ball_3").val());

        jQuery("#selected_bags_type_2").val(jQuery("#selected_bags_type_3").val());
        jQuery("#selected_bags_type_name_2").val(jQuery("#selected_bags_type_name_3").val());
        jQuery("#selected_bags_img_2").val(jQuery("#selected_bags_img_3").val());
        jQuery("#selected_bags_name_2").val(jQuery("#selected_bags_name_3").val());
        jQuery("#selected_order_bags_2").val(jQuery("#selected_order_bags_3").val());

        jQuery("#selected_kits_type_2").val(jQuery("#selected_kits_type_3").val());
        jQuery("#selected_kits_type_name_2").val(jQuery("#selected_kits_type_name_3").val());
        jQuery("#selected_kits_img_2").val(jQuery("#selected_kits_img_3").val());
        jQuery("#selected_kits_name_2").val(jQuery("#selected_kits_name_3").val());
        jQuery("#selected_order_kits_2").val(jQuery("#selected_order_kits_3").val());

        jQuery("#selected_sleeve_type_2").val(jQuery("#selected_sleeve_type_3").val());
        jQuery("#selected_sleeve_type_name_2").val(jQuery("#selected_sleeve_type_name_3").val());
        jQuery("#selected_sleeve_img_2").val(jQuery("#selected_sleeve_img_3").val());
        jQuery("#selected_sleeve_name_2").val(jQuery("#selected_sleeve_name_3").val());
        jQuery("#selected_order_sleeve_2").val(jQuery("#selected_order_sleeve_3").val());

        jQuery("#selected_sweat_type_2").val(jQuery("#selected_sweat_type_3").val());
        jQuery("#selected_sweat_type_name_2").val(jQuery("#selected_sweat_type_name_3").val());
        jQuery("#selected_sweat_img_2").val(jQuery("#selected_sweat_img_3").val());
        jQuery("#selected_sweat_name_2").val(jQuery("#selected_sweat_name_3").val());
        jQuery("#selected_order_sweat_2").val(jQuery("#selected_order_sweat_3").val());

        jQuery("#selected_rainjacket_type_2").val(jQuery("#selected_rainjacket_type_3").val());
        jQuery("#selected_rainjacket_type_name_2").val(jQuery("#selected_rainjacket_type_name_3").val());
        jQuery("#selected_rainjacket_img_2").val(jQuery("#selected_rainjacket_img_3").val());
        jQuery("#selected_rainjacket_name_2").val(jQuery("#selected_rainjacket_name_3").val());
        jQuery("#selected_order_rainjacket_2").val(jQuery("#selected_order_rainjacket_3").val());

        jQuery("#selected_jacket_type_2").val(jQuery("#selected_jacket_type_3").val());
        jQuery("#selected_jacket_type_name_2").val(jQuery("#selected_jacket_type_name_3").val());
        jQuery("#selected_jacket_img_2").val(jQuery("#selected_jacket_img_3").val());
        jQuery("#selected_jacket_name_2").val(jQuery("#selected_jacket_name_3").val());
        jQuery("#selected_order_jacket_2").val(jQuery("#selected_order_jacket_3").val());

        jQuery("#selected_longpants_type_2").val(jQuery("#selected_longpants_type_3").val());
        jQuery("#selected_longpants_type_name_2").val(jQuery("#selected_longpants_type_name_3").val());
        jQuery("#selected_longpants_img_2").val(jQuery("#selected_longpants_img_3").val());
        jQuery("#selected_longpants_name_2").val(jQuery("#selected_longpants_name_3").val());
        jQuery("#selected_order_longpants_2").val(jQuery("#selected_order_longpants_3").val());

        jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

        jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

        jQuery("#selected_t_shirt_type_3").val("");
        jQuery("#selected_t_shirt_type_name_3").val("");
        jQuery("#selected_shirts_img_3").val("");
        jQuery("#selected_shirts_name_3").val("");
        jQuery("#selected_order_shirt_3").val("");

        jQuery("#selected_pants_type_3").val("");
        jQuery("#selected_pants_type_name_3").val("");
        jQuery("#selected_pants_img_3").val("");
        jQuery("#selected_pants_name_3").val("");
        jQuery("#selected_pants_long_3").val("");
        jQuery("#selected_order_pants_3").val("");

        jQuery("#selected_socks_type_3").val("");
        jQuery("#selected_socks_type_name_3").val("");
        jQuery("#selected_socks_img_3").val("");
        jQuery("#selected_socks_name_3").val("");
        jQuery("#selected_order_socks_3").val("");

        jQuery("#selected_ball_type_3").val("");
        jQuery("#selected_ball_type_name_3").val("");
        jQuery("#selected_ball_img_3").val("");
        jQuery("#selected_ball_name_3").val("");
        jQuery("#selected_order_ball_3").val("");

        jQuery("#selected_bags_type_3").val("");
        jQuery("#selected_bags_type_name_3").val("");
        jQuery("#selected_bags_img_3").val("");
        jQuery("#selected_bags_name_3").val("");
        jQuery("#selected_order_bags_3").val("");

        jQuery("#selected_kits_type_3").val("");
        jQuery("#selected_kits_type_name_3").val("");
        jQuery("#selected_kits_img_3").val("");
        jQuery("#selected_kits_name_3").val("");
        jQuery("#selected_order_kits_3").val("");

        jQuery("#selected_sleeve_type_3").val("");
        jQuery("#selected_sleeve_type_name_3").val("");
        jQuery("#selected_sleeve_img_3").val("");
        jQuery("#selected_sleeve_name_3").val("");
        jQuery("#selected_order_sleeve_3").val("");

        jQuery("#selected_sweat_type_3").val("");
        jQuery("#selected_sweat_type_name_3").val("");
        jQuery("#selected_sweat_img_3").val("");
        jQuery("#selected_sweat_name_3").val("");
        jQuery("#selected_order_sweat_3").val("");

        jQuery("#selected_rainjacket_type_3").val("");
        jQuery("#selected_rainjacket_type_name_3").val("");
        jQuery("#selected_rainjacket_img_3").val("");
        jQuery("#selected_rainjacket_name_3").val("");
        jQuery("#selected_order_rainjacket_3").val("");

        jQuery("#selected_jacket_type_3").val("");
        jQuery("#selected_jacket_type_name_3").val("");
        jQuery("#selected_jacket_img_3").val("");
        jQuery("#selected_jacket_name_3").val("");
        jQuery("#selected_order_jacket_3").val("");

        jQuery("#selected_longpants_type_3").val("");
        jQuery("#selected_longpants_type_name_3").val("");
        jQuery("#selected_longpants_img_3").val("");
        jQuery("#selected_longpants_name_3").val("");
        jQuery("#selected_order_longpants_3").val("");

        jQuery("#selected_main_canvas_file_name_3").val("");

        jQuery("#selected_order_typology_3").val("");
    }

    if(temp_order_id == 2)
    {
        jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
        jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
        jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
        jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
        jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

        jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
        jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
        jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
        jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
        jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
        jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

        jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
        jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
        jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
        jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
        jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

        jQuery("#selected_ball_type_2").val(jQuery("#selected_ball_type_3").val());
        jQuery("#selected_ball_type_name_2").val(jQuery("#selected_ball_type_name_3").val());
        jQuery("#selected_ball_img_2").val(jQuery("#selected_ball_img_3").val());
        jQuery("#selected_ball_name_2").val(jQuery("#selected_ball_name_3").val());
        jQuery("#selected_order_ball_2").val(jQuery("#selected_order_ball_3").val());

        jQuery("#selected_bags_type_2").val(jQuery("#selected_bags_type_3").val());
        jQuery("#selected_bags_type_name_2").val(jQuery("#selected_bags_type_name_3").val());
        jQuery("#selected_bags_img_2").val(jQuery("#selected_bags_img_3").val());
        jQuery("#selected_bags_name_2").val(jQuery("#selected_bags_name_3").val());
        jQuery("#selected_order_bags_2").val(jQuery("#selected_order_bags_3").val());

        jQuery("#selected_kits_type_2").val(jQuery("#selected_kits_type_3").val());
        jQuery("#selected_kits_type_name_2").val(jQuery("#selected_kits_type_name_3").val());
        jQuery("#selected_kits_img_2").val(jQuery("#selected_kits_img_3").val());
        jQuery("#selected_kits_name_2").val(jQuery("#selected_kits_name_3").val());
        jQuery("#selected_order_kits_2").val(jQuery("#selected_order_kits_3").val());

        jQuery("#selected_sleeve_type_2").val(jQuery("#selected_sleeve_type_3").val());
        jQuery("#selected_sleeve_type_name_2").val(jQuery("#selected_sleeve_type_name_3").val());
        jQuery("#selected_sleeve_img_2").val(jQuery("#selected_sleeve_img_3").val());
        jQuery("#selected_sleeve_name_2").val(jQuery("#selected_sleeve_name_3").val());
        jQuery("#selected_order_sleeve_2").val(jQuery("#selected_order_sleeve_3").val());

        jQuery("#selected_sweat_type_2").val(jQuery("#selected_sweat_type_3").val());
        jQuery("#selected_sweat_type_name_2").val(jQuery("#selected_sweat_type_name_3").val());
        jQuery("#selected_sweat_img_2").val(jQuery("#selected_sweat_img_3").val());
        jQuery("#selected_sweat_name_2").val(jQuery("#selected_sweat_name_3").val());
        jQuery("#selected_order_sweat_2").val(jQuery("#selected_order_sweat_3").val());

        jQuery("#selected_rainjacket_type_2").val(jQuery("#selected_rainjacket_type_3").val());
        jQuery("#selected_rainjacket_type_name_2").val(jQuery("#selected_rainjacket_type_name_3").val());
        jQuery("#selected_rainjacket_img_2").val(jQuery("#selected_rainjacket_img_3").val());
        jQuery("#selected_rainjacket_name_2").val(jQuery("#selected_rainjacket_name_3").val());
        jQuery("#selected_order_rainjacket_2").val(jQuery("#selected_order_rainjacket_3").val());

        jQuery("#selected_jacket_type_2").val(jQuery("#selected_jacket_type_3").val());
        jQuery("#selected_jacket_type_name_2").val(jQuery("#selected_jacket_type_name_3").val());
        jQuery("#selected_jacket_img_2").val(jQuery("#selected_jacket_img_3").val());
        jQuery("#selected_jacket_name_2").val(jQuery("#selected_jacket_name_3").val());
        jQuery("#selected_order_jacket_2").val(jQuery("#selected_order_jacket_3").val());

        jQuery("#selected_longpants_type_2").val(jQuery("#selected_longpants_type_3").val());
        jQuery("#selected_longpants_type_name_2").val(jQuery("#selected_longpants_type_name_3").val());
        jQuery("#selected_longpants_img_2").val(jQuery("#selected_longpants_img_3").val());
        jQuery("#selected_longpants_name_2").val(jQuery("#selected_longpants_name_3").val());
        jQuery("#selected_order_longpants_2").val(jQuery("#selected_order_longpants_3").val());

        jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

        jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

        jQuery("#selected_t_shirt_type_3").val("");
        jQuery("#selected_t_shirt_type_name_3").val("");
        jQuery("#selected_shirts_img_3").val("");
        jQuery("#selected_shirts_name_3").val("");
        jQuery("#selected_order_shirt_3").val("");

        jQuery("#selected_pants_type_3").val("");
        jQuery("#selected_pants_type_name_3").val("");
        jQuery("#selected_pants_img_3").val("");
        jQuery("#selected_pants_name_3").val("");
        jQuery("#selected_pants_long_3").val("");
        jQuery("#selected_order_pants_3").val("");

        jQuery("#selected_socks_type_3").val("");
        jQuery("#selected_socks_type_name_3").val("");
        jQuery("#selected_socks_img_3").val("");
        jQuery("#selected_socks_name_3").val("");
        jQuery("#selected_order_socks_3").val("");

        jQuery("#selected_ball_type_3").val("");
        jQuery("#selected_ball_type_name_3").val("");
        jQuery("#selected_ball_img_3").val("");
        jQuery("#selected_ball_name_3").val("");
        jQuery("#selected_order_ball_3").val("");

        jQuery("#selected_bags_type_3").val("");
        jQuery("#selected_bags_type_name_3").val("");
        jQuery("#selected_bags_img_3").val("");
        jQuery("#selected_bags_name_3").val("");
        jQuery("#selected_order_bags_3").val("");

        jQuery("#selected_kits_type_3").val("");
        jQuery("#selected_kits_type_name_3").val("");
        jQuery("#selected_kits_img_3").val("");
        jQuery("#selected_kits_name_3").val("");
        jQuery("#selected_order_kits_3").val("");

        jQuery("#selected_sleeve_type_3").val("");
        jQuery("#selected_sleeve_type_name_3").val("");
        jQuery("#selected_sleeve_img_3").val("");
        jQuery("#selected_sleeve_name_3").val("");
        jQuery("#selected_order_sleeve_3").val("");

        jQuery("#selected_sweat_type_3").val("");
        jQuery("#selected_sweat_type_name_3").val("");
        jQuery("#selected_sweat_img_3").val("");
        jQuery("#selected_sweat_name_3").val("");
        jQuery("#selected_order_sweat_3").val("");

        jQuery("#selected_rainjacket_type_3").val("");
        jQuery("#selected_rainjacket_type_name_3").val("");
        jQuery("#selected_rainjacket_img_3").val("");
        jQuery("#selected_rainjacket_name_3").val("");
        jQuery("#selected_order_rainjacket_3").val("");

        jQuery("#selected_jacket_type_3").val("");
        jQuery("#selected_jacket_type_name_3").val("");
        jQuery("#selected_jacket_img_3").val("");
        jQuery("#selected_jacket_name_3").val("");
        jQuery("#selected_order_jacket_3").val("");

        jQuery("#selected_longpants_type_3").val("");
        jQuery("#selected_longpants_type_name_3").val("");
        jQuery("#selected_longpants_img_3").val("");
        jQuery("#selected_longpants_name_3").val("");
        jQuery("#selected_order_longpants_3").val("");

        jQuery("#selected_main_canvas_file_name_3").val("");
        
        jQuery("#selected_order_typology_3").val("");
    }
}