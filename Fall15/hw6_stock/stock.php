<!-- stock.php -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stock Search with Market Data APIs</title>
		<style>
		#mainbox, #output_box1 {
			width: 500px;
			margin: 0 auto;
			border: 1px solid;
			line-height: 20pt;
			text-align: center;
		}
		h1 {text-align: center;}
		#website, #button_group {text-align: center;}
		table, td, th {
			border: 1px solid;
		}
		table {
			width: 500px;
			border-collapse: collapse;
		};
	</style>
	</head>
	<body>
		<h1>Stock Search</h1>
		<div id="mainbox">
			<form id="myForm" onsubmit="return validateForm()" method="post">
				<!-- value part is kept after submit -->
				Company Name or Symbol: <input type="text" name="stock_name" value="<?php echo isset($_POST['stock_name']) ? $_POST['stock_name'] : '' ?>"><br/>
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
		<div>
			<?php
			// turn off all the warnings if there is any, will use customized warning later
			error_reporting(0);
			
			// start connections
			$stock = '';
			$url = 'http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=';
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$stock .= $_POST['stock_name'];
				$stockUrl = $url . $stock;
				// echo $stockUrl;
				// start to read content from xml file
				$urlContent = file_get_contents($stockUrl);
				$xmlFile = simplexml_load_string($urlContent);
				if (strlen($urlContent) > 0) {
					echo "<div id=\"output_box1\">
							<table>
								<tr>
									<th>Name</th>
									<th>Symbol</th>
									<th>Exchange</th>
									<th>Details</th>
								</tr>";
					$name = $xml -> Name;
					$symbol = $xml -> Symbol;
					$exchange = $xml -> Exchange;
					foreach ($xmlFile -> LookupResult as $xml) {
						$name = $xml -> Name;
						$symbol = $xml -> Symbol;
						$exchange = $xml -> Exchange;
						echo "<tr>";
						echo "<td>" . $name . "</td>";
						echo "<td>" . $symbol . "</td>";
						echo "<td>" . $exchange . "</td>";
						// JSON href is http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol= $xml -> Symbol
						echo "<td><a href=\"#\" onclick=\"formReset();write();\">More Info</a></td>";
						echo "</tr>";
					}
					echo "</table></div>";
				}
				else {
					echo "<div id=\"output_box1\"><p>No Records have been found. </p></div>";
				}
			}
			?>
			
			<?php
				// this part will not run until More Info link is clicked
				function detailed_form() {
					echo "test";
				}
			?>
		</div>
		<script>
			function formReset() {
				var el = document.getElementById("output_box1");
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
			function write() {
				document.write();
			}
		</script>
	</body>
</html>