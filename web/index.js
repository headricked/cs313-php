/* index.js */
function reveal() {
	var text = document.getElementById("text");

  if (text.style.opacity === "0") {
		text.style.opacity = "1";
  } else {
  	text.style.opacity = "0";
  }

}