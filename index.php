<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>RC Car Control Panel</title>
<meta name="viewport" content = "height = device-height, width = 360, initial-scale=1.0, minimum-scale=1.0, user-scalable = no" />
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="turnDeviceNotification"></div>
<!--Testje voor later-->
<?php
echo "Hello Legende from PHP";
?>
<div class="main">
	<div class="container">
    	<div class="center">            
			<div class="arrow-top"><a href="#"></a>
				<form action="placeholder" method="post">
					<input type="image" src="picar/arrow-top.png" class="hovering" alt="Up">
					<input type="hidden" name="direction" value="forward">
				</form>
			</div>
			<div class="middle-row">
				<div class="arrow-left"><a href="#"></a>
					<form action="placeholder" method="post">
						<input type="image" src="picar/arrow-left.png" class="hovering" alt="Left">
						<input type="hidden" name="direction" value="left">
					</form>
				</div>
				<div class="stop"><a href="#"></a>
					<form action="placeholder" method="post">
						<input type="image" src="picar/btn-stop.png" class="hovering" alt="Stop">
						<input type="hidden" name="speed" value="stop">
					</form>
				</div>
				<div class="arrow-right"><a href="#"></a>
					<form action="placeholder" method="post">
						<input type="image" src="picar/arrow-right.png" class="hovering" alt="Right">
						<input type="hidden" name="direction" value="right">
					</form>
				</div>
			</div>
			<div class="arrow-down"><a href="#"></a>
				<form action="placeholder" method="post">
					<input type="image" src="picar/arrow-down.png" class="hovering" alt="Reverse">
					<input type="hidden" name="direction" value="reverse">
				</form>
			</div>
        </div>
    </div>
</div>
</body>
</html>
