/* index.js */
function hello() {
	var x = document.getElementById("hello");

  if (x.style.display === "hidden") {
//   	x.style.display = "block";
//   	x.style.background-color = "none";
		x.style.background = url('HeadrickDavid.jpg');
  } else {
  	x.style.display = "hidden";
  }
}