<?php

namespace App\Controller;

use Exception;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller {

    public function index(Request $request, Response $response) {
        $res['status'] = 'error';
        try {
            // Your code here
            $res['status'] = 'success';
        } catch (Exception $e) {
            $res['error'] = $e->getMessage();
        }
        echo $this->render('home/home.html.twig', [
            'res' => $res
        ]);
        return $response;
    }
}