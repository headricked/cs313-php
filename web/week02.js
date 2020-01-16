function postAlert() {
    alert("Clicked!");
}

var fontColor;

function changeColor(){
    fontColor = document.getElementById("userColor").value
    document.getElementById("div1").style.background = fontColor;
}