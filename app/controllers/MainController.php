<?php

namespace controllers;

class MainController
{
    public function index()
    {
        view('main', ['titulo' => 'Página principal']);
    }
}