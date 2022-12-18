<?php

class Controller
{
    protected $model;

    public function model($model)
    {
        require_once APP_ROOT . '/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        $data['view'] = $view;
        $is_auth = $this->is_auth();
        (file_exists(APP_ROOT . '/views/' . $view . '.php')) ?
            include_once APP_ROOT . '/views/' . $view . '.php' :
            die('View' . $view . ' does not exist');
    }

    public function redirect(string $to)
    {
        header('Location: ' . $to);
        exit();
    }

    public function is_auth()
    {
        return isset($_SESSION['name']);
    }
}
