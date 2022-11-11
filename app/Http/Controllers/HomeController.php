<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'Consulta de preços de Stocks';
        return view('home', compact('title'));
    }
}
