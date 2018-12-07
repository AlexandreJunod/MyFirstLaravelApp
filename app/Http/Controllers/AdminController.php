<?php

namespace App\Http\Controllers;

use App\Classes\DataProvider;
use App\Classes\Thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $things = DataProvider::getData();
        Storage::disk('local')->put('data.txt', serialize($things));
        return view('admin')->with('things', $things);
    }

    public function kill(Request $request)
    {
        $things = DataProvider::getData();
        foreach($things as $key=>$thing)
        {
            if($thing->getId() == $request->delid)
            {
                unset($things[$key]);
                Storage::disk('local')->put('data.txt', serialize($things));
                return redirect('admin')->with('things', $things);
            }
        }
    }

    public function add(Request $request)
    {
        //dd($request);
        $validateData = $request->validate([
            'addvalue' => 'required|min:2|max:10'
        ]);
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

    /*public function hide($id)
    {
        $things = DataProvider::getData();
        foreach($things as $key=>$thing)
        {
            if($thing->getId() == $id)
            {
                unset($things[$key]);
                Storage::disk('local')->put('data.txt', serialize($things));
                return view('admin')->with('things', $things);
            }
        }
    }*/

    /*public function edit($personId, $newname) {
        $values = ['personId' => $personId, 'newname' => $newname];
        return view('admin', $values);
        //return view('admin')->with('values', $values);
    }*/
}
