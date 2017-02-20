function ratio() {
	var x = window.innerWidth;
	var y = window.innerHeight;
	var z = x / y;
	var screen = document.getElementById("about");
	if (z > 1.5) {
		screen.style.backgroundSize = "100% auto";
	}
	else {
		screen.style.backgroundSize = "auto 100%";
	}
}
window.onload = function() {
	ratio();
}
window.onresize = function() {
	ratio();
}