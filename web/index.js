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

  if (text.style.visibility === "hidden") {
		text.style.visibility = "visible";
		circle.style.backgroundColor = "initial";
		circle.style.backgroundImage = "none";
  } else {
  	text.style.visibility = "hidden";
		circle.style.backgroundColor = "none";
		circle.style.backgroundImage = "initial";
  }

}