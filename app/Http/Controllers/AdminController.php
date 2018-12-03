<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = DataProvider::load();
        return view('admin')->with('users',$users);
    }

    public function hide($id)
    {
        $users = DataProvider::load();
        foreach ($users as $i => $user)
            if ($user->getId() == $id)
                unset($users[$i]);
        return view('admin')->with('users',$users);
    }
}
