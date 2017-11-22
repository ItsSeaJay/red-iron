<?php
  require_once 'database.php';

  $query = 'SELECT * FROM test';
  $statement = $database->getPDO()->prepare($query) ?? 0;
  $statement->execute();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Red Iron Test</title>
  </head>
  <body>
    <?php
      while ($row = $statement->fetchObject())
      {
        print_r($row);
      }
    ?>
    <p>If you can see data in the above field, then Red Iron is working correctly!</p>
    <p>If not, check that your server has the latest version of PHP installed, and that the data in your configuration file is valid.</p>
  </body>
</html>
