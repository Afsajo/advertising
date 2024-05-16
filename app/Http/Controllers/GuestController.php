<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $title = "CV. Fajar Advertising";
        return view('welcome',compact('title'));
        // return view('layouts.app',compact('title'));
    }
}
