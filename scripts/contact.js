/*
**Contact form when reliable touchscreen detection is available**

var input = document.getElementsByTagName("input");
var message = document.getElementById("message");
var back = document.getElementById("back");
var next = 1;
var verify = false;
for (var i = 0; i < input.length; i++) {
	input[i].onkeydown = function(event) {
		var key = event.keyCode;
		//	Avoid confusion with non-tab users
		if (key === 9 || key === 13) {
			event.preventDefault();
			if (next === 1 && this.value.length === 0) {
				if (verify === false && this.placeholder.length === 9) {
					this.style.width = this.offsetWidth + 15 + "px";
					this.placeholder = this.placeholder + "*";
					verify = true;
				}
				else {
					console.log('"Insanity: doing the same thing over and over again and expecting different results." -Albert Einstein');
				}
			}
			else if (next === 2 && this.value.length === 0) {
				input[3].style.display = "none";
				next = next + 2;
				input[next].focus();
				verify = false;
				func();
			}
			else if (next === 4 && input[2].value.length === 0 && this.value.length === 0) {
				if (verify === false && this.placeholder.length === 5) {
					this.style.width = this.offsetWidth + 15 + "px";
					this.placeholder = this.placeholder + "*";
					verify = true;
				}
				else {
					console.log('"When you have bacon in your mouth, it doesn\'t matter who\'s president" -Louis C.K.');
				}
			}
			else {
				input[3].style.display = "block";
				next++;
				verify = false;
				func();
				if (next === 5) {
					message.focus();
				}
				else {
					input[next].focus();
				}
			}
			var elem = this;
			if (next === 5) {
				var nextElem = message;
			}
			else {
				nextElem = input[next];
			}
			function func() {
				var pos = 50;
				var nextPos = 60;
				var opCity = 1;
				var nextOpCity = 0;
				var int = setInterval(frame, 15);
				function frame() {
					if (pos === 40) {
						clearInterval(int);
					}
					else {
					pos--;
					nextPos--;
					opCity -= 0.1;
					nextOpCity += 0.1;
					elem.style.top = pos + "%";
					elem.style.opacity = opCity;
					elem.style.zIndex = "0";
					nextElem.style.top = nextPos + "%";
					nextElem.style.opacity = nextOpCity;
					nextElem.style.zIndex = "2";
					}
				}
			}
		}
		else {
			this.style.textAlign = "center";
			this.style.width = "100%"
		}
	}
}
message.onkeydown = function(event) {
	var key = event.keyCode;
	if (key === 9 || key === 13) {
		if (next === 5 && message.value.length === 0) {
			event.preventDefault();
			if (verify === false && message.placeholder.length === 7) {
				message.style.width = message.offsetWidth + 15 + "px";
				message.placeholder = message.placeholder + "*";
				verify = true;
			}
			else {
				console.log("Have you ever noticed that you can always see your nose?");
			}
		}
	}
	else {
		message.style.maxHeight = "51%";
		message.style.width = "90%";
		message.style.textAlign = "center";
		done.style.display = "inline-block"
	}
}
message.onkeyup = function() {
	message.style.height = (message.scrollHeight) - 4 + "px";
}
back.onclick = function() {
	if (next > 1) {
		var pos = 50;
		var lastPos = 40;
		var opCity = 1;
		var lastOpCity = 0;
		var int = setInterval(backFrame, 15);
		function backFrame() {
			if (pos === 60) {
				clearInterval(int);
				if (next === 4 && input[3].value.length === 0) {
					next -= 2;
					input[2].style.display = "inline-block";
				}
				else {
					next--;
				}
			}
			else {
				pos++;
				lastPos++;
				opCity -= 0.1;
				lastOpCity += 0.1;
				if (next === 5) {
					message.style.top = pos + "%";
					message.style.opacity = opCity;
					message.style.zIndex = "0";
					input[next - 1].style.top = lastPos + "%";
					input[next - 1].style.opacity = lastOpCity;
					input[next - 1].style.zIndex = "2";
					input[next - 1].focus();
				}
				else {
					input[next].style.top = pos + "%";
					input[next].style.opacity = opCity;
					input[next].style.zIndex = "0";
					if (next === 4 && input[3].value.length === 0) {
						input[next - 2].style.top = lastPos + "%";
						input[next - 2].style.opacity = lastOpCity;
						input[next - 2].style.zIndex = "2";
						input[next - 2].focus();
					}
					else {
						input[next - 1].style.top = lastPos + "%";
						input[next - 1].style.opacity = lastOpCity;
						input[next - 1].style.zIndex = "2";
						input[next - 1].focus();
					}
				}
			}
		}
	}
	else {
		this.onmouseup = function() {
			input[1].focus();
		}
	}
}*/
var burger = document.getElementsByClassName("goodBurger");
var mobileNav = document.getElementById("mobileNav");
var span1 = document.getElementsByClassName("span1");
var span2 = document.getElementsByClassName("span2");
var span3 = document.getElementsByClassName("span3");
var span4 = document.getElementsByClassName("span4");
for (var i = 0; i < 3; i++) {
	burger[i].onclick = function() {
		burger[0].classList.toggle("open");
		burger[1].classList.toggle("open");
		burger[2].classList.toggle("open");
		mobileNav.classList.toggle("open");
		if (mobileNav.className === "open") {
			document.getElementById("mobileNav").style.display = "block";
			mobileNav.appendChild(document.getElementById("mainBurger"));
		}
		else if (mobileNav.className !== "open") {
			document.getElementById("mobileNav").style.display = "none";
			document.getElementById("landing").appendChild(document.getElementById("mainBurger"));
		}
	}
}
var link = document.getElementsByTagName("a");
for (var i = 0; i < link.length; i++) {
	link[i].onclick = function() {
		burger[0].classList.toggle("open");
		burger[1].classList.toggle("open");
		burger[2].classList.toggle("open");
		mobileNav.classList.toggle("open");
		document.getElementById("landing").appendChild(document.getElementById("mainBurger"));
	}
}
/*
**""**

window.onscroll = function() {
	if (window.pageYOffset >= (window.innerHeight * 2)) {
		if (next === 5) {
			message.focus();
		}
		else {
			input[next].focus();
		}
	}
}*/