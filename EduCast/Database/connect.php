<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>

    <?php
      $servername = "localhost:3306";
      $username = "root";
      $password = "ifes.cachoeiro";
      $dbname = "eduCast";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
    ?>

  </body>
</html>
