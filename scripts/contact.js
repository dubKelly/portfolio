var input = document.getElementsByTagName("input");
var message = document.getElementById("message");
var back = document.getElementById("back");
var next = 0;
var verify = false;
for (var i = 0; i < input.length; i++) {
	input[i].onkeydown = function(event) {
		var key = event.keyCode;
		//	Avoid confusion with non-tab users
		if (key === 9 || key === 13) {
			event.preventDefault();
			if (next === 0 && this.value.length === 0) {
				if (verify === false && this.placeholder.length === 9) {
					this.style.width = this.offsetWidth + 15 + "px";
					this.placeholder = this.placeholder + "*";
					verify = true;
				}
				else {
					console.log('"Insanity: doing the same thing over and over again and expecting different results." -Albert Einstein');
				}
			}
			else if (next === 1 && this.value.length === 0) {
				input[2].style.display = "none";
				next = next + 2;
				input[next].focus();
				verify = false;
				func();
			}
			else if (next === 3 && input[1].value.length === 0 && this.value.length === 0) {
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
				next++;
				verify = false;
				func();
				if (next === 4) {
					message.focus();
				}
				else {
					input[next].focus();
				}
			}
			var elem = this;
			if (next === 4) {
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
		console.log(next);
	}
}
message.onkeydown = function(event) {
	var key = event.keyCode;
	if (key === 9 || key === 13) {
		if (next === 4 && message.value.length === 0) {
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
window.onscroll = function() {
	var vh = window.innerHeight;
	if ((window.pageYOffset) >= (vh * 2)) {
		if (next === 4) {
			message.focus();
		}
		else {
			input[next].focus();
		}
	}
}
back.onclick = function() {
	if (next > 0) {
		var pos = 50;
		var lastPos = 40;
		var opCity = 1;
		var lastOpCity = 0;
		var int = setInterval(backFrame, 15);
		function backFrame() {
			console.log(next);
			if (pos === 60) {
				clearInterval(int);
				if (next === 3 && input[2].value.length === 0) {
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
				if (next === 4) {
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
					if (next === 3 && input[2].value.length === 0) {
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
			input[0].focus();
			console.log(next);
		}
	}
}