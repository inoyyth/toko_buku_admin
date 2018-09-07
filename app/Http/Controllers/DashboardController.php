<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function  index() {
        $data['title'] = 'Welcome Page';
        return view('pages.dashboard.main')->with(compact('data'));
    }
}
