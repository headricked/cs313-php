/* index.js */
function hello() {
	var text = document.getElementById("text");
	var image = document.getElementById("image");

//   if (x.style.display === "none") {
// //   	x.style.display = "block";
// //   	x.style.background-color = "none";
// 		x.style.background = url('HeadrickDavid.jpg')
//   } else {
//   	x.style.display = "none";
//   }

//   if (text.style.visibility === "hidden") {
// 		text.style.visibility = "visible";
//   } else {
//   	text.style.visibility = "hidden";
//   }

  if (text.style.opacity === "0") {
		text.style.opacity = "1";
  } else {
  	text.style.opacity = "0";
  }

//   if (circle.style.backgroundImage === "none") {
// 		circle.style.backgroundImage = "initial";
//   } else {
//   	circle.style.backgroundImage = "none";
//   }

}