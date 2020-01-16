/* index.js */
function hello() {
	var x = document.getElementById("hello");

//   if (x.style.display === "none") {
// //   	x.style.display = "block";
// //   	x.style.background-color = "none";
// 		x.style.background = url('HeadrickDavid.jpg')
//   } else {
//   	x.style.display = "none";
//   }

  if (x.style.visibility === "visible") {
		x.style.background = url('HeadrickDavid.jpg');
		x.style.visibility = "hidden";
  } else {
  	x.style.display = "visible";
  }

}