<?php

namespace App\Controller;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HomeController extends Controller {

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response {
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