<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
	    Name: <?php echo $_POST["name"]; ?>
	</div>
    
    <div>
        Email: <?php echo "<a href='mailto:{$_POST['email']}'>" . $_POST['email'] . "</a>"; ?>
        
	</div>
    
    <div>
	    Major: <?php echo $_POST["major"]; ?>
	</div>
    
    <div>
	    Comments: <?php echo $_POST["comments"]; ?>
	</div>
    
</body>
</html>