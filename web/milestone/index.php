<?php
  require "db_connect.php";
  $db = get_db();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Milestone Tracker</title>
    <link rel="stylesheet" href="milestone.css">
  </head>

  <body>

  <h1>Milestone Tracker</h1> 
  <hr>

  <?php

    // $statement = $db->prepare("SELECT id, book, chapter, verse, content FROM scriptures");
    // $statement->execute();

    // Query the milestone database and assign to variable
    $statement_milestone = $db->prepare("
        WITH theEvent AS (
          SELECT * FROM milestone
          INNER JOIN person
          ON milestone.person_id = person.person_id)
     
        SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
          AS person_age, milestone_location, milestone_notes
          FROM theEvent;
      ");
    $statement_milestone->execute();

    // Query the person database and assign to variable
    // $statement_person = $db->prepare("SELECT first_name, middle_name, last_name FROM person;");
    $statement_person = $db->prepare("SELECT person_id, first_name, middle_name, last_name FROM person;");
    $statement_person->execute();

    while ($row_name = $statement_person->fetch(PDO::FETCH_ASSOC)) {
      $p_person_id   = $row_name['person_id'];
      $p_first_name  = $row_name['first_name'];
      $p_middle_name = $row_name['middle_name'];
      $p_last_name   = $row_name['last_name'];

      $full_name = $p_first_name . " " . $p_middle_name . " " . $p_last_name;

      // echo "<h1>$full_name</h1>";
      echo "<div>
              <a href='details.php?person_id=$p_person_id'>$full_name</a>
              <button onclick='delete()'>DELETE</button>
            </div>";
      echo "<hr>";
    }


    
    // while ($row_milestone = $statement_milestone->fetch(PDO::FETCH_ASSOC)) {
    //   $m_name     = $row_milestone['milestone_name'];
    //   $m_date     = $row_milestone['milestone_date'];
    //   $m_age      = $row_milestone['person_age'];
    //   $m_location = $row_milestone['milestone_location'];
    //   $m_notes    = $row_milestone['milestone_notes'];

    //   // echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
    //   echo "<p>$m_name : $m_date : $m_age : $m_location : $m_notes<p>";      
    //   echo "<hr>";
    // }


  ?>

  <section>
  <fieldset>
      <legend>Add a person</legend>
        <form method="POST" action="add_person.php">
          Enter a name:<br/>
          <label for="birth_first_name">First name:</label>
            <input name="birth_first_name"  placeholder="fist name"   type="text"><br/>
          <label for="birth_middle_name">Middle name:</label>
            <input name="birth_middle_name" placeholder="middle name" type="text"><br/>
          <label for="birth_last_name">Last name:</label>
            <input name="birth_last_name"   placeholder="last name"   type="text"><br/>
          <hr/>
          Enter a birthdate:<br/>
          <label for="birth_month">Month:</label>
            <select name="birth_month" id="birth_month">
              <option value="01">January</option>
              <option value="02">February</option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>

          <br/>

          <label for="birth_day">Day:</label>
            <select name="birth_day" id="birth_day">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>

          <br/>

          <label for="birth_year">Year:</label>
            <select name="birth_year" id="birth_year">
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
              <option value="2016">2016</option>
              <option value="2015">2015</option>
              <option value="2014">2014</option>
              <option value="2013">2013</option>
              <option value="2012">2012</option>
              <option value="2011">2011</option>
              <option value="2010">2010</option>
              <option value="2009">2009</option>
              <option value="2008">2008</option>
              <option value="2007">2007</option>
              <option value="2006">2006</option>
              <option value="2005">2005</option>
              <option value="2004">2004</option>
              <option value="2003">2003</option>
              <option value="2002">2002</option>
              <option value="2001">2001</option>
              <option value="2000">2000</option>
              <option value="1999">1999</option>
              <option value="1998">1998</option>
              <option value="1997">1997</option>
              <option value="1996">1996</option>
              <option value="1995">1995</option>
              <option value="1994">1994</option>
              <option value="1993">1993</option>
              <option value="1992">1992</option>
              <option value="1991">1991</option>
              <option value="1990">1990</option>
              <option value="1989">1989</option>
              <option value="1988">1988</option>
              <option value="1987">1987</option>
              <option value="1986">1986</option>
              <option value="1985">1985</option>
              <option value="1984">1984</option>
              <option value="1983">1983</option>
              <option value="1982">1982</option>
              <option value="1981">1981</option>
              <option value="1980">1980</option>
              <option value="1979">1979</option>
              <option value="1978">1978</option>
              <option value="1977">1977</option>
              <option value="1976">1976</option>
              <option value="1975">1975</option>
              <option value="1974">1974</option>
              <option value="1973">1973</option>
              <option value="1972">1972</option>
              <option value="1971">1971</option>
              <option value="1970">1970</option>
              <option value="1969">1969</option>
              <option value="1968">1968</option>
              <option value="1967">1967</option>
              <option value="1966">1966</option>
              <option value="1965">1965</option>
              <option value="1964">1964</option>
              <option value="1963">1963</option>
              <option value="1962">1962</option>
              <option value="1961">1961</option>
              <option value="1960">1960</option>
              <option value="1959">1959</option>
              <option value="1958">1958</option>
              <option value="1957">1957</option>
              <option value="1956">1956</option>
              <option value="1955">1955</option>
              <option value="1954">1954</option>
              <option value="1953">1953</option>
              <option value="1952">1952</option>
              <option value="1951">1951</option>
              <option value="1950">1950</option>
              <option value="1949">1949</option>
              <option value="1948">1948</option>
              <option value="1947">1947</option>
              <option value="1946">1946</option>
              <option value="1945">1945</option>
              <option value="1944">1944</option>
              <option value="1943">1943</option>
              <option value="1942">1942</option>
              <option value="1941">1941</option>
              <option value="1940">1940</option>
              <option value="1939">1939</option>
              <option value="1938">1938</option>
              <option value="1937">1937</option>
              <option value="1936">1936</option>
              <option value="1935">1935</option>
              <option value="1934">1934</option>
              <option value="1933">1933</option>
              <option value="1932">1932</option>
              <option value="1931">1931</option>
              <option value="1930">1930</option>
              <option value="1929">1929</option>
              <option value="1928">1928</option>
              <option value="1927">1927</option>
              <option value="1926">1926</option>
              <option value="1925">1925</option>
              <option value="1924">1924</option>
              <option value="1923">1923</option>
              <option value="1922">1922</option>
              <option value="1921">1921</option>
              <option value="1920">1920</option>
            </select>

          <hr>

          <label for="birth_gender">Choose a gender:</label><br/>
            <input name="birth_gender" type="radio" value="male"> Male<br>
            <input name="birth_gender" type="radio" value="female"> Female<br>

          <hr>

          <label for="birth_location">Enter birth location:</label><br/>
            <textarea name="birth_location" placeholder="location" rows="3"></textarea>
          <hr/>

          <label for="birth_notes">Enter birth notes:</label><br/>
            <textarea name="birth_notes" placeholder="notes" rows="10"></textarea>
          <hr/>

            <input type="submit" value="ADD">
        </form>
  </fieldset>
</section>


  </div>

</body>
</html>