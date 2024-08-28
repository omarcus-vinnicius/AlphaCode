<?php

use App\Controller\ControllerUser;
use App\Middlewares\ErrorHandling\errorInsert;
use App\Middlewares\ErrorHandling\errorUpdate;
use App\Middlewares\Validation\validationInsert;
use App\Middlewares\Validation\validationUpdate;
use function src\settings;


$app = new \Slim\App(settings());


$app->group('/api/crud/contacts', function () use ($app) {

    $app->get('/users', ControllerUser::class . ':getUser');
    $app->get('/users/{id}', ControllerUser::class . ':getUserId');
    $app->post('/users', ControllerUser::class . ':createUser')
    ->add(new validationInsert)
    ->add(new errorInsert);
    $app->put('/users', ControllerUser::class . ':updateUser')
    ->add(new validationUpdate)
    ->add(new errorUpdate);
    $app->delete('/users/{id}', ControllerUser::class . ':deleteUser');

});


//testes

$app->run();



?>