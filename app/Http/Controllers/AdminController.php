<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Http\Requests\NewCharacter;
use App\Http\Requests\ThingRequest;
use Illuminate\Http\Request;
use DB;
use App\Thing;
use App\Color;

class AdminController extends Controller
{
    public function index()
    {
        $things = Thing::all();
        $colors = Color::all();
        return view('admin')->with('things', $things)->with('colors',$colors);
    }

    public function del(Request $request)
    {
        DB::delete('delete from things where id = :id', ['id' => $request->delete]);
        return redirect('admin');
    }

    public function add(ThingRequest $request)
    {
        error_log($request->newbricks);
        DB::insert('insert into things (name,nbBricks,color_id) values (:name,:nbBricks,:color)',["name" => $request->newname,"nbBricks" => $request->newbricks, "color" => $request->newcolor]);
        return redirect('admin');
    }
}
