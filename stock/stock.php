<!-- stock.php, Spring 2016 homework -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stock Search with Market Data APIs</title>
		<style>
		#mainbox {
			width: 400px;
			margin: 0 auto;
			border: 2px solid black;
			padding: 10px;
			line-height: 20pt;
		}
		#output_box {
			margin: 0 auto;
			width: 700px;
			margin-top: 10px;
			text-align: left;
			border: 1px solid black;
		}
		#empty_box {
			width: 800px;
			margin: 0 auto;
			border: 1px solid black;
			padding: 5px;
			line-height: 10pt;
			margin-top: 10px;
		}
		#website, #button_group, h1 {
			text-align: center;
		}
	</style>
	</head>
	<body>
	<?php
		$name = "";
		$companyName = "";
		$companySymbol = "";
		$companyExchange = "";
	?>
		<h1>Stock Search</h1>
		<div id="mainbox">
		<form id="myForm" onsubmit="return validateForm()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Company Name or Symbol: <input type="text" name="name" value="<?php if(isset($_POST['name'])) { echo htmlentities ($_POST['name']); }?>"><br/>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = $_POST['name'];
				}
			?>
			<div id="button_group">
				<button type="submit" value="Submit">Search</input>
				<button type="reset" onclick="divRemove();formReset();" value="Reset">Clear</button>
				<br/>
			</div>
			<div id="website">
				<a href='http://www.markit.com/product/markit-on-demand'>Powered by Market on Demand</a>
			</div>
		</form>
		</div>
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// API part
				$apiURL = "http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=";
				$name = urlencode($name);
				$apiURL = $apiURL . $name;
				// echo $apiURL;
				// http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=APPL
				
				// $xmlContent will give a good output
				$xmlFile = simplexml_load_file($apiURL);
				// print_r($xmlFile);
				
				if ($xmlFile -> LookupResult -> count() > 0) {
					global $companyName, $companySymbol, $companyExchange;
					echo "<table id=\"output_box\" border=\"1\" frame=\"void\" rules=\"all\">";
						echo "<tr>";
							echo "<th>Name</th>";
							echo "<th>Symbol</th>";
							echo "<th>Exchange</th>";
							echo "<th>Details</th>";
						echo "</tr>";
						// read elements from xmlFile
						foreach ($xmlFile -> LookupResult as $LookupResult) {
							$companyName = $LookupResult -> Name;
							echo "<tr><td>" . $companyName . "</td>";
							$companySymbol = $LookupResult -> Symbol;
							echo "<td>" . $companySymbol . "</td>";
							$companyExchange = $LookupResult -> Exchange;
							echo "<td>" . $companyExchange . "</td>";
							echo "<td><a href=''>More Info</a></td></tr>";
							echo "<tr></tr>";
						}
					echo "</table>";
				}
				else {
					echo "<div id=\"empty_box\">";
					echo "<h4 align='center'>No Records has been found.</h4>";
					echo "</div>";
				}
				
				// the URL to JSON
				$infoURL = 'http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=' . $companySymbol;
				echo $infoURL;
			}
		?>
		
		<script>
			function formReset() {
				var el1 = document.getElementById("output_box");
				var el2 = document.getElementById("empty_box");
				el1.parentNode.removeChild( el1 );
				el2.parentNode.removeChild( el2 );
			}
			function divRemove() {
				window.location.href = "stock.php";
			}
			function validateForm() {
				var x = document.forms["myForm"]["name"].value;
				if (x == null || x == "") {
					alert("Please Enter Name or Symbol!");
					return false;
				}
			}
		</script>
	</body>
</html>