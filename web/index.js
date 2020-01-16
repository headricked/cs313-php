/* index.js */
function hello() {
	var x = document.getElementById("hello");
	var y = document.getElementById("circle");

//   if (x.style.display === "none") {
// //   	x.style.display = "block";
// //   	x.style.background-color = "none";
// 		x.style.background = url('HeadrickDavid.jpg')
//   } else {
//   	x.style.display = "none";
//   }

  if (x.style.visibility === "visible") {
		x.style.visibility = "hidden";
		x.style.background = url('HeadrickDavid.jpg');
  } else {
  	x.style.visibility = "visible";
		y.style.background = "yellowgreen";
  }

}