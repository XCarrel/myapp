<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Http\Requests\NewCharacter;
use App\Http\Requests\ThingRequest;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $things = DB::table('things')->join('colors','things.color_id','=','colors.id')->select('things.id as id','things.name as tname','nbBricks','colors.name as cname')->get();
        $colors = DB::select('select * from colors');
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
