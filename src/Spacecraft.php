<?php
  class Spacecraft
  {
    private $name;
    private $destination;

    function __construct($name, $destination)
    {
      $this->name = $name;
      $this->destination = $destination;
    }

    function setName($new_name)
    {
      $this->name = $new_name;
    }

    function setDestination($new_destination)
    {
      $this->destination = $new_destination;
    }

    function getName()
    {
      return $this->name;
    }

    function getDestination()
    {
      return $this->destination;
    }

    function save()
    {
      array_push($_SESSION['list_of_spacecrafts'], $this);
    }

    static function getAll()
    {
      return $_SESSION['list_of_spacecrafts'];
    }

    static function deleteAll()
    {
      $_SESSION['list_of_spacecrafts'] = array();
    }
  }
?>
