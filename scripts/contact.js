var input = document.getElementsByTagName("input");
var message = document.getElementById("message");
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
}
message.onkeyup = function() {
	message.style.height = (message.scrollHeight) - 4 + "px";
}
var cLink = document.getElementsByClassName("cLink");
for (var i = 0; i < cLink.length; i++) {
	cLink[i].onclick = function(event) {
		if (next === 4) {
			message.focus();
			event.preventDefault();
		}
		else {
			input[next].focus();
			event.preventDefault();
		}
	}
}