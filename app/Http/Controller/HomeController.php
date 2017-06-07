<?php
namespace App\Http\Controller;

use Flashy\Http\Controller;

class HomeController extends Controller
{
    protected function indexAction($params)
    {
        $this->response->getBody()->write('Hello '.($params['name'] ?? 'Flashy !'));
        return $this->response;
    }
}
