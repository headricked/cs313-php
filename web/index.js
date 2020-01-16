/* index.js */
function hello() {
	var x = document.getElementById("hello");

  if (x.style.display === "none") {
  	x.style.display = "block";
  	x.style.background-color = "none";
  } else {
  	x.style.display = "none";
  }
}