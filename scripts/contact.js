var input = document.getElementsByTagName("input");
var message = document.getElementById("message");
var done = document.getElementById("done");
var part = document.getElementById("part");
var partIndex = 8;
var next = 0;
var verify = false;
for (var i = 0; i < input.length; i++) {
	input[i].onkeydown = function(event) {
		var key = event.keyCode;
		//	Avoid confusion with non-tab users
		if (key === 9 || key === 13) {
			event.preventDefault();
			if (next === 0 && this.value.length === 0) {
				if (verify === false) {
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
				partIndex = partIndex - 4;
				part.style.zIndex = partIndex;
				verify = false;
				func();
			}
			else if (next === 3 && input[1].value.length === 0 && this.value.length === 0) {
				if (verify === false) {
					this.style.width = this.offsetWidth + 15 + "px";
					this.placeholder = this.placeholder + "*";
					verify = true;
				}
				else {
					console.log('"When you have bacon in your mouth, it doesn\'t matter who\'s president" -Louis C.K.')
				}
			}
			else {
				next++;
				partIndex -= 2;
				part.style.zIndex = partIndex;
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
				var NextOpCity = 0;
				var int = setInterval(frame, 15);
				function frame() {
					if (pos === 40) {
						clearInterval(int);
					}
					else {
					pos--;
					nextPos--;
					opCity -= 0.1;
					NextOpCity += 0.1;
					elem.style.top = pos + "%";
					elem.style.opacity = opCity;
					nextElem.style.top = nextPos + "%";
					nextElem.style.opacity = NextOpCity;
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
		if (next === 4 && message.value.length === 0) {
			event.preventDefault();
			if (verify === false) {
				message.style.width = message.offsetWidth + 15 + "px";
				message.placeholder = message.placeholder + "*";
				verify = true;
			}
			else {
				console.log("Have you ever noticed that you can always see your nose?")
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
done.onclick = function(event) {
	event.preventDefault();
	document.getElementById("form").style.display = "none";
	document.getElementById("prev").style.display = "block";
	document.getElementById("preview").innerHTML = 
		message.value 
		+ "<br><br>"
		+ input[0].value
		+ "<br>"
		+ input[1].value + "&nbsp" + "ext.&nbsp" + input[2].value
		+ "<br>"
		+ input[3].value;
}