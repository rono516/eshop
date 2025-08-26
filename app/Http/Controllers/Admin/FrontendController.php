<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
