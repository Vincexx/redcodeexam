<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login() {
        return view('pages.login');
    }

    public function index() {
        return view('pages.index');
    }

    public function dashboard() {
        return view('pages.dashboard');
    }
}
