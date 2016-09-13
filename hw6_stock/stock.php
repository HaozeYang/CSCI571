<!-- stock.php -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stock Search with Market Data APIs</title>
		<style>
		#mainbox, #output_box {
			width: 400px;
			margin: 0 auto;
			border: 2px solid black;
			padding: 10px;
			line-height: 20pt;
		}
		h1 {
			text-align: center;
		}
		#website {
			text-align: center;
		}
		#button_group {
			text-align: center;
		}
	</style>
	</head>
	<body>
		<h1>Stock Search</h1>
		<div id="mainbox">
		<form id="myForm" onsubmit="return validateForm()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Company Name or Symbol: <input type="text" name="stock_name"><br/>
			<?php
				$stock = '';
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$stock .= $_POST['stock_name'];
					$stock .= ",";
				}
			?>
			<div id="button_group">
				<button type="submit" value="Submit">Search</input>
				<button type="reset" onclick="formReset();divRemove();" value="Reset">Clear</button>
				<br/>
			</div>
			<div id="website">
				<a href='http://www.markit.com/product/markit-on-demand'>Powered by Market on Demand</a>
			</div>
		</form>
		</div>
		<script>
			function formReset() {
				var el = document.getElementById("output_box");
				el.parentNode.removeChild( el );
			}
			function divRemove() {
				window.location.href = "";
			}
			function validateForm() {
				var x = document.forms["myForm"]["stock_name"].value;
				if (x == null || x == "") {
					alert("Please enter name or symbol!");
					return false;
				}
			}
		</script>
	</body>
</html>