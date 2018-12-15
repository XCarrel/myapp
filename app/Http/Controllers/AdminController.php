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
        return view('admin')->with('things', $things);
    }

    public function del(Request $request)
    {
        $thing = Thing::find($request->delete);
        $thing->delete();
        $request->session()->flash('flashmessage',"{$thing->name} a été supprimée");
        return redirect('admin');
    }

    public function add(ThingRequest $request)
    {
        try
        {
            $newthing = new Thing();
            $newthing->name = $request->newname;
            $newthing->nbBricks = $request->newbricks;
            $newthing->save();
            // Pick random colors to add
            $colors = Color::all();
            $kill = rand(0,count($colors)); // randomly decide how many colors we'll remove
            for ($i=0; $i<$kill; $i++) // as long as we have too many
                unset($colors[rand(0,count($colors))]); // we delete one at random

            $newthing->colors()->attach($colors);

            $request->session()->flash('flashmessage',"{$newthing->name} a été ajoutée");
            return redirect('admin');
        } catch (\Exception $e)
        {
            return back()->withErrors(['dupmessage' => 'Cette chose existe déjà'])->withInput();
        }
    }
}
