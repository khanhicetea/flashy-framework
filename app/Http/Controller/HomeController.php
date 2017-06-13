<?php
namespace App\Http\Controller;

use Flashy\Http\Controller;

class HomeController extends Controller
{
    protected function indexAction($params)
    {
        return $this->json(['hello' => 'world']);
    }
}
