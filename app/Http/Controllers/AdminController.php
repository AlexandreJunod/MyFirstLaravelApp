<?php

namespace App\Http\Controllers;

use App\Classes\DataProvider;
use App\Thing;
use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ThingRequest;
use DB;

class AdminController extends Controller
{
    public function index() {
        return Color::find(3)->things;
        $things = Thing::all();
        $colors = Color::all();
        return view('admin')->with('things', $things)->with('colors', $colors);
    }

    public function kill(Request $request)
    {
        $thing = Thing::find($request->delid);
        $thing->delete();
        return redirect('admin');
    }

    public function add(ThingRequest $request)
    {
        $things = DataProvider::getData();
        $nextid = 0;
        foreach($things as $thing)
            if($thing->getId() > $nextid)
                $nextid = $thing->getId();
        $nextid++;
        $NewThing = new Thing($nextid,$request->addvalue,3,"purple");
        array_push($things, $NewThing);
        Storage::disk('local')->put('data.txt', serialize($things));
        return redirect('admin')->with('things', $things);
    }
}
