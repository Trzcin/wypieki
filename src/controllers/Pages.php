<?php
class Pages extends Controller
{
    public function index()
    {
        $this->view('index');
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
}
