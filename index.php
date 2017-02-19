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
<!--
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________/////\__________________
____________________________________________/////\/\_________________
___________________________________________/////\/\/\________________
__________________________________________/////\/\/\/\_______________
_________________________________________/////\/\/\/\/\______________
________________________________________/////\/\/\\\/\/\_____________
_______________________________________/////\/\/\\\\\/\/\____________
______________________________________/////\/\/__\\\\\/\/\___________
_____________________________________/////\/\/____\\\\\/\/\__________
____________________________________///////////////\\\\\/\/\_________
___________________________________/////////////////\\\\\/\/\________
___________________________________\\\\\\\\\\\\\\\\\\\\\\\/\/________
____________________________________\\\\\\\\\\\\\\\\\\\\\\\/_________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________

- animate landing onLoad
- animate link underline
- create header || fix burger bug
- finish about background
	- *paralax & fixed h1
- link contact form to landing page onFail
- re-design contact section
- slow scroll
- write about blurb
- SEO
- hit up dem robots
- comments

-->
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
			<div class="underContainer">
				<li class="underline"><a href="#about" tabindex="-1">About</a></li>
			</div>
			<li class="slash">/</li>
			<div class="underContainer">
				<li class="underline"><a href="#work" tabindex="-1">Work</a></li>
			</div>
			<li class="slash">/</li>
			<div class="underContainer">
				<li class="underline"><a href="#contact" tabindex="-1">Contact</a></li>
			</div>
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
			<div class="underContainer">
				<li class="black underline"><a href="#landing" tabindex="-1">Home</a></li>
			</div>
			<li class="slash">/</li>
			<div class="underContainer">
				<li class="black underline"><a href="#work" tabindex="-1">Work</a></li>
			</div>
			<li class="slash">/</li>
			<div class="underContainer">
				<li class="black underline"><a href="#contact" tabindex="-1">Contact</a></li>
			</div>
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
		<h2 id="cHead">What's<br>Up?</h2>
		<div id="submitBtn">
		</div>
	</form>
	<div id="prev">
		<p id="preview"></p>
	</div>
