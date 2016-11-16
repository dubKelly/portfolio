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
		var elem = this;
		//	Avoid confusion with non-tab users
		if (key === 9 || key === 13) {
			event.preventDefault();
			next++;
			partIndex -= 2;
			part.style.zIndex = partIndex;
			if (next === 4) {
				message.focus();
				var nextElem = message;
			}
			else {
				input[next].focus();
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
		func();
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