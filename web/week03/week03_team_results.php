<?php
    $name       = htmlspecialchars($_POST['name']);
    $email      = htmlspecialchars($_POST['email']);
    $major      = htmlspecialchars($_POST['major']);
    $continents = $_POST['continents'];
    $comments   = htmlspecialchars($_POST['comments']);
?>



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
	    Name: <?php echo $name; ?>
	</div>
    
    <div>
        Email: <?php echo "<a href='mailto:{$email}'>{$email}</a>"; ?>
        
	</div>
    
    <div>
	    Major: <?php echo $major; ?>
	</div>
    
    <div>
	    Comments: <?php echo $comments; ?>
	</div>
    
    <div>
        Continents visited:
        <?
            foreach ($continents as $continent) {
                $continent_clean = htmlspecialchars($continent);
                echo "<li>$continent_clean</li>";
            }
        ?>		

</body>
</html>