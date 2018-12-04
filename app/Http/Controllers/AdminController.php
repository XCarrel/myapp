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

    public function crud(NewCharacter $request)
    {
        $users = DataProvider::load();

        $delid = $request->delete;
        if (isset($delid))
            foreach ($users as $i => $user)
                if ($user->getId() == $delid)
                    unset($users[$i]);

        if (isset($request->add))
        {
            $validatedData = $request->validate([
                'newname' => 'required|min:2|max:10'
            ]);
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
