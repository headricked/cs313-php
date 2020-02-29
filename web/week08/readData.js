function getData() {
    let x = document.getElementById("aboutForm");
    let txt = "";
    let i;
    for (i = 0; i < x.length; i++) {
      txt = txt + x.elements[i].value + "<br>";
    }
    document.getElementById("displayMe").innerHTML = txt;
  }
  