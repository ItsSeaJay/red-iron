<?php
  class Controller
  {
    private $model;

    function __construct($model)
    {
      $this->model = $model;
    }
  }
?>
