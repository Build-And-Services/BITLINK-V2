<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringDinasController extends Controller
{
    public function index()
    {
        return view('frontend.monitoring.index');
    }
}