</section>
<footer>
	<div id="icons">
		<a class="icon" href="">
			<svg enable-background="new 0 0 32 32" height="40px" id="lI" class="svgIcon" version="1.0" viewBox="0 0 32 32" width="40px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect class="linkedIn" fill="#424242" height="23" width="7" y="9"/><path class="linkedIn" d="M24.003,9C20,9,18.89,10.312,18,12V9h-7v23h7V19c0-2,0-4,3.5-4s3.5,2,3.5,4v13h7V19C32,13,31,9,24.003,9z" fill="#424242"/><circle class="linkedIn" cx="3.5" cy="3.5" fill="#424242" r="3.5"/></g><g/><g/><g/><g/><g/><g/></svg>
		</a>
		<a class="icon" href="https://github.com/dubKelly">
			<svg enable-background="new 0 0 32 32" height="50px" id="gH" class="svgIcon" version="1.0" viewBox="0 0 32 32" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path id="gitHub" clip-rule="evenodd" d="M16.003,0C7.17,0,0.008,7.162,0.008,15.997  c0,7.067,4.582,13.063,10.94,15.179c0.8,0.146,1.052-0.328,1.052-0.752c0-0.38,0.008-1.442,0-2.777  c-4.449,0.967-5.371-2.107-5.371-2.107c-0.727-1.848-1.775-2.34-1.775-2.34c-1.452-0.992,0.109-0.973,0.109-0.973  c1.605,0.113,2.451,1.649,2.451,1.649c1.427,2.443,3.743,1.737,4.654,1.329c0.146-1.034,0.56-1.739,1.017-2.139  c-3.552-0.404-7.286-1.776-7.286-7.906c0-1.747,0.623-3.174,1.646-4.292C7.28,10.464,6.73,8.837,7.602,6.634  c0,0,1.343-0.43,4.398,1.641c1.276-0.355,2.645-0.532,4.005-0.538c1.359,0.006,2.727,0.183,4.005,0.538  c3.055-2.07,4.396-1.641,4.396-1.641c0.872,2.203,0.323,3.83,0.159,4.234c1.023,1.118,1.644,2.545,1.644,4.292  c0,6.146-3.74,7.498-7.304,7.893C19.479,23.548,20,24.508,20,26c0,2,0,3.902,0,4.428c0,0.428,0.258,0.901,1.07,0.746  C27.422,29.055,32,23.062,32,15.997C32,7.162,24.838,0,16.003,0z" fill="#424242" fill-rule="evenodd"/><g/><g/><g/><g/><g/><g/></svg>
		</a>
		<a class="icon" href="">
			<svg enable-background="new 0 0 128 128" id="Social_Icons" version="1.1" viewBox="0 0 128 128" width="50px" height="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x36__stroke"><g id="Codepen"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="50px" width="50px"/><path clip-rule="evenodd" d="M117,73.204L103.24,64L117,54.796V73.204z     M69.5,112.22V86.568L93.348,70.62l19.248,12.872L69.5,112.22z M64,77.012L44.548,64L64,50.988L83.456,64L64,77.012z M58.5,112.22    L15.404,83.492L34.656,70.62L58.5,86.568V112.22z M11,54.796L24.764,64L11,73.204V54.796z M58.5,15.78v25.652L34.656,57.384    L15.404,44.508L58.5,15.78z M69.5,15.78l43.096,28.728L93.348,57.384L69.5,41.432V15.78z M127.952,43.784    c-0.012-0.084-0.032-0.16-0.044-0.24c-0.028-0.156-0.056-0.312-0.096-0.46c-0.024-0.092-0.06-0.18-0.088-0.268    c-0.044-0.136-0.088-0.268-0.14-0.4c-0.036-0.092-0.08-0.184-0.124-0.268c-0.056-0.128-0.116-0.248-0.188-0.364    c-0.048-0.088-0.104-0.172-0.156-0.256c-0.072-0.116-0.148-0.228-0.232-0.336c-0.06-0.08-0.124-0.16-0.188-0.236    c-0.088-0.104-0.18-0.204-0.276-0.3c-0.072-0.072-0.14-0.148-0.216-0.212c-0.104-0.092-0.208-0.18-0.312-0.264    c-0.084-0.064-0.164-0.128-0.248-0.188c-0.032-0.02-0.06-0.048-0.092-0.068l-58.5-39c-1.848-1.232-4.252-1.232-6.104,0l-58.496,39    c-0.032,0.02-0.06,0.048-0.092,0.068c-0.088,0.06-0.168,0.124-0.248,0.188C2.004,40.264,1.9,40.352,1.8,40.444    c-0.076,0.064-0.148,0.14-0.22,0.212c-0.096,0.096-0.188,0.196-0.272,0.3c-0.068,0.076-0.132,0.156-0.192,0.236    c-0.08,0.108-0.156,0.22-0.228,0.336c-0.056,0.084-0.108,0.168-0.16,0.256C0.66,41.9,0.6,42.02,0.54,42.148    c-0.04,0.084-0.084,0.176-0.12,0.268c-0.056,0.132-0.1,0.264-0.144,0.4c-0.028,0.088-0.06,0.176-0.084,0.268    c-0.04,0.148-0.068,0.304-0.096,0.46c-0.016,0.08-0.036,0.156-0.044,0.24C0.02,44.016,0,44.256,0,44.5v39    c0,0.24,0.02,0.48,0.052,0.72c0.008,0.076,0.028,0.156,0.044,0.236c0.028,0.156,0.056,0.308,0.096,0.46    c0.024,0.092,0.056,0.18,0.084,0.268c0.044,0.132,0.088,0.268,0.144,0.404c0.036,0.088,0.08,0.176,0.12,0.264    c0.06,0.124,0.12,0.244,0.188,0.368c0.052,0.084,0.104,0.168,0.16,0.252c0.072,0.116,0.148,0.224,0.228,0.332    c0.06,0.084,0.124,0.164,0.192,0.24c0.084,0.1,0.176,0.204,0.272,0.296c0.072,0.076,0.144,0.148,0.22,0.216    c0.1,0.092,0.204,0.18,0.312,0.264c0.08,0.064,0.16,0.128,0.248,0.188c0.032,0.02,0.06,0.048,0.092,0.068l58.496,39    C61.872,127.692,62.936,128,64,128s2.128-0.308,3.052-0.924l58.5-39c0.032-0.02,0.06-0.048,0.092-0.068    c0.084-0.06,0.164-0.124,0.248-0.188c0.104-0.084,0.208-0.172,0.312-0.264c0.076-0.068,0.144-0.14,0.216-0.216    c0.096-0.092,0.188-0.196,0.276-0.296c0.064-0.076,0.128-0.156,0.188-0.24c0.084-0.108,0.16-0.216,0.232-0.332    c0.052-0.084,0.108-0.168,0.156-0.252c0.072-0.124,0.132-0.244,0.188-0.368c0.044-0.088,0.088-0.176,0.124-0.264    c0.052-0.136,0.096-0.272,0.14-0.404c0.028-0.088,0.064-0.176,0.088-0.268c0.04-0.152,0.068-0.304,0.096-0.46    c0.012-0.08,0.032-0.16,0.044-0.236c0.032-0.24,0.048-0.48,0.048-0.72v-39C128,44.256,127.984,44.016,127.952,43.784z" fill="#424242" fill-rule="evenodd" id="codePen"/></g></g></svg>
		</a>
	</div>
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
