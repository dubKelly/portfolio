function ratio() {
	var x = window.innerWidth;
	var y = window.innerHeight;
	var z = document.getElementById("about");
	if (x > y) {
		z.style.backgroundSize = "100% auto";
	}
	else {
		z.style.backgroundSize = "auto 100%";
	}
}
window.onload = function() {
	ratio();
}
window.onresize = function() {
	ratio();
}