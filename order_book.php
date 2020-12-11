<?php
//buy side
if($_POST['buy_qty'] != '' && $_POST['buy_price'] != '' && $_POST['buy_order_type'] != '' && $_POST['status'] != ''){
	if(file_exists('order_book.json')){
	$current_data = file_get_contents('order_book.json');
	$array_data = json_decode($current_data, true);
	$new_data = array(
			'buy_qty' => $_POST['buy_qty'],
			'buy_price' => $_POST['buy_price'],
			'buy_order_type' => $_POST['buy_order_type'],
			'status' => $_POST['status'],
	);
	$array_data[] = $new_data;
	$json_data = json_encode($array_data, JSON_PRETTY_PRINT);
	if(file_put_contents('order_book.json', $json_data)){
		echo "Successfully Submited";
	}else{
		echo "Unsuccessfull";
	}
	}else{
		echo "File not found";
	}
}
//Sell Side
if($_POST['sell_qty'] != '' && $_POST['sell_price'] != '' && $_POST['sell_order_type'] != '' && $_POST['stat'] != ''){
	if(file_exists('order_book.json')){
	$current_data = file_get_contents('order_book.json');
	$array_data = json_decode($current_data, true);
	$new_data = array(
			'sell_qty' => $_POST['sell_qty'],
			'sell_price' => $_POST['sell_price'],
			'sell_order_type' => $_POST['sell_order_type'],
			'stat' => $_POST['stat'],
	);
	$array_data[] = $new_data;
	$json_data = json_encode($array_data, JSON_PRETTY_PRINT);
	if(file_put_contents('order_book.json', $json_data)){
		echo "Successfully Submited";
	}else{
		echo "Unsuccessfull";
	}
	}else{
		echo "File not found";
	}
}
?>