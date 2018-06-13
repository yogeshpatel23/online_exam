<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booklate;

class ShopsController extends Controller
{
    public function index()
    {
        return Booklate::where('booklate_type','1')->get();
    }
}
