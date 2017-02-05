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
__________________________________________________________________
__________________________________________________________________
__________________________________________________________________
__________________/\\\\\\\\\\\\\\\\\\\\\\\\\\\\\__________________
_________________/\/\\\\\\\\\\\\\\\\\\\\\\\\\\\\\_________________
_________________\/\/\\\\\///////////////////////_________________
__________________\/\/\\\\\/////////////////////__________________
___________________\/\/\\\\\__________/\/\/////___________________
____________________\/\/\\\\\________/\/\/////____________________
_____________________\/\/\\\\\______/\/\/////_____________________
______________________\/\/\\\\\____/\/\/////______________________
_______________________\/\/\\\\\__/\/\/////_______________________
________________________\/\/\\\\\/\/\/////________________________
_________________________\/\/\\\/\/\/////_________________________
__________________________\/\/\/\/\/////__________________________
___________________________\/\/\/\/////___________________________
____________________________\/\/\/////____________________________
_____________________________\/\/////_____________________________
______________________________\/////______________________________
__________________________________________________________________
__________________________________________________________________
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
	<div id="icons">
		<a class="icon" href="">
			<svg enable-background="new 0 0 32 32" height="40px" id="lI" class="svgIcon" version="1.0" viewBox="0 0 32 32" width="40px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect class="linkedIn" fill="#424242" height="23" width="7" y="9"/><path class="linkedIn" d="M24.003,9C20,9,18.89,10.312,18,12V9h-7v23h7V19c0-2,0-4,3.5-4s3.5,2,3.5,4v13h7V19C32,13,31,9,24.003,9z" fill="#424242"/><circle class="linkedIn" cx="3.5" cy="3.5" fill="#424242" r="3.5"/></g><g/><g/><g/><g/><g/><g/></svg>
		</a>
		<a class="icon" href="https://github.com/dubKelly">
			<svg enable-background="new 0 0 32 32" height="50px" id="gH" class="svgIcon" version="1.0" viewBox="0 0 32 32" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path id="gitHub" clip-rule="evenodd" d="M16.003,0C7.17,0,0.008,7.162,0.008,15.997  c0,7.067,4.582,13.063,10.94,15.179c0.8,0.146,1.052-0.328,1.052-0.752c0-0.38,0.008-1.442,0-2.777  c-4.449,0.967-5.371-2.107-5.371-2.107c-0.727-1.848-1.775-2.34-1.775-2.34c-1.452-0.992,0.109-0.973,0.109-0.973  c1.605,0.113,2.451,1.649,2.451,1.649c1.427,2.443,3.743,1.737,4.654,1.329c0.146-1.034,0.56-1.739,1.017-2.139  c-3.552-0.404-7.286-1.776-7.286-7.906c0-1.747,0.623-3.174,1.646-4.292C7.28,10.464,6.73,8.837,7.602,6.634  c0,0,1.343-0.43,4.398,1.641c1.276-0.355,2.645-0.532,4.005-0.538c1.359,0.006,2.727,0.183,4.005,0.538  c3.055-2.07,4.396-1.641,4.396-1.641c0.872,2.203,0.323,3.83,0.159,4.234c1.023,1.118,1.644,2.545,1.644,4.292  c0,6.146-3.74,7.498-7.304,7.893C19.479,23.548,20,24.508,20,26c0,2,0,3.902,0,4.428c0,0.428,0.258,0.901,1.07,0.746  C27.422,29.055,32,23.062,32,15.997C32,7.162,24.838,0,16.003,0z" fill="#424242" fill-rule="evenodd"/><g/><g/><g/><g/><g/><g/></svg>
		</a>
		<a class="icon" href="">
			<svg enable-background="new 0 0 50 50" height="50px" id="yT" class="svgIcon" version="1.1" viewBox="0 0 512 512" width="55px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient gradientTransform="matrix(1 0 0 -1 -41.66 349.04)" gradientUnits="userSpaceOnUse" id="SVGID_1_" x1="67.6434" x2="694.2763" y1="323.1215" y2="-303.5114"><stop offset="0" style="stop-color:#DD272D"/><stop offset="0.5153" style="stop-color:#CA2429"/><stop offset="1" style="stop-color:#B22025"/></linearGradient><g transform="translate(150, 150)"><circle id="play" cx="120" cy="120" fill="#262626" r="120"/></g><g transform="scale(1.7) translate(-100, -100)"><path id="youTube" d="M391.939,159.642c-11.485-12.816-24.349-12.892-30.247-13.618  c-42.252-3.275-105.625-3.275-105.625-3.275h-0.142c0,0-63.374,0-105.616,3.275c-5.898,0.727-18.752,0.802-30.247,13.618  c-9.041,9.777-11.995,31.984-11.995,31.984s-3.02,26.057-3.02,52.115v24.424c0,26.076,3.02,52.124,3.02,52.124  s2.945,22.197,11.995,31.955c11.495,12.816,26.566,12.429,33.286,13.769C177.499,368.487,256,369.251,256,369.251  s63.44-0.113,105.691-3.35c5.898-0.755,18.762-0.83,30.247-13.647c9.041-9.758,11.995-31.955,11.995-31.955s3.02-26.057,3.02-52.124  V243.75c0-26.066-3.02-52.124-3.02-52.124S400.99,169.42,391.939,159.642z M218.297,312.626V199.375l94.376,56.626L218.297,312.626z  " fill="#424242"/></g></svg>
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
