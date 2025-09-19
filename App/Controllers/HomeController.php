<?php

namespace App\Controllers;
use App\Entities\Creation;

class HomeController extends Controller
{

    public function index()
    {
        $creation = new Creation();
        $this->render('home/index');
    }
}
