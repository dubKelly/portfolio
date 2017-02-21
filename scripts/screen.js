function ratio() {
	var x = window.innerWidth;
	var y = window.innerHeight;
	var z = x / y;
	var screen = document.getElementById("portrait");
	if (z > 1.5) {
		screen.style.width = "100%";
		screen.style.height = "auto";
	}
	else {
		screen.style.width = "auto";
		screen.style.height = "100%";
	}
}
window.onload = function() {
	ratio();
}
window.onresize = function() {
	ratio();
}