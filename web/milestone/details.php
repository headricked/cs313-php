<?php

    if (!isset($_GET['person_id'])) {
        die('Error: person_id not specified.');
    }
    $person_id = htmlspecialchars($_GET['person_id']);

    require "db_connect.php";
    $db = get_db();
  

    // Query the milestone database and assign to variable
    $statement_milestone = $db->prepare("
        WITH theEvent AS (
            SELECT * FROM milestone
            INNER JOIN person
            ON milestone.person_id = person.person_id
            WHERE person.person_id = :person_id)
       
       SELECT milestone_id, milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
            AS person_age, milestone_location, milestone_notes
            FROM theEvent
            ORDER BY milestone_date DESC;
    ");
    // bind person id values together
    $statement_milestone->bindValue(':person_id', $person_id, PDO::PARAM_INT);
    $statement_milestone->execute();

    // Query the person database and assign to variable
    $statement_person = $db->prepare("SELECT first_name, middle_name, last_name, is_male FROM person WHERE person_id = :person_id;");
    // bind person id values together
    $statement_person->bindValue(':person_id', $person_id, PDO::PARAM_INT);
    $statement_person->execute();

    // fetch then assemble full name
    while ($row_name = $statement_person->fetch(PDO::FETCH_ASSOC)) {
      $p_first_name  = $row_name['first_name'];
      $p_middle_name = $row_name['middle_name'];
      $p_last_name   = $row_name['last_name'];
      $p_is_male     = $row_name['is_male'];
      $full_name     = $p_first_name . " " . $p_middle_name . " " . $p_last_name;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milestones for <?php echo $full_name ?></title>
    <link rel="stylesheet" href="milestone.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>  </head>
</head>
<body>
  <div>
    <h1><?php echo $full_name ?></h1>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_addMilestone">Add Milestone</button>
  </div>

  <?php
      echo "<table>
            <thead>
              <tr>
                <th>Milestone</th>
                <th>Date</th>
                <th>Age</th>
                <th>Location</th>
                <th>Notes</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>";

      while ($row_milestone = $statement_milestone->fetch(PDO::FETCH_ASSOC)) {
        $m_id       = $row_milestone['milestone_id'];
        $m_name     = $row_milestone['milestone_name'];
        $m_date     = $row_milestone['milestone_date'];
        $m_age      = $row_milestone['person_age'];
        $m_location = $row_milestone['milestone_location'];
        $m_notes    = $row_milestone['milestone_notes'];

        // echo "<p><strong><a href='week05_team_scripture_details.php?scripture_id=$id'>$book $chapter:$verse</a></strong><p>";
        echo "<tr>
                <td>$m_name</td>
                <td>$m_date</td>
                <td>$m_age</td>
                <td>$m_location</td>
                <td>$m_notes</td>
                <td>
                  <a
                    data-toggle='modal' 
                    href='#modal_updateMilestone' 
                    data-pId='$person_id' 
                    data-mId='$m_id' 
                    data-mName='$m_name' 
                    data-mDate='$m_date' 
                    data-mAge='$m_age' 
                    data-mLocation='$m_location' 
                    data-mNotes='$m_notes' 
                  >Update</a>
                </td>
                <td>
                  <a href='delete_milestone.php?delete=$m_id&person=$person_id'>Delete</a>
                </td>
              </tr>";
      }

      echo "</tbody>
          </table>";      
    ?>
  <br/><br/>

  <!-- MODAL ADD MILESTONE -->
  <div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="modal_addMilestone">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add a milestone</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <section>
              <form method="POST" action="add_milestone.php">
                <label for="milestone_name">Milestone name:</label>
                  <input name="milestone_name" placeholder="milestone name" type="text"><br/>
                <hr/>
                Milestone date:<br/>
                <label for="milestone_month">Month:</label>
                  <select name="milestone_month" id="milestone_month">
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

                <label for="milestone_day">Day:</label>
                  <select name="milestone_day" id="milestone_day">
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

                <label for="milestone_year">Year:</label>
                  <select name="milestone_year" id="milestone_year">
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
                    <option value="1919">1919</option>
                    <option value="1918">1918</option>
                    <option value="1917">1917</option>
                    <option value="1916">1916</option>
                    <option value="1915">1915</option>
                    <option value="1914">1914</option>
                    <option value="1913">1913</option>
                    <option value="1912">1912</option>
                    <option value="1911">1911</option>
                    <option value="1910">1910</option>
                    <option value="1909">1909</option>
                    <option value="1908">1908</option>
                    <option value="1907">1907</option>
                    <option value="1906">1906</option>
                    <option value="1905">1905</option>
                    <option value="1904">1904</option>
                    <option value="1903">1903</option>
                    <option value="1902">1902</option>
                    <option value="1901">1901</option>
                    <option value="1900">1900</option>
                    <option value="1899">1899</option>
                    <option value="1898">1898</option>
                    <option value="1897">1897</option>
                    <option value="1896">1896</option>
                    <option value="1895">1895</option>
                    <option value="1894">1894</option>
                    <option value="1893">1893</option>
                    <option value="1892">1892</option>
                    <option value="1891">1891</option>
                    <option value="1890">1890</option>
                    <option value="1889">1889</option>
                    <option value="1888">1888</option>
                    <option value="1887">1887</option>
                    <option value="1886">1886</option>
                    <option value="1885">1885</option>
                    <option value="1884">1884</option>
                    <option value="1883">1883</option>
                    <option value="1882">1882</option>
                    <option value="1881">1881</option>
                    <option value="1880">1880</option>
                    <option value="1879">1879</option>
                    <option value="1878">1878</option>
                    <option value="1877">1877</option>
                    <option value="1876">1876</option>
                    <option value="1875">1875</option>
                    <option value="1874">1874</option>
                    <option value="1873">1873</option>
                    <option value="1872">1872</option>
                    <option value="1871">1871</option>
                    <option value="1870">1870</option>
                    <option value="1869">1869</option>
                    <option value="1868">1868</option>
                    <option value="1867">1867</option>
                    <option value="1866">1866</option>
                    <option value="1865">1865</option>
                    <option value="1864">1864</option>
                    <option value="1863">1863</option>
                    <option value="1862">1862</option>
                    <option value="1861">1861</option>
                    <option value="1860">1860</option>
                    <option value="1859">1859</option>
                    <option value="1858">1858</option>
                    <option value="1857">1857</option>
                    <option value="1856">1856</option>
                    <option value="1855">1855</option>
                    <option value="1854">1854</option>
                    <option value="1853">1853</option>
                    <option value="1852">1852</option>
                    <option value="1851">1851</option>
                    <option value="1850">1850</option>
                    <option value="1849">1849</option>
                    <option value="1848">1848</option>
                    <option value="1847">1847</option>
                    <option value="1846">1846</option>
                    <option value="1845">1845</option>
                    <option value="1844">1844</option>
                    <option value="1843">1843</option>
                    <option value="1842">1842</option>
                    <option value="1841">1841</option>
                    <option value="1840">1840</option>
                    <option value="1839">1839</option>
                    <option value="1838">1838</option>
                    <option value="1837">1837</option>
                    <option value="1836">1836</option>
                    <option value="1835">1835</option>
                    <option value="1834">1834</option>
                    <option value="1833">1833</option>
                    <option value="1832">1832</option>
                    <option value="1831">1831</option>
                    <option value="1830">1830</option>
                    <option value="1829">1829</option>
                    <option value="1828">1828</option>
                    <option value="1827">1827</option>
                    <option value="1826">1826</option>
                    <option value="1825">1825</option>
                    <option value="1824">1824</option>
                    <option value="1823">1823</option>
                    <option value="1822">1822</option>
                    <option value="1821">1821</option>
                    <option value="1820">1820</option>
                    <option value="1819">1819</option>
                    <option value="1818">1818</option>
                    <option value="1817">1817</option>
                    <option value="1816">1816</option>
                    <option value="1815">1815</option>
                    <option value="1814">1814</option>
                    <option value="1813">1813</option>
                    <option value="1812">1812</option>
                    <option value="1811">1811</option>
                    <option value="1810">1810</option>
                    <option value="1809">1809</option>
                    <option value="1808">1808</option>
                    <option value="1807">1807</option>
                    <option value="1806">1806</option>
                    <option value="1805">1805</option>
                    <option value="1804">1804</option>
                    <option value="1803">1803</option>
                    <option value="1802">1802</option>
                    <option value="1801">1801</option>
                    <option value="1800">1800</option>
                  </select>

                <hr>

                <label for="milestone_location">Enter milestone location:</label><br/>
                  <textarea name="milestone_location" placeholder="location" rows="3"></textarea>
                <hr/>

                <label for="milestone_notes">Enter milestone notes:</label><br/>
                  <textarea name="milestone_notes" placeholder="notes" rows="10"></textarea>

                <input type="hidden" name="person_id" value="<?php echo $person_id ?>">

                <!-- Modal footer -->
                <div class="modal-footer">
                  <input type="submit" class="btn btn-secondary" value="Add">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </section>

          </div>        
        </div>
      </div>
    </div>
    
  </div>

  <!-- MODAL EDIT MILESTONE -->
  <div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="modal_updateMilestone">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Milestone</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <section>
              <form method="POST" action="update_milestone.php?update=<?php echo $m_id ?>&person=<?php echo $person_id ?>">

                <label for="milestone_name">Milestone:</label>
                  <input name="milestone_name" id="mName" type="text"><br/>

                <!-- <label for="milestone_date">Date:</label>
                  <input name="milestone_date" id="mDate" type="text"><br/>

                <label for="milestone_age">Age:</label>
                  <input name="milestone_age" id="mAge" type="text"><br/>

                <label for="milestone_location">Location:</label>
                  <input name="milestone_location" id="mLocation" type="text"><br/>

                <label for="milestone_notes">Notes:</label>
                  <input name="milestone_notes" id="mNotes" type="text"><br/> -->


                <input type="hidden" name="person_id" value="<?php echo $person_id ?>">

                <!-- Modal footer -->
                <div class="modal-footer">
                  <input type="submit" class="btn btn-secondary" value="Update">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </section>

          </div>        
        </div>
      </div>
    </div>
    
  </div>



  <!-- MODAL EDIT PERSON -->
  <div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="modal_updatePerson">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Person</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <section>
              <form method="POST" action="update_person.php?update=<?php echo $person_id?>">
                <label for="birth_first_name">First name:</label>
                  <input name="birth_first_name"  value="<?php echo $p_first_name ?>"   type="text"><br/>
                <label for="birth_middle_name">Middle name:</label>
                  <input name="birth_middle_name" value="<?php echo $p_middle_name ?>" type="text"><br/>
                <label for="birth_last_name">Last name:</label>
                  <input name="birth_last_name"   value="<?php echo $p_last_name ?>"   type="text"><br/>
    
                <hr/>

                <label for="birth_gender">Gender:</label><br/>

                  <input name="birth_gender" type="radio" value="male" <?php if ($p_is_male == true){echo ' checked'; } ?>> Male<br>
                  <input name="birth_gender" type="radio" value="female" <?php if ($p_is_male == false){echo ' checked'; } ?>> Female<br>

                <hr>

                <input type="hidden" name="person_id" value="<?php echo $person_id ?>">

                <!-- Modal footer -->
                <div class="modal-footer">
                  <input type="submit" class="btn btn-secondary" value="Update">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </section>

          </div>        
        </div>
      </div>
    </div>
    
  </div>



  <br/><br/>

  <?php
    echo "<div class='button'>
            <a href='index.php'>Return to List</a>
            <a href='delete_person.php?delete=$person_id'>Delete Person</a>
          </div>"
  ?>

  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal_updatePerson'>Update Person</button>



<!-- Use JSON.stringify() to convert the JavaScript object into JSON -->
<!-- Get data as JSON from a PHP file on the server -->

  <h2>JSON data from database table 'milestone':</h2>
  <p id="demo"></p>

  <script>
  
    obj = { "table":"milestone", "limit":1 };

    dbParam = JSON.stringify(obj);

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        
        for (x in myObj) {
          txt += myObj[x].name + "<br>";
        }

        document.getElementById("demo").innerHTML = txt;
      }
    };

    xmlhttp.open("POST", "json_demo_db_post.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xmlhttp.send("x=" + dbParam);
    xmlhttp.send(dbParam);
    
  </script>



  <script src="modalHelper.js"></script>

</body>
</html>