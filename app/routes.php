<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/', 'HomeController:index')->setName('home');

$app->group('', function() use($app) {

	$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
	$app->post('/auth/signup', 'AuthController:postSignUp');

	$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
	$app->post('/auth/signin', 'AuthController:postSignIn');

})->add(new GuestMiddleware($container));



$app->group('', function() use ($app) {

	$app->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

	$app->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
	$app->post('/auth/password/change', 'PasswordController:postChangePassword');

})->add(new AuthMiddleware($container));

