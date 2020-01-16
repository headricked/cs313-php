/* index.js */
function hello() {
	var x = document.getElementById("hello");

  if (x.style.display === "block") {
  	x.style.display = "none";
  } else {
  	x.style.display = "block";
  }
}