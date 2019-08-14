<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>RC Car Control Panel</title>
<meta name="viewport" content = "height = device-height, width = 360, initial-scale=1.0, minimum-scale=1.0, user-scalable = no" />
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="turnDeviceNotification">
</div>
<div class="main">
	<div class="container">
    	<div class="center">            
			<div class="arrow-top"><a href="#"></a>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="image" src="picar/arrow-top.png" class="hovering" alt="Up">
					<input type="hidden" name="direction" value="forward">
				</form>
			</div>
			<div class="middle-row">
				<div class="arrow-left"><a href="#"></a>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="image" src="picar/arrow-left.png" class="hovering" alt="Left">
						<input type="hidden" name="direction" value="left">
					</form>
				</div>
				<div class="stop"><a href="#"></a>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="image" src="picar/btn-stop.png" class="hovering" alt="Stop">
						<input type="hidden" name="speed" value="stop">
					</form>
				</div>
				<div class="arrow-right"><a href="#"></a>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="image" src="picar/arrow-right.png" class="hovering" alt="Right">
						<input type="hidden" name="direction" value="right">
					</form>
				</div>
			</div>
			<div class="arrow-down"><a href="#"></a>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="image" src="picar/arrow-down.png" class="hovering" alt="Reverse">
					<input type="hidden" name="direction" value="reverse">
				</form>
			</div>
			<?php 
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$url_direction = 'http://80.57.208.36:5000/direction?apikey=2IdA7T9M4o';
					$url_speed = 'http://80.57.208.36:5000/speed?apikey=2IdA7T9M4o';
	
					if(isset($_POST['direction']))
					{
						$data = array('direction' => $_POST['direction']);
						$url = $url_direction;
					}
					elseif(isset($_POST['speed']))
					{
						$data = array('speed' => $_POST['speed']);
						$url = $url_speed;
					}

					// use key 'http' even if you send the request to https://...
					$options = array(
						'http' => array(
							'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
							'method'  => 'POST',
							'content' => http_build_query($data)
						)
					);
					$context  = stream_context_create($options);
					$result = file_get_contents($url, false, $context);
					if ($result === FALSE) { 
						echo("<div class=\"console\"> ERROR: Cannot reach API. </div>"); 
					}
					else { echo("<div class=\"console\"> $result </div>"); }
				}
			?>
        </div>
    </div>
</div>
</body>
</html>
