<?php

namespace App;


use App\Exceptions\E404;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;

        if (!method_exists($this, $methodName)) {
            throw new E404('Страница не найдена');
        }

        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction()
    {
    }
}