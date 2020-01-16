/* index.js */
function hello() {
	var text = document.getElementById("hello");
	var circle = document.getElementById("circle");

//   if (x.style.display === "none") {
// //   	x.style.display = "block";
// //   	x.style.background-color = "none";
// 		x.style.background = url('HeadrickDavid.jpg')
//   } else {
//   	x.style.display = "none";
//   }

  if (text.style.visibility === "visible") {
		text.style.visibility = "hidden";
		circle.style.backgroundColor = "transparent";
// 		circle.style.background = "url('HeadrickDavid'.jpg)";
  } else {
  	text.style.visibility = "visible";
		circle.style.backgroundColor = "yellowgreen";
// 		circle.style.visibility = "visible";
  }

}