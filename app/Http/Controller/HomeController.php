<?php
namespace App\Http\Controller;

use Flashy\Http\Controller;

class HomeController extends Controller
{
    protected function indexAction($name = 'world')
    {
        return $this->json(['hello' => $name]);
    }
}
