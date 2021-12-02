<?php
	require_once "db_lib.php";

	$db = new db;
    // get product detail info with product id
	$query_price = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_price' AND post_id = " . $_POST["product"];
    $result_price = $db->select($query_price);
    if($result_price)
    	$price = $result_price -> fetch_assoc();
    else
    	$price = array("meta_value" => "");
    $html_result = $price["meta_value"];
    // get product english price
	$query_english = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='custom_eng_price' AND post_id = " . $_POST['product'];
    $result_english = $db->select($query_english);
    if($result_english)
            $english = $result_english -> fetch_assoc();
    else
            $english = array("meta_value" => "");
    // get product price when selected english language
    if ($_POST["language"] == 'uk' && $english["meta_value"] != ""){
		$html_result = $english["meta_value"];
    }
	echo $html_result;
?>