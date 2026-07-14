<?php

namespace App\Http\Controllers\Front\Investments;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $investments = Investment::where('status', 1)->get(); // status 1 - active

        return view('front.investments.index', compact('investments'));
    }
}
