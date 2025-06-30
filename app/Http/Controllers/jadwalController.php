<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jadwalController extends Controller
{
    public function index()
    {
        return view('page.jadwal.index');
    }
}
