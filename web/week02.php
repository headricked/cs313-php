<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 02</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="week02.css">
    <script src="week02.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     $("#button2").click(function(){
        //         $("#div3").css("background-color", "red");
        //     });
        // });

        $(document).ready(function(){
            $("#button2").click(function(){
                $("#div3").fadeToggle("slow", "swing");
            }); 
        });
    </script>
</head>
<body>
    <header>
        <nav>
            <?php include 'header.php';?>
        </nav>
    </header>
    <div class="container">
        <h1>Week 02</h1>
        <div class="row">
            <div id="div1" class="col-sm-3">DIV1</div>
            <div id="div2" class="col-sm-3">DIV2</div>
            <div id="div3" class="col-sm-3">DIV3</div>
        </div>
        <div class="row">
            <div>
                <button id="button1" onclick="changeColor()" class="btn btn-primary">Change Color of DIV1</button>
                <input id="userColor" type="text" class="form-control" placeholder="Type in a color, then press the button">
            </div>
            <div>
                <button id="button2" class="btn btn-success">Click Me</button>
            </div>
            <div>
                <button id="button3" onclick="postAlert()" class="btn btn-warning">Click Me</button>
            </div>
            <div>
                <label for="txtColor">Color:</label> <input type="text" id="txtColor" placeholder="#cccccc">
            </div>
        </div>
    </div>
    <footer>
        <?php include 'footer.php';?>
    </footer>
</body>
</html>