/* index.js */
function hello() {
	var text = document.getElementById("text");
	var circle = document.getElementById("image");

//   if (x.style.display === "none") {
// //   	x.style.display = "block";
// //   	x.style.background-color = "none";
// 		x.style.background = url('HeadrickDavid.jpg')
//   } else {
//   	x.style.display = "none";
//   }

  if (text.style.visibility === "visible") {
		text.style.visibility = "hidden";
  } else {
  	text.style.visibility = "visible";
  }

//   if (circle.style.backgroundImage === "none") {
// 		circle.style.backgroundImage = "initial";
//   } else {
//   	circle.style.backgroundImage = "none";
//   }

}