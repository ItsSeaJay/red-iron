# Project: Red-Iron
A Database Helper for MySQL and MariaDB written in PHP, using PDO
# Installation
1. Drop the `source` folder into an appropriate space within your project
2. Alter the values in `credentials.php` to fit your database installation
3. Relax
# Usage
At the top of your PHP script, include the `database.php` file, like so:
```php
<?php
require_once 'path/to/database.php';
// ...
```
When the script is run, it will automatically create an instance of the `Database` class, called `$database`.
This will call the appropriate constructor, which will attempt to make a connection using PDO.
To perform operations on the database, such as queries, type:
```php
$database->getPDO();
```
Which will return the current PDO instance. From there, you can access all of its member functions.
