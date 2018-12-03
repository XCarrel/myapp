<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = [
            new Character('1','Joe'),
            new Character('1','Jack'),
            new Character('1','William'),
            new Character('1','Averell'),
            new Character('1','Luke')
        ];
        return view('admin')->with('users',$users);
    }
}
