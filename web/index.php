<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>David Headrick - Portfolio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <header>
        <nav>
            <?php include 'header.php';?>
        </nav>
    </header>
    <section>
        <div>
        	<div id="image">
        		<span id="text" onclick="reveal(this)">Hi.</span>
        	</div>
        </div>
        <h1>I'm David Headrick.</h1>
        <p>I'm honing my web application development skills through taking online courses through BYU-Idaho.</p>
        <p>I enjoy being creative and finding ways to use technology to solve challenging problems.</p>
	    <div class="btn-wrapper">
    	    <a href="assignments.html">
        	    <button id="button">View my assignments</button>
            </a>
        </div>
    </section>
    <footer>
        <?php include 'footer.php';?>
    </footer>
    <script src="index.js"></script>
</body>
</html>