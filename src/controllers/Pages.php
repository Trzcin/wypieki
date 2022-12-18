<?php
class Pages extends Controller
{
    public function index()
    {
        $data = [
            'auth' => $this->is_auth() ? 'authed as ' . $_SESSION['name'] : 'no authed'
        ];
        $this->view('index', $data);
    }

    public function gallery()
    {
        $this->view('gallery');
    }

    public function form()
    {
        $this->view('form');
    }

    public function recipes()
    {
        $this->view('recipes');
    }

    public function recipe($name = "")
    {
        $this->view('recipes/' . $name);
    }

    public function account()
    {
        if ($this->is_auth())
            $this->redirect('/');
        else
            $this->view('account');
    }
}
