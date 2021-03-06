<?php
  require_once 'database.php';

  // Run some queries to check if the system is working properly
  $query = 'CREATE DATABASE IF NOT EXISTS red_iron;';
  $database->prepared_statement($query, array());

  $query = 'CREATE TABLE IF NOT EXISTS `red_iron`.`test`' .
  ' (`id` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
  $database->prepared_statement($query, array());

  $query = 'INSERT INTO `test` (`id`) VALUES (42);';
  $database->prepared_statement($query, array());

  $query = 'SELECT * FROM test;';
  $statement = $database->prepared_statement($query, array());
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Red Iron Test</title>

    <link rel="stylesheet" href="test.css">
  </head>
  <body>
    <div class="container">
      <?php
        // Iterate over all records in the active table
        while ($row = $statement->fetchObject())
        {
          echo '<div id="success">';
          echo $row->id;
          echo '</div>';
        }

        // Prevent multiple records from being added when the script is re-run
        $query = 'DROP TABLE test;';
        $database->prepared_statement($query, array());
      ?>
      <p>
        If you can see the meaning of life, the universe, and everything in the above field, then Red Iron is working correctly! If not, something's probably gone wrong. Check that your server has the latest version of PHP installed, and that the data in your <code>credentials.php</code> file is valid.
      </p>
      <p>
        If you're a regular user and don't know what this means, don't panic! You haven't broken anything. Just take a few steps back and everything should sort itself out.
      </p>
    </div>
  </body>
</html>
