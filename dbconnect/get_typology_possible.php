<?php
	require_once "db_lib.php";
	require_once "../include/enviornment.php";

	$db = new db;

	//Rappresentanza
	// get products count from Sport, Gender, Typology for every product type with Rappresentanza
	$query_rapp_shirt = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 157) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_shirt = $db->select($query_rapp_shirt)->fetch_assoc();

	$query_rapp_pants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 161) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_pants = $db->select($query_rapp_pants)->fetch_assoc();

	$query_rapp_socks = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_socks = $db->select($query_rapp_socks)->fetch_assoc();

	$query_rapp_ball = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 163) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_ball = $db->select($query_rapp_ball)->fetch_assoc();

	$query_rapp_bags = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 185) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_bags = $db->select($query_rapp_bags)->fetch_assoc();

	$query_rapp_kits = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 265) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_kits = $db->select($query_rapp_kits)->fetch_assoc();

	$query_rapp_sleeve = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_sleeve = $db->select($query_rapp_sleeve)->fetch_assoc();

	$query_rapp_sweat = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_sweat = $db->select($query_rapp_sweat)->fetch_assoc();

	$query_rapp_rainjacket = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_rainjacket = $db->select($query_rapp_rainjacket)->fetch_assoc();

	$query_rapp_jacket = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_jacket = $db->select($query_rapp_jacket)->fetch_assoc();

	$query_rapp_longpants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_longpants = $db->select($query_rapp_longpants)->fetch_assoc();


	//Campo
	// get products count from Sport, Gender, Typology for every product type with Campo
	$query_campo_shirt = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 157) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_shirt = $db->select($query_campo_shirt)->fetch_assoc();

	$query_campo_pants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 161) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_pants = $db->select($query_campo_pants)->fetch_assoc();

	$query_campo_socks = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_socks = $db->select($query_campo_socks)->fetch_assoc();

	$query_campo_ball = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 163) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_ball = $db->select($query_campo_ball)->fetch_assoc();

	$query_campo_bags = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 185) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_bags = $db->select($query_campo_bags)->fetch_assoc();

	$query_campo_kits = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 265) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_kits = $db->select($query_campo_kits)->fetch_assoc();

	$query_campo_sleeve = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_sleeve = $db->select($query_campo_sleeve)->fetch_assoc();

	$query_campo_sweat = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_sweat = $db->select($query_campo_sweat)->fetch_assoc();

	$query_campo_rainjacket = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_rainjacket = $db->select($query_campo_rainjacket)->fetch_assoc();

	$query_campo_jacket = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_jacket = $db->select($query_campo_jacket)->fetch_assoc();

	$query_campo_longpants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_longpants = $db->select($query_campo_longpants)->fetch_assoc();


	//Allenamento
	// get products count from Sport, Gender, Typology for every product type with Allenamento
	$query_allen_shirt = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 157) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_shirt = $db->select($query_allen_shirt)->fetch_assoc();

	$query_allen_pants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 161) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_pants = $db->select($query_allen_pants)->fetch_assoc();

	$query_allen_socks = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_socks = $db->select($query_allen_socks)->fetch_assoc();

	$query_allen_ball = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 163) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_ball = $db->select($query_allen_ball)->fetch_assoc();

	$query_allen_bags = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 185) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_bags = $db->select($query_allen_bags)->fetch_assoc();

	$query_allen_kits = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 265) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_kits = $db->select($query_allen_kits)->fetch_assoc();

	$query_allen_sleeve = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_sleeve = $db->select($query_allen_sleeve)->fetch_assoc();

	$query_allen_sweat = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_sweat = $db->select($query_allen_sweat)->fetch_assoc();

	$query_allen_rainjacket = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_rainjacket = $db->select($query_allen_rainjacket)->fetch_assoc();

	$query_allen_jacket = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_jacket = $db->select($query_allen_jacket)->fetch_assoc();

	$query_allen_longpants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_longpants = $db->select($query_allen_longpants)->fetch_assoc();

	// set all count results for every type
	$final_result = array("rapp_shirt" => $result_rapp_shirt["count"], 
							"rapp_pants" => $result_rapp_pants["count"], 
							"rapp_socks" => $result_rapp_socks["count"],
							"rapp_ball" => $result_rapp_ball["count"], 
							"rapp_bags" => $result_rapp_bags["count"], 
							"rapp_kits" => $result_rapp_kits["count"],
							"rapp_sleeve" => $result_rapp_sleeve["count"],
							"rapp_sweat" => $result_rapp_sweat["count"],
							"rapp_rainjacket" => $result_rapp_rainjacket["count"],
							"rapp_jacket" => $result_rapp_jacket["count"],
							"rapp_longpants" => $result_rapp_longpants["count"], 

							"campo_shirt" => $result_campo_shirt["count"], 
							"campo_pants" => $result_campo_pants["count"], 
							"campo_socks" => $result_campo_socks["count"], 
							"campo_ball" => $result_campo_ball["count"], 
							"campo_bags" => $result_campo_bags["count"], 
							"campo_kits" => $result_campo_kits["count"], 
							"campo_sleeve" => $result_campo_sleeve["count"], 
							"campo_sweat" => $result_campo_sweat["count"], 
							"campo_rainjacket" => $result_campo_rainjacket["count"], 
							"campo_jacket" => $result_campo_jacket["count"], 
							"campo_longpants" => $result_campo_longpants["count"], 

							"allen_shirt" => $result_allen_shirt["count"], 
							"allen_pants" => $result_allen_pants["count"], 
							"allen_socks" => $result_allen_socks["count"],
							"allen_ball" => $result_allen_ball["count"],
							"allen_bags" => $result_allen_bags["count"], 
							"allen_sleeve" => $result_allen_sleeve["count"],
							"allen_sweat" => $result_allen_sweat["count"],
							"allen_rainjacket" => $result_allen_rainjacket["count"],
							"allen_jacket" => $result_allen_jacket["count"],
							"allen_longpants" => $result_allen_longpants["count"],
							"allen_kits" => $result_allen_kits["count"]);
	echo json_encode($final_result);
?>