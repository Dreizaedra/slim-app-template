<?php

namespace App\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Customer;

class HomeController extends Controller {

    public function index(Request $request, Response $response) {
        echo $this->render('home/home.html.twig', [
            'res' => [
                'password' => password_hash('secret', PASSWORD_BCRYPT)
            ]
        ]);
        return $response->withStatus(200);
    }
}