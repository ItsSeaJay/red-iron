<?php
  // Remember to change this path to be outside of the root directory!
  require_once 'credentials.php';

  class Database
  {
    private $PDO;
    private $credentials = array(
      'host' => null,
      'dbname' => null,
      'username' => null,
      'password' => null
    );
    private $header;

    function __construct(array $credentials)
    {
      if ($this->connect($credentials))
      {
        $this->update_header($credentials);
        $this->update_header($credentials);
      }
    }

    private function connect(array $credentials)
    {
      $this->update_header($credentials);

      try
      {
        $this->PDO = new PDO(
          $this->header,
          $credentials['username'],
          $credentials['password']
        );
        return true;
      }
      catch (PDOException $exception)
      {
        echo 'Database connection failed: ' . $exception->getMessage();
        exit();
      }
    }

    private function disconnect()
    {
      $PDO = null;
    }

    public function prepared_statement($query, array $parameters)
    {
      $query = filter_var($query, FILTER_SANITIZE_STRING);

      try
      {
        $statement = $this->PDO->prepare($query);
        $statement->execute($parameters);
      }
      catch (PDOException $exception)
      {
        echo 'Prepared statement failed: ' . $exception->getMessage();
        exit();
      }

      return $statement;
    }

    private function update_header(array $credentials)
    {
      $this->header = 'mysql:host=' . $credentials['host'] .     ';dbname=' . $credentials['dbname'] . ';';
    }

    private function update_credentials(array $credentials)
    {
      $this->credentials['host'] = $credentials['host'];
      $this->credentials['dbname'] = $credentials['dbname'];
      $this->credentials['username'] = $credentials['username'];
      $this->credentials['password'] = $credentials['password'];
    }
  }

  if (!isset($database))
  {
    $database = new Database($credentials);
  }
?>
