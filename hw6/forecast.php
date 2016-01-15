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
					<option value="AL" <?php if(isset($_POST['state']) && $_POST['state'] == 'AL') echo ($_POST['state'] == 'AL') ? ' selected="selected"' : ''; ?> >Alabama</option>
					<option value="AK" <?php if(isset($_POST['state']) && $_POST['state'] == 'AK') echo ($_POST['state'] == 'AK') ? ' selected="selected"' : ''; ?> >Alaska</option>
					<option value="AZ" <?php if(isset($_POST['state']) && $_POST['state'] == 'AZ') echo ($_POST['state'] == 'AZ') ? ' selected="selected"' : ''; ?> >Arizona</option>
					<option value="AR" <?php if(isset($_POST['state']) && $_POST['state'] == 'AR') echo ($_POST['state'] == 'AR') ? ' selected="selected"' : ''; ?> >Arkansas</option>
					<option value="CA" <?php if(isset($_POST['state']) && $_POST['state'] == 'CA') echo ($_POST['state'] == 'CA') ? ' selected="selected"' : ''; ?> >California</option>
					<option value="CO" <?php if(isset($_POST['state']) && $_POST['state'] == 'CO') echo ($_POST['state'] == 'CO') ? ' selected="selected"' : ''; ?> >Colorado</option>
					<option value="CT" <?php if(isset($_POST['state']) && $_POST['state'] == 'CT') echo ($_POST['state'] == 'CT') ? ' selected="selected"' : ''; ?> >Connecticut</option>
					<option value="DE" <?php if(isset($_POST['state']) && $_POST['state'] == 'DE') echo ($_POST['state'] == 'DE') ? ' selected="selected"' : ''; ?> >Delaware</option>
					<option value="DC" <?php if(isset($_POST['state']) && $_POST['state'] == 'CD') echo ($_POST['state'] == 'DC') ? ' selected="selected"' : ''; ?> >District Of Columbia</option>
					<option value="FL" <?php if(isset($_POST['state']) && $_POST['state'] == 'FL') echo ($_POST['state'] == 'FL') ? ' selected="selected"' : ''; ?> >Florida</option>
					<option value="GA" <?php if(isset($_POST['state']) && $_POST['state'] == 'GA') echo ($_POST['state'] == 'GA') ? ' selected="selected"' : ''; ?> >Georgia</option>
					<option value="HI" <?php if(isset($_POST['state']) && $_POST['state'] == 'HI') echo ($_POST['state'] == 'HI') ? ' selected="selected"' : ''; ?> >Hawaii</option>
					<option value="ID" <?php if(isset($_POST['state']) && $_POST['state'] == 'ID') echo ($_POST['state'] == 'ID') ? ' selected="selected"' : ''; ?> >Idaho</option>
					<option value="IL" <?php if(isset($_POST['state']) && $_POST['state'] == 'IL') echo ($_POST['state'] == 'IL') ? ' selected="selected"' : ''; ?> >Illinois</option>
					<option value="IN" <?php if(isset($_POST['state']) && $_POST['state'] == 'IN') echo ($_POST['state'] == 'IN') ? ' selected="selected"' : ''; ?> >Indiana</option>
					<option value="IA" <?php if(isset($_POST['state']) && $_POST['state'] == 'IA') echo ($_POST['state'] == 'IA') ? ' selected="selected"' : ''; ?> >Iowa</option>
					<option value="KS" <?php if(isset($_POST['state']) && $_POST['state'] == 'KS') echo ($_POST['state'] == 'KS') ? ' selected="selected"' : ''; ?> >Kansas</option>
					<option value="KY" <?php if(isset($_POST['state']) && $_POST['state'] == 'KY') echo ($_POST['state'] == 'KY') ? ' selected="selected"' : ''; ?> >Kentucky</option>
					<option value="LA" <?php if(isset($_POST['state']) && $_POST['state'] == 'LA') echo ($_POST['state'] == 'LA') ? ' selected="selected"' : ''; ?> >Louisiana</option>
					<option value="ME" <?php if(isset($_POST['state']) && $_POST['state'] == 'ME') echo ($_POST['state'] == 'ME') ? ' selected="selected"' : ''; ?> >Maine</option>
					<option value="MD" <?php if(isset($_POST['state']) && $_POST['state'] == 'MD') echo ($_POST['state'] == 'MD') ? ' selected="selected"' : ''; ?> >Maryland</option>
					<option value="MA" <?php if(isset($_POST['state']) && $_POST['state'] == 'MA') echo ($_POST['state'] == 'MA') ? ' selected="selected"' : ''; ?> >Massachusetts</option>
					<option value="MI" <?php if(isset($_POST['state']) && $_POST['state'] == 'MI') echo ($_POST['state'] == 'MI') ? ' selected="selected"' : ''; ?> >Michigan</option>
					<option value="MN" <?php if(isset($_POST['state']) && $_POST['state'] == 'MN') echo ($_POST['state'] == 'MN') ? ' selected="selected"' : ''; ?> >Minnesota</option>
					<option value="MS" <?php if(isset($_POST['state']) && $_POST['state'] == 'MS') echo ($_POST['state'] == 'MS') ? ' selected="selected"' : ''; ?> >Mississippi</option>
					<option value="MO" <?php if(isset($_POST['state']) && $_POST['state'] == 'MO') echo ($_POST['state'] == 'MO') ? ' selected="selected"' : ''; ?> >Missouri</option>
					<option value="MT" <?php if(isset($_POST['state']) && $_POST['state'] == 'MT') echo ($_POST['state'] == 'MT') ? ' selected="selected"' : ''; ?> >Montana</option>
					<option value="NE" <?php if(isset($_POST['state']) && $_POST['state'] == 'NE') echo ($_POST['state'] == 'NE') ? ' selected="selected"' : ''; ?> >Nebraska</option>
					<option value="NV" <?php if(isset($_POST['state']) && $_POST['state'] == 'NV') echo ($_POST['state'] == 'NV') ? ' selected="selected"' : ''; ?> >Nevada</option>
					<option value="NH" <?php if(isset($_POST['state']) && $_POST['state'] == 'NH') echo ($_POST['state'] == 'NH') ? ' selected="selected"' : ''; ?> >New Hampshire</option>
					<option value="NJ" <?php if(isset($_POST['state']) && $_POST['state'] == 'NJ') echo ($_POST['state'] == 'NJ') ? ' selected="selected"' : ''; ?> >New Jersey</option>
					<option value="NM" <?php if(isset($_POST['state']) && $_POST['state'] == 'NM') echo ($_POST['state'] == 'NM') ? ' selected="selected"' : ''; ?> >New Mexico</option>
					<option value="NY" <?php if(isset($_POST['state']) && $_POST['state'] == 'NY') echo ($_POST['state'] == 'NY') ? ' selected="selected"' : ''; ?> >New York</option>
					<option value="NC" <?php if(isset($_POST['state']) && $_POST['state'] == 'NC') echo ($_POST['state'] == 'NC') ? ' selected="selected"' : ''; ?> >North Carolina</option>
					<option value="ND" <?php if(isset($_POST['state']) && $_POST['state'] == 'ND') echo ($_POST['state'] == 'ND') ? ' selected="selected"' : ''; ?> >North Dakota</option>
					<option value="OH" <?php if(isset($_POST['state']) && $_POST['state'] == 'OH') echo ($_POST['state'] == 'OH') ? ' selected="selected"' : ''; ?> >Ohio</option>
					<option value="OK" <?php if(isset($_POST['state']) && $_POST['state'] == 'OK') echo ($_POST['state'] == 'OK') ? ' selected="selected"' : ''; ?> >Oklahoma</option>
					<option value="OR" <?php if(isset($_POST['state']) && $_POST['state'] == 'OR') echo ($_POST['state'] == 'OR') ? ' selected="selected"' : ''; ?> >Oregon</option>
					<option value="PA" <?php if(isset($_POST['state']) && $_POST['state'] == 'PA') echo ($_POST['state'] == 'PA') ? ' selected="selected"' : ''; ?> >Pennsylvania</option>
					<option value="RI" <?php if(isset($_POST['state']) && $_POST['state'] == 'RI') echo ($_POST['state'] == 'RI') ? ' selected="selected"' : ''; ?> >Rhode Island</option>
					<option value="SC" <?php if(isset($_POST['state']) && $_POST['state'] == 'SC') echo ($_POST['state'] == 'SC') ? ' selected="selected"' : ''; ?> >South Carolina</option>
					<option value="SD" <?php if(isset($_POST['state']) && $_POST['state'] == 'SD') echo ($_POST['state'] == 'SD') ? ' selected="selected"' : ''; ?> >South Dakota</option>
					<option value="TN" <?php if(isset($_POST['state']) && $_POST['state'] == 'TN') echo ($_POST['state'] == 'TN') ? ' selected="selected"' : ''; ?> >Tennessee</option>
					<option value="TX" <?php if(isset($_POST['state']) && $_POST['state'] == 'TX') echo ($_POST['state'] == 'TX') ? ' selected="selected"' : ''; ?> >Texas</option>
					<option value="UT" <?php if(isset($_POST['state']) && $_POST['state'] == 'UT') echo ($_POST['state'] == 'UT') ? ' selected="selected"' : ''; ?> >Utah</option>
					<option value="VT" <?php if(isset($_POST['state']) && $_POST['state'] == 'VT') echo ($_POST['state'] == 'VT') ? ' selected="selected"' : ''; ?> >Vermont</option>
					<option value="VA" <?php if(isset($_POST['state']) && $_POST['state'] == 'VA') echo ($_POST['state'] == 'VA') ? ' selected="selected"' : ''; ?> >Virginia</option>
					<option value="WA" <?php if(isset($_POST['state']) && $_POST['state'] == 'WA') echo ($_POST['state'] == 'WA') ? ' selected="selected"' : ''; ?> >Washington</option>
					<option value="WV" <?php if(isset($_POST['state']) && $_POST['state'] == 'WV') echo ($_POST['state'] == 'WV') ? ' selected="selected"' : ''; ?> >West Virginia</option>
					<option value="WI" <?php if(isset($_POST['state']) && $_POST['state'] == 'WI') echo ($_POST['state'] == 'WI') ? ' selected="selected"' : ''; ?> >Wisconsin</option>
					<option value="WY" <?php if(isset($_POST['state']) && $_POST['state'] == 'WY') echo ($_POST['state'] == 'WY') ? ' selected="selected"' : ''; ?> >Wyoming</option>
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
			// https://api.forecast.io/forecast/0cb68cdb03d1e584ee0202ffa0e425a4/33.8613641,-118.0815308?units=us&exclude=flagsobject
			$forecastURL = $forecastURL . $coordinates . $units . $exclude;
			
			// $jsonContent, string
			$jsonContent = file_get_contents($forecastURL);
			// echo $jsonContent;
			// $json is an object after decode
			$json = json_decode($jsonContent);
			echo gettype($json);
			// will give correct output
			// echo $json;
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
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/clear.png' alt='clear'></image></div>";
				}
				else if ($icon == "clear-night"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/clear_night.png' alt='clear_night'></image></div>";
				}
				else if ($icon == "rain"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/rain.png' alt='rain'></image></div>";
				}
				else if ($icon == "snow"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/snow.png' alt='snow'></image></div>";
				}
				else if ($icon == "sleet"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/sleet.png' alt='sleet'></image></div>";
				}
				else if ($icon == "wind"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/wind.png' alt='wind'></image></div>";
				}
				else if ($icon == "fog"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/fog.png' alt='fog'></image></div>";
				}
				else if ($icon == "cloudy"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/cloudy.png' alt='cloudy'></image></div>";
				}
				else if ($icon == "partly-cloudy-day"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/cloud_day.png' alt='could_day'></image></div>";
				}
				else if ($icon == "partly-cloudy-night"){
					echo "<div align='center'><image src='http://cs-server.usc.edu:45678/hw/hw6/images/cloud_night.png' alt='cloud_night'></image></div>";
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
				$visibility = $json -> currently -> visibility;
				$visibility = round($visibility);
				echo "<td>" . $visibility . "mi" . "</td>";
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
