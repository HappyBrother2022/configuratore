<?php
	require_once "db_lib.php";
	require_once "../include/enviornment.php";

	// echo $_POST["sport"];
	$start_num = $_POST["current"] * 21;
	$db = new db;
	// get products with search word
	$query = "select t1.object_id, wp.post_title as name
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["typology"] . ") as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["type"] . ") as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and (t1.object_id in ( select post_id from wp_postmeta where meta_key = 'configuratore' and meta_value = 1)) and ((wpm.meta_key = '_sku' and wpm.meta_value like '%" . $_POST["search_word"] . "%') or wp.post_title like '%" .  $_POST["search_word"] . "%') group by t1.object_id limit " . $start_num . ", 21";
	// echo $query;
	$result = $db->select($query);
	$html_result = "";
	$index = $start_num + 1;
	$group_index = 4;
	$input_name = "t_shirt_type";
	// set product type with type id
	if($_POST["type"] == "161")
	{
		$group_index = 6;
		$input_name = "pants_type";
	}else if($_POST["type"] == "162")
	{
		$group_index = 8;
		$input_name = "socks_type";
	}
	else if($_POST["type"] == "163")
	{
		$group_index = 10;
		$input_name = "ball_type";
	}
	else if($_POST["type"] == "185")
	{
		$group_index = 12;
		$input_name = "bags_type";
	}
	else if($_POST["type"] == "265")
	{
		$group_index = 14;
		$input_name = "kits_type";
	}
	else if($_POST["type"] == "1791")
	{
		$group_index = 16;
		$input_name = "sleeve_type";
	}
	else if($_POST["type"] == "1792")
	{
		$group_index = 18;
		$input_name = "sweat_type";
	}
	else if($_POST["type"] == "1793")
	{
		$group_index = 20;
		$input_name = "rainjacket_type";
	}
	else if($_POST["type"] == "1794")
	{
		$group_index = 22;
		$input_name = "jacket_type";
	}
	else if($_POST["type"] == "1795")
	{
		$group_index = 24;
		$input_name = "longpants_type";
	}
	while($row = $result->fetch_assoc()) {
		$post_id = $row["object_id"];
		// get product detail info with product id
		$query_img = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_thumbnail_id' AND post_id = $post_id";
        $result_img = $db->select($query_img);
        if($result_img)
        	$img = $result_img -> fetch_assoc();
        else
        	$img = array("meta_value" => "");

        $query_img_2 = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_wp_attached_file' AND post_id = ".$img['meta_value']."";
        $result_img_2 = $db->select($query_img_2);
        if($result_img_2)
        	$img_2 = $result_img_2 -> fetch_assoc();
        else
        	$img_2 = array("meta_value" => "blank-placeholder.jpg");

        $query_price = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_price' AND post_id = $post_id";
        $result_price = $db->select($query_price);
        if($result_price)
        	$price = $result_price -> fetch_assoc();
        else
        	$price = array("meta_value" => "");

        $query_sku = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_sku' AND post_id = $post_id";
        $result_sku = $db->select($query_sku);
        if($result_sku)
        	$sku = $result_sku -> fetch_assoc();
        else
        	$sku = array("meta_value" => "");

        $query_english = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='custom_eng_title' AND post_id = $post_id";
        $result_english = $db->select($query_english);
        if($result_english)
                $english = $result_english -> fetch_assoc();
        else
                $english = array("meta_value" => "");

        $query_price_english = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='custom_eng_price' AND post_id = $post_id";
        $result_price_english = $db->select($query_price_english);
        if($result_price_english)
                $price_english = $result_price_english -> fetch_assoc();
        else
                $price_english = array("meta_value" => "");

        $title = $row["name"];
        if ($_POST["language"] == 'uk' && $english["meta_value"] != ""){
                $title = $english["meta_value"];
        }

        $real_price = $price["meta_value"];
        if ($_POST["language"] == 'uk' && $price_english["meta_value"] != ""){
                $real_price = $price_english["meta_value"];
        }

		$html_result .= '<div class="col-6 col-md-4"><div class="item">';
		$html_result .= '<input data-price="" data-label="" id="answer_' . $index . '_group_' . $group_index . '" type="radio" name="' . $input_name . '" value="' . $post_id . '" class="required">';
		$html_result .= '<label for="answer_' . $index . '_group_' . $group_index . '"><img src="' . $site_url . $images_path . $img_2["meta_value"] . '" alt="" class="img-fluid"><span class="item_price meta_value">' . $sku["meta_value"] . '</span><strong>' . $title . '</strong><span class="item_price price_value">€' . $real_price . '</span></label></div></div>';
		// $html_result .= '<label for="answer_' . $index . '_group_' . $group_index . '"><img src="' . $site_url . $images_path . $img_2["meta_value"] . '" alt="" class="img-fluid"><span class="item_price">' . $sku["meta_value"] . '</span><strong>' . $row["name"] . '</strong></label></div></div>';
		$index++;
	}
	$final_page = 0;
	// get products count
	$query_product_count = "select count(distinct t1.object_id) as count
							from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["typology"] . ") as t4 on t1.object_id=t4.object_id
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["type"] . ") as t5 on t1.object_id=t5.object_id
							inner join wp_posts wp on t1.object_id = wp.ID
							inner join wp_postmeta wpm on wpm.post_id = wp.ID
							where wp.post_type = 'product' and (t1.object_id in ( select post_id from wp_postmeta where meta_key = 'configuratore' and meta_value = 1)) and ((wpm.meta_key = '_sku' and wpm.meta_value like '%" . $_POST["search_word"] . "%') or wp.post_title like '%" .  $_POST["search_word"] . "%')";
	// echo $query_product_count;
    $result_product_count = $db->select($query_product_count);
    $product_count = $result_product_count -> fetch_assoc();
    if($product_count["count"] <= $start_num + 21)
    	$final_page = 1;
	$final_result = array("html" => $html_result, "final" => $final_page);
	echo json_encode($final_result);
?>