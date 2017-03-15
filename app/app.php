<?php
    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Astronaut.php";
    require_once __DIR__."/../src/Spacecraft.php";

    session_start();
    if (empty($_SESSION['list_of_astronauts'])) {
        $_SESSION['list_of_astronauts'] = array();
    }
    if (empty($_SESSION['list_of_spacecrafts'])) {
        $_SESSION['list_of_spacecrafts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('astronauts' => Astronaut::getAll()));
    });

    $app->post("/astronauts", function() use ($app) {
        $astronaut = new Astronaut($_POST['name'], $_POST['age']);
        $astronaut->save();
        return $app['twig']->render('new_astro.html.twig', array('astronaut' => $astronaut));
    });

    $app->post("/delete_astronauts", function() use ($app) {
      Astronaut::deleteAll();
      return $app['twig']->render('delete.html.twig');
    });

    $app->get("/spacecrafts", function() use ($app) {
        return $app['twig']->render('spacecrafts.html.twig', array('spacecrafts' => Spacecraft::getAll()));
    });

    $app->post("/new_spacecrafts", function() use ($app) {
        $spacecraft = new Spacecraft($_POST['name'], $_POST['destination']);
        $spacecraft->save();
        return $app['twig']->render('new_space.html.twig', array('spacecraft' => $spacecraft));
    });

    $app->post("/delete_spacecrafts", function() use ($app) {
      Spacecraft::deleteAll();
      return $app['twig']->render('delete.html.twig');
    });

    return $app;
?>
