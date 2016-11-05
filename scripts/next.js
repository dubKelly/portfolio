var input = document.getElementsByTagName("input");
var textArea = document.getElementById("message");
var next = 0;
for (var i = 0; i < input.length; i++) {
	input[i].onblur = function() {
		this.style.display = "none";
		next = next + 1;
		input[next].focus();
		input[next].style.opacity = "1";
		input[next].style.textAlign = "right";
	}
	input[i].onkeydown = function() {
		this.style.textAlign = "center";
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
		textArea.style.display = "none";
	}
}