var input = document.getElementsByTagName("input");
var message = document.getElementById("message");
var done = document.getElementById("done");
var part = document.getElementById("part");
var partIndex = 8;
var next = 0;
for (var i = 0; i < input.length; i++) {
	input[i].onkeydown = function(event) {
		this.style.textAlign = "center";
		this.style.width = "100%"
		var key = event.keyCode;
		if (key === 9) {
			if (next === 3) {
				next += 1;
				this.style.display = "none";
				message.style.opacity = "1";
				part.style.display = "none";
			}
			else {
				partIndex -= 2;
				next += 1;
				this.style.display = "none";
				input[next].style.opacity = "1";
				part.style.zIndex = partIndex;
			}
		}
		// 	To avoid confusion with non-tab users
		else if (key === 13) {	
			event.preventDefault();
			if (next === 3) {
				next += 1;
				this.onkeyup = function() {
					this.style.display = "none";
					message.focus();
					message.style.opacity = "1"
					part.style.display = "none";
				}
			}
			else {
				partIndex -= 2;
				next += 1;
				this.style.display = "none";
				input[next].focus();
				input[next].style.opacity = "1";
				part.style.zIndex = partIndex;
			}
		}
	}
}
message.onkeydown = function() {
	message.style.maxHeight = "51%";
	message.style.width = "90%";
	message.style.textAlign = "center";
	done.style.display = "inline-block"
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
