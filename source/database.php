<?php
  require_once 'credentials.php';

  class Database
  {
    private $PDO;

    function __construct($host, $dbname, $username, $password)
    {
      $this->connect($host, $dbname, $username, $password);
    }

    private function connect($host, $dbname, $username, $password)
    {
      $header = 'mysql: host=' . $host . ';dbname=' . $dbname;

      try
      {
        $this->PDO = new PDO($header, $username, $password);
      }
      catch (PDOException $exception)
      {
        echo 'Database connection failed: ' . $exception->getMessage();
      }
    }

    public function getPDO()
    {
      return $this->PDO;
    }
  }

  $database = new Database($host, $dbname, $username, $password);
?>
