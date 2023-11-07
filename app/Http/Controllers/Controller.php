<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $repository;

    public function __construct(){
        $class = '\App\Repository\\' . str_replace('App\Http\Controllers\\', '', get_class($this));
        $class = str_replace('Controller', '', $class);
        if (class_exists($class)) {
            $this->repository = new $class();
        }
    }
}
