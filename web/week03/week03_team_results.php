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

<br/>For each:<br/>
        <?
            foreach ($continents as $continent) {
                $continent_clean = htmlspecialchars($continent);
                echo "<li><p>$continent_clean</p></li>";
            }
        ?>		

<br/>For:<br/>
        <?php
            echo "<ul>";
            for ($i = 0; $i < 7; $i++) {
                if (isset($_POST["places".$i])) {
                    echo "<li>" . $_POST["continent" . $i] . "</li>";
                }
            };
            echo "</ul>";
        ?>
    </div>

</body>
</html>