<!-- forecast.php -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CSCI571 HW6, Server-side Scripting</title>
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
		#comment {
			font-style: italic;
		}
		#button_group {
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
		$address = "";
	?>
	<h1>Forecast Search</h1>
	<div id="mainbox">
		<form id="myForm" onsubmit="return validateForm()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Street Address:*<input type="text" name="street_address" value="<?php if(isset($_POST['street_address'])) { echo htmlentities ($_POST['street_address']); }?>"><br/>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$address .= $_POST['street_address'];
					$address .= ",";
				}
			?>
			City:*<input type="text" name="city" value="<?php if(isset($_POST['city'])) { echo htmlentities ($_POST['city']); }?>"><br/>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$address .= $_POST['city'];
					$address .= ",";
				}
			?>
			State:*<select name="state">
					<option value="select">Select your state...</option>
					<option value="AL" <?php if ($_POST['state'] == 'AL') {echo 'selected="selected"';} ?>>Alabama</option>
					<option value="AK" <?php if ($_POST['state'] == 'AK') {echo 'selected="selected"';} ?> >Alaska</option>
					<option value="AZ" <?php if ($_POST['state'] == 'AZ') {echo 'selected="selected"';} ?> >Arizona</option>
					<option value="AR" <?php if ($_POST['state'] == 'AR') {echo 'selected="selected"';} ?> >Arkansas</option>
					<option value="CA" <?php if ($_POST['state'] == 'CA') {echo 'selected="selected"';} ?> >California</option>
					<option value="CO" <?php if ($_POST['state'] == 'CO') {echo 'selected="selected"';} ?> >Colorado</option>
					<option value="CT" <?php if ($_POST['state'] == 'CT') {echo 'selected="selected"';} ?> >Connecticut</option>
					<option value="DE" <?php if ($_POST['state'] == 'DE') {echo 'selected="selected"';} ?> >Delaware</option>
					<option value="DC" <?php if ($_POST['state'] == 'DC') {echo 'selected="selected"';} ?> >District Of Columbia</option>
					<option value="FL" <?php if ($_POST['state'] == 'FL') {echo 'selected="selected"';} ?> >Florida</option>
					<option value="GA" <?php if ($_POST['state'] == 'GA') {echo 'selected="selected"';} ?> >Georgia</option>
					<option value="HI" <?php if ($_POST['state'] == 'HI') {echo 'selected="selected"';} ?> >Hawaii</option>
					<option value="ID" <?php if ($_POST['state'] == 'ID') {echo 'selected="selected"';} ?> >Idaho</option>
					<option value="IL" <?php if ($_POST['state'] == 'IL') {echo 'selected="selected"';} ?> >Illinois</option>
					<option value="IN" <?php if ($_POST['state'] == 'IN') {echo 'selected="selected"';} ?> >Indiana</option>
					<option value="IA" <?php if ($_POST['state'] == 'IA') {echo 'selected="selected"';} ?> >Iowa</option>
					<option value="KS" <?php if ($_POST['state'] == 'KS') {echo 'selected="selected"';} ?> >Kansas</option>
					<option value="KY" <?php if ($_POST['state'] == 'KY') {echo 'selected="selected"';} ?> >Kentucky</option>
					<option value="LA" <?php if ($_POST['state'] == 'LA') {echo 'selected="selected"';} ?> >Louisiana</option>
					<option value="ME" <?php if ($_POST['state'] == 'ME') {echo 'selected="selected"';} ?> >Maine</option>
					<option value="MD" <?php if ($_POST['state'] == 'MD') {echo 'selected="selected"';} ?> >Maryland</option>
					<option value="MA" <?php if ($_POST['state'] == 'MA') {echo 'selected="selected"';} ?> >Massachusetts</option>
					<option value="MI" <?php if ($_POST['state'] == 'MI') {echo 'selected="selected"';} ?> >Michigan</option>
					<option value="MN" <?php if ($_POST['state'] == 'MN') {echo 'selected="selected"';} ?> >Minnesota</option>
					<option value="MS" <?php if ($_POST['state'] == 'MS') {echo 'selected="selected"';} ?> >Mississippi</option>
					<option value="MO" <?php if ($_POST['state'] == 'MO') {echo 'selected="selected"';} ?> >Missouri</option>
					<option value="MT" <?php if ($_POST['state'] == 'MT') {echo 'selected="selected"';} ?> >Montana</option>
					<option value="NE" <?php if ($_POST['state'] == 'NE') {echo 'selected="selected"';} ?> >Nebraska</option>
					<option value="NV" <?php if ($_POST['state'] == 'NV') {echo 'selected="selected"';} ?> >Nevada</option>
					<option value="NH" <?php if ($_POST['state'] == 'NH') {echo 'selected="selected"';} ?> >New Hampshire</option>
					<option value="NJ" <?php if ($_POST['state'] == 'NJ') {echo 'selected="selected"';} ?> >New Jersey</option>
					<option value="NM" <?php if ($_POST['state'] == 'NM') {echo 'selected="selected"';} ?> >New Mexico</option>
					<option value="NY" <?php if ($_POST['state'] == 'NY') {echo 'selected="selected"';} ?> >New York</option>
					<option value="NC" <?php if ($_POST['state'] == 'NC') {echo 'selected="selected"';} ?> >North Carolina</option>
					<option value="ND" <?php if ($_POST['state'] == 'ND') {echo 'selected="selected"';} ?> >North Dakota</option>
					<option value="OH" <?php if ($_POST['state'] == 'OH') {echo 'selected="selected"';} ?> >Ohio</option>
					<option value="OK" <?php if ($_POST['state'] == 'OK') {echo 'selected="selected"';} ?> >Oklahoma</option>
					<option value="OR" <?php if ($_POST['state'] == 'OR') {echo 'selected="selected"';} ?> >Oregon</option>
					<option value="PA" <?php if ($_POST['state'] == 'PA') {echo 'selected="selected"';} ?> >Pennsylvania</option>
					<option value="RI" <?php if ($_POST['state'] == 'RI') {echo 'selected="selected"';} ?> >Rhode Island</option>
					<option value="SC" <?php if ($_POST['state'] == 'SC') {echo 'selected="selected"';} ?> >South Carolina</option>
					<option value="SD" <?php if ($_POST['state'] == 'SD') {echo 'selected="selected"';} ?> >South Dakota</option>
					<option value="TN" <?php if ($_POST['state'] == 'TN') {echo 'selected="selected"';} ?> >Tennessee</option>
					<option value="TX" <?php if ($_POST['state'] == 'TX') {echo 'selected="selected"';} ?> >Texas</option>
					<option value="UT" <?php if ($_POST['state'] == 'UT') {echo 'selected="selected"';} ?> >Utah</option>
					<option value="VT" <?php if ($_POST['state'] == 'VT') {echo 'selected="selected"';} ?> >Vermont</option>
					<option value="VA" <?php if ($_POST['state'] == 'VA') {echo 'selected="selected"';} ?> >Virginia</option>
					<option value="WA" <?php if ($_POST['state'] == 'WA') {echo 'selected="selected"';} ?> >Washington</option>
					<option value="WV" <?php if ($_POST['state'] == 'WV') {echo 'selected="selected"';} ?> >West Virginia</option>
					<option value="WI" <?php if ($_POST['state'] == 'WI') {echo 'selected="selected"';} ?> >Wisconsin</option>
					<option value="WY" <?php if ($_POST['state'] == 'WY') {echo 'selected="selected"';} ?> >Wyoming</option>
				</select>
				<br/>
				<?php 
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if($_POST['state'] == "AL" || "AK" || "AZ" || "AR" || "CA" ||
							"CO" || "CT" || "DE" || "DC" || "FL" ||
							"GA" || "HI" || "ID" || "IL" || "IN" ||
							"IA" || "KS" || "KY" || "LA" || "ME" ||
							"MD" || "MA" || "MI" || "MN" || "MS" ||
							"MO" || "MT" || "NE" || "NV" || "NH" ||
							"NJ" || "NM" || "NY" || "NC" || "ND" ||
							"OH" || "OK" || "OR" || "PA" || "RI" ||
							"SC" || "SD" || "TN" || "TX" || "UT" ||
							"VT" || "VA" || "WA" || "WV" || "WI" || "WY"
						) {
							$address .= $_POST['state'];
							// 11428 187th St,Artesia,CA
						}
					}
				?>
			Degree:*<input type="radio" name="temp" value="us" checked="checked" <?php if (isset($_POST['temp']) && $_POST['temp']=="us") echo "checked";?>>Fahrenheit</input>
			<input type="radio" name="temp" value="si" <?php if (isset($_POST['temp']) && $_POST['temp']=="si") echo "checked";?>>Celsius</input>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if($_POST['temp'] == "us" || "si") {
						// either 'us' or 'si'
						$units_value = $_POST['temp'];
					}
				}
			?>
			<div id="button_group">
				<button type="submit" value="Submit">Search</input>
				<button type="reset" onclick="formReset();divRemove();" value="Reset">Clear</button>
				<br/>
			</div>
			<div id="comment">
				* - Mandatory fields.<br/>
			</div>
			<div id="website">
				<a href='http://forecast.io/'>Powered by Forecast.io</a>
			</div>
		</form>
	</div>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Google geocode part
			$geoURL = "https://maps.googleapis.com/maps/api/geocode/xml?address=";
			$geoKey = "AIzaSyBE55KsTjcWX6ppy93hGroHw4SXijoq_MI";
			$address = urlencode($address);
			$geoURL = $geoURL . $address;
			$geoURL = $geoURL . $address . "&key=" . $geoKey;
			// echo $geoURL;
			// https://maps.googleapis.com/maps/api/geocode/xml?address=325+W+Adam+St%2CLos+Angeles%2CCA325+W+Adam+St%2CLos+Angeles%2CCA&key=AIzaSyBE55KsTjcWX6ppy93hGroHw4SXijoq_MI

			// $xmlContent will give a good output
			$urlContent = file_get_contents($geoURL);
			$xmlFile = simplexml_load_string($urlContent);

			// coordinates!!
			$latitute = $xmlFile -> result -> geometry -> location -> lat;
			$longitude = $xmlFile -> result -> geometry -> location -> lng;
			
			// Forecast.io part
			// forecastURL has key
			$forecastURL = "https://api.forecast.io/forecast/0cb68cdb03d1e584ee0202ffa0e425a4/";
			$coordinates = $latitute . "," . $longitude . "?";
			$units = "units=" . $units_value . "&";
			$exclude = "exclude=flags";
			// this will give you a correct URL to forecast.io
			$forecastURL = $forecastURL . $coordinates . $units . $exclude;
			// echo $forecastURL;
			// sample URL, 325 W Adam St
			// https://api.forecast.io/forecast/0cb68cdb03d1e584ee0202ffa0e425a4/34.0274577,-118.2729570?units=us&exclude=flags
			
			// $jsonContent, string
			$jsonContent = file_get_contents($forecastURL);
			// $json, object
			$json = json_decode($jsonContent);
			// will give correct output
			// echo $json -> latitude;
			if (strlen($jsonContent) > 0) {
				echo "<div id=\"output_box\">";
				
				// summary
				echo "<h2 align='center'>" . $json -> currently -> summary . "</h2>";
				
				// decide temperature unit
				if($units_value == "us") {
					$unit =  "<a>&deg; F</a>";
				}
				else if ($units_value == "si") {
					$unit =  "<a>&deg; C</a>";
				}
				$temp = $json -> currently -> temperature;
				$temp = round($temp);
				echo "<h2 align='center'>" . $temp . $unit . "</h2>";
				
				// icons
				$icon = $json -> currently -> icon;
				if ($icon == "clear-day"){
					echo "<div align='center'><image src='clear.png' alt='clear'></image></div>";
				}
				else if ($icon == "clear-night"){
					echo "<div align='center'><image src='clear_night.png' alt='clear_night'></image></div>";
				}
				else if ($icon == "rain"){
					echo "<div align='center'><image src='rain.png' alt='rain'></image></div>";
				}
				else if ($icon == "snow"){
					echo "<div align='center'><image src='snow.png' alt='snow'></image></div>";
				}
				else if ($icon == "sleet"){
					echo "<div align='center'><image src='sleet.png' alt='sleet'></image></div>";
				}
				else if ($icon == "wind"){
					echo "<div align='center'><image src='wind.png' alt='wind'></image></div>";
				}
				else if ($icon == "fog"){
					echo "<div align='center'><image src='fog.png' alt='fog'></image></div>";
				}
				else if ($icon == "cloudy"){
					echo "<div align='center'><image src='cloudy.png' alt='cloudy'></image></div>";
				}
				else if ($icon == "partly-cloudy-day"){
					echo "<div align='center'><image src='cloud_day.png' alt='could_day'></image></div>";
				}
				else if ($icon == "partly-cloudy-night"){
					echo "<div align='center'><image src='cloud_night.png' alt='cloud_night'></image></div>";
				}
				
				echo "<table align='center'>";
				// precipitation output
				echo "<tr>";
				echo "<td>Precipitation:</td>";
				$precipIntensity = $json -> currently -> precipIntensity;
				if ($units_value == "si") {
					$precipIntensity = $precipIntensity / 25.4;
				}
				if ($precipIntensity >= 0 && $precipIntensity < 0.002) {
					echo "<td>None</td>";
				}
				else if ($precipIntensity >= 0.002 && $precipIntensity < 0.017) {
					echo "<td>Very Light</td>";
				}
				else if ($precipIntensity >= 0.017 && $precipIntensity < 0.1) {
					echo "<td>Light</td>";
				}
				else if ($precipIntensity >= 0.1 && $precipIntensity < 0.4) {
					echo "<td>Moderate</td>";
				}
				else if ($precipIntensity >= 0.4) {
					echo "<td>Heavy</td>";
				}
				echo "</tr>";
				
				// chance of rain
				echo "<tr>";
				echo "<td>Chance of Rain:</td>";
				$precipProbability = $json -> currently -> precipProbability;
				$precipProbability = ($precipProbability * 100) . "%";
				echo "<td>" . $precipProbability . "</td>";
				echo "</tr>";
				
				// wind speed
				echo "<tr>";
				echo "<td>Wind Speed:</td>";
				$windSpeed = $json -> currently -> windSpeed;
				$windSpeed = round($windSpeed);
				echo "<td>" . $windSpeed . "mph" . "</td>";
				echo "</tr>";
				
				// dew point
				echo "<tr>";
				echo "<td>Dew Point:</td>";
				$dewPoint = $json -> currently -> dewPoint;
				$dewPoint = round($dewPoint);
				echo "<td>" . $dewPoint . $unit . "</td>";
				echo "</tr>";
				
				// humidity
				echo "<tr>";
				echo "<td>Humidity:</td>";
				$humidity = $json -> currently -> humidity;
				$humidity = ($humidity * 100) . "%";
				echo "<td>" . $humidity . "</td>";
				echo "</tr>";
				
				// visibility
				echo "<tr>";
				echo "<td>Visibility:</td>";
				//$visibility = $json -> currently -> visibility;
				//$visibility = round($visibility);
				echo "<td>INVALID, API removed</td>";
				echo "</tr>";
				
				// default timezone
				$timezone = $json -> timezone;
				date_default_timezone_set($timezone);
				
				// sunrise
				echo "<tr>";
				echo "<td>Sunrise:</td>";
				$sunrise = $json -> daily -> data[0] -> sunriseTime;
				$sunrise = date('h:ia', $sunrise);
				echo "<td>" . $sunrise . "</td>";
				echo "</tr>";
				
				// sunset
				echo "<tr>";
				echo "<td>Sunset:</td>";
				$sunset = $json -> daily -> data[0] -> sunsetTime;
				$sunset = date('h:ia', $sunset);
				echo "<td>" . $sunset . "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
			}
		}
	?>
	<script>
		function formReset() {
			var el = document.getElementById("output_box");
			el.parentNode.removeChild( el );
		}
		function divRemove() {
			window.location.href = "http://cs-server.usc.edu:14688/hw6/forecast.php";
		}
		function validateForm() {
			var x = document.forms["myForm"]["street_address"].value;
			var y = document.forms["myForm"]["city"].value;
			var z = document.forms["myForm"]["state"].value;
			if (x == null || x == "") {
				alert("Street address is missing!");
				return false;
			}
			else if (y == null || y == "") {
				alert("City is missing!");
				return false;
			}
			else if (z == "select") {
				alert("You didn't select your state!");
				return false;
			}
		}
	</script>
</body>
</html>