<?php
	require_once "db_lib.php";

	$db = new db;
	// get product detail with product id
	$query = "select post_title from wp_posts where id = " . $_POST["product"];
	$result = $db->select($query);
	$html_result = "";
	while($row = $result->fetch_assoc()) {
		$html_result = $row["post_title"];
	}
	// get product english title
	$query_english = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='custom_eng_title' AND post_id = " . $_POST['product'];
    $result_english = $db->select($query_english);
    if($result_english)
            $english = $result_english -> fetch_assoc();
    else
            $english = array("meta_value" => "");
    // get product title when selected english language
    if ($_POST["language"] == 'uk' && $english["meta_value"] != ""){
		$html_result = $english["meta_value"];
    }
	echo $html_result;
?>