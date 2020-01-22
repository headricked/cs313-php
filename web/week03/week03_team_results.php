<?php
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $major    = $_POST['major'];
    $comments = $_POST['comments'];

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
        <?php
            echo "<ul>";
            for ($i = 0; $i < 7; $i++) {
                if (isset($_POST["continent".$i])) {
                    echo "<li>" . $_POST["continent" . $i] . "</li>";
                }
            };
            echo "</ul>";
        ?>
    </div>

</body>
</html>