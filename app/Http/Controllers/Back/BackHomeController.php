<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackHomeController extends Controller
{
    public function  __invoke(Request $request)
    {

        return view('back.home');
    }
}
