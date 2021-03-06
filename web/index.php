<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>David Headrick - Portfolio</title>
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
        <p>I'm honing my web application development skills through learning and practice.</p>
        <p>I enjoy being creative and finding ways to use technology to solve challenging problems.</p>
	    <div class="btn-wrapper">
    	    <a class="a-btn" href="assignments.php">
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