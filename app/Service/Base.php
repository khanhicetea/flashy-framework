<?php
namespace App\Service;

use Illuminate\Database\Capsule\Manager;
use Psr\Container\ContainerInterface;

abstract class Base
{
    protected $container;
    protected $db;
    protected $model;

    public function __construct(ContainerInterface $container, Manager $db)
    {
        $this->container = $container;
        $this->db = $db;
    }

    public function __get(string $key)
    {
        return $this->container->get($key);
    }

    public function __call($method, $params)
    {
        if ($this->model) {
            return call_user_func_array([$this->model, $method], $params);
        }

        return call_user_func_array([$this->db->getDatabaseManager()->connection(), $method], $params);
    }
}
