<html>
	<head>
	<link rel = "stylesheet" href = "order_book.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(document).ready(function(){
  $("#buy").click(function(){
    $("#sell_side").hide();
	$("#buy_side").show();
  });
  $("#sell").click(function(){
    $("#sell_side").show();
	$("#buy_side").hide();
  });
});
});
</script>	
	</head>
		<body>
		<div class = "control">
		<div class = "rad">
			<label>Buy</label><input type = "radio" name = "select" id = "buy" checked>
			<label>Sell</label><input type = "radio" name = "select" id = "sell">
		</div>
		</div>
		<div class = "buy_side" id = "buy_side">
			<form name = "buy" id = "buy" method = "POST" action = "order_book.php">
					<div class = "input_contro">
					<div class = "input_control">
					<label>Buy QTY:</label><input type = "number" name = "buy_qty" id = "buy_qty">
					<label>Buy Price</label><input type = "number" name = "buy_price" id = "buy_price">
					</div>
					</div>
						<div class = "drop_contro">
						<div class = "drop_control">
						<label>Order Type</label><select id = "buy_order_type" name = "buy_order_type">
													<option value = "Market order">Market Order</option>
													<option value = "Limit order">Limit Order</option>
													<option value = "Stop order">Stop order</option>
												</select>
						<label>Buy/Sell</label><select name = "status" id = "status">
													<option value = "Buy">Buy</option>
													<option value = "Buy">Sell</option>
												</select>
						</div>
						</div>
						<div class = "submit">
						<input type = "submit" id = "sub">
						</div>
		</div>
			<div class = "sell_side" id = "sell_side">
			<form name = "buy" method = "POST" action = "order_book.php">
					<div class = "input_contro">
					<div class = "input_control">
					<label>Sell QTY:</label><input type = "number"  name = "sell_qty" id = "sell_qty">
					<label>Sell Price</label><input type = "number" name = "sell_price" id = "sell_price">
					</div>
					</div>
					<div class = "input_contro">
					<div class = "input_control">
						<label>Order Type</label><select id = "sell_order_type" name = "sell_order_type">
													<option value = "Market order">Market Order</option>
													<option value = "Limit order">Limit Order</option>
													<option value = "Stop order">Stop order</option>
												</select>
						<label>Buy/Sell</label><select name = "stat" id = "stat">
													<option value = "Buy">Buy</option>
													<option value = "Sell">Sell</option>
												</select>
					</div>
					</div>
						<div class = "submit">
						<input type = "submit" id = "submit">
						</div>
		</div>
			</form>
			<div class = "tables" style = "display:flex;justify-content:space-around;">
				<div class = "buy_tab">
					<table border = "1" class = "table">
						<thead>
							<tr>
								<th>Buy QTY</th>
								<th>Buy Price</th>
								<th>Order type</th>
								<th>Buy/Sell</th>
							</tr>
							<tbody id="load-table">
	
							</tbody>
					</table>
				</div>
				<div class = "sell_tab">
					<table border = "1" class = "table">
						<thead>
							<tr>
								<th>Sell QTY</th>
								<th>Sell Price</th>
								<th>Order type</th>
								<th>Buy/Sell</th>
							</tr>
							<tbody id="tables">
	
							</tbody>
					</table>
				</div>
				<script>
				//ajax call
					$(document).ready(function(){
					function loadTable(){
						$("#load-table").html("");
						$.ajax({
							url:'order_book.json',
							type:"GET",
							success:function(data){
								if(data.status == false){
									$("#load-table").append("<tr><td colspan = '8'><h2>"+data.message+"</h2></td></tr>");
								}else{
									$.each(data, function(key, value){
										$("#load-table").append("<tr>"
																+"<td>" + value.buy_qty+ "</td>"
																+"<td>" + value.buy_price + "</td>"
																+"<td>" + value.buy_order_type + "</td>"
																+"<td>" + value.status + "</td>"+
																"</tr>");
									});
								}
							}
						});
					}
				loadTable();
});
					$(document).ready(function(){
					function Table(){
						$("#tables").html("");
						$.ajax({
							url:'order_book.json',
							type:"GET",
							success:function(data){
								if(data.status == false){
									$("#load-table").append("<tr><td colspan = '8'><h2>"+data.message+"</h2></td></tr>");
								}else{
									$.each(data, function(key, value){
										$("#tables").append("<tr>"
																+"<td>" + value.sell_qty+ "</td>"
																+"<td>" + value.sell_price + "</td>"
																+"<td>" + value.sell_order_type + "</td>"
																+"<td>" + value.stat + "</td>"+
																"</tr>");
									});
								}
							}
						});
					}
				Table();
});
				</script>
		</body>
</html>