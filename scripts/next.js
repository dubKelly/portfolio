var input = document.getElementsByTagName("input");		// 	Array of text inputs
var message = document.getElementById("message");
var part = document.getElementById("part");						// 	Partition between current and next input
var partIndex = 8;																		//! Partition z-index
var next = 0;																					//*	Loop counter
for (var i = 0; i < input.length; i++) {
	input[i].onkeydown = function(event) {
		this.style.textAlign = "center";
		this.style.width = "100%"
		var key = event.keyCode;
		if (key === 9) {
			if (next === 3) {
				this.style.display = "none";
				message.style.opacity = "1";
				part.style.display = "none";
			}
			else {
				partIndex = partIndex - 2;										//!
				next = next + 1;															//*
				this.style.display = "none";
				input[next].style.opacity = "1";
				part.style.zIndex = partIndex;
			}
		}
		else if (key === 13) {														// 	Avoids confusion with non-tab users
			if (next === 3) {
				this.onkeyup = function() {										//	Firing on keyup prevents return key from being pressed inside textarea
					this.style.display = "none";
					message.focus();
					message.style.opacity = "1"
					part.style.display = "none";
				}
			}
			else {
				partIndex = partIndex - 2;										//!
				next = next + 1;															//*
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
message.onkeyup = function() {												// 	Firing on keyup allows textarea to resize before the next character is typed
	message.style.height = (message.scrollHeight) - 4 + "px";
}