<?php 
session_start();
function generateFormToken($form) {
	$token = md5(uniqid(microtime(), true));
	$_SESSION[$form.'_token'] = $token;
	return $token;
}
function verifyFormToken($form) {
	if (!isset($_SESSION[$form.'_token'])) {
		return false;
	}
	if (!isset($_POST['token'])) {
		return false;
	}
	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
		return false;
	}
	return true;
}
if (verifyFormToken('form1')) {
	if (isset($_POST['message'])) {
		$whitelist = array('token', 'name', 'phone', 'ext', 'email', 'message');
		foreach ($_POST as $key => $value) {
			if (!in_array($key, $whitelist)) {
				die();
			}
		}
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #262626;" cellpadding="10">';
		$message .= "<tr style='background: #c4351f;'><td>Name: </td><td>".strip_tags($_POST['name'])."</td></tr>";
		$phone = $_POST['phone'];
		if (($phone) != '') {
			$message .= "<tr><td>Phone: </td><td>".strip_tags($_POST['phone'])."</td></tr>";
		}
		$ext = $_POST['ext'];
		if (($ext) != '') {
			$message .= "<tr><td>Ext: </td><td>".strip_tags($_POST['ext'])."</td></tr>";
		}
		$email = $_POST['email'];
		if (($email) != '') {
			$message .= "<tr><td>Email: </td><td>".strip_tags($_POST['email'])."</td></tr>";
		}
		$message .= "<tr><td></td><td>".htmlentities($_POST['message'])."</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
		if (preg_match($pattern, trim(strip_tags($_POST['email'])))) {
			$cleanedFrom = trim(strip_tags($_POST['email']));
		}
		else {
			return "Invalid Email";
		}
		$to = 'holla@jordanneeb.com';
		$subject = "YaDontKnowNoOneWhoDontWantNothinDoneDoYa?";
		$headers = "From:".$cleanedFrom."\r\n";
		$headers .= "Reply-To:".strip_tags($_POST['email'])."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		if (mail($to, $subject, $message, $headers)) {
			header('Location: #landing');
		}
		else {
			echo "Message failed to send.";
		}
		die();
	}
}
else {
	if (!isset($_SESSION[$form.'_token'])) {

	}
	else {
		echo "Common, man. I never hurt nobody.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One|Ubuntu:400|Work+Sans:200" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styleSheets/indexStyles.css">
	<link rel="icon" href="images/signSm.ico">
	<title>Jordan Neeb | Toronto Web Developer</title>
</head>
<?php
$newToken = generateFormToken('form1');
?>
<body>
<div id="mobileNav">
	<ul id="mobileNavList">
		<li><a href="#about">About</a></li>
		<li><a href="#work">Work</a></li>
		<li><a href="#contact">Contact</a></li>
	</ul>
</div>
<section id="landing">
	<div id="mainBurger" class="goodBurger">
		<span class="span1"></span>
		<span class="span2"></span>
		<span class="span3"></span>
		<span class="span4"></span>
	</div>
	<div id="main">
		<h1>
			<span id="first" class="name">Jord<span class="deltaXi">Δ</span>​‌n</span>
			<span id="title">Front-End Web Developer</span>
			<span id="last" class="name">N<span class="deltaXi">Ξ</span>​‌eb</span>
		</h1>
	</div>
	<div id="mainNav" class="nav">
		<ul>
			<li><a href="#about" tabindex="-1">About</a></li>
			<li class="slash">/</li>
			<li><a href="#work" tabindex="-1">Work</a></li>
			<li class="slash">/</li>
			<li><a href="#contact" tabindex="-1">Contact</a></li>
		</ul>
	</div>
</section>
<section id="about">
	<div id="aboutBurger" class="goodBurger">
		<span class="span1"></span>
		<span class="span2"></span>
		<span class="span3"></span>
		<span class="span4"></span>
	</div>
	<div id="blurb">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div id="aboutNav" class="nav">
		<ul>
			<li><a href="#landing" tabindex="-1">Home</a></li>
			<li class="slash">/</li>
			<li><a href="#work" tabindex="-1">Work</a></li>
			<li class="slash">/</li>
			<li><a href="#contact" tabindex="-1">Contact</a></li>
		</ul>
	</div>
</section>
<section id="contact">
	<div id="contactBurger" class="goodBurger">
		<span class="span1"></span>
		<span class="span2"></span>
		<span class="span3"></span>
		<span class="span4"></span>
	</div>
	<form action="index.php" id="form" method="post">
		<div id="inputs">
			<input type="hidden" name="token" value="<?php echo $newToken; ?>">
			<input id="userName" type="text" name="name" placeholder="Your Name" tabindex="1">
			<input id="phone" type="text" name="phone" placeholder="Phone #" tabindex="2">
			<input id="ext" type="text" name="ext" placeholder="Ext." tabindex="3">
			<input id="email" type="text" name="email" placeholder="Email" tabindex="4">
			<textarea id="message" type="text" name="message" placeholder="Message" tabindex="5"></textarea>
			<button id="done">Submit</button>
		</div>
		<!--
		**For non-touch devices**

		<div id="part">
		<svg height="38px" id="back" style="enable-background:new 0 0 128 128;" version="1.1" viewBox="0 0 128 128" width="38px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<g>
			<g>
				<line style="fill:none;stroke:#262626;stroke-width:10;stroke-linecap:square;stroke-miterlimit:10;" x1="57.12" x2="17.787" y1="103.334" y2="64"/>
				<line style="fill:none;stroke:#262626;stroke-width:10;stroke-linecap:square;stroke-miterlimit:10;" x1="17.787" x2="57.12" y1="64" y2="24.666"/>
			</g>
			<line style="fill:none;stroke:#262626;stroke-width:10;stroke-miterlimit:10;" x1="17.787" x2="118.213" y1="64" y2="64"/>
		</g>
		</svg>
		</div>
		-->
		<h2 id="cHead">What's<br>Up?</h2>
		<div id="submitBtn">
		</div>
	</form>
	<div id="prev">
		<p id="preview"></p>
	</div>
</section>
<footer>
	<div id="footNav">
		<ul>
			<li><a href="#landing">Home</a></li>
			<li><a href="#about">About</a></li>
			<li><a href="work">Work</a></li>
		</ul>
	</div>
</footer>
<script type="text/javascript" src="scripts/contact.js"></script>
</body>
</html>
