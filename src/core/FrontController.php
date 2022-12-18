<?php

class FrontController
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function getUserAction()
    {
        if (isset($_GET['action'])) {
            $action = rtrim($_GET['action'], '/');
            $action = ltrim($action, '/');
            $action = explode('/', $action);
            return $action;
        }
    }

    public function __construct()
    {
        $action = $this->getUserAction();

        #controller
        if (file_exists(APP_ROOT . '/controllers/' . ucwords($action[0]) . '.php')) {
            $this->currentController = ucwords($action[0]);
            unset($action[0]);
        }
        require_once APP_ROOT . '/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        #method
        if (isset($action[0]) && method_exists($this->currentController, $action[0])) {
            $this->currentMethod = $action[0];
            unset($action[0]);
        } else if (isset($action[1])) {
            if (method_exists($this->currentController, $action[1])) {
                $this->currentMethod = $action[1];
                unset($action[1]);
            }
        }

        #additional parameters
        $this->params = $action ? array_values(array_slice($action, isset($action[1]) ? 0 : 1)) : [];

        #call the currentMethod on the currentController with params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
}
