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
    public function index(Request $request)
    {
        $things = Thing::all();
        $colors = Color::all();
        return view('admin')->with('things', $things)->with('colors', $colors);
    }

    public function del(Request $request)
    {
        DB::delete('delete from things where id = :id', ['id' => $request->delete]);
        return redirect('admin');
    }

    public function add(ThingRequest $request)
    {
        try
        {
            $newthing = new Thing();
            $newthing->name = $request->newname;
            $newthing->nbBricks = $request->newbricks;
            $newthing->color_id = $request->newcolor;
            $newthing->save();
            $request->session()->flash('flashmessage',"{$newthing->name} a été ajoutée");
            return redirect('admin');
        } catch (\Exception $e)
        {
            return back()->withErrors(['dupmessage' => 'Cette chose existe déjà'])->withInput();
        }
    }
}
