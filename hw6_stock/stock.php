<!-- stock.php -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stock Search with Market Data APIs</title>
		<style>
		#mainbox, #output_box {
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
				Company Name or Symbol: <input type="text" name="stock_name"><br/>
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
			$stock = '';
			$url = 'http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=';
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$stock .= $_POST['stock_name'];
			}
			$stockUrl = $url . $stock;
			// echo $stockUrl;
			// start to read content from xml file
			$urlContent = file_get_contents($stockUrl);
			$xmlFile = simplexml_load_string($urlContent);
			if (strlen($xmlFile) > 0) {
				echo "<div id=\"output_box\">
						<table>
							<tr>
								<th>Name</th>
								<th>Symbol</th>
								<th>Exchange</th>
								<th>Details</th>
							</tr>";
			}
			?>
			
					<?php
						foreach ($xmlFile -> LookupResult as $xml) {
							echo "<tr>";
							echo "<td>" . $xml -> Name . "</td>";
							echo "<td>" . $xml -> Symbol . "</td>";
							echo "<td>" . $xml -> Exchange . "</td>";
							echo "<td><a href=''>More Info</a></td>";
							echo "</tr>";
						}
					?>
				</table>
			</div>
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