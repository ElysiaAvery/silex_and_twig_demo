<?php
  class Astronaut{
    private $name;
    private $age;

    function __construct($name, $age)
    {
      $this->name = $name;
      $this->age = $age;
    }

    function setName($new_name)
    {
      $this->name = $new_name;
    }

    function setAge($new_age)
    {
      $this->age = $new_age;
    }

    function getName()
    {
      return $this->name;
    }

    function getAge()
    {
      return $this->age;
    }

    function save()
    {
      array_push($_SESSION['list_of_astronauts'], $this);
    }

    static function getAll()
    {
      return $_SESSION['list_of_astronauts'];
    }

    static function deleteAll()
    {
      $_SESSION['list_of_astronauts'] = array();
    }
  }
?>
