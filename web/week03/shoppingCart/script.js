// document.getElementById('samsung').onclick = function() {
//     $.post("2-cart-add.php", { name: "samsung"})
// };

document.getElementById('samsung').onclick = function() {
    // Vanilla
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function (data) {
    // code
    };
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.open('POST', '2-cart-add.php');
    httpRequest.send('name=' + encodeURIComponent(name));
};



// // jQuery
// $.post('//example.com', { username: username }, function (data) {
//   // code
// })

// // Vanilla
// var httpRequest = new XMLHttpRequest();
// httpRequest.onreadystatechange = function (data) {
//   // code
// };
// httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
// httpRequest.open('POST', '2-cart-add.php');
// httpRequest.send('name=' + encodeURIComponent(name));


// document.getElementById('samsung').onclick = function() {
//     $.post("2-cart-add.php", { name: "samsung", price: 700 })
// };

// document.getElementById('samsung').onclick = function() {
//     $.post("2-cart-add.php", { name: "apple", price: 600 })
// };

// document.getElementById('samsung').onclick = function() {
//     $.post("2-cart-add.php", { name: "google", price: 500 })
// };

// document.getElementById('samsung').onclick = function() {
//     $.post("2-cart-add.php", { name: "motorola", price: 400 })
// };

