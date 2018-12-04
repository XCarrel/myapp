<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Http\Requests\NewCharacter;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = DataProvider::load();
        return view('admin')->with('users', $users);
    }

    public function del(Request $request)
    {
        $users = DataProvider::load();

            foreach ($users as $i => $user)
                if ($user->getId() == $request->delete)
                    unset($users[$i]);

        DataProvider::store($users);
        return redirect('admin')->with('users', $users);
    }

    public function add(NewCharacter $request)
    {
        $users = DataProvider::load();

        if (isset($request->add))
        {
            // need to find out the next id
            $nextid = 0;
            foreach ($users as $user)
                if ($user->getId() > $nextid)
                    $nextid = $user->getId();
            $nextid++;
            $users[] = new Character($nextid,$request->newname);
        }

        DataProvider::store($users);
        return redirect('admin')->with('users', $users);
    }
}
