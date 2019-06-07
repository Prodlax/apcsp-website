<!DOCTYPE html>
<html>
<body>

<?php
       // define variables and set to empty values
       $day1 = $day2 = $day3 = $day4 = $day5 = $day6 = $day7 = $day8 = $day9 = $day10 = $day11 = $day12 = $day13 = $day14 = $day15 = $day16 = $day17 = $day18 = $day19 = $day20 = $day21 = $day22 = $day23 = $day24 = $day25 = $day26 = $day27 = $day28 = $day29 = $day30 = $output = $retc "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $day1 = test_input($_POST["arg1"]);
         $day2 = test_input($_POST["arg2"]);
         exec("/usr/lib/cgi-bin/pi/argtest2 " . $arg1 . " " . $arg2, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Arg1: <input type="text" name="arg1"><br>
      Arg2: <input type="text" name="arg2"><br>
      <br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
        echo "<h2>Your Input:</h2>";
         echo $arg1;
         echo "<br>";
         echo $arg2;
         echo "<br>";
       
         echo "<h2>Program Output (an array):</h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }
       
         echo "<h2>Program Return Code:</h2>";
         echo $retc;
       }
    ?>
</body>
</html>
