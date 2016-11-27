
var burger = document.getElementById("goodBurger");
var mobileNav = document.getElementById("mobileNav");
var span1 = document.getElementById("span1");
var span2 = document.getElementById("span2");
var span3 = document.getElementById("span3");
var span4 = document.getElementById("span4");
burger.onclick = function() {
	this.classList.toggle("open");
	mobileNav.classList.toggle("open");
	if (this.className === "open" && window.pageYOffset >= window.innerHeight - 46) {
		span2.style.background = "#c4351f";
		span3.style.background = "#c4351f";
	}
	else if (this.className !== "open" && window.pageYOffset >= window.innerHeight - 46) {
		span2.style.background = "#262626";
		span3.style.background = "#262626";
	}
}
var link = document.getElementsByTagName("a");
for (var i = 0; i < link.length; i++) {
	link[i].onclick = function() {
		burger.classList.toggle("open");
		mobileNav.classList.toggle("open");
	}
}
window.onscroll = function() {
	if (burger.className !== "open") {
		if (window.pageYOffset >= (window.innerHeight - 34)) {
			span1.style.background = "#262626";
			span2.style.background = "#262626";
			span3.style.background = "#262626";
			span4.style.background = "#262626";
		}
		else if (window.pageYOffset >= (window.innerHeight - 46)) {
			span1.style.background = "#c4351f";
			span2.style.background = "#262626";
			span3.style.background = "#262626";
			span4.style.background = "#262626";
		}
		else if (window.pageYOffset >= (window.innerHeight - 58)) {
			span1.style.background = "#c4351f";
			span2.style.background = "#c4351f";
			span3.style.background = "#c4351f";
			span4.style.background = "#262626";
		}
		else if (window.pageYOffset < window.innerHeight -34) {
			span1.style.background = "#c4351f";
			span2.style.background = "#c4351f";
			span3.style.background = "#c4351f";
			span4.style.background = "#c4351f";
		}
	}
}
/*
window.onscrollup = function() {
		span1.style.background = "#c4351f";
	if (window.pageYOffset <= (window.innerHeight - 33)) {
		span2.style.background = "#c4351f";
		span3.style.background = "#c4351f";
		span4.style.background = "#c4351f";
	}
	else if (window.pageYOffset <= (window.innerHeight - 45)) {
	}
	else if (window.pageYOffset <= (window.innerHeight - 33)) {
	}
}*/