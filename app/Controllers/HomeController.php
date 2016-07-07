<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use App\Models\User;

class HomeController extends Controller
{
	public function index($request, $response)
	{
		User::create([
			'name' => 'Billy bob',
			'email' => 'billy@bob.com',
			'password' => 'password'
		]);
		return $this->view->render($response, 'home.twig');
	}
}