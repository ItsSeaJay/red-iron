<?php
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
        updateCredentials();
        updateHeader($credentials);
      }
    }

    private function connect(array $credentials)
    {
      updateHeader($credentials);

      try
      {
        $this->PDO = new PDO($header, $username, $password);
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

    public function getPDO()
    {
      return $this->PDO;
    }

    private function updateHeader(array $credentials)
    {
      $this->header = filter_var(
        'mysql:host=' . $credentials['host'] .
        'dbname=' . $credentials['dbname'] . ';',
        FILTER_SANITIZE_STRING
      );
    }

    private function updateCredentials(array $credentials)
    {
      $this->credentials['host'] = $credentials['host'];
      $this->credentials['dbname'] = $credentials['dbname'];
      $this->credentials['username'] = $credentials['username'];
      $this->credentials['password'] = $credentials['password'];
    }
  }

  $database = new Database($credentials);
?>
