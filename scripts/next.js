var input = document.getElementsByTagName("input");
/*var textArea = document.getElementById("message");
var next = 0;
input[0].onkeypress = function nextFunc(e) {
for (var i = 0; i < input.length - 1; i++) {
var x = e.keyCode;
if (x === 9) {
	console.log(input[i]);
	input[i].onkeypress = function() {
		next = next + 1;
		this.style.display = "none";
		input[next].focus();
		input[next].style.opacity = "1";
		input[next].style.textAlign = "right";
	}
	input[i].onkeydown = function() {
		this.style.textAlign = "center"
		this.style.width = "100%";
	}
	document.getElementById("email").onblur = function() {
		this.style.display = "none";
		textArea.focus();
		textArea.style.opacity = "1";
		textArea.style.textAlign = "right";
	}
	textArea.onkeydown = function() {
		textArea.style.height = (textArea.scrollHeight) + "px";
		textArea.style.maxHeight = "51%";
		textArea.style.width = "90%";
		textArea.style.textAlign = "center";
	}
	textArea.onblur = function() {
		document.getElementById("form").style.display = "none";
		document.getElementById("prev").style.display = "block";
		document.getElementById("preview").innerHTML = textArea.value + "<br><br><br>" + input[0].value + "<br>" + input[1].value + " " + input[2].value + "<br>" + input[3].value;
	}
}}}*/
var message = document.getElementById("message");
var next = 0;
for (var i = 0; i < input.length; i++) {
	input[i].onkeydown = function(event) {
		this.style.textAlign = "center";
		this.style.width = "100%"
		var key = event.keyCode;
		if (key === 9) {
			if (next === 3) {
				this.style.display = "none";
				message.style.opacity = "1";
			}
			else {
			next = next + 1;
			this.style.display = "none";
			input[next].style.opacity = "1";
			}
		}
		else if (key === 13) {
			if (next === 3) {
				this.style.display = "none";
				message.focus();
				message.style.opacity = "1"
			}
			else {
			next = next + 1;
			this.style.display = "none";
			input[next].focus();
			input[next].style.opacity = "1";
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
/*document.getElementById("email").onkeydown = function(event) {
	this.style.textAlign = "center";
	this.style.width = "100%";
	var key = event.keyCode;
	if (key === 9) {
		document.getElementById
	}
}*/