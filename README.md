# Project: Red Iron
A Database Helper for MySQL and MariaDB written in PHP with PDO


# Setup
## Required
1. Drop the `red-iron` folder into an appropriate space within your project
2. Alter the values in `credentials.php` to fit your database installation
3. Run `test.php` to verify your setup
## Additional
The following steps are not required to make Red Iron work, but may increase the security of your installation:
- Move the `credentials.php` file outside of the root directory, and alter `database.php` to reflect this change
- Delete the `test.php` file after a successful install


# Usage
At the top of your PHP script, include the `database.php` file, like so:
```php
<?php
  require_once 'path/to/database.php';
  // ...
```
When the script is run, it will automatically create an instance of the `Database` class, called `$database`.
This will call the appropriate constructor, which will attempt to make a connection using PDO. If the connection is successful, you can start interacting with that particular database.


For security reasons, Red Iron only deals with prepared statements; not raw queries. It has a function for this, appropriately called `prepared_statement()`. Here's an example:
```php
  $query = "SELECT * FROM test WHERE id = ?";
  $statement = $database->prepared_statement($query, array(42));
```
This will return the results statement of the query `$query`. You can then fetch the data from there using `$statement->fetchObject()` and so-on, as you might with raw PDO.


# License
Project: Red Iron is released under the permissive MIT License to ensure that as many people as possible are able to use it in their projects. See `LICENSE` for more information.
