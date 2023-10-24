<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function statistic(){
        return view('admin.manager.statistic');
    }
    public function color(){
        return view('admin.manager.color');
    }
    public function login(){
        return view('admin.auth.login');
    }
}
