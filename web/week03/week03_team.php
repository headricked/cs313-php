<?php
    $major = array(
        "cs"  =>"Computer Science",
        "wdd" =>"Web Design and Development",
        "cit" =>"Computer Information Technology",
        "ce"  =>"Computer Engineering"
    );

    // foreach($major as $code => $majorName) {
    //     echo "<li><input type='radio' id='major' name='major' value='$majorName'> $majorName</li>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 03 | Tell me about yourself</title>
</head>
<body>
    <form action="week03_team_results.php" method="post">

        <fieldset>
            <legend>So, tell me about yourself...</legend>
            <ul>
                <li>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="name">
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="email">
                </li>
                <li>
                    <label for="major">Major:</label>
                        <ul>
                            <!-- <li>
                                <input type="radio" id="major" name="major" value="Computer Science"> Computer Science<br/>
                            </li>
                            <li>
                                <input type="radio" id="major" name="major" value="Web Design and Development"> Web Design and Development<br/>
                            </li>
                            <li>
                                <input type="radio" id="major" name="major" value="Computer Information Technology"> Computer Information Technology<br/>
                            </li>
                            <li>
                                <input type="radio" id="major" name="major" value="Computer Engineering"> Computer Engineering
                            </li> -->
                            foreach($major as $code => $majorName) {
                                echo "<li><input type='radio' id='major' name='major' value='$majorName'> $majorName</li>";
                            }
                        </ul>
                </li>
                <li>
                    <label for="comments">Comments:</label>
                    <ul>
                        <li>
                            <textarea name="comments" id="comments" name="comments" cols="30" rows="10" placeholder="comments"></textarea>
                        </li>
                    </ul>
                </li>
                <li>
                    <label for="continents">You've visited:</label>
                    <ul>
                        <li>
                            <input type="checkbox" name="continents[]" id="North America" value="North America"> North America
                        </li>
                        <li>
                            <input type="checkbox" name="continents[]" id="South America" value="South America"> South America
                        </li>
                        <li>
                            <input type="checkbox" name="continents[]" id="Europe" value="Europe"> Europe
                        </li>
                        <li>
                            <input type="checkbox" name="continents[]" id="Asia" value="Asia"> Asia
                        </li>
                        <li>
                            <input type="checkbox" name="continents[]" id="Australia" value="Australia"> Australia
                        </li>
                        <li>
                            <input type="checkbox" name="continents[]" id="Africa" value="Africa"> Africa
                        </li>
                        <li>
                            <input type="checkbox" name="continents[]" id="Antarctica" value="Antarctica"> Antarctica
                        </li>
                    </ul>
                </li>
            </ul>
            <input type="submit" value="Submit"><input type="reset" value="Reset">
        </fieldset>        
    </form>
    
</body>
</html>