<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();

    session_start();
    if (empty($_SESSION['contact_list'])) {
        $_SESSION['contact_list'] = array();
    }

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('homepage.html.twig');
    });

    $app->post("/contact_created", function() use ($app) {
        $newcontact = new Contact($_POST['name'], $_POST['number'], $_POST['email']);
        $newcontact->save();
        return $app['twig']->render('contact_created.html.twig', array('newcontact' => $newcontact));
    });

    $app->post("/all_contacts", function() use ($app) {
        return $app['twig']->render('all_contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/delete_all", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_all.html.twig');
    });

    return $app;

?>
